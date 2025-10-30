<!-- Bootstrap JavaScript -->
<script src="{{ asset('/') }}website/js/bootstrap.min.js"></script>

<!-- Tiny Slider JavaScript (for carousels/sliders) -->
<script src="{{ asset('/') }}website/js/tiny-slider.js"></script>

<!-- GLightbox JavaScript (for lightbox functionality) -->
<script src="{{ asset('/') }}website/js/glightbox.min.js"></script>

<!-- Main Theme JavaScript -->
<script src="{{ asset('/') }}website/js/main.js"></script>

<script type="text/javascript">
    //========= Hero Slider Initialization
    tns({
        container: '.hero-slider', // Target the hero slider container
        slideBy: 'page', // Slide one page at a time
        autoplay: true, // Enable autoplay
        autoplayButtonOutput: false, // Hide autoplay button
        mouseDrag: true, // Enable mouse drag
        gutter: 0, // No space between slides
        items: 1, // Show one item at a time
        nav: false, // Disable navigation dots
        controls: true, // Enable navigation arrows
        controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'], // Custom arrow icons
    });

    //======== Brand Slider Initialization
    tns({
        container: '.brands-logo-carousel', // Target the brand slider container
        autoplay: true, // Enable autoplay
        autoplayButtonOutput: false, // Hide autoplay button
        mouseDrag: true, // Enable mouse drag
        gutter: 15, // Space between slides
        nav: false, // Disable navigation dots
        controls: false, // Disable navigation arrows
        responsive: { // Responsive breakpoints
            0: { items: 1 }, // 1 item for small screens
            540: { items: 3 }, // 3 items for medium screens
            768: { items: 5 }, // 5 items for tablets
            992: { items: 6 }, // 6 items for desktops
        }
    });
</script>

<script>
    // Countdown Timer
    const finaleDate = new Date("February 15, 2023 00:00:00").getTime(); // Set the target date

    const timer = () => {
        const now = new Date().getTime(); // Get the current time
        let diff = finaleDate - now; // Calculate the difference

        if (diff < 0) { // If the countdown is over
            document.querySelector('.alert').style.display = 'block'; // Show alert
            document.querySelector('.container').style.display = 'none'; // Hide container
        }

        // Calculate days, hours, minutes, and seconds
        let days = Math.floor(diff / (1000 * 60 * 60 * 24));
        let hours = Math.floor(diff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
        let minutes = Math.floor(diff % (1000 * 60 * 60) / (1000 * 60));
        let seconds = Math.floor(diff % (1000 * 60) / 1000);

        // Format numbers to always have two digits
        days <= 99 ? days = `0${days}` : days;
        days <= 9 ? days = `00${days}` : days;
        hours <= 9 ? hours = `0${hours}` : hours;
        minutes <= 9 ? minutes = `0${minutes}` : minutes;
        seconds <= 9 ? seconds = `0${seconds}` : seconds;

        // Update the countdown display
        document.querySelector('#days').textContent = days;
        document.querySelector('#hours').textContent = hours;
        document.querySelector('#minutes').textContent = minutes;
        document.querySelector('#seconds').textContent = seconds;
    }

    timer(); // Initialize the timer
    setInterval(timer, 1000); // Update the timer every second
</script>

<!-- Auto-dismiss success alert script -->
<script>
    // This script handles the auto-dismiss functionality for success alerts.
    // The alert will fade out after 5 seconds and then be removed from the DOM.
    setTimeout(() => {
        const alert = document.querySelector('.alert'); // Select the alert element
        if (alert) {
            alert.classList.add('fade'); // Add fade-out animation
            setTimeout(() => alert.remove(), 500); // Remove the alert element after fading out
        }
    }, 2000); // 2000ms = 2 seconds
</script>
