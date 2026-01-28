<div class="text-sm screen-code-block md:text-base js-anim-code">
    <p><span class="screen-code-keyword">function</span> <span class="screen-code-title">myAwesomeFunction</span><span class="screen-code-params">()</span> {</p>
    <div class="screen-code-typewriter-block">
        <p></p>
        <div class="js-anim-block">
            <span class="ml-4 screen-code-caret"></span>
            <p class="ml-4 screen-code-comment">// Send strings, arrays, objects,...</p>
            <p class="ml-4"><span class="screen-code-variable">$string</span> = <span class="screen-code-string">'Send anything to Ray, from PHP and Laravel to JavaScript and more.'</span>;</p>
            <p class="ml-4 screen-code-glow"><span class="screen-code-title">ray</span>(<span class="screen-code-variable">$string</span>)-><span class="screen-code-title">label</span>(<span class="screen-code-string">'Hello'</span>);</p>
        </div>
        <p></p>
        <div class="js-anim-block">
            <p class="ml-4 screen-code-comment">// Output gets formatted properly</p>
            <p class="ml-4"><span class="screen-code-variable">$array</span> = [</p>
            <p class="ml-8"><span class="screen-code-variable">'a'</span> => 1,</p>
            <p class="ml-8"><span class="screen-code-variable">'b'</span> => [<span class="screen-code-variable">'c'</span> => <span class="screen-code-variable">'🕺'</span>],</p>
            <p class="ml-4">];</p>
            <p class="ml-4 screen-code-glow"> <span class="screen-code-title">ray</span>(<span class="screen-code-variable">$array</span>);</p>
        </div>
        <p></p>
        <div class="js-anim-block">
            <p class="ml-4 screen-code-comment">// Apply a color and filter</p>
            <p class="ml-4"><span class="screen-code-variable">$table</span> = [</p>
            <p class="ml-8"><span class="screen-code-variable">'Message'</span> => <span class="screen-code-variable">'I prefer orange'</span>,</p>
            <p class="ml-4">];</p>
            <p class="ml-4 screen-code-glow">
                <span class="screen-code-title">ray</span>()-><span class="screen-code-title">table</span>(<span class="screen-code-variable">$table</span>)-><span class="screen-code-title">blue</span>();
            </p>
        </div>
        <p></p>
    </div>
    <p>}</p>
</div>
