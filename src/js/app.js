jQuery(function () {

    // Scrolling anchors
    // Function to smoothly scroll to the target element
    function smoothScrollTo(targetElement) {
        targetElement.scrollIntoView({ behavior: 'smooth' });
    }

// Event listener for the navigation links
    document.addEventListener('DOMContentLoaded', function () {
        // Get all the .nav-link elements inside .js-scrollable-anchor
        const navLinks = document.querySelectorAll('.js-scrollable-anchor > a.nav-link');

        // Attach click event listeners to each navigation link
        navLinks.forEach((navLink) => {
            navLink.addEventListener('click', function (event) {
                // Prevent the default action (jumping to the target)
                event.preventDefault();

                // Get the target element
                const targetID = navLink.getAttribute('href');
                const targetElement = document.querySelector(targetID);

                // Scroll to the target element
                if (targetElement) {
                    smoothScrollTo(targetElement);
                }
            });
        });
    });

    // Sponsor slider
    jQuery('.supporters-slider').owlCarousel({
        loop: true,
        margin: 24,
        nav: true,
        autoplaySpeed: 1500,
        autoplayTimeout: 9000,
        autoplay: true,
        items: 1,
        navText: ["<i class='support--arrows svg-support-left-arrow'></i>", "<i class='support--arrows svg-support-right-arrow'></i>"],
        responsive: {
            450: {
                items: 2,
            },
            992: {
                items: 4,
            }
        }
    });

    // rating-slider
    jQuery('#rating-slider').owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        nav: true,
        autoplaySpeed: 1500,
        autoplayTimeout: 9000,
        autoplay: true,
        items: 1,
        navText: ["<i class='support--arrows svg-support-left-arrow'></i>", "<i class='support--arrows svg-support-right-arrow'></i>"],
        responsive: {
            992: {
                items: 2,
            }
        }
    });

    // Lightbox gallery
    jQuery('.js-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    // ie11 object-fit fallback
    if (!Modernizr.objectfit || !Modernizr.smil) {
        $('.js-img-obj-fit__container').each(function () {
            var $container = $(this),
                imgUrl = $container.find('img').prop('src');
            if (imgUrl) {
                $container
                    .css('backgroundImage', 'url(' + imgUrl + ')')
                    .addClass('compat-object-fit');
            }
        });
    }

    // Auto target _blank external links
    // targetBlankExternalLinks();

    // Remove WP Block element iframe classes
    if (jQuery('.wp-block-embed-youtube').length) {
        jQuery('.wp-block-embed-youtube').removeClass().addClass('embed-responsive-item');
    }

    // Scrolling anchors
    jQuery('.scrollable-anchor').on('click', function (e) {
        e.preventDefault();

        jQuery('html,body').animate({
            scrollTop: jQuery(this.hash).offset().top
        }, 1000);
    });
});

var trackEvent = function (name, options) {
    trackGA(name, options);
    trackPixel(name, options);
};

var trackGA = function (name, options) {
    if (typeof gtag !== 'undefined') {
        gtag('event', name, {
            'event_category': options.category,
            'event_label': options.label,
            'value': options.value || 0
        });
    }
};

var trackPixel = function (name, options) {
    if (typeof gtag !== 'undefined') {
        fbq('track', 'Lead', {
            'event_category': options.category,
            'event_action': name,
            'value': options.value || 0,
            'currency': 'CAD'
        });
    }
};

var targetBlankExternalLinks = function () {
    var internalLinkRegex = new RegExp('^((((http:\\/\\/|https:\\/\\/)(www\\.)?)?'
        + window.location.hostname
        + ')|(localhost:\\d{4})|(\\/.*))(\\/.*)?$', '');

    jQuery('a').filter(function () {
            var href = jQuery(this).attr('href');
            return !internalLinkRegex.test(href);
        })
        .each(function () {
            jQuery(this).attr('target', '_blank');
        });
};


//event to user to modal
document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const modalId = urlParams.get("id");

    if (modalId) {
        const targetModal = document.getElementById(modalId);
        if (targetModal) {
            const modalInstance = new bootstrap.Modal(targetModal);
            modalInstance.show();
        }
    }
});