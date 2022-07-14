import '../../../node_modules/@fortawesome/fontawesome-free/js/all.js';
import 'owl.carousel/dist/assets/owl.carousel.css';

require('./bootstrap');
require('./close');
require('./hamburger');
require('./images');

$('.owl-carousel').owlCarousel({
    loop  : true,
    nav: true,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});

$('.carousel-item').first().addClass('active');
$('.carousel-indicators > li').first().addClass('active');
$('#carousel').carousel();

$.typeahead({
    input: ".js-typeahead",
    order: "asc",
    source: {
        groupName: {
            // Ajax Request
            ajax: {
                // url: "..."
            }
        }
    },
    callback: {
        // onClickBefore: function () { ... }
    }
});

