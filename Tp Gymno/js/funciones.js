$(document).ready(function() {

  

  /* Mostrar y ocultar menu carrito*/
  $("#carrito").click(function(){

    var displayCarrito =$("#ver-carrito").css("display");

    if(displayCarrito == "block")
      $("#ver-carrito").slideUp("swing");
    else
      $("#ver-carrito").slideDown("swing");
  });
  /* Fin mostrar oculta menu carrito */
	
  /* Sumar, Restar cantidad de producto a comprar */
  $("#cantidad").val(0);

  $("#menos").click(function(){
    if($("#cantidad").val() > 0)
      $("#cantidad").val(parseInt($("#cantidad").val()) - 1);
  });

  $("#mas").click(function(){
    if($("#cantidad").val() >= 0)
     $("#cantidad").val(parseInt($("#cantidad").val()) + 1);
  });

  /* Fin Sumar, Restar cantidad de producto a comprar */ 

   /**********************************************
   ********Validar formulario Registracion********
   **********************************************/
   $("#nombre,#apellido").keypress(function(){
        return soloLetras(event);
   });

   $("#dni,#telefono").keypress(function(){
     return soloNumeros(event);
   });

   $("#form-registracion").submit(function(event){

      var usuario = $("#usuario").val();
      var nombre = $("#nombre").val();
      var apellido = $("#apellido").val();
      var email = $("#email").val();
      var dni = $("#dni").val();
      var telefono = $("#telefono").val();

      $(".error").remove();

      if(!validarCantidadCaracteres(usuario,"usuario")) 
         return false;
      else
      {
        if(!validarCantidadCaracteres(nombre,"nombre"))
          return false;
        else
        {
          if(!validarCantidadCaracteres(apellido,"apellido"))
            return false;
          else
          {
            if(!validarMail(email))
                  return false; 
            else
            {
                if(!validarDni(dni))
                    return false; 
                else
                {
                  if(!validarTel(telefono))
                      return false; 
                  else
                  {
                     if(!validarClave())
                        return false; 
                  }
                }
            }  
          }
        }    
      }
  });

  
  /**********************************************
   ********FIn Validar formulario Registracion****
   **********************************************/

    /**********************************************
   ******** Validar formulario Login *************
   **********************************************/
    $("#usuario-login").val("Ingrese mail o usuario");
    $("#contasena-login").val("Ingrese contraseña");

    $("#usuario-login").click(function(){
      $("#usuario-login").val("");
    });

    $("#contasena-login").click(function(){
      $("#contasena-login").val("");
    });

    $("#form-login").submit(function(event){
      var usuario = $("#usuario-login").val();
      var contrasena = $("#contasena-login").val();

      $(".error").remove();

      if(!validarCantidadCaracteres(usuario,"usuario-login")) 
         return false;
      else
        if(!validarCantidadCaracteres(contrasena,"contasena-login"))
        return false; 

  });

    /**********************************************
   ******** Fin Validar formulario Login *********
   **********************************************/

   /**********************************************
   ******** Validar Formulario Fin Pedido ********
   **********************************************/
   $("#formaPago").show(1000);
  $("#EnvDomicilio").show(1000);
  $("input[name=entrega]").click(function(){
    var formaEntrega = $("input:radio[name=entrega]:checked").val();

    if(formaEntrega == "domicilio")
      $("#EnvDomicilio").show(1000);
    else
      $("#EnvDomicilio").hide(1000);
  });

  $("input[name=tPago]").click(function(){
    var tipoPago = $("input:radio[name=tPago]:checked").val();

    if(tipoPago == "targeta")
      $("#formaPago").show(1000);
    else
      $("#formaPago").hide(1000);
  });
   
   $("#formularioFinCompra").submit(function(event){
    var formaEntrega = $("input:radio[name=entrega]:checked").val();
    
    if(formaEntrega =="domicilio"){
      var calle = $("#calle").val();
      var altura = $("#altura").val();
      var piso = $("#piso").val();
      var Dpto = $("#Dpto").val();
      var localidad = $("#localidad").val();
      var eCalle1 = $("#eCalle1").val();
      var eCalle2 = $("#eCalle2").val();
      var cPostal = parseInt($("#cPostal").val());      
    }else{
      var calle = "";
      var altura = "";
      var piso = "";
      var Dpto = "";
      var localidad = "";
      var eCalle1 = "";
      var eCalle2 = "";
      var cPostal = 0;
    }

    var tipoPago = $("input:radio[name=tPago]:checked").val();

    if(tipoPago == "targeta"){
      var nombreTargeta = $("#targeta").val();
      var cuotas = parseInt($("#cuota").val());
      var nombreTittulasTargeta = $("#nomTitTargeta").val();
      var numeroTarjeta = parseInt($("#numTargeta").val());
      var codigoSeguridadTarjeta = parseInt($("#codTargeta").val());
      var fechaVencimientoTarjeta = $("#fVenTargeta").val();
    }else{
      var nombreTargeta = "";
      var cuotas = 0;
      var nombreTittulasTargeta = "";
      var numeroTarjeta = 0;
      var codigoSeguridadTarjeta = 0;
      var fechaVencimientoTarjeta = "00/00/0000";
    }
    
    $.ajax({
        type : "POST", 
        url : "../paginas/procesaFinPedido.php",
        data : ("formaEntrega="+formaEntrega+"&calle="+calle+"&altura="+altura+"&piso="+piso+"&Dpto="+Dpto+"&localidad="+localidad+"&eCalle1="+eCalle1+"&eCalle2="+eCalle2+
             "&cPostal="+cPostal+"&tipoPago="+tipoPago+"&nombreTargeta="+nombreTargeta+"&cuotas="+cuotas+"&nombreTittulasTargeta="+nombreTittulasTargeta+
             "&numeroTarjeta="+numeroTarjeta+"&codigoSeguridadTarjeta="+codigoSeguridadTarjeta+"&fechaVencimientoTarjeta="+fechaVencimientoTarjeta),
        dataType : "json",
        encode : true
      }).done(function(datos){
        if(datos.exito){
          $("#formularioFinCompra").hide("slow");
          $("#h1Fin").after("<p>"+ datos.mensaje+" </p>");
        }else{
            if(datos.errores.formaEntrega)
              alert(datos.errores.formaEntrega);
            if(datos.errores.calle)
              alert(datos.errores.calle);
            if(datos.errores.altura)
              alert(datos.errores.altura);
            if(datos.errores.piso)
              alert(datos.errores.piso);
            if(datos.errores.Dpto)
              alert(datos.errores.Dpto);
            if(datos.errores.localidad)
              alert(datos.errores.localidad);
            if(datos.errores.eCalle1)
              alert(datos.errores.eCalle1);
            if(datos.errores.eCalle2)
              alert(datos.errores.eCalle2);
            if(datos.errores.cPostal)
              alert(datos.errores.cPostal);
            if(datos.errores.tipoPago)
              alert(datos.errores.tipoPago);


        }
      }); 

    event.preventDefault();
  });
   /**********************************************
   ******** Fin Validar Formulario Fin Pedido ****
   **********************************************/

   /**********************************************
   ************** Paginacion Producto ***********
   **********************************************/
   paginacionAlquiler(1);
   var orden = $("#ordenar").val();
   paginacion(1,orden);

   $("#ordenar").change(function(){
      var orden = $(this).val();

      paginacion(1,orden);

   });

   /*** BUSCAR *****/
   $(".buscador").keyup(function(){

    var texto = $(this).val();

    if(texto == "")
      paginacion(1,orden);
    else
      buscar(texto);

   });

  if(getParameterByName('page') == "productos"){
    insertarMarcaEnLista();

    $("#item-marca").click(function(e){

      if($("#"+e.target.id).hasClass("active")){
        $("#"+e.target.id).removeClass("active");
        paginacion(1,orden);
      }else{
        $("#"+e.target.id).addClass("active"); 
        filtrarPorMarca(e.target.id);
      }
    });

  
      

    $("#item-precio").click(function(e){

      if($("#"+e.target.id).hasClass("active")){
        $("#"+e.target.id).removeClass("active");
        paginacion(1,orden);
      }else{
        $("#"+e.target.id).addClass("active"); 
        filtrarPorPrecio(e.target.id);
      }
       
    });

  }
   
   /**********************************************
   ************ Fin Paginacion Producto *********
   **********************************************/

});


