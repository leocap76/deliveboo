window.addEventListener('load', function() {
    let loading_screen = document.getElementById("loading_screen");
    loading_screen.classList.add("fadeout_loading");
    // document.body.removeChild(loading_screen);
    
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 4,
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: true,
        },
    });
});
