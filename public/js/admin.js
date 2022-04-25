/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
$('input:file').on('change', function (e) {
  $('.name_image').text('Image selectionnée : ' + e.target.files[0].name);
});
$('.add_titre').on('click', function () {
  var input = document.createElement('input');
  input.name = "titre";
  input.id = "titre";
  input.placeholder = "Titre";
  input.style.marginBottom = "10px";
  $('.titres').append(input);
});
/******/ })()
;