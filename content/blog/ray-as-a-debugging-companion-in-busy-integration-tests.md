---
title: 'Ray as a debugging companion in busy integration tests'
date: '2023-10-02T00:00:00.000000Z'
updated_at: '2023-10-13T12:59:28.000000Z'
published: true
summary: 'Ray is a great companion when debugging a test. However, in busy integration tests it can be hard to find out which logs matter and which don’t.'
authors:
  -
    name: Sebastian
    avatar: /media/blog/authors/27e1bbf570a99f9a73dd0f34af844db1.jpg
header_image: null
og_image: null
tags: {}
---
Ray is a great companion when debugging a test. However, in busy integration tests it can be hard to find out which logs matter and which don’t.

Tests are often structured in three steps: arrange, act, and assert.

```
class CommentTest extends TestCase
{
    public function test_a_user_can_post_a_comment(): void
    {
        // Arrange
        $user = User::factory()->create(…);
        $post = Post::factory()->create(…);
			
        // Act: What we're testing
        $post->addComment($user, 'My comment');
        
        // Assert
        $this->assertDatabaseHas(…);
    }
}
```

In integration tests, the "arrange" step of a test can get quite heavy. If any of the factories or call in arrange have `ray()` calls, they'll clutter up your Ray window before even acting on the test subject.

To have a more succinct output in Ray, we can start with a clean slate and only enable it in the act step.

```
class CommentTest extends TestCase
{
    public function test_a_user_can_post_a_comment(): void
    {
        ray()->clearScreen()->disable();
        
        // Arrange
        
        ray()->enable();
        
        // Act
        
        // Assert
    }
}
```

`ray()->clearScreen()` clears the output in Ray to start with a clean slate. `disable()` ignores future calls to Ray.

After arranging the test, `ray()->enable()` turns Ray back on, and we act on our test subject.

If you want Ray to be opt-in in tests, and always start with a clean slate, you can add `ray()->clearScreen()->disable()` to the `setUp()` method instead.

```
class CommentTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        ray()->clearScreen()->disable();
    }

    public function test_a_user_can_post_a_comment(): void
    {
        // Arrange
        
        ray()->enable();
        
        // Act
        
        // Assert
    }
}
```

Now Ray will only log what you actually care about when testing.
