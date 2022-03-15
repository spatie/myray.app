<div x-data="{tooltip:''}" @click="tooltip = ''" @click.away="tooltip = ''" class="
group
 w-full h-full
grid overflow-hidden
text-base" style="grid-template-rows: auto 1fr">
    <nav class="
app-region-drag 
z-20 flex items-center
px-3.5
bg-gray-100 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 dark:border-opacity-25
shadow-sm
select-none 
justify-between
" style="height: 2.375rem;">
        <div class="grid grid-flow-col items-center justify-start gap-1 sm:gap-2">
            <div class="flex items-center relative">
                <button type="button" title="No previous screen" disabled="" class="
relative group
select-none 
flex items-center justify-center
text-xs
w-7 sm:w-8 h-6
rounded-l border

            text-gray-500 bg-white bg-opacity-50 dark:text-gray-200 dark:bg-gray-700 shadow-sm
            border-gray-300 dark:border-gray-600 dark:border-opacity-50
            
        
focus:outline-none focus:ring
app-region-no-drag
">
                    <span class="flex items-center justify-center w-3.5 h-3.5">
                        <svg class="h-full w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512">
                            <path d="M4.2 247.5L151 99.5c4.7-4.7 12.3-4.7 17 0l19.8 19.8c4.7 4.7 4.7 12.3 0 17L69.3 256l118.5 119.7c4.7 4.7 4.7 12.3 0 17L168 412.5c-4.7 4.7-12.3 4.7-17 0L4.2 264.5c-4.7-4.7-4.7-12.3 0-17z">

                            </path>
                        </svg>
                    </span>
                   
                </button>
                <button type="button" title="No next screen" disabled="" class="
relative group
cursor-default select-none 
flex items-center justify-center 
text-xs
w-7 sm:w-8 h-6
-ml-px rounded-r border

            text-gray-500 bg-white bg-opacity-50 dark:text-gray-200 dark:bg-gray-700 shadow-sm
            border-gray-300 dark:border-gray-600 dark:border-opacity-50
            
        
focus:outline-none focus:ring
app-region-no-drag
">
                    <span class="flex items-center justify-center w-3.5 h-3.5">
                        <svg class="h-full w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z">

                            </path>
                        </svg>
                    </span>
                 
                </button>
                <x-tooltip id="previous" position="bottom-0 right-0" direction="left-0 top-full">
                    Go back through previous screens or create a new one
                </x-tooltip>
            </div>
            <div class="relative">
                <button type="button" title="Show files" disabled="" class="
relative group
cursor-default select-none 
flex items-center justify-center
text-xs
w-7 sm:w-8 h-6
rounded border

            text-gray-500 bg-white bg-opacity-50 dark:text-gray-200 dark:bg-gray-700 shadow-sm
            border-gray-300 dark:border-gray-600 dark:border-opacity-50
            
        
focus:outline-none focus:ring
app-region-no-drag
">
                    <span class="flex items-center justify-center w-3.5 h-3.5">
                        <svg class="h-3 w-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path d="M544 32H432L400 0h-80a32 32 0 0 0-32 32v160a32 32 0 0 0 32 32h224a32 32 0 0 0 32-32V64a32 32 0 0 0-32-32zm0 288H432l-32-32h-80a32 32 0 0 0-32 32v160a32 32 0 0 0 32 32h224a32 32 0 0 0 32-32V352a32 32 0 0 0-32-32zM64 16A16 16 0 0 0 48 0H16A16 16 0 0 0 0 16v400a32 32 0 0 0 32 32h224v-64H64V160h192V96H64z">

                            </path>
                        </svg>
                    </span>
                    <x-tooltip id="files" position="bottom-0 left-0" direction="left-0 top-full">
                        See a list of related files
                    </x-tooltip>
                </button>
            </div>
            <button type="button" title="Pause" class="