/**************************************************************************************
********************************** FUNCIONES *****************************************
**********************************************************************************/
function validarCantidadCaracteres(texto,elemento){
    if(texto == "" || texto.length == 0 || texto.length > 15){

      if(elemento == "usuario-login" || elemento == "contasena-login")
        $("#" + elemento).focus().after("<span class='error'>Por favor ingresen correctamente.</span>");
      else
        $("#" + elemento).focus().after("<span class='error'>Ingrese como maximo 10 caracteres</span>");

      $("#" + elemento).css({"border":"2px solid #a94442"});
      return false;
    }
    else
      $("#" + elemento).css({ "border":"" });  

    return true   
  } 

  function validarMail(mail){

    var exp_mail = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;

    if(mail == "" || !exp_mail.test(mail)){
      $("#email").focus().after("<span class='error'>Ingrese un email correcto</span>");
      $("#email").css({"border":"2px solid #a94442"});
      return false; 
    }
    else
      $("#email").css({ "border":"" });

    return true;
  }

  function validarDni(dni){

    if(dni == "" || isNaN(dni) == true || dni.length == 0 || dni.length > 8){
      if(isNaN(dni) == true)
          $("#dni").focus().after("<span class='error'>Ingrese solo numeros.</span>");
      else
        if(dni == "" || dni.length == 0 || dni.length > 8)
          $("#dni").focus().after("<span class='error'>Ingrese dni de maximo 8 digitos.</span>");

      $("#dni").css({"border":"2px solid #a94442"});  
      return false;
    }
    else
      $("#dni").css({"border":""});

    return true;
  }
  
  function validarTel(tel){

    if(tel == "" || isNaN(tel) == true || tel.length == 0 || tel.length < 10  || tel.length > 15)
    {
      if(tel == "" || tel.length == 0 || tel.length < 10|| tel.length > 15)
        $("#telefono").focus().after("<span class='error'>Ingrese telefono correcto.ejemplo: 01144505750</span>");
      else{
        if(isNaN(tel) == true)
          $("#telefono").focus().after("<span class='error'>Ingrese telefono con solo digitos.</span>");                
      }

       $("#telefono").css({"border":"2px solid #a94442"}); 
      return false;
    }
    else
      $("#telefono").css({ "border":"" });

    return true;
  }

  function validarClave()
  {
    var clave1 = $("#contrasenia").val();
    var clave2 = $("#repite-contrasenia").val();
    var esp_blanco = false;
    var cont = 0;
    
    if(clave1.length == 0 || clave2.length == 0 || clave1.length < 6 || clave1.length > 15){
      if(clave1.length == 0 || clave1.length < 6 || clave1.length > 15)
        $("#contrasenia").focus().after("<span class='error'>Ingrese contraseña entre 6 y 15 caracteres.</span>");
      else
        if(tiene_numeros(clave1) == 0 || tiene_letras(clave1) == 0) 
              $("#contrasenia").focus().after("<span class='error'>Debe contener numeros y letras.</span>");
        else
          if( clave2.length == 0){
            $("#repite-contrasenia").focus().after("<span class='error'>Repita contraseña.</span>");
            $("#repite-contrasenia").css({"border":"2px solid #a94442"});
          }

      $("#contrasenia").css({"border":"2px solid #a94442"});  
      $("#repite-contrasenia").css({"border":"2px solid #a94442"});
      return false;
    }
    
    if(clave1 != clave2){
      $("#repite-contrasenia").focus().after("<span class='error'>No coinciden contraseña.</span>");
      $("#repite-contrasenia").css({"border":"2px solid #a94442"});  
      return false;
    }
    
    while(!esp_blanco && (cont < clave1.length)){
      if(clave1.charAt(cont) == " "){
        $("#contrasenia").focus().after("<span class='error'>La contraseña no debe tener espacio en blancos.</span>");
         $("#contrasenia").css({"border":"2px solid #a94442"});  
        return false;
      }  
      cont++; 
    } 
    
    $("#contrasenia").css({"border":""});
    $("#repite-contrasenia").css({"border":""});
    return true;
  }

  function soloNumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       numeros = " 0123456789";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(numeros.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
  }

  function soloLetras(e){
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      numeros = "  áéíóúabcdefghijklmnñopqrstuvwxyz";
      especiales = "8-37-39-46";

      tecla_especial = false
      for(var i in especiales){
          if(key == especiales[i]){
              tecla_especial = true;
              break;
          }
      }

      if(numeros.indexOf(tecla)==-1 && !tecla_especial){
          return false;
    }
  }

  function tiene_numeros(clave){

    var numeros="0123456789";
     for(i=0; i<clave.length; i++){
        if (numeros.indexOf(clave.charAt(i),0)!=-1){
           return 1;
        }
     }
     return 0;
  } 

  function tiene_letras(clave){

    var letras="abcdefghyjklmnñopqrstuvwxyz";
     clave = clave.toLowerCase();
     for(i=0; i<clave.length; i++){
        if (letras.indexOf(clave.charAt(i),0)!=-1){
           return 1;
        }
     }
     return 0;
  } 

  function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

  function paginacion(numeroPagina,orden){
    var url = "paginas/galeriaProductos.php";
    var tipo_prod = getParameterByName('tipo-prod');
    var page = (getParameterByName('page'))?getParameterByName('page'): "home";

    $.ajax({
      type :'POST',
      url : url,
      data:'num_pagina='+numeroPagina+'&tipo='+tipo_prod+'&pagina='+page+'&orden='+orden,
      dataType: "json",
      enconde: true,
      success: function(data){
        var array = eval(data);
        $("#productos").html(array[0]);
        $("#paginacion").html(array[1]);
      }
    }); 
  }

  function paginacionAlquiler(numeroPagina){
    var url = "paginas/galeriaProductosAlquiler.php";

    $.ajax({
      type :'POST',
      url : url,
      data:'num_pagina='+numeroPagina,
      dataType: "json",
      enconde: true,
      success: function(data){
        var array = eval(data);
        $("#productos").html(array[0]);
        $("#paginacion").html(array[1]);
      }
    }); 
  }


  function buscar(valor){
    var url= "paginas/buscador.php";
    var tipo_prod = getParameterByName('tipo-prod');
    var page = getParameterByName('page');
    
    $.ajax({
      type: 'POST',
      url: url,
      data:'valor='+valor+'&tipo='+tipo_prod+'&pagina='+page,
      success: function(data){
        var array = eval(data);
        $("#productos").html(array);
        $("#paginacion").html("");
      }
    });
  }

  function filtrarPorMarca(marca){
    var url= "paginas/filtrarPorMarca.php";
    var tipo_prod = getParameterByName('tipo-prod');

    $.ajax({
      type: 'POST',
      url: url,
      data:'marca='+marca+'&tipo='+tipo_prod,
      success: function(data){
        var array = eval(data);
        $("#productos").html(array);
        $("#paginacion").html("");
      }
    });
  }

  function filtrarPorPrecio(precio){
    var url= "paginas/filtrarPorPrecio.php";
    var tipo_prod = getParameterByName('tipo-prod');

    $.ajax({
      type: 'POST',
      url: url,
      data:'precio='+precio+'&tipo='+tipo_prod,
      success: function(data){
        var array = eval(data);
        $("#productos").html(array);
        $("#paginacion").html("");
      }
    });
  }

  function insertarMarcaEnLista(){
    var url = "paginas/agregarMarcaFiltrar.php";
    var tipo_prod = getParameterByName('tipo-prod');

    $.ajax({
      type: 'POST',
      url: url,
      data:'tipo='+tipo_prod,
      success: function(data){
        var array = eval(data);
        $("#item-marca").html(array);
      }
    });
  }

  
/**************************************************************************************
********************************** FIN FUNCIONES ***************************************
**********************************************************************************/