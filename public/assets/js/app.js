/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/js/app.js":
/*!***********************!*\
  !*** ./src/js/app.js ***!
  \***********************/
/*! no static exports found */
/***/ (function(module, exports) {

//Loader Js
window.addEventListener("load", function () {
  var Loader = document.querySelector(".Loader");
  Loader.classList.add("hidden");
}); //Loader Js
//artwork drop-tab Start Here

$(document).ready(function () {
  $(".btn-drop").click(function () {
    $(".tabs-ul").toggleClass("tab-drop-open");
  });
});
$(document).ready(function () {
  $(".tab-1").click(function () {
    $(".btn-drop .btn-drop-inr").replaceWith('<p class="btn-drop-inr heading-SB">All</p>');
  });
  $(".tab-2").click(function () {
    $(".btn-drop .btn-drop-inr").replaceWith('<p class="btn-drop-inr heading-SB">Photography</p>');
  });
  $(".tab-3").click(function () {
    $(".btn-drop .btn-drop-inr").replaceWith('<p class="btn-drop-inr heading-SB">Video</p>');
  });
  $(".tab-4").click(function () {
    $(".btn-drop .btn-drop-inr").replaceWith('<p class="btn-drop-inr heading-SB">Illustrations</p>');
  });
  $(".tab-5").click(function () {
    $(".btn-drop .btn-drop-inr").replaceWith('<p class="btn-drop-inr heading-SB">Digital Art</p>');
  });
  $(".tab-6").click(function () {
    $(".btn-drop .btn-drop-inr").replaceWith('<p class="btn-drop-inr heading-SB">Domains</p>');
  });
  $(".tab-1, .tab-2, .tab-3, .tab-4, .tab-5, .tab-6").click(function () {
    $(".tabs-ul").removeClass("tab-drop-open");
  });
}); // artwork drop-tab End Here
//Single-Creator drop-tab Start Here

$(document).ready(function () {
  $(".tab-7").click(function () {
    $(".btn-drop .btn-drop-inr").replaceWith('<p class="btn-drop-inr heading-SB">On Sale</p>');
  });
  $(".tab-8").click(function () {
    $(".btn-drop .btn-drop-inr").replaceWith('<p class="btn-drop-inr heading-SB">Following</p>');
  });
  $(".tab-9").click(function () {
    $(".btn-drop .btn-drop-inr").replaceWith('<p class="btn-drop-inr heading-SB">Followers</p>');
  });
  $(".tab-7, .tab-8, .tab-9").click(function () {
    $(".tabs-ul").removeClass("tab-drop-open");
  });
}); //Single-Creator drop-tab Start Here
//Help-Center drop-tab Start Here

$(document).ready(function () {
  $(".tab-10").click(function () {
    $(".btn-drop .btn-drop-inr").replaceWith('<p class="btn-drop-inr heading-SB">Getting Started</p>');
  });
  $(".tab-11").click(function () {
    $(".btn-drop .btn-drop-inr").replaceWith('<p class="btn-drop-inr heading-SB">Artworks & Creator</p>');
  });
  $(".tab-12").click(function () {
    $(".btn-drop .btn-drop-inr").replaceWith('<p class="btn-drop-inr heading-SB">Connect Wallet</p>');
  });
  $(".tab-13").click(function () {
    $(".btn-drop .btn-drop-inr").replaceWith('<p class="btn-drop-inr heading-SB">Create, Sell & Connect</p>');
  });
  $(".tab-14").click(function () {
    $(".btn-drop .btn-drop-inr").replaceWith('<p class="btn-drop-inr heading-SB">Faqs</p>');
  });
  $(".tab-10, .tab-11, .tab-12, .tab-13, .tab-14").click(function () {
    $(".tabs-ul").removeClass("tab-drop-open");
  });
}); //Help-Center drop-tab Start Here
//Help-Center drop-tab Start Here

$(document).ready(function () {
  $(".tab-15").click(function () {
    $(".btn-drop .btn-drop-inr").replaceWith('<p class="btn-drop-inr heading-SB">For Creator</p>');
  });
  $(".tab-16").click(function () {
    $(".btn-drop .btn-drop-inr").replaceWith('<p class="btn-drop-inr heading-SB">For Collector</p>');
  });
  $(".tab-15, .tab-16").click(function () {
    $(".tabs-ul").removeClass("tab-drop-open");
  });
}); //Help-Center drop-tab Start Here

$('[data-countdown]').each(function () {
  var $this = $(this),
      finalDate = $(this).data('countdown');
  $this.countdown(finalDate, function (event) {
    $this.html(event.strftime('%H : %M : %S'));
  });
}); // notification drop start here

$(document).ready(function () {
  $(".icon-notification-otr").click(function () {
    $(".notification-drop").toggleClass("notification-drop-open");
  });
  $(".nav-a").click(function () {
    $(".notification-drop").removeClass("notification-drop-open");
  });
  $(".profile-nav").click(function () {
    $(".notification-drop").removeClass("notification-drop-open");
  });
});
$(document).ready(function () {
  $(".profile-nav").click(function () {
    $(".profile-pop-otr").toggleClass("profile-pop-open");
  });
  $(".nav-a").click(function () {
    $(".profile-pop-otr").removeClass("profile-pop-open");
  });
  $(".notification-main").click(function () {
    $(".profile-pop-otr").removeClass("profile-pop-open");
  });
}); // notification drop end here
//Overlay Navbar Start

$(document).ready(function () {
  $(".burger-icon-otr").click(function () {
    $(".overlay-content").addClass("overlay-open");
    $(".notification-drop").removeClass("notification-drop-open");
    $(".profile-pop-otr").removeClass("profile-pop-open");
  });
  $(".close-icon-otr").click(function () {
    $(".overlay-content").removeClass("overlay-open");
  });
}); //Overlay Navbar Start
// Heart icon start here

$(document).ready(function () {
  $(".heart-icon-otr").click(function () {
    $(".heart-icon").toggleClass("ri-heart-line");
    $(".heart-icon").toggleClass("ri-heart-fill");
  });
}); // Heart icon end here
// cart drop start here

$('.tab-link').click(function () {
  var tabID = $(this).attr('data-tab');
  $(this).addClass('active').siblings().removeClass('active');
  $('#tab-' + tabID).addClass('active').siblings().removeClass('active');
}); // cart drop End here
// Live Auction start here

$('#live-auctions').owlCarousel({
  loop: false,
  margin: 24,
  dots: false,
  autoplay: false,
  nav: true,
  navText: ["<img src='/assets/img/ArrowLeft.svg'>", "<img src='/assets/img/ArrowRight.svg'>"],
  responsive: {
    0: {
      items: 1,
      nav: false,
      dots: true
    },
    600: {
      items: 2
    },
    992: {
      items: 3
    },
    1300: {
      items: 4
    }
  }
}); // Live Auction End here
// Heart icon start here

$(document).ready(function () {
  $(".heart1").click(function () {
    $(".heart-1").toggleClass("ri-heart-line");
    $(".heart-1").toggleClass("ri-heart-fill");
  });
  $(".heart2").click(function () {
    $(".heart-2").toggleClass("ri-heart-line");
    $(".heart-2").toggleClass("ri-heart-fill");
  });
  $(".heart3").click(function () {
    $(".heart-3").toggleClass("ri-heart-line");
    $(".heart-3").toggleClass("ri-heart-fill");
  });
  $(".heart4").click(function () {
    $(".heart-4").toggleClass("ri-heart-line");
    $(".heart-4").toggleClass("ri-heart-fill");
  });
  $(".heart5").click(function () {
    $(".heart-5").toggleClass("ri-heart-line");
    $(".heart-5").toggleClass("ri-heart-fill");
  });
  $(".heart6").click(function () {
    $(".heart-6").toggleClass("ri-heart-line");
    $(".heart-6").toggleClass("ri-heart-fill");
  });
  $(".heart7").click(function () {
    $(".heart-7").toggleClass("ri-heart-line");
    $(".heart-7").toggleClass("ri-heart-fill");
  });
  $(".heart8").click(function () {
    $(".heart-8").toggleClass("ri-heart-line");
    $(".heart-8").toggleClass("ri-heart-fill");
  });
  $(".heart9").click(function () {
    $(".heart-9").toggleClass("ri-heart-line");
    $(".heart-9").toggleClass("ri-heart-fill");
  });
  $(".heart10").click(function () {
    $(".heart-10").toggleClass("ri-heart-line");
    $(".heart-10").toggleClass("ri-heart-fill");
  });
  $(".heart11").click(function () {
    $(".heart-11").toggleClass("ri-heart-line");
    $(".heart-11").toggleClass("ri-heart-fill");
  });
  $(".heart12").click(function () {
    $(".heart-12").toggleClass("ri-heart-line");
    $(".heart-12").toggleClass("ri-heart-fill");
  });
}); // Heart icon end here
// Popular Artwork start here

$('#popular-artwork').owlCarousel({
  loop: false,
  margin: 24,
  dots: false,
  autoplay: false,
  nav: true,
  navText: ["<img src='/assets/img/ArrowLeft.svg'>", "<img src='/assets/img/ArrowRight.svg'>"],
  responsive: {
    0: {
      items: 1,
      nav: false,
      dots: true
    },
    575: {
      items: 1
    },
    768: {
      items: 2
    },
    992: {
      items: 2
    },
    1100: {
      items: 2
    },
    1200: {
      items: 3
    }
  }
}); // Popular Artwork End here
// Select Start Here

$('select').each(function () {
  var $this = $(this),
      numberOfOptions = $(this).children('option').length;
  $this.addClass('select-hidden');
  $this.wrap('<div class="select"></div>');
  $this.after('<div class="select-styled"></div>');
  var $styledSelect = $this.next('div.select-styled');
  $styledSelect.text($this.children('option').eq(0).text());
  var $list = $('<ul />', {
    'class': 'select-options'
  }).insertAfter($styledSelect);

  for (var i = 0; i < numberOfOptions; i++) {
    $('<li />', {
      text: $this.children('option').eq(i).text(),
      rel: $this.children('option').eq(i).val()
    }).appendTo($list);
  }

  var $listItems = $list.children('li');
  $styledSelect.click(function (e) {
    e.stopPropagation();
    $('div.select-styled.active').not(this).each(function () {
      $(this).removeClass('active').next('ul.select-options').hide();
    });
    $(this).toggleClass('active').next('ul.select-options').toggle();
  });
  $listItems.click(function (e) {
    e.stopPropagation();
    $styledSelect.text($(this).text()).removeClass('active');
    $this.val($(this).attr('rel'));
    $list.hide(); //console.log($this.val());
  });
  $(document).click(function () {
    $styledSelect.removeClass('active');
    $list.hide();
  });
}); // Select End Here
//single artwork countdown Start Here

$('#clock').countdown('2021/10/10', function (event) {
  $('#days').html(event.strftime('%D'));
  $('#hours').html(event.strftime('%H'));
  $('#minutes').html(event.strftime('%M'));
  $('#seconds').html(event.strftime('%S'));
}); //single artwork countdown End Here
//Share Pop countdown Start Here

$(document).ready(function () {
  $(".icon-share-otr").click(function () {
    $(".share-pop").toggleClass("share-pop-open");
  });
}); //Share Pop countdown End Here
//Filter Start Here

$(document).ready(function () {
  $(".btn-1").click(function () {
    $(".filter-1").toggleClass("filter-active");
  });
  $(".btn-2").click(function () {
    $(".filter-2").toggleClass("filter-active");
  });
  $(".btn-3").click(function () {
    $(".filter-3").toggleClass("filter-active");
  });
  $(".btn-4").click(function () {
    $(".filter-4").toggleClass("filter-active");
  });
  $(".btn-5").click(function () {
    $(".filter-5").toggleClass("filter-active");
  });
  $(".btn-6").click(function () {
    $(".filter-6").toggleClass("filter-active");
  });
  $(".btn-7").click(function () {
    $(".filter-7").toggleClass("filter-active");
  });
  $(".btn-8").click(function () {
    $(".filter-8").toggleClass("filter-active");
  });
  $(".btn-9").click(function () {
    $(".filter-9").toggleClass("filter-active");
  });
  $(".clear-filter").click(function () {
    $(".button").removeClass("filter-active");
  });
}); //Filter End Here
//border Start Here

$(document).ready(function () {
  $(".boxx-2").click(function () {
    $(".boxx-2").toggleClass("active-border");
    $(".boxx-3").removeClass("active-border");
    $(".boxx-4").removeClass("active-border");
  });
  $(".boxx-3").click(function () {
    $(".boxx-3").toggleClass("active-border");
    $(".boxx-2").removeClass("active-border");
    $(".boxx-4").removeClass("active-border");
  });
  $(".boxx-4").click(function () {
    $(".boxx-4").toggleClass("active-border");
    $(".boxx-3").removeClass("active-border");
    $(".boxx-2").removeClass("active-border");
  });
}); //border End Here
//Create page Start Here

$(document).ready(function () {
  $(".togle4").click(function () {
    $(this).toggleClass("togle-open");
    $(".togle5").removeClass("togle-open");
    $(".togle6").removeClass("togle-open");
  });
  $(".togle5").click(function () {
    $(this).toggleClass("togle-open");
    $(".togle4").removeClass("togle-open");
    $(".togle6").removeClass("togle-open");
  });
  $(".togle6").click(function () {
    $(this).toggleClass("togle-open");
    $(".togle5").removeClass("togle-open");
    $(".togle4").removeClass("togle-open");
  });
}); //Create page End Here

/***/ }),

/***/ "./src/scss/app.scss":
/*!***************************!*\
  !*** ./src/scss/app.scss ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************!*\
  !*** multi ./src/js/app.js ./src/scss/app.scss ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! F:\Ethernal\src\js\app.js */"./src/js/app.js");
module.exports = __webpack_require__(/*! F:\Ethernal\src\scss\app.scss */"./src/scss/app.scss");


/***/ })

/******/ });
//# sourceMappingURL=app.js.map