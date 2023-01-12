
function onlyLetrasNum(input) {
    var regex = /[$%&|<>#.]/;
    input.value = input.value.replace(regex, "");
}

function onlyEmail(input) {
    var regex = /[$%&|<>#]/;
    input.value = input.value.replace(regex, "");
}

function onlyNumPrecio(input) {
    var regex = /[^$12345678910]/gi;;
    input.value = input.value.replace(regex, "");
}

function onlyNumPhone(input) {
    var regex = /[^+12345678910]/gi;;
    input.value = input.value.replace(regex, "");
}

function onlyNum(input) {
    var regex = /[^12345678910]/gi;;
    input.value = input.value.replace(regex, "");
}

const validar_email = (email) => {
    const regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
};


const verPassword = (input) => {
    const inputVerPssword = document.querySelector('#verPassword');
    inputVerPssword.innerHTML = `${input.value}`;
}

const showFile = (id, name) => {

    const file_label = document.querySelector(`#file_${id}`);

    if (name.length > 18) {
        file_label.innerHTML = `Archivo seleccionado: ${name.substr(0, 18)}...`;
    } else {
        file_label.innerHTML = `Archivo seleccionado: ${name}`;
    }

}



$(document).on('change', 'input[type="file"]', function () {


    if (this.id == 'comprobante_nomina1' || this.id == 'comprobante_nomina2' || this.id == 'comprobante_nomina3' || this.id == 'comprobante_nomina4') {
        return false;
    }

    const fileName = this.files[0].name;
    const fileSize = this.files[0].size;

    if (fileSize > 40000000) {
        Swal.fire({
            icon: 'warning',
            title: 'Tamaño no permitido',
            html: 'El archivo no debe de ser mayor a 20 megas',
            confirmButtonText: 'Aceptar',
        });
        this.value = '';
        document.querySelector(`#file_${this.id}`).innerHTML = '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';

    } else {

        let ext = fileName.split('.').pop();
        ext = ext.toLowerCase();

        const arrExtenciones = [
            "jpg",
            "JPG",
            "jpeg",
            "JPEG",
            "png",
            "PNG",
            "pdf",
            "PDF"
        ];

        let validarExtencion = arrExtenciones.includes(ext);
        if (validarExtencion) {
            showFile(this.id, this.files[0].name);
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Formato incorrecto',
                html: 'El formato de tu archivo no es valido. <br/>Formatos validos ( .jpg | .jpeg | .png | .pdf)',
                confirmButtonText: 'Aceptar',
            });

            document.querySelector(`#file_${this.id}`).innerHTML = '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
            this.value = '';
        }

    }
});


// Money input

$("#ingresos_netos").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value) {
            return '$' + value.replace(/\D/g, "")
                .replace(/([0-9])([0-9]{0})$/, '$1.$2')
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
                .replace('.', "");
        });
    }
});

$("#precio").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value) {
            return '$' + value.replace(/\D/g, "")
                .replace(/([0-9])([0-9]{0})$/, '$1.$2')
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
                .replace('.', "");
        });
    }
});


$("#mantenimiento_mensual").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value) {
            return '$' + value.replace(/\D/g, "")
                .replace(/([0-9])([0-9]{0})$/, '$1.$2')
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
                .replace('.', "");
        });
    }
});

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
});




var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
});

