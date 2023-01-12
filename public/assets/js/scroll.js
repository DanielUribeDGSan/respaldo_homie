var scroll = new SmoothScroll('a[href*="#"]', {

    // Selectors
    ignore: '[data-scroll-ignore]', // Selector for links to ignore (must be a valid CSS selector)
    header: null, // Selector for fixed headers (must be a valid CSS selector)
    topOnEmptyHash: true, // Scroll to the top of the page for links with href="#"

    // Speed & Duration
    speed: 1000, // Integer. Amount of time in milliseconds it should take to scroll 1000px
    speedAsDuration: false, // If true, use speed as the total duration of the scroll animation
    durationMax: null, // Integer. The maximum amount of time the scroll animation should take
    durationMin: null, // Integer. The minimum amount of time the scroll animation should take
    clip: true, // If true, adjust scroll distance to prevent abrupt stops near the bottom of 
    // Easing
    easing: 'easeInOutCubic', // Easing pattern to use
    customEasing: function (time) {

        // Function. Custom easing pattern
        // If this is set to anything other than null, will override the easing option above

        // return <your formulate with time as a multiplier>

        // Example: easeInOut Quad
        return time < 0.5 ? 2 * time * time : -1 + (4 - 2 * time) * time;

    },

    // History
    updateURL: true, // Update the URL on scroll
    popstate: true, // Animate scrolling with the forward/backward browser buttons (requires updateURL to be true)

    // Custom Events
    emitEvents: true // Emit custom events

});