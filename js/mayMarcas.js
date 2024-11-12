const nombreInput = document.getElementById('nombre');
const importadorInput = document.getElementById('importador');
const paisOrigenInput = document.getElementById('pais_origen');

function convertirAMayusculas(input) {
    input.value = input.value.toUpperCase();
}

nombreInput.addEventListener('input', function() {
    convertirAMayusculas(nombreInput);
});

importadorInput.addEventListener('input', function() {
    convertirAMayusculas(importadorInput);
});

paisOrigenInput.addEventListener('input', function() {
    convertirAMayusculas(paisOrigenInput);
});
