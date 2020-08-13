@if(!strstr(strtolower($_SERVER['HTTP_USER_AGENT']), "googlebot") && !strstr(strtolower($_SERVER['HTTP_USER_AGENT']), "lighthouse"))

<div class="aw-cookieconsent__bg"></div>

<div class="aw-cookieconsent">
    <div class="aw-cookieconsent__headline">
        {{ __('cookieconsent.headline') }}
    </div>
    <div class="aw-cookieconsent__text">
        {!! __('cookieconsent.text',['datapolicy_url' => __route('datapolicy')]) !!}
    </div>
    <div class="aw-cookieconsent__buttons">
        <button class="aw-cookieconsent__no">{{ __('cookieconsent.no') }}</button>
        <button class="aw-cookieconsent__yes">{{ __('cookieconsent.yes') }}</button>
    </div>
</div>

<script type="text/javascript">
    let body = document.querySelector('body');
    let button_yes = document.querySelector('button.aw-cookieconsent__yes');
    let button_no = document.querySelector('button.aw-cookieconsent__no');

    if (localStorage.getItem("aw-cookies")) {
        body.classList.add('aw-cookies-ok');
    }

    button_yes.onclick = function() {
        localStorage.setItem("aw-cookies", 'ok');
        location.reload();
    }

    button_no.onclick = function() {
        localStorage.setItem("aw-cookies", 'nope');
        location.reload();
    }
</script>

<style media="screen">
    .aw-datapolicy-page .aw-cookieconsent,
    .aw-datapolicy-page .aw-cookieconsent__bg,
    .aw-cookies-ok .aw-cookieconsent,
    .aw-cookies-ok .aw-cookieconsent__bg {
        display: none
    }

    .aw-cookieconsent__bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.9);
        z-index: 1000000;
    }

    .aw-cookieconsent {
        background: white;
        position: fixed;
        top: 50%;
        left: 50%;
        z-index: 1000001;
        padding: 40px;
        transform: translate(-50%, -70%);
    }

    @media(max-width: 640px) {
        .aw-cookieconsent {
            padding: 20px;
            width: 80vw;
            transform: translate(-50%, -60%);
        }
    }

    .aw-cookieconsent__headline {
        font-size: 28px;
        line-height: 34px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .aw-cookieconsent__text {
        font-size: 16px;
        line-height: 22px;
        font-weight: 400;
        margin-bottom: 20px;
    }

    .aw-cookieconsent__text a {
        border-bottom: 1px solid rgba(22, 22, 22, 0.25);
        padding-bottom: 4px;
    }

    .aw-cookieconsent__text a:hover {
        border-bottom: 1px solid rgba(22, 22, 22, 1);
    }

    .aw-cookieconsent__buttons {
        display: flex;
        justify-content: flex-end;
        padding-top: 20px;
    }

    .aw-cookieconsent button.aw-cookieconsent__yes {
        background: #161616;
        color: white;
        height: 40px;
        line-height: 40px;
        padding: 0 20px 0 20px;
        margin-left: 20px;
    }

    .aw-cookieconsent button.aw-cookieconsent__no {
        color: #161616;
        border-bottom: 1px solid rgba(22, 22, 22, 0.25);
        padding-bottom: 0px;
    }

    .aw-cookieconsent button.aw-cookieconsent__no:hover {
        border-bottom: 1px solid rgba(22, 22, 22, 1);
    }
</style>

@endif