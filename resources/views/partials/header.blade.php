<div class="container flex justify-between items-center">
    <span class="flex items-center">
        <a href="{{__route('home')}}">
            <b class="mr-2">//* Alle Wetter</b> <span class="hidden sm:inline-block">{{ __('app.claim') }}</span>
        </a>
    </span>

    <div class="flex gap-2 sm:gap-10 items-center">
        <x-job-offer-hint />
        <button aria-label="Navigation" class="aw-burger">
            <span></span>
            <span></span>
        </button>
    </div>
    

</div>

<x-script>
    let button = document.querySelector('button.aw-burger');
    
    function updateBurger() {
        if (button.classList.contains('rotation')) {
            setTimeout(() => {
                button.classList.remove('rotation');
            }, 200);
            setTimeout(() => {
                button.classList.remove('overlap');
            }, 500);
        } else {
            setTimeout(() => {
                button.classList.add('overlap');
            }, 200);
            setTimeout(() => {
                button.classList.add('rotation');
            }, 500);
        }
    }

    button.addEventListener('click', function() {
        let body = document.querySelector('body');
        body.classList.toggle('aw-nav-open');
        body.classList.add('aw-nav-animating');
        setTimeout(() => {
            body.classList.remove('aw-nav-animating');
        }, 700);
        updateBurger();
    })
</x-script>

<x-style>
    button {
        width: 40px;
        height: 40px;
        position: relative;
        right: -5px;
        transition: all 0.3s;
    }
    button:focus {
        outline: none;
    }
    button:active {
        transform: scale(0.75);
    }
    button:active span {
        height: 3px;
    }
    button span {
        position: absolute;
        width: 30px;
        height: 2px;
        background: white;
        border-radius: 1px;
        transition: all 0.3s;
        left: 5px;
    }
    button span:first-child {
        top: 15px;
    }
    button span:last-child {
        top: 25px;
    }
    button.overlap span:first-child {
        top: 20px;
    }
    button.overlap span:last-child {
        top: 20px;
    }
    button.rotation span:first-child {
        transform: rotate(45deg);
    }
    button.rotation span:last-child {
        transform: rotate(-45deg);
    }
    
    #app.aw-home button span {
        background: #161616;
    }

    .aw-nav-open #app.aw-home button span {
        background: #fff;
    }
    
    #app.aw-home.aw--scrolled button span,
    body.a-nav-open #app.aw-home button span {
        background: white;
    }
</x-style>