function confirmacion(e) {
    if (confirm("¿Desea realmente Actualizar el registro?")) {
        return true;
    } else {
        e.preventDefault();
    }
}

let linkDelete = document.querySelectorAll(".table__item__link2");

for (var i = 0; i < linkDelete.length; i++) {
    linkDelete[i].addEventListener('click', confirmacion);
}