$(document).ready(function(){
    $('#form_venta').submit(function(event){
        event.preventDefault();
        getDatos();
        //alert('hola')
      })
      function getDatos(){
        var form_data = new FormData();
        form_data.append('nombre', $('#nombre').val());
        form_data.append('apellido', $('#apellido').val());
        form_data.append('email', $('#email').val());
        form_data.append('telefono', $('#telefono').val());
        form_data.append('compania', $('#compania').val());
        form_data.append('tarjeta', $('#tarjeta').val());
        form_data.append('n_productos', $('#n_productos').val());
        createOrder(form_data);
      }
    
      function createOrder(formData){
        $.ajax({
          url: '../server/registro.php',
          dataType: "json",
          cache: false,
          processData: false,
          contentType: false,
          data: formData,
          type: 'POST',
          success: function(php_response){
            if (php_response.msg == "Pago Exitoso") {
                alert("Pago Exitoso")
                    window.location.href = '/';
                }else {
                    alert('algo salio mal');
                }
            },
          error: function(){
            alert("error en la comunicación con el servidor");
          }
        })
    }
});