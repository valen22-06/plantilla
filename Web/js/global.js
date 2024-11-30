$(document).ready(function(){
    $('#form').submit(function(event) {
        event.preventDefault();
        let mensajes = [];
        $('#error').html('');
        // .fadeOut(500);
    
        let esValido = true;
        const nombre = $('#nombre').val().trim();
    
        if(nombre === ''){
            mensajes.push('El campo nombre es obligatorio');
            esValido = false;
        }
    
        const apellido = $('#apellido').val().trim();
    
        if(apellido === ''){
            mensajes.push('El campo apellido es obligatorio');
            esValido = false;
        }
    
        const correo = $('#correo').val().trim();
    
        if(correo === ''){
            mensajes.push('El campo correo es obligatorio');
            esValido = false;
        }
        
        const clave = $('#clave').val().trim();
    
        if(clave === ''){
            mensajes.push('El campo clave es obligatorio');
            esValido = false;
        }
    
        const rol = $('#rol').val().trim();
    
        if(rol === ''){
            mensajes.push('El campo rol es obligatorio');
            esValido = false;
        }
        
        if (esValido) {
            // alert('Formulario valido. Enviando datos...');
            $('#error').fadeOut(500);
            this.submit();
        } else {
            $('#error').html(mensajes.map(msg => `${msg}<br>`).join(''));
            $('#error').removeClass('d-none');
        }
    
    });
    
    
        $(document).on('keyup','#buscar',function(){
            let buscar = $(this).val();
            let url =$(this).attr('data-url');
            $.ajax({
                url:url,
                type:'POST',
                data:{'buscar':buscar},
                success:function(data){
                    $('tbody').html(data);
                }
            });
    
      
        });
        $(document).on("click","#cambiar_estado",function(){
            let id =$(this).attr('data-id');
            let url =$(this).attr('data-url');
            let user =$(this).attr('data-user');
    
            $.ajax({
                url:url,
                data:{id,user},
                type:"POST",
                success: function(data){
                    $("tbody").html(data);
                }
            });
        });
    
       
        $(document).on("click","#copyList",function(){
            let listUser=$("#listUser").html();
          
    
            $("#responsables").append(
                "<div class='col-md-4 form group'>"+
                "<label>Responsable</label>"+
                "<div class='row'>"+
                "<div class='col-md-10'>"+listUser+"</div>"+
                "<div class='col-md-2'>"+
                "<button class='btn btn-danger' type='button' id='removeList'>x</>"+
                "</div>"+
                "</div>"+
                "</div>"
            )
    
        });
    
    
        $(document).on("click","#removeList",function(){
            $(this).parent().parent().parent().remove();
    });

    $(document).ready(function() {
        // Manejar el clic del botón "Registrar"
        $('#consultar').click(function(event) {
          // Prevenir comportamiento predeterminado
          event.preventDefault();

          // Redirigir a la página de registro
          window.location.href = "../View/Usuarios/consult.php";
        });

      });
    });