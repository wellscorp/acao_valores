/**
 * Created by Welton on 02/04/2015.
 */

$().ready(function(){

    $("#btn-submit").click(function(){
        $(this).button('loading');
        $("#form").submit();
    });

    $("#btn-submit-usuario").click(function(){
        var alerta = "Campos obrigatórios estão vazios: ";
        if($("#nome").val() == "" || $("#email").val() == "" || $("#id_grupo").val() == ""){
            if($("#nome").val() == ""){  alerta= alerta +  'Nome, '; $("#f-nome").addClass(" has-error"); }
            if($("#email").val() == ""){  alerta= alerta +  ' E-mail,'; $("#f-email").addClass(" has-error"); }
            if($("#id_grupo").val() == ""){  alerta= alerta +  ' Grupo.'; $("#f-grupo").addClass(" has-error"); }
            $("#alerta").append('<div class="alert alert-danger" style="max-height: 30%" role="alert"><button type="button" class="close" data-dismiss="alert"> x </button> '+alerta+'</div>');
        }else{
            if($("#senha").val() != $("#senha_2").val()){
                $("#f-senha, #f-senha-2").addClass(" has-error");
                $("#alerta").append('<div class="alert alert-danger" style="max-height: 30%" role="alert"><button type="button" class="close" data-dismiss="alert"> x </button> Senhas não conferem!</div>');
            }else{
                $(this).button('loading');
                $("#form").submit();
            }
        }

    });

    $("#btn-submit-sister").click(function(){
        var alerta = "Campos obrigatórios estão vazios: ";
        if($("#nome").val() == "" || $("#email").val() == "" || $("#id_grupo").val() == ""){
            if($("#nome").val() == ""){  alerta= alerta +  'Nome, '; $("#f-nome").addClass(" has-error"); }
            if($("#email").val() == ""){  alerta= alerta +  ' E-mail,'; $("#f-email").addClass(" has-error"); }
            if($("#id_grupo").val() == ""){  alerta= alerta +  ' Grupo.'; $("#f-grupo").addClass(" has-error"); }
            $("#alerta").append('<div class="alert alert-danger" style="max-height: 30%" role="alert"><button type="button" class="close" data-dismiss="alert"> x </button> '+alerta+'</div>');
        }else{
            $(this).button('loading');
            //window.history.pushState('page2', 'Title', '');
            $("#form").submit();
        }

    });

    $("#btn-submit-evento").click(function(){
        var alerta = "Campos obrigatórios estão vazios: ";
        if($("#titulo").val() == "" || $("#valor_uni").val() == "" || $("#dt_ini").val() == "" || $("#dt_fim").val() == ""){
            if($("#titulo").val() == ""){  alerta= alerta +  'Título, '; $("#f-titulo").addClass(" has-error"); }
            if($("#valor_uni").val() == ""){  alerta= alerta +  ' Valor Unitário,'; $("#f-valor-uni").addClass(" has-error"); }
            if($("#dt_ini").val() == "" || $("#dt_fim").val() == ""){  alerta= alerta +  ' Periodo.'; $("#f-dt-ini").addClass(" has-error"); $("#f-dt-fim").addClass(" has-error"); }
            $("#alerta").append('<div class="alert alert-danger" style="max-height: 30%" role="alert"><button type="button" class="close" data-dismiss="alert"> x </button> '+alerta+'</div>');
        }else{
            $(this).button('loading');
            $("#form").submit();
        }

    });


    /*
    $("#btn-submit-sister-edit").click(function(){
            $(this).button('loading');
            $("#form-edit").submit();

    });
    */

    /*
    $("a#btn-editar").click(function(){
        console.log('editar');
        window.history.pushState('page2', 'Title', '?id=2');
        //console.log(document.write(document.URL));
        //$("#form-id-editado").submit();

    });
    */



});
