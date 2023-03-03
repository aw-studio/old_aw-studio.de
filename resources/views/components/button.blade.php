<a 
class="
group/button
inline-block text-base font-normal border-2 rounded-md cursor-pointer hover:drop-shadow-2xl transition duration-300
hover:scale-[1.025] 
@if ($type == 'dark')
 text-white bg-black border-black hover:bg-black hover:text-white
@endif
@if ($type == 'light')
 text-black bg-white border-white hover:bg-white hover:text-black
@endif
"
href="{{ $link }}" 
target="{{ $target }}" 
@if($target == '_blank') 
    rel="noreferrer"
@endif
>
<span class="flex items-stretch">
    <span class="inline-block px-4 py-2">
        {{ $text }}
    </span>
    <span class="flex items-center px-3 py-2
    @if ($type == 'dark')
    bg-black
    @endif
    @if ($type == 'light')
    bg-white
    @endif
    ">
        <svg 
        class="
        @if ($type == 'dark')
        stroke-white
        @endif
        @if ($type == 'light')
        stroke-black
        @endif
        animate-point
        group-hover/button:animate-point-fast
        "
        width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.5 7H15M15 7L8.625 1M15 7L8.625 13" stroke-width="2" stroke-linecap="round"/>
        </svg>
    </span>
</span>

</a>
