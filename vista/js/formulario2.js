window.onload = function (){
    let check = document.querySelector("#casilla");
    let boton = document.querySelector("#enviarFormulario2");
    check.addEventListener("change", function (){
        if (check.checked){
            boton.disabled=false;
            boton.className="boton";
        }else {
            boton.disabled=true;
            boton.className="botonDesactivado";  // boton.classList("clase1 clase2....")
        }
    })
}