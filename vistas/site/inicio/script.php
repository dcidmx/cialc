<!-- Banner Motivacional -->
<script>
var swiper = new Swiper('.swiper-container0', {
    effect: 'fade',
    spaceBetween: 30,
    autoplay: 10000
});
/*ACTIVIDADES Y CONVOCATORIAS*/
var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    spaceBetween: 30,
    effect: 'fade',
    paginationClickable: true,
    autoplay: 5000,
    paginationBulletRender: function (swiper, index, className) {
           return '<span class="' + className + '"></span>';
    }
});
/*Noticias del cialc section 1*/
var swiper = new Swiper('.events_container', {
       pagination: '.swiper-pagination',
       parallax: true,
       paginationClickable: true,
       paginationBulletRender: function (swiper, index, className) {
              return '<span class="' + className + '"></span>';
       }
});
/*Novedades editoriales*/
var swiper = new Swiper('.events2_container', {
       pagination: '.swiper-pagination',
       paginationClickable: true,
       effect: 'fade',
       autoplay: 9000,
       paginationBulletRender: function (swiper, index, className) {
              //return '<span class="' + className + '">' + (index + 1) + '</span>';
              return '<span class="' + className + '"></span>';
       }
});

/*Periodicos*/
var swiper = new Swiper('.newpaper_container', {
    slidesPerView: 1,
    effect: 'fade',
    autoplay: 7000
});

// execute above function
initPhotoSwipeFromDOM('.masio1');
initPhotoSwipeFromDOM('.masio2');
initPhotoSwipeFromDOM('.masio3');
</script>
