$(document).ready(function(){
    $('#form').submit(function (event) {
        event.preventDefault();
        let mensajes = [];
        $('#error').html('').fadeOut(500);

        let esValido = true;

        const tipo_docu = $('#tipo_docu').val().trim();
        if (tipo_docu === '') {
            mensajes.push('Debe seleccionar un tipo de documento.');
            esValido = false;
        }

        const nombre = $('#name').val().trim();
        if (nombre === '') {
            mensajes.push('El campo nombre es obligatorio.');
            esValido = false;
        }

        const apellido = $('#apellido').val().trim();
        if (apellido === '') {
            mensajes.push('El campo apellido es obligatorio.');
            esValido = false;
        }

        const apellido1 = $('#segundoApellido').val().trim();
        if (apellido1 === '') {
            mensajes.push('El campo segundo apellido es obligatorio.');
            esValido = false;
        }

        const correo = $('#email').val().trim();
        if (correo === '') {
            mensajes.push('El campo correo es obligatorio.');
            esValido = false;
        }

        const clave = $('#Rtpwd').val().trim();
        if (clave === '') {
            mensajes.push('El campo confirmar password es obligatorio.');
            esValido = false;
        }


        const telefono = $('#telefono').val().trim();
        if (telefono === '') {
            mensajes.push('El campo teléfono es obligatorio.');
            esValido = false;
        }

        const direccion = $('#direccion_residencia').val().trim();
        if (direccion === '') {
            mensajes.push('El campo dirección es obligatorio.');
            esValido = false;
        }

        const fecha_nac = $('#date').val().trim();
        if (fecha_nac === '') {
            mensajes.push('El campo fecha de nacimiento es obligatorio.');
            esValido = false;
        }

        if (esValido==true) {
            alert('Formulario válido. Enviando datos...');
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
        
        $('#consultar').click(function(event) {
          
          event.preventDefault();

          
          window.location.href = "../View/Usuarios/consult.php";
        });
        

      });
      
      $(document).ready(function () {
        
        $('#btn-reg').click(function (event) {
            
            event.preventDefault();
    
            
            window.location.href = "login.php";
        });
    });    
    
    });