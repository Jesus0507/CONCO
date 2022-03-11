$(function () {
     $(document).on("click", "#enviar", function () {
        
        var cedula_persona = $("#cedula_persona").val();
        var nombre_centro = $("#nombre_centro").val();
        var id_parroquia = document.getElementById("id_parroquia").selectedIndex;

        $.ajax({ 
            type: "POST",
            url: BASE_URL + "Centro_Votacion/Registrar_Asigar_Centro_Votacion",
            data: {
                nombre_centro: nombre_centro,
                id_parroquia: id_parroquia,
                cedula_persona: cedula_persona,
            },
        })
            .done(function (datos) {
                
                if (datos != 0) {
                        swal({
                            title: "Registrado!",
                            text: "El elemento fue Registrado con exito.",
                            type: "success",
                            showConfirmButton: false
                        });
                        setTimeout(function() {
                            location.href = BASE_URL + "Centro_Votacion/Consultas";
                        }, 2000);
                    }
            })
            .fail(function () {
                alert("error");
            });
    });

    $("#nombre_centro").keyup(function () {
        var nombre_centro = $("#nombre_centro").val();

        $.ajax({
            type: "POST",
            url: BASE_URL + "Centro_Votacion/Consultas_Centro_Votacion",
            data: {
                nombre_centro: nombre_centro,
            },
        })
            .done(function (datos) {
                if (datos != "vacio") {
                    document.getElementById("id_parroquia").selectedIndex = datos;
                } else {
                    console.log("vacio");
                }
            })
            .fail(function () {
                alert("error");
            });
    });
});
