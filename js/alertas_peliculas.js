console.log("alertas_peliculas.js cargado");

document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    console.log("URL actual:", window.location.search);

    const registro = urlParams.get("registro");
    const eliminacion = urlParams.get("eliminacion");
    const edicion = urlParams.get("edicion");

    if (registro === "exito") {
        Swal.fire({
            title: "¡Éxito!",
            text: "Los registros se agregaron correctamente.",
            icon: "success",
            confirmButtonText: "Aceptar"
        });
    }

    if (registro === "error") {
        Swal.fire({
            title: "Error",
            text: "Ocurrió un problema al guardar los datos.",
            icon: "error",
            confirmButtonText: "Aceptar"
        });
    }

    if (eliminacion === "exitosa") {
        Swal.fire({
            title: "¡Eliminado!",
            text: "El registro fue eliminado correctamente.",
            icon: "success",
            confirmButtonText: "Aceptar"
        });
    }

    if (eliminacion === "fallida") {
        Swal.fire({
            title: "Error",
            text: "No se pudo eliminar el registro.",
            icon: "error",
            confirmButtonText: "Aceptar"
        });
    }

    if (edicion === "exitosa") {
        Swal.fire({
            title: "¡Actualizado!",
            text: "La película se editó correctamente.",
            icon: "success",
            confirmButtonText: "Aceptar"
        });
    }

    if (edicion === "fallida") {
        Swal.fire({
            title: "Error",
            text: "Ocurrió un problema al editar la película.",
            icon: "error",
            confirmButtonText: "Aceptar"
        });
    }
});
