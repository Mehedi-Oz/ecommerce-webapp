<!-- Core Frameworks -->
<script src="{{ asset('/') }}website/js/jquery.js"></script>
<script src="{{ asset('/') }}website/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="{{ asset('/') }}website/js/tiny-slider.js"></script>
<script src="{{ asset('/') }}website/js/glightbox.min.js"></script>
<script src="{{ asset('/') }}website/js/xzoom.min.js"></script>

<!-- Theme and Custom Scripts -->
<script src="{{ asset('/') }}website/js/main.js"></script>
<script src="{{ asset('/') }}website/js/setup.js"></script>

<!-- Hero Slider Initialization -->
<script type="text/javascript">
    tns({
        container: '.hero-slider',
        slideBy: 'page',
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 0,
        items: 1,
        nav: false,
        controls: true,
        controlsText: [
            '<i class="lni lni-chevron-left"></i>',
            '<i class="lni lni-chevron-right"></i>'
        ],
    });
</script>

<!-- Brand Slider Initialization -->
<script type="text/javascript">
    tns({
        container: '.brands-logo-carousel',
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 15,
        nav: false,
        controls: false,
        responsive: {
            0: {
                items: 1
            },
            540: {
                items: 3
            },
            768: {
                items: 5
            },
            992: {
                items: 6
            },
        },
    });
</script>

<!-- Countdown Timer -->
<script>
    const finaleDate = new Date("February 15, 2023 00:00:00").getTime();

    const timer = () => {
        const now = new Date().getTime();
        let diff = finaleDate - now;

        if (diff < 0) {
            document.querySelector('.alert').style.display = 'block';
            document.querySelector('.container').style.display = 'none';
        }

        let days = Math.floor(diff / (1000 * 60 * 60 * 24));
        let hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((diff % (1000 * 60)) / 1000);

        days = days <= 99 ? `0${days}` : days;
        days = days <= 9 ? `00${days}` : days;
        hours = hours <= 9 ? `0${hours}` : hours;
        minutes = minutes <= 9 ? `0${minutes}` : minutes;
        seconds = seconds <= 9 ? `0${seconds}` : seconds;

        document.querySelector('#days').textContent = days;
        document.querySelector('#hours').textContent = hours;
        document.querySelector('#minutes').textContent = minutes;
        document.querySelector('#seconds').textContent = seconds;
    };

    timer();
    setInterval(timer, 1000);
</script>

<!-- Auto-Dismiss Success Alert -->
<script>
    setTimeout(() => {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.add('fade');
            setTimeout(() => alert.remove(), 500);
        }
    }, 2000);
</script>
