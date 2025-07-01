console.log("alertas_edicion.js cargado");

function mostrarAlerta(tipo) {
    if (tipo === "exito") {
        Swal.fire({
            title: "¡Éxito!",
            text: "Los cambios fueron guardados correctamente.",
            icon: "success",
            confirmButtonText: "Aceptar"
        });
    } else if (tipo === "error") {
        Swal.fire({
            title: "Error",
            text: "No se pudo actualizar la película.",
            icon: "error",
            confirmButtonText: "Aceptar"
        });
    }
}

