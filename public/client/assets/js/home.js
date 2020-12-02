// function show hide icon search 
function show() {
    var x = document.getElementById("show-content");

    var icon = document.getElementById('hide-icon');
    
    if (x.style.display === "none") {
      x.style.display = "block";
    icon.setAttribute('class','fa fa-window-close');
     
    } else {
      x.style.display = "none";
    icon.setAttribute('class','fa fa-search');

    }
  }

  // function tabs course
  function showCourse1()
  {
    document.querySelector("#show-content1").style.display = "block";
    document.querySelector("#show-content2").style.display = "none";
  }
  function showCourse2()
  {
    document.querySelector("#show-content1").style.display = "none";
    document.querySelector("#show-content2").style.display = "block";
  }


  // slider mentor
  var swiper = new Swiper('.swiper-container', {
    pagination: {
      el: '.swiper-pagination',
      type: 'fraction',
    },
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    breakpoints: {
      '1900': {
        slidesPerView: 5,
        spaceBetween: 15,
      },
      '1400': {
        slidesPerView: 4,
        spaceBetween: 15,
      },
      '1200': {
        slidesPerView: 4,
        spaceBetween: 15,
      },
      '1024': {
        slidesPerView: 3,
        spaceBetween: 15,
      },
      '991': {
        slidesPerView: 3,
        spaceBetween: 15,
      },
      '768': {
        slidesPerView: 2,
        spaceBetween: 15,
      },
  
      '700': {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      '600': {
        slidesPerView: 1,
        spaceBetween: 0,
      },
      '500': {
        slidesPerView: 1,
        spaceBetween: 0,
      },
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
  
  // show hide password
  function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  // show hide nav reponsive
  function openNav() {
    document.getElementById("show_nav").style.display = "block";
  }
  function closeNav() {
    document.getElementById("show_nav").style.display = "none";
  }

  // show hide search reponsive
  function showSearch()
  {
    document.getElementById("showSearch_box").style.display = "block";
    document.getElementById("icon_show").style.display = "none";
    document.querySelector(".tab-menu").style.display = "none";
    document.querySelector(".reponsive-logo").style.display = "none";
    document.querySelector(".search-reponsive").style.width = "100%";
  }

  function hideSearch_box()
  {
    document.getElementById("showSearch_box").style.display = "none";
    document.getElementById("icon_show").style.display = "block";
    document.querySelector(".tab-menu").style.display = "block";
    document.querySelector(".reponsive-logo").style.display = "block";
    document.querySelector(".search-reponsive").style.width = "0%";
  }

  // show hide password
  function showPassword1()
  {
    var x = document.getElementById("password1");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  function showPassword2()
  {
    var x = document.getElementById("password2");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }



  
 

