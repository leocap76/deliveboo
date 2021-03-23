window.addEventListener('load', function() {
    let loading_screen = document.getElementById("loading_screen");
    loading_screen.classList.add("fadeout_loading");
    // document.body.removeChild(loading_screen);

    function myFunction(x) {
        if (x.matches) { // If media query matches
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 1,
                spaceBetween: 30,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: true,
                },
            });

        } else {
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 4,
                spaceBetween: 30,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: true,
                },
            });
        }
      }
      
      var x = window.matchMedia("(max-width: 767px)")
      myFunction(x) // Call listener function at run time
      x.addListener(myFunction) // Attach listener function on state changes
    
    
});
