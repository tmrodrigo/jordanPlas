$(document).ready( function() {
  $('#2, #3, #4').addClass('articuloOculto');

  $('#e').addClass('selected');


  $(".fondoImg").each(function(){
    var src = $(this).attr("data-img")
    $(this).css({
      background:`url(${src}) no-repeat`,
    })
  });

  $('#burguer').on('click', function(){
    $('#nav').toggleClass('abrirNav');
  });

  $('#botonesDesktop').hide();

  if (window.innerWidth > 1023) {
    $('#sButton').on('click', function(){
      $('#searcher').addClass('mostarSearch');
      $('#sButton').addClass('ocultarSearch');
    });

    $(document).keyup(function(e){
      if(e.keyCode == 27) {
        $('#sButton').removeClass('ocultarSearch')
        $('#searcher').removeClass('mostarSearch')
      }
    });

  }

  if (window.innerWidth > 767) {
    $('#botonesMobile').hide();
    $('#botonesDesktop').show();
  }

  $(window).bind('scroll', function() {
  var navHeight = 100; // custom nav height
  ($(window).scrollTop() > navHeight) ? $('#redes').fadeIn('slow') : $('#redes').fadeOut('fast');
  })

  $(document).keyup(function(e){
    if(e.keyCode == 27) {
      $('#home').css('height', '100vh');
      $('.carousel-inner').css('height', '100vh');
    }
  });

  $('#carousel-generic').on('click', function(){
    $('#home').css('height', '100vh');
    $('.carousel-inner').css('height', '100vh');
  });

  $('#subMenuItem').mouseover(function(){
    $('#subMenu').addClass('mostrarNav')
  })

  $('#subMenu').mouseleave(function(){
    $(this).removeClass('mostrarNav');
  })


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

  item.each(function(){
    $(this).hover(function(){
      $(this).toggleClass('fondoItem')
      if ($(this).hasClass('soon')) {
        $(this).removeClass('fondoItem')
      }
    })
  })

  $('input').focus(function(){
    var campo = $('input');
    for (var i = 0; i < campo.length; i++) {
      $(this).css('border-bottom', '2px solid white');
    }
  });


  $('#name').blur(function(){
    var name = $('#name').val();
    var error = $('#nameError');
    if (name === "" && name !== " "){
      error.empty();
      error.append("Nombre requerido");
      $(this).css('border-bottom', '2px solid #ED0E3D');
    }
    else if ((name.length < 3) || (!isNaN(name))){
      error.empty();
      error.append("Nombre iválido");
      $(this).css('border-bottom', '2px solid #ED0E3D');
    }
    else {
      error.empty();
      $(this).css('border-bottom', '1px solid #5BAC29');
    }

  });


  $('#email').blur(function(){
    var mail = $('#email').val();
    var error = $('#emailError');
    if (isEmail(mail) !== true){
      error.empty();
      error.append("El mail no es válido");
      $(this).css('border-bottom', '2px solid #ED0E3D');
    }
    if (isEmail(mail)){
      error.empty();
      $(this).css('border-bottom', '1px solid #5BAC29');
    }
  });

  function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
  }

  $('#phone').blur(function(){
    var phone = $('#phone').val();
    var error = $('#phoneError');
    if (phone === "" && phone !== " "){
      error.empty();
      error.append("Teléfono requerido");
      $(this).css('border-bottom', '2px solid #ED0E3D');
    }
    else if (phone.length < 7  || isNaN(phone)) {
      error.empty();
      error.append("Número inválido");
      $(this).css('border-bottom', '2px solid #ED0E3D');
    }
    else {
      error.empty();
      $(this).css('border-bottom', '1px solid #5BAC29');
    }
  });


  $('#message').blur(function(){
    var message = $('#message').val();
    var error = $('#messageError');
    if (message === "" && message !== " " ){
      error.empty();
      error.append("Por favor ingrese un mensaje");
      $(this).css('border-bottom', '2px solid #ED0E3D');
    }
    else {
      error.empty();
      $(this).css('border-bottom', '1px solid #5BAC29');
    }
  });

  var confirmar = $('#contactForm button')

  confirmar.each(function(){
    $(this).on('click', function(){
      var id = $(this).attr('id');
      if (id == "enviar") {
        if (confirmarContacto()) {
          $('#contactForm').submit();
        }
        else {
          inputError()
        }
      }
      if (id == "next") {
        if (confirmarContacto()) {
          $('#form').hide();
          $('#nextForm').fadeIn('fast')
        }
        else {
          inputError()
        }
      }
      if (id == "back") {
        $('#nextForm').hide()
        $('#form').fadeIn('fast')
      }
    })
  });

  function confirmarContacto(){
    if (
      (($('#name').val() && $('#email').val() && $('#phone').val() && $('#message').val()) !== "")
      &&
      ($('#nameError').is(':empty') && $('#emailError').is(':empty')  && $('#phoneError').is(':empty')  && $('#messageError').is(':empty'))
    ) {
      return true;
    }
  }

  function inputError(){
    var input = $('.required')
    $('#contactError').empty()
    $('#contactError').append('Los campos deben estar llenos')
    input.css('border-bottom', '2px solid #ED0E3D');
  }

  $('#next').on('click', function(){
    if (
      (($('#bName').val() && $('#bEmail').val() && $('#bPhone').val()) !== "")
      &&
      ($('#bNameError').is(':empty') && $('#bEmailError').is(':empty')  && $('#bPhoneError').is(':empty'))
    ) {
      $('#completar').empty();
      $('#prevForm').hide();
      $('#nextForm').show();
    }
    else {
      $('#completar').append('Llenar campos requeridos')
      $('#bName').css('border-bottom', '2px solid #ED0E3D');
      $('#bEmail').css('border-bottom', '2px solid #ED0E3D');
      $('#bPhone').css('border-bottom', '2px solid #ED0E3D');
    }
  })

  // $('#nextForm').hide();

  // $('#form').fadeOut();


  var producto = $('.producto')
  var cantidad = $('.cantidad')
  var campo = '<select class="producto" name="product_id"><option value="">seleccione un producto</option>@foreach ($products as $product)<option value="{{ $product->id}}">{{ $product->name }}</option>@endforeach</select>';

  producto.each(function(){
    $(this).blur(function(){
      var message = $(this).val();
      if (message === "" && message !== " " ){
        $(this).css('border-bottom', '2px solid #ED0E3D');
      }
      else {
        $(this).css('border-bottom', '1px solid #5BAC29');
      }
    })
  })

  cantidad.each(function(){
    $(this).blur(function(){
      var message = $(this).val();
      if (cantidad.is(':empty')) {
        $(this).css('border-bottom', '1px solid #505050');
      }
      if ($(this).val()) {
        if (isNaN($(this).val())) {
          $('#nfError').empty();
          $(this).css('border-bottom', '2px solid #ED0E3D');
          $('#nfError').append('La cantidad debe ser un número');
        }
        else {
          $(this).css('border-bottom', '1px solid #5BAC29');
          if (producto.val() != "" && cantidad.val() != "") {
            $('#agregarMas').append(campo);
            $('#nfError').empty()
          }
        }
      }
    })
  })

  $('#enviarBudget').on('click', function(){
    if (cantidad.val() == "" && producto.val() == "") {
      $('#nfError').empty();
      $('#nfError').append('Seleccione al menos un producto');
    } else {
      $('#budget').submit();
    }


  })

})
