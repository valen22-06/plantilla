$(document).ready(function(){
    $('#form').submit(function(event){
    
        //Evita el envio del formulario si hay errores
        event.preventDefault();
        let mensajes=[];
        //limpia los mensajes previos
        $('#error').html('').fadeOut(500);
        
        //bandera para verificar si hay errores
        let esValido=true;
    
        //Validar campos de nombre
        const nombre=$('#nombre').val().trim();
        if(nombre===''){
            mensajes.push('El campo nombre es obliatorio');
            esValido=false;
            console.log('Error de nombre');
        }
        const apellido=$('#apellido').val().trim();
        if(apellido===''){
            mensajes.push('El campo apellido es obliatorio');
            esValido=false;
        }
        const correo=$('#email').val().trim();
        if(correo===''){
            mensajes.push('El campo correo es obligatorio');
            esValido=false;
            console.log('Error de correo');
        }
        const contraseña=$('#clave').val().trim();
        if (contraseña===''){
            mensajes.push('El campo contraseña es obligatorio');
            esValido=false;
            console.log('Error de contraseña');
        }
    
        
        
        //si todo es válido, puedes enviar el formulario o hacer
        if(esValido==true){
            alert('Formulario válido. Enviando datos...');
            $('#error').fadeOut(500);
            this.submit();
    
        }else{
            $('#error').html(mensajes.map(msg=> `${msg}<br>`).join(''));
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