relative group
cursor-default select-none 
flex items-center justify-center
text-xs
w-7 sm:w-8 h-6
rounded border


            text-gray-500 bg-white bg-opacity-50 dark:text-gray-200 dark:bg-gray-700 shadow-sm
            border-gray-300 dark:border-gray-600 dark:border-opacity-50
        
focus:outline-none focus:ring
app-region-no-drag
">
                <span class="flex items-center justify-center w-3.5 h-3.5">
                    <svg class="h-3 w-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M144 479H48c-26.5 0-48-21.5-48-48V79c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zm304-48V79c0-26.5-21.5-48-48-48h-96c-26.5 0-48 21.5-48 48v352c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48z">

                        </path>
                    </svg>
                </span>
                <x-tooltip id="pause" position="bottom-0 left-0" direction="left-0 top-full">
                    Pause the influx of log items
                </x-tooltip>
            </button>
        </div>
        <div class="px-2 xs:px-6 relative grid grid-flow-col justify-center items-center app-region-no-drag">
            <button type="button" title="Show green" class="
group truncate
flex-none flex items-center justify-center
focus:outline-none focus:ring-0
cursor-default
p-0.5 sm:p-1
false
">
                <div class="
    flex items-center truncate
    border-green-400
    transition-color duration-75
    flex-none rounded-full border w-2 sm:w-3 h-2 sm:h-3
">
                </div>
            </button>
            <button type="button" title="Show orange" class="
group truncate
flex-none flex items-center justify-center
focus:outline-none focus:ring-0
cursor-default
p-0.5 sm:p-1
false
">
                <div class="
    flex items-center truncate
    border-orange-400
    transition-color duration-75
    flex-none rounded-full border w-2 sm:w-3 h-2 sm:h-3
">
                </div>
            </button>
            <button type="button" title="Show red" class="
group truncate
flex-none flex items-center justify-center
focus:outline-none focus:ring-0
cursor-default
p-0.5 sm:p-1
false
">
                <div class="
    flex items-center truncate
    border-red-400
    transition-color duration-75
    group-hover:bg-${color}-200
    flex-none rounded-full border w-2 sm:w-3 h-2 sm:h-3
">
                </div>
            </button>
            <button type="button" title="Show purple" class="
group truncate
flex-none flex items-center justify-center
focus:outline-none focus:ring-0
cursor-default
p-0.5 sm:p-1
false
">
                <div class="
    flex items-center truncate
    border-purple-400
    transition-color duration-75
    flex-none rounded-full border w-2 sm:w-3 h-2 sm:h-3
">
                </div>
            </button>
            <button type="button" title="Show blue" class="
group truncate
flex-none flex items-center justify-center
focus:outline-none focus:ring-0
cursor-default
p-0.5 sm:p-1
false
">
                <div class="
    flex items-center truncate
    border-blue-400
    transition-color duration-75
    group-hover:bg-${color}-200
    flex-none rounded-full border w-2 sm:w-3 h-2 sm:h-3
">
                </div>
            </button>
            <button type="button" title="Show gray" class="
group truncate
flex-none flex items-center justify-center
focus:outline-none focus:ring-0
cursor-default
p-0.5 sm:p-1
false
">
                <div class="
    flex items-center truncate
    border-gray-400
    transition-color duration-75
    flex-none rounded-full border w-2 sm:w-3 h-2 sm:h-3
">
                </div>
            </button>

            <x-tooltip id="color" position="bottom-0 left-0" direction="left-0 top-full">
                Filter by color
            </x-tooltip>
            
        </div>
        <div class="pr-3.5 grid grid-flow-col items-center justify-end gap-1 sm:gap-2">
            <div class="flex flex-row app-region-no-drag">
                
                <div>
                    <button type="button" title="Filter" class="
relative group
cursor-default select-none 
flex items-center justify-center
text-xs
w-7 sm:w-8 h-6
rounded border


            text-gray-500 bg-white bg-opacity-50 dark:text-gray-200 dark:bg-gray-700 shadow-sm
            border-gray-300 dark:border-gray-600 dark:border-opacity-50
        
