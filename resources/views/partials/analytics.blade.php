<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-77559383-4"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-77559383-4', {
        'anonymize_ip': true
    });

    var gaProperty = 'UA-77559383-4';

    var disableStr = 'ga-disable-' + gaProperty;
    if (document.cookie.indexOf(disableStr + '=true') > -1) {
        window[disableStr] = true;
    }
    if (!localStorage.getItem("aw-cookies") || localStorage.getItem("aw-cookies") == 'nope') {
        window[disableStr] = true;
    }

    function gaOptout() {
        console.log('Analytics deaktiviert');
        document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
        window[disableStr] = true;
    }
</script>