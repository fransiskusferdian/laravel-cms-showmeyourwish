 $(window).scroll(function () {
     if ($(document).scrollTop() > 300) {
         $('nav').addClass('nav-down');
         $('nav').addClass('bg-light');
         $('nav').addClass('navbar-light');
         $('nav').removeClass('nav-up');
         $('nav').removeClass('bg-dark');
         $('nav').removeClass('navbar-dark');
     } else {
         $('nav').addClass('nav-up');
         $('nav').addClass('bg-dark');
         $('nav').addClass('navbar-dark');
         $('nav').removeClass('nav-down');
         $('nav').removeClass('bg-light');
         $('nav').removeClass('navbar-light');

     }
 });