focus:outline-none focus:ring
app-region-no-drag
">
                        <span class="flex items-center justify-center w-3.5 h-3.5">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-3 h-3 ">
                                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">

                                </path>
                            </svg>
                        </span>
                        <x-tooltip id="search" position="bottom-0 left-0" direction="right-0 top-full">
                            Search
                        </x-tooltip>
                    </button>
                </div>
            </div>
            <button type="button" title="" class="
relative group
cursor-default select-none 
flex items-center justify-center
text-xs
w-7 sm:w-8 h-6
rounded border


            text-gray-500 bg-white bg-opacity-50 dark:text-gray-200 dark:bg-gray-700 shadow-sm
            border-gray-300 dark:border-gray-600 dark:border-opacity-50
        
focus:outline-none focus:ring
app-region-no-drag
">
                <span class="flex items-center justify-center w-3.5 h-3.5">
                    <svg class="h-3 w-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M480 160H32c-17.673 0-32-14.327-32-32V64c0-17.673 14.327-32 32-32h448c17.673 0 32 14.327 32 32v64c0 17.673-14.327 32-32 32zm-48-88c-13.255 0-24 10.745-24 24s10.745 24 24 24 24-10.745 24-24-10.745-24-24-24zm-64 0c-13.255 0-24 10.745-24 24s10.745 24 24 24 24-10.745 24-24-10.745-24-24-24zm112 248H32c-17.673 0-32-14.327-32-32v-64c0-17.673 14.327-32 32-32h448c17.673 0 32 14.327 32 32v64c0 17.673-14.327 32-32 32zm-48-88c-13.255 0-24 10.745-24 24s10.745 24 24 24 24-10.745 24-24-10.745-24-24-24zm-64 0c-13.255 0-24 10.745-24 24s10.745 24 24 24 24-10.745 24-24-10.745-24-24-24zm112 248H32c-17.673 0-32-14.327-32-32v-64c0-17.673 14.327-32 32-32h448c17.673 0 32 14.327 32 32v64c0 17.673-14.327 32-32 32zm-48-88c-13.255 0-24 10.745-24 24s10.745 24 24 24 24-10.745 24-24-10.745-24-24-24zm-64 0c-13.255 0-24 10.745-24 24s10.745 24 24 24 24-10.745 24-24-10.745-24-24-24z">

                        </path>
                    </svg>
                </span>
                <x-tooltip id="server" position="bottom-0 left-0" direction="right-0 top-full">
                   Connect with a server
                </x-tooltip>
            </button>
        </div>
    </nav>

    <div class="z-10 flex-grow flex flex-col overflow-hidden">

        <nav class="grid grid-cols-3 items-center gap-6 px-3.5 bg-gray-100 bg-opacity-50 border-b border-gray-200 text-xs text-gray-500 " style="height: 2.375rem;">
            <div class=flex>
                <div>
                    <div class="truncate">
                        <strong>Debug Session 01</strong>
                    </div>
                    <x-tooltip id="title" position="bottom-0 left-0" direction="left-0 top-full">
                        Give your screens a name
                    </x-tooltip>
                </div>
            </div>
        </nav>

        <div class="flex-grow overflow-y-auto">
            <div class="
                z-10
                relative group
                grid items-start pl-3.5
                border-b border-gray-400 border-opacity-50
                ray-line-01" style="grid-template-columns: auto auto 1fr;">
                <div class="
                    relative
                    flex-none flex items-center justify-center
                    w-4 h-4 rounded-full
                    focus:outline-none focus:ring-0
                    bg-gray-500  text-white
                " style="top: 1rem;">
                    <div class="relative w-2 h-2 ">
                        <svg class="h-full w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z">

                            </path>
                        </svg>
                    </div>
                    <x-tooltip id="expand" position="bottom-0 right-0" direction="left-0 top-full">
                        Expand or collapse a call or a group
                    </x-tooltip>
                </div>

                <div class="
                    flex items-center space-x-2
                    p-3.5
                    text-sm text-gray-500
                ">
                    <div class="w-16 tabular-nums">10:38:53</div>
                </div>


                <div class="p-3.5" style="transition: max-height 0.2s ease-out 0s; ">
                    <div class="">
                        <div>
                            <div class="relative leading-loose">
                                <div class="ray-item">My first debug item</div>
                            </div>
                            <div class="flex leading-none" title="~/ray-demo-app/app/Console/Commands/{{ $filename ?? 'TestCommand' }}.{{ $extension ?? 'php' }}:15">
                                <div>
                                    <a class="pointer-events-none text-xs text-gray-600 text-opacity-50 hover:text-gray-600 hover:text-opacity-50
                underline" href="#">{{ $filename ?? 'TestCommand' }}.{{ $extension ?? 'php' }}:15</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="
                grid items-start pl-3.5
                border-b border-gray-400 border-opacity-50
                ray-line-02" style="grid-template-columns: auto auto 1fr;">
                <div class="">
                    <div class="pointer-events-none
                        relative
                        flex-none flex items-center justify-center
                        w-4 h-4 rounded-full
                        focus:outline-none focus:ring-0
                        transform scale-50
                        bg-gray-500  text-white
                    " style="top: 1rem;">

                    </div>
                </div>

                <div class="
                    flex items-center space-x-2
                    p-3.5
                    text-sm text-gray-500
                ">
                    <div class="w-16 tabular-nums">10:38:53</div>
                </div>


                <div class="p-3.5">
                    <div class="">
                        <div>
                            <div class="relative leading-loose">
                                @if (($extension ?? 'php') === 'php')
                                <div class="ray-item">
                                    <style>
                                        pre.sf-dump {
                                            display: block;
                                            white-space: pre;
                                            padding: 5px;
                                            overflow: initial !important;
                                        }

                                        pre.sf-dump:after {
                                            content: "";
                                            visibility: hidden;
                                            display: block;
                                            height: 0;
                                            clear: both;
                                        }

                                        pre.sf-dump span {
                                            display: inline;
                                        }

                                        pre.sf-dump .sf-dump-compact {
                                            display: none;
                                        }

                                        pre.sf-dump a {
                                            text-decoration: none;
                                            cursor: pointer;
                                            border: 0;
                                            outline: none;
                                            color: inherit;
                                        }

                                        pre.sf-dump img {
                                            max-width: 50em;
                                            max-height: 50em;
                                            margin: .5em 0 0 0;
                                            padding: 0;
                                            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAAAAAA6mKC9AAAAHUlEQVQY02O8zAABilCaiQEN0EeA8QuUcX9g3QEAAjcC5piyhyEAAAAASUVORK5CYII=) #D3D3D3;
                                        }

                                        pre.sf-dump .sf-dump-ellipsis {
                                            display: inline-block;
                                            overflow: visible;
                                            text-overflow: ellipsis;
                                            max-width: 5em;
                                            white-space: nowrap;
                                            overflow: hidden;
                                            vertical-align: top;
                                        }

                                        pre.sf-dump .sf-dump-ellipsis+.sf-dump-ellipsis {
                                            max-width: none;
                                        }

                                        pre.sf-dump code {
                                            display: inline;
                                            padding: 0;
                                            background: none;
                                        }

                                        .sf-dump-str-collapse .sf-dump-str-collapse {
                                            display: none;
                                        }

                                        .sf-dump-str-expand .sf-dump-str-expand {
                                            display: none;
                                        }

                                        .sf-dump-public.sf-dump-highlight,
                                        .sf-dump-protected.sf-dump-highlight,
                                        .sf-dump-private.sf-dump-highlight,
                                        .sf-dump-str.sf-dump-highlight,
                                        .sf-dump-key.sf-dump-highlight {
                                            background: rgba(111, 172, 204, 0.3);
                                            border: 1px solid #7DA0B1;
                                            border-radius: 3px;
                                        }

                                        .sf-dump-public.sf-dump-highlight-active,
                                        .sf-dump-protected.sf-dump-highlight-active,
                                        .sf-dump-private.sf-dump-highlight-active,
                                        .sf-dump-str.sf-dump-highlight-active,
                                        .sf-dump-key.sf-dump-highlight-active {
                                            background: rgba(253, 175, 0, 0.4);
                                            border: 1px solid #ffa500;
                                            border-radius: 3px;
                                        }

                                        pre.sf-dump .sf-dump-search-hidden {
                                            display: none !important;
                                        }

                                        pre.sf-dump .sf-dump-search-wrapper {
                                            font-size: 0;
                                            white-space: nowrap;
                                            margin-bottom: 5px;
                                            display: flex;
                                            position: -webkit-sticky;
                                            position: sticky;
                                            top: 5px;
                                        }

                                        pre.sf-dump .sf-dump-search-wrapper>* {
                                            vertical-align: top;
                                            box-sizing: border-box;
                                            height: 21px;
                                            font-weight: normal;
                                            border-radius: 0;
                                            background: #FFF;
                                            color: #757575;
                                            border: 1px solid #BBB;
                                        }

                                        pre.sf-dump .sf-dump-search-wrapper>input.sf-dump-search-input {
                                            padding: 3px;
                                            height: 21px;
                                            font-size: 12px;
                                            border-right: none;
                                            border-top-left-radius: 3px;
                                            border-bottom-left-radius: 3px;
                                            color: #000;
                                            min-width: 15px;
                                            width: 100%;
                                        }

                                        pre.sf-dump .sf-dump-search-wrapper>.sf-dump-search-input-next,
                                        pre.sf-dump .sf-dump-search-wrapper>.sf-dump-search-input-previous {
                                            background: #F2F2F2;
                                            outline: none;
                                            border-left: none;
                                            font-size: 0;
                                            line-height: 0;
                                        }

                                        pre.sf-dump .sf-dump-search-wrapper>.sf-dump-search-input-next {
                                            border-top-right-radius: 3px;
                                            border-bottom-right-radius: 3px;
                                        }

                                        pre.sf-dump .sf-dump-search-wrapper>.sf-dump-search-input-next>svg,
                                        pre.sf-dump .sf-dump-search-wrapper>.sf-dump-search-input-previous>svg {
                                            pointer-events: none;
                                            width: 12px;
                                            height: 12px;
                                        }

                                        pre.sf-dump .sf-dump-search-wrapper>.sf-dump-search-count {
                                            display: inline-block;
                                            padding: 0 5px;
                                            margin: 0;
                                            border-left: none;
                                            line-height: 21px;
                                            font-size: 12px;
                                        }

                                        pre.sf-dump,
                                        pre.sf-dump .sf-dump-default {
                                            background-color: #18171B;
                                            color: #FF8400;
                                            line-height: 1.2em;
                                            font: 12px Menlo, Monaco, Consolas, monospace;
                                            word-wrap: break-word;
                                            white-space: pre-wrap;
                                            position: relative;
                                            word-break: break-all
                                        }

                                        pre.sf-dump .sf-dump-num {
                                            font-weight: bold;
                                            color: #1299DA
                                        }

                                        pre.sf-dump .sf-dump-const {
                                            font-weight: bold
                                        }

                                        pre.sf-dump .sf-dump-str {
                                            font-weight: bold;
                                            color: #56DB3A
                                        }

                                        pre.sf-dump .sf-dump-note {
                                            color: #1299DA
                                        }

                                        pre.sf-dump .sf-dump-ref {
                                            color: #A0A0A0
                                        }

                                        pre.sf-dump .sf-dump-public {
                                            color: #FFFFFF
                                        }

                                        pre.sf-dump .sf-dump-protected {
                                            color: #FFFFFF
                                        }

                                        pre.sf-dump .sf-dump-private {
                                            color: #FFFFFF
                                        }

                                        pre.sf-dump .sf-dump-meta {
                                            color: #B729D9
                                        }

                                        pre.sf-dump .sf-dump-key {
                                            color: #56DB3A
                                        }

                                        pre.sf-dump .sf-dump-index {
                                            color: #1299DA
                                        }

                                        pre.sf-dump .sf-dump-ellipsis {
                                            color: #FF8400
                                        }

                                        pre.sf-dump .sf-dump-ns {
                                            user-select: none;
                                        }

                                        pre.sf-dump .sf-dump-ellipsis-note {
                                            color: #1299DA
                                        }

                                    </style>
                                    <pre class="sf-dump" id="sf-dump-1392059592" data-indent-pad="  "><span class="sf-dump-note">array:2</span> [ <span class="sf-dump-ref sf-dump-toggle" title="[Cmd+click] Expand all children"><span>▼</span></span><samp data-depth="1" class="sf-dump-expanded">
                                        "<span class="sf-dump-key">a</span>" =&gt; <span class="sf-dump-num">1</span>
                                        "<span class="sf-dump-key">b</span>" =&gt; <span class="sf-dump-note">array:1</span> [<span class="sf-dump-ref sf-dump-toggle" title="[Cmd+click] Expand all children"><span>▶</span></span>]
                                      </samp>]
                                      </pre>
                                    <x-tooltip id="link03" position="bottom-0 right-0" direction="left-0 bottom-0">
                                        Inspect objects, queries and more
                                    </x-tooltip>
                                </div>
                                @elseif ($extension === 'js')
                                <div class="ray-item">
                                    <pre class="text-yellow-600">
