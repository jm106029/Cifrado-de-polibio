document.querySelector("button[name='nueva_palabra']").addEventListener("click", function(event) {
    event.preventDefault();
    document.getElementById("mensaje").value = "";
    document.getElementById("mensaje_cifrado").value = "";
    document.getElementById("resultado").innerHTML = ""; //limpiar mi formmulario
});