/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/js/app.js":
/*!************************************!*\
  !*** ./resources/assets/js/app.js ***!
  \************************************/
/***/ (() => {

$(document).ready(function () {
  $('#2, #3, #4').addClass('articuloOculto');
  $('#e').addClass('selected');
  $(".fondoImg").each(function () {
    var src = $(this).attr("data-img");
    $(this).css({
      background: "url(".concat(src, ") no-repeat")
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

  if (window.innerWidth > 450) {
    $('#subMenuItem').mouseover(function () {
      $('#subMenu').addClass('mostrarNav');
    });
    $('#subMenu').mouseleave(function () {
      $(this).removeClass('mostrarNav');
    });
  }

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

  function showEmpresas() {
    $('#e').addClass('selected');
    $('#p, #pr, #se').removeClass('selected');
    $('#1').removeClass('articuloOculto');
    $('#2, #3, #4').addClass('articuloOculto');
    $('#home').css('height', '50vh');
    $('.carousel-inner').css('height', '50vh');
  }

  function showProductos() {
    $('#p').addClass('selected');
    $('#e, #pr, #se').removeClass('selected');
    $('#2').removeClass('articuloOculto');
    $('#1, #3').addClass('articuloOculto');
    $('#home').css('height', '50vh');
    $('.carousel-inner').css('height', '50vh');
  }

  function showProyectos() {
    $('#pr').addClass('selected');
    $('#p, #e, #se').removeClass('selected');
    $('#3').removeClass('articuloOculto');
    $('#1, #2, #4').addClass('articuloOculto');
    $('#home').css('height', '50vh');
    $('.carousel-inner').css('height', '50vh');
  }

  function showServicios() {
    $('#se').addClass('selected');
    $('#p, #e, #pr').removeClass('selected');
    $('#4').removeClass('articuloOculto');
    $('#1, #2, #3').addClass('articuloOculto');
    $('#home').css('height', '50vh');
    $('.carousel-inner').css('height', '50vh');
  }
});

/***/ }),

/***/ "./resources/assets/sass/app.scss":
/*!****************************************!*\
  !*** ./resources/assets/sass/app.scss ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/assets/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/assets/sass/app.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;