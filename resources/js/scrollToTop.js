import $ from 'jquery'

$(document).ready(function () {
    // Показываем кнопку при прокрутке
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) { // Показывать после прокрутки 300px
            $('#scrollToTop').fadeIn();
        } else {
            $('#scrollToTop').fadeOut();
        }
    });

    // Плавная прокрутка наверх
    $('#scrollToTop button').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 600); // 600 миллисекунд для плавности
        return false;
    });
});

