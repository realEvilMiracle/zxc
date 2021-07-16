//menu
$('.header_burger').click(function(event) {
  $('.header_burger, .header_menu').toggleClass('active');
  $('body').toggleClass('lock');
});

//slider
new Swiper('.image-slider', {
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  autoplay: {
    delay: 5000,
    stopOnLastSlide: false,
    disableOnInteraction: false,
  },
  loop: true,
  speed: 800,
});

//catalog
let menuParents = document.querySelectorAll('.menu-page__parent');

for (let index = 0; index < menuParents.length; index++) {
  const menuParent = menuParents[index];
  menuParent.addEventListener("mouseenter", function(e) {
    menuParent.classList.add('_active');
  });
menuParent.addEventListener("mouseleave", function(e) {
  menuParent.classList.remove('_active');
  });
}

//excursion questions
let questions = document.querySelectorAll('.question-page__item');

for(var i = 0; i < questions.length; i++){
    questions[i].addEventListener('click', selectDate);
}

function selectDate(){
    if(this.classList.contains('_open')){
        this.classList.remove('_open');
    }
    else {
        this.classList.add('_open');
    }
}
