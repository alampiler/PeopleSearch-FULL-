$(document).ready(function () {

    $('.slider').slick({
        slidesToShow: 6,
        dots: false,
        slidesToScroll: 6,
        autoplay: true,
        autoplaySpeed: 2000,
        centerMode: true,
        responsive: [
            {
                breakpoint: 1028,
                settings: {
                    centerPadding: '20px',
                    slidesToShow: 6,
                    slidesToScroll: 6
                }
            },

            {
                breakpoint: 830,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    centerPadding: '10px'
                }
            },

            {
                breakpoint: 670,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    centerPadding: '1px'
                }
            },

            {
                breakpoint: 520,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    centerPadding: '1px'
                }
            },

            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerPadding: '1px'
                }
            }
        ]
    });

    $('.is-accordion-submenu-parent a span').click(function(){
        var href = $(this).parent().attr('href');
        console.log(href);
        document.location.href = href;

    });

    $(window).scroll(function () {
        if($(this).scrollTop() > 1400){
            $('.scrollUp').fadeIn().css('display', 'block');
        }
        else{
            $('.scrollUp').fadeOut();
        }
    });

    $('.scrollUp').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 600);
    });

    $('.admin_menu > .admin_people').click(function () {
        $('.admin_menu > button').removeClass('active');
        $(this).addClass('active');
        $('.admin_content > div').removeClass('active');
        $('.admin_people_content').addClass('active')
    });

    $('.admin_menu > .admin_material').click(function () {
        $('.admin_menu > button').removeClass('active');
        $(this).addClass('active');
        $('.admin_content > div').removeClass('active');
        $('.admin_material_content').addClass('active')
    });

      $(function(){
    $('.pagination li a').click(function(){
      $(this).parent().addClass('active').siblings().removeClass('active');
    });
    $('.pagination li a').click(function(){
      $(this).parent().addClass('active').siblings().removeClass('active');
    })
  });

    /*
    Create by: http://www.magisters.org/
    Source link:   https://gist.github.com/magisters-org/ccefcc9ca82e6361d75f2b2e50b42a1e
    */

    function getUrlParameter(url, parameter) {
        parameter = parameter.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?|&]' + parameter.toLowerCase() + '=([^&#]*)');
        var results = regex.exec('?' + url.toLowerCase().split('?')[1]);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

    function setUrlParameter(url, key, value) {

        var baseUrl = url.split('?')[0],
            urlQueryString = '?' + url.split('?')[1],
            newParam = key + '=' + value,
            params = '?' + newParam;

        // If the "search" string exists, then build params from it
        if (urlQueryString) {
            var updateRegex = new RegExp('([\?&])' + key + '[^&]*');
            var removeRegex = new RegExp('([\?&])' + key + '=[^&;]+[&;]?');

            if (typeof value === 'undefined' || value === null || value === '') { // Remove param if value is empty
                params = urlQueryString.replace(removeRegex, "$1");
                params = params.replace(/[&;]$/, "");

            } else if (urlQueryString.match(updateRegex) !== null) { // If param exists already, update it
                params = urlQueryString.replace(updateRegex, "$1" + newParam);

            } else { // Otherwise, add it to end of query string
                params = urlQueryString + '&' + newParam;
            }
        }

        // no parameter was set so we don't need the question mark
        params = params === '?' ? '' : params;

        return baseUrl + params;
    }

  

});


