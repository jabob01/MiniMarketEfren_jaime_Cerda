document.addEventListener("DOMContentLoaded", function() {
    var formulario = document.getElementById("miFormulario");

    formulario.addEventListener("submit", function(event) {
        // Validación del nombre del producto
        const name = document.getElementById("name").value.trim();
        const nameError = document.getElementById("nameError");
        const nameRegex = /^[A-Za-z\s]+$/;
        if (name === '') {
            nameError.textContent = 'El nombre del producto es obligatorio.';
            event.preventDefault(); // Evita que el formulario se envíe
        } else if (!nameRegex.test(name)) {
            nameError.textContent = 'El nombre del producto debe contener solo letras y espacios.';
            event.preventDefault(); // Evita que el formulario se envíe
        } else {
            nameError.textContent = '';
        }

        // Validación del precio por unidad
        const price = document.getElementById("price").value.trim();
        const priceError = document.getElementById("priceError");
        if (price === '' || isNaN(price) || parseFloat(price) <= 0) {
            priceError.textContent = 'El precio por unidad debe ser un número mayor que cero.';
            event.preventDefault(); // Evita que el formulario se envíe
        } else {
            priceError.textContent = '';
        }

        // Validación de la cantidad en inventario
        const quantity = document.getElementById("quantity").value.trim();
        const quantityError = document.getElementById("quantityError");
        if (quantity === '' || isNaN(quantity) || parseFloat(quantity) < 0) {
            quantityError.textContent = 'La cantidad en inventario debe ser un número no negativo.';
            event.preventDefault(); // Evita que el formulario se envíe
        } else {
            quantityError.textContent = '';
        }
    });
});
