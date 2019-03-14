$(document).ready(function(){
    $('#formConfig').submit(function(event){
        event.preventDefault();
        createDataBase();
      });

    $('#btn_Table').on("click", function(){
        event.preventDefault();
        createTable();
    })

      function createDataBase(){
        $.ajax({
          url: '../server/import.php',
          dataType: "json",
          type: 'POST',
          success: function(php_response){
              
            if (php_response.msg == "OK") {
                alert("La base de datos institute se creó exitosamente")
                    window.location.href = 'config.html';
                }else {
                    alert('algo salio mal');
                }
                
            },
          error: function(){
            alert("Presione el siguiente boton");
          }
        })
    }
    function createTable(){
        $.ajax({
          url: '../server/importTable.php',
          dataType: "json",
          type: 'POST',
          success: function(php_response){
              
            if (php_response.msg == "OK") {
                alert("La tabla orden se creó exitosamente")
                    window.location.href = '/';
                }else {
                    alert('algo salio mal');
                }
                
            },
          error: function(){
            window.location.href = 'config.html';
          }
        })
    }
});