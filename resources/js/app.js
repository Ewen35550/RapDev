require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$('.btn_nav').on('click', function () {
    $('.menu_slide').toggleClass('active');
    $('.menu_profil').removeClass('active');
});

$('.btn_profil').on('click', function () {
    $('.menu_profil').toggleClass('active');
    $('.menu_slide').removeClass('active');
});

$(document).on('mouseup', function (e) {
    if (e.target.id !== "btnNav") $('.menu_slide').removeClass('active');
    if (e.target.id !== "image_user") $('.menu_profil').removeClass('active');
});