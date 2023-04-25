<?php

namespace App\Models;

use App\Http\Front\Controllers\PostsController;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Spatie\LaravelMarkdown\MarkdownRenderer;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements Feedable, HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $casts = [
        'published_at' => 'datetime',
        'published' => 'boolean',
    ];

    public static function booted(): void
    {
        static::creating(function (Post $post): void {
            $post->preview_secret = Str::random(10);
            $post->formatted_text = '';
        });

        static::saving(function (self $model): void {
            $baseSlug = Str::slug($model->title);

            $model->slug = Str::limit($baseSlug);
        });

        static::saved(function (Post $post): void {
            $post->updateQuietly([
                'formatted_text' => app(MarkdownRenderer::class)
                    ->highlightTheme('nord')
                    ->toHtml($post->text),
            ]);
        });
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->nonQueued()
            ->width(950);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('blog')
            ->singleFile()
            ->useDisk('public');
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('blog', 'preview') ?: null;
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('published', true);
    }

    public function scopeScheduled(Builder $query): void
    {
        $query
            ->where('published', false)
            ->whereNotNull('publish_date');
    }

    public function updateAttributes(array $attributes)
    {
        $this->title = $attributes['title'];
        $this->text = $attributes['text'];
        $this->publish_date = $attributes['publish_date'];
        $this->published = $attributes['published'] ?? false;

        $this->save();

        return $this;
    }

    public static function getFeedItems()
    {
        return static::published()
            ->orderByDesc('publish_date')
            ->limit(100)
            ->get();
    }

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->formatted_text)
            ->updated($this->updated_at)
            ->link(url(action([PostsController::class, 'detail'], $this->slugId())))
            ->authorName($this->authors()->pluck('name')->implode(', '));
    }

    public function slugId(): string
    {
        return "{$this->id}-{$this->slug}";
    }

    public function getUrlAttribute(): string
    {
        return action([PostsController::class, 'detail'], $this->slugId());
    }

    public function getPreviewUrlAttribute(): string
    {
        return action([PostsController::class, 'detail'], [$this->idSlug()])."?preview_secret={$this->preview_secret}";
    }

    public function getExcerptAttribute(): string
    {
        $excerpt = trim($this->formatted_text);

        $excerpt = Str::before($excerpt, '<blockquote>');

        //remove html
        $excerpt = strip_tags($excerpt);

        //replace multiple spaces
        $excerpt = preg_replace("/\s+/", ' ', $excerpt);

        if (strlen($excerpt) == 0) {
            return '';
        }

        if (strlen($excerpt) <= 300) {
            return $excerpt;
        }

        $ww = wordwrap($excerpt, 300, "\n");

        $excerpt = substr($ww, 0, strpos($ww, "\n")).'…';

        return $excerpt;
    }

    public function idSlug(): string
    {
        return "{$this->id}-{$this->slug}";
    }

    public static function findByIdSlug(string $idSlug): ?Model
    {
        [$id] = explode('-', $idSlug);

        return static::find((int) $id);
    }
}
