(($) => {
    $(document).ready(() =>{
        $('html').removeClass('no-js').addClass('js');

        isInViewport();

        if($.isFunction($.fn.owlCarousel)){
            $('.owl-carousel').owlCarousel({
                'items' : 1,
                'lazyLoad' : true,
                'autoplay' : true
            });
        };
        $(window).scroll(() => {
            isInViewport()
            toTop();
        })
        //megamenu
        $('#main-nav .menu-item-has-children > a').each(function (index, element) {
            var id = $(this).parent().attr('id') + '-toggle';
            $(this).after('<input type="checkbox" id="' + id + '">' +
                '<label for="'+ id +'" class="menu-toggle">' +
                '<em aria-hidden="true"></em>' +
                '<span class="screen-reader-text">Untermenü öffnen</span>' +
                '</label>');
        });
        $('#main-nav .current-menu-ancestor input[type="checkbox"],#main-nav .current-menu-parent input[type="checkbox"]').attr("checked");

        headerImage();
        //Ajax Tabs
        $("#tabs").tabs();
        
    });

    function toTop(){
        let topButton = $('#to-top');
        let triggerElement = $('#page-header');
        let trigger = (triggerElement.offset().top + triggerElement.outerHeight());
        let topButtonBottom = topButton.offset().top + topButton.outerHeight();
        
        if($(window).scrollTop() > trigger){
            topButton.addClass('show');
        }else {
            topButton.removeClass('show');
        }


    }

    function isInViewport() {
        let animationElement = $('.animate');
        let windowHeight = $(window).height();
        let windowTopPosition = $(window).scrollTop();
        let windowBottomPosition = (windowTopPosition + windowHeight);

        $.each(animationElement, function () {
            let element = $(this);
            let elementHeigth = element.outerHeight();
            let elementTopPosition = element.offset().top;
            let elementBottomPosition = (elementTopPosition + elementHeigth);

            if ((elementBottomPosition >= windowTopPosition) && (elementTopPosition <= windowBottomPosition)) {
                element.addClass('animated');
            }
        });
    }
    function headerImage(){
        $('.header-bg-image').each(function(){ //TODO: weshalb verwenden wir hier eine for Each Schleife
            if ($(document).width() < 768 ){
                $(this).css('background-image', 'url('+ $(this).data('src-sm') +')');
            }else{
                $(this).css('background-image', 'url('+ $(this).data('src-lg') +')');
            }
        })
    }
    $(window).resize(function () {
        headerImage();
        // Funktionsaufruf für Animation (damit bereits sichtware Elemente animiert werden)
        isInViewport();
        // Funktionsaufruf für toTop Button einblenden
        toTop();
        // Funktionsaufruf für Header-Image Src
       
    });
   
})(jQuery);