<dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
    <code class="text-indigo-500 text-sm font-semibold">
        ray($anything);
    </code>
</dt>
<dd class="py-3 border-b border-gray-400 border-opacity-25">
    Send a string, arrays, object, …  to Ray
</dd>

<dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
    <code class="text-indigo-500 text-sm font-semibold">
        ray($anything, $somethingElse);
    </code>
</dt>
<dd class="py-3 border-b border-gray-400 border-opacity-25">
    Send as much as you want
</dd>

<dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
    <code class="text-indigo-500 text-sm font-semibold">
        ray($anything)->green();
    </code>
</dt>
<dd class="py-3 border-b border-gray-400 border-opacity-25">
    Apply a color, so you can use Ray's color filters
</dd>

<dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
    <code class="text-indigo-500 text-sm font-semibold">
        ray()->queries();
    </code>
</dt>

<dd class="py-3 border-b border-gray-400 border-opacity-25">
    See all queries executed by your Laravel app
</dd>

<dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
    <code class="text-indigo-500 text-sm font-semibold">
        ray()->measure();
    </code>
</dt>
<dd class="py-3 border-b border-gray-400 border-opacity-25">
    Check execution time and memory usage
</dd>

<dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
    <code class="text-indigo-500 text-sm font-semibold">
        ray()->trace();
    </code>
</dt>
<dd class="py-3 border-b border-gray-400 border-opacity-25">
    Find out where your code was called from
</dd>

<dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
    <code class="text-indigo-500 text-sm font-semibold">
        ray()->pause();
    </code>
</dt>
<dd class="py-3 border-b border-gray-400 border-opacity-25">
    Pause your code
</dd>

<dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
    <code class="text-indigo-500 text-sm font-semibold">
        ray()->ban();
    </code>
</dt>
<dd class="py-3 border-b border-gray-400 border-opacity-25">
    Keep it cool while debugging <i class="ml-1 fas fa-sunglasses"></i>
</dd>