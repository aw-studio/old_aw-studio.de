@if ($type == 'dark')
<a class="text-lg inline-block bg-white hover:bg-black text-black hover:text-white font-normal py-2 px-8 border-2 border-black rounded-sm cursor-pointer " href="{{ $link }}" target="{{ $target }}" @if($target == '_blank') rel="noreferrer"
@endif>
    {{ $text }}
    </a>
    @endif
    @if ($type == 'light')
    <a class="text-lg inline-block bg-black hover:bg-white text-white hover:text-black font-normal py-2 px-8 border-2 border-white rounded-sm cursor-pointer " href="{{ $link }}" target="{{ $target }}" @if($target == '_blank')
    rel="noreferrer" @endif>
        {{ $text }}
        </a>
        @endif