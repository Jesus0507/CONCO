$(document).ready(function() {
    $("form").attr("autocomplete", "off");
    $('.no-simbolos').on('input', function() {
        this.value = this.value.replace(/^[!@#$%^&*()_=\[\]{};':"\\|,.<>\/?+-]*$/, '');
    });
    $('.solo-numeros').on('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    $('.solo-letras').on('input', function() {
        this.value = this.value.replace(/[^a-zA-ZñÑ]/g, '');
    });
    $('.no-acentos').on('input', function() {
        this.value = this.value.replace(/[áéíóúüÁÉÍÓÚÄËÏÖÜ]/g, '');
    });
    $(".no-espacios").keyup(function() {
        this.value = this.value.replace(/ /g, "");
    });
});

function validacion_inputs_generica(input, condicion, validador, mensaje) {
    if (input.value == condicion) {
        input.style.borderColor = 'red';
        validador.innerHTML = mensaje;
    } else {
        input.style.borderColor = '';
        validador.innerHTML = '';
    }
}

function Limitar(event, cantidad) {
    if (event.value.length >= cantidad) {
        event.value = event.value.substring(0, cantidad);
    }
}