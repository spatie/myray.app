<div class="bg-[rgb(30,41,59)] text-white overflow-hidden shadow-sm text-sm  -mt-8 rounded">
    <div class="h-8 relative pl-4 w-full bg-[rgb(15,23,42)] gap-2 flex items-center">
        <div class="w-3 h-3 bg-[rgb(51,65,85)] rounded-full"></div>
        <div class="w-3 h-3 bg-[rgb(51,65,85)] rounded-full"></div>
        <div class="w-3 h-3 bg-[rgb(51,65,85)] rounded-full"></div>
    </div>
    <div class="p-4">
<code>
<span class="markup-code-function-decalration">function</span> <span class="markup-code-function">TestCommand()</span> {
</code>
<pre id="typewriter_0" class="hideafter ">

  <span class="markup-comment">// Send strings, arrays, object,...</span>
  <span class="markup-variable">$string</span> = <span class="markup-code-string">'My first debug Item'</span>;
  <span class="markup-code-function ">ray(</span><span class="markup-variable">$string</span><span class="markup-code-function ">)</span>;
</pre>
<pre id="typewriter_1" class="hideafter">

  <span class="markup-comment">// Send as much as you want</span>
  <span class="markup-variable">$array</span> = [
    <span class="markup-code-string">'a'</span> => 1,
    <span class="markup-code-string">'b'</span> => ['c' => '🕺'],
  ];
  <span class="markup-code-function ">ray(</span><span class="markup-variable">$array</span><span class="markup-code-function ">)</span>;
</pre>
<pre id="typewriter_2" class="hideafter">

  <span class="markup-comment">// Apply a color</span>
  <span class="markup-comment">// and use Ray's color filters</span>
  <span class="markup-variable">$string2</span> = <span class="markup-code-string">'A green statement'</span>;
  <span class="markup-code-function ">ray(</span><span class="markup-variable">$string2</span><span class="markup-code-function ">)</span>-><span class="markup-code-function ">green()</span>;
</pre>
<code>
}
</code>
{{--
                <span class="markup-code-function-decalration">function</span> <span class="markup-code-function">TestCommand()</span>  {
            <span class="markup-code-nest">
                <span class="markup-typewriter-wrapper">
                    <span class="line-1-code block">
                        <span class="block">
                            <span class="markup-variable">$string</span> = <span class="markup-code-string">'My first debug Item'</span>;
                        </span>
                        <span class="inline-block">
                            <span class="markup-typewriter  typewriter-line-1">
                                <span class="markup-code-function ">
                                    ray(<span class="markup-variable">$string</span>)
                                </span>
                                ;
                            </span>

                        </span>

                    </span>
                    <br>
                    <span class="line-2-code block">
                        <span class="block">
                            <span class="markup-variable">$array</span> = [
                                <span class="markup-code-nest">
                                    <span class="block">
                                        <span class="markup-code-string">'a'</span> => 1,
                                    </span>
                                    <span class="block">
                                        <span class="markup-code-string">'b'</span> => <span class="markup-code-function ">array()</span>,
                                    </span>
                                </span>
                            ];
                        </span>
                        <span class="inline-block">
                            <span class="markup-typewriter  typewriter-line-1">
                                <span class="markup-code-function ">
                                    ray(<span class="markup-variable">$array</span>)
                                </span>
                                ;
                            </span>

                        </span>

                    </span>
                </span>


            </span>
            <span class="markup-code-bracket">}</span>
                --}}
    </div>

</div>
