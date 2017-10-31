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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(2);


/***/ }),
/* 1 */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#2, #3, #4').addClass('articuloOculto');

  $('#e').addClass('selected');

  $(".fondoImg").each(function () {
    var src = $(this).attr("data-img");
    $(this).css({
      background: 'url(' + src + ') no-repeat'
    });
  });

  $('#burguer').on('click', function () {
    $('#nav').toggleClass('abrirNav');
  });

  $('#botonesDesktop').hide();

  if (window.innerWidth > 1023) {
    $('#sButton').on('click', function () {
      $('#searcher').addClass('mostarSearch');
      $('#sButton').addClass('ocultarSearch');
    });

    $(document).keyup(function (e) {
      if (e.keyCode == 27) {
        $('#sButton').removeClass('ocultarSearch');
        $('#searcher').removeClass('mostarSearch');
        $('#contact').fadeOut('fast');
      }
    });
  }

  if (window.innerWidth > 767) {
    $('#botonesMobile').hide();
    $('#botonesDesktop').show();
  }

  $(window).bind('scroll', function () {
    var navHeight = 100; // custom nav height
    $(window).scrollTop() > navHeight ? $('#redes').fadeIn('slow') : $('#redes').fadeOut('fast');
  });

  $(document).keyup(function (e) {
    if (e.keyCode == 27) {
      $('#home').css('height', '100vh');
      $('.carousel-inner').css('height', '100vh');
    }
  });

  $('#carousel-generic').on('click', function () {
    $('#home').css('height', '100vh');
    $('.carousel-inner').css('height', '100vh');
  });

  $('#subMenuItem').mouseover(function () {
    $('#subMenu').addClass('mostrarNav');
  });

  $('#subMenu').mouseleave(function () {
    $(this).removeClass('mostrarNav');
  });

  $('.bxslider').bxSlider({
    // minSlides: 3,
    maxSlides: 186,
    slideWidth: 150,
    slideMargin: 8,
    auto: true,
    controls: false,
    pager: false,
    autoHover: true,
    speed: 1500,
    // autoDelay: 3500,
    randomStart: true
  });

  var item = $('.itemCategoria');

  item.each(function () {
    $(this).hover(function () {
      $(this).toggleClass('fondoItem');
      if ($(this).hasClass('soon')) {
        $(this).removeClass('fondoItem');
      }
    });
  });

  $('input').focus(function () {
    var campo = $('input');
    for (var i = 0; i < campo.length; i++) {
      $(this).css('border-bottom', '2px solid white');
    }
  });

  $('#name').blur(function () {
    var name = $('#name').val();
    var error = $('#nameError');
    if (name === "" && name !== " ") {
      error.empty();
      error.append("Nombre requerido");
      $(this).css('border-bottom', '2px solid #ED0E3D');
    } else if (name.length < 3 || !isNaN(name)) {
      error.empty();
      error.append("Nombre iválido");
      $(this).css('border-bottom', '2px solid #ED0E3D');
    } else {
      error.empty();
      $(this).css('border-bottom', '1px solid #5BAC29');
    }
  });

  $('#email').blur(function () {
    var mail = $('#email').val();
    var error = $('#emailError');
    if (isEmail(mail) !== true) {
      error.empty();
      error.append("El mail no es válido");
      $(this).css('border-bottom', '2px solid #ED0E3D');
    }
    if (isEmail(mail)) {
      error.empty();
      $(this).css('border-bottom', '1px solid #5BAC29');
    }
  });

  function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }

  $('#phone').blur(function () {
    var phone = $('#phone').val();
    var error = $('#phoneError');
    if (phone === "" && phone !== " ") {
      error.empty();
      error.append("Teléfono requerido");
      $(this).css('border-bottom', '2px solid #ED0E3D');
    } else if (phone.length < 7 || isNaN(phone)) {
      error.empty();
      error.append("Número inválido");
      $(this).css('border-bottom', '2px solid #ED0E3D');
    } else {
      error.empty();
      $(this).css('border-bottom', '1px solid #5BAC29');
    }
  });

  var code = $('#code');

  var otro = $('#otro');

  code.on('change', function () {
    if (code.val() !== "") {
      $('#phone').focus();
    }
    if (code.val() == "") {
      otro.removeAttr('disabled');
      otro.focus();
      otro.css('border-bottom', '1px solid blue');
      otro.on('blur', function () {
        if (otro.val() == "") {
          otro.focus();
          otro.css('border-bottom', '2px solid #ED0E3D');
          $('#errorCode').empty();
          $('#errorCode').append('Debe ingresar un código válido');
        }
        if (isNaN(otro.val())) {
          otro.focus();
          otro.css('border-bottom', '2px solid #ED0E3D');
          $('#errorCode').empty();
          $('#errorCode').append('El código debe ser un número');
        } else {
          otro.css('border-bottom', '1px solid #5BAC29');
          $('#errorCode').empty();
        }
      });
    }
  });

  $('#message').blur(function () {
    var message = $('#message').val();
    var error = $('#messageError');
    if (message === "" && message !== " ") {
      error.empty();
      error.append("Por favor ingrese un mensaje");
      $(this).css('border-bottom', '2px solid #ED0E3D');
    } else {
      error.empty();
      $(this).css('border-bottom', '1px solid #5BAC29');
    }
  });

  var confirmar = $('#contactForm button');

  confirmar.each(function () {
    $(this).on('click', function () {
      var id = $(this).attr('id');
      if (id == "enviar") {
        if (confirmarContacto()) {
          $('#contactForm').submit();
        } else {
          inputError();
        }
      }
      if (id == "next") {
        if (confirmarContacto()) {
          $('#form').hide();
          $('#nextForm').fadeIn('fast');
        } else {
          inputError();
        }
      }
      if (id == "back") {
        $('#nextForm').hide();
        $('#form').fadeIn('fast');
      }
    });
  });

  function confirmarContacto() {
    if (($('#name').val() && $('#email').val() && $('#phone').val() && $('#message').val()) !== "" && $('#nameError').is(':empty') && $('#emailError').is(':empty') && $('#phoneError').is(':empty') && $('#messageError').is(':empty')) {
      return true;
    }
  }

  function inputError() {
    var input = $('.required');
    $('#contactError').empty();
    $('#contactError').append('Los campos deben estar llenos');
    input.css('border-bottom', '2px solid #ED0E3D');
  }

  var cerrar = $('#close_login');

  cerrar.on('click', function () {
    $('#contact').fadeOut('fast');
  });

  var cantidad = $('.cantidad');
  var error = $('#nfError');

  cantidad.each(function () {
    $(this).on('blur', function () {
      if (isNaN($(this).val())) {
        error.empty();
        $(this).focus();
        error.append('La cantidad debe ser un número');
        $(this).css('border-bottom', '2px solid #ED0E3D');
      }
      if (!isNaN($(this).val())) {
        error.empty();
        $(this).css('border-bottom', '1px solid #5BAC29');
        $(this).parent().parent().parent().next().addClass('showProduct');
      }
    });
  });
});

/***/ }),
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);