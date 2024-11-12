const marcaproductoinput = document.getElementById('marca_producto');
const tipoProductoInput = document.getElementById('tipo_producto');
const modeloInput = document.getElementById('modelo');
const colorInput = document.getElementById('color');


function convertirAMayusculas(input) {
    input.value = input.value.toUpperCase();
}

if (marcaproductoinput) {
    marcaproductoinput.addEventListener('input', function() {
        convertirAMayusculas(marcaproductoinput);
    });
}

if (tipoProductoInput) {
    tipoProductoInput.addEventListener('input', function() {
        convertirAMayusculas(tipoProductoInput);
    });
}

if (modeloInput) {
    modeloInput.addEventListener('input', function() {
        convertirAMayusculas(modeloInput);
    });
}

if (colorInput) {
    colorInput.addEventListener('input', function() {
        convertirAMayusculas(colorInput);
    });
}