Object {
    <span class="text-green-600">"logging"</span>: <span class="text-green-600">"an object"</span>,
    <span class="text-green-600">"hello"</span>: <span class="text-black">123</span>,
}
</pre>
                                    <x-tooltip id="link03" position="bottom-0 right-0" direction="left-0 bottom-0">
                                        Inspect objects, queries and more
                                    </x-tooltip>
                                </div>
                                @endif
                            </div>
                            <div class="flex leading-none" title="~/ray-demo-app/app/Console/Commands/{{ $filename ?? 'TestCommand' }}.{{ $extension ?? 'php' }}:15">
                                <div>
                                    <a class="pointer-events-none text-xs text-gray-600 text-opacity-50 hover:text-gray-600 hover:text-opacity-50
                underline" href="#">{{ $filename ?? 'TestCommand' }}.{{ $extension ?? 'php' }}:15</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="
                z-10
                relative group
                grid items-start pl-3.5
                border-b border-gray-400 border-opacity-50
            ray-line-03" style="grid-template-columns: auto auto 1fr;">
                <div class="pointer-events-none
                    relative
                    flex-none flex items-center justify-center
                    w-4 h-4 rounded-full
                    focus:outline-none focus:ring-0
                    transform scale-50
                    bg-green-500  text-white
                " style="top: 1rem;">

                </div>

                <div class="
                    flex items-center space-x-2
                    p-3.5
                    text-sm text-gray-500
                ">
                    <div class="w-16 tabular-nums">10:38:53</div>
                </div>

                <div class="p-3.5" style="transition: max-height 0.2s ease-out 0s; ">
                    <div class="">
                        <div>
                            <div class="relative leading-loose">
                                <div class="ray-item">A green statement</div>
                            </div>
                            <div class="flex leading-none" title="~/ray-demo-app/app/Console/Commands/{{ $filename ?? 'TestCommand' }}.{{ $extension ?? 'php' }}:15">
                                <div>
                                    <a class="pointer-events-none text-xs text-gray-600 text-opacity-50 hover:text-gray-600 hover:text-opacity-50
                underline" href="#">{{ $filename ?? 'TestCommand' }}.{{ $extension ?? 'php' }}:15</a>
                                    <x-tooltip id="link01" position="bottom-0 right-0" direction="left-0 bottom-full">
                                        Jump to your IDE
                                    </x-tooltip>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
