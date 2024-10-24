window.onload=function (){
    let fechaNacimiento=document.querySelector("#fNacimiento");
    let hoy=new Date(); //Formato -> 2024-10-24
    let year=hoy.getFullYear(); //2024
    let fechaMin=year-18;
    let mesMin=String(hoy.getMonth()).padStart(2,"0"); //para meses que sean del 1 al 9 los ponga 0
    let diaMin=String(hoy.getDate()).padStart(2,"0");
    // Esta funcion tiene que pasar le como atributo min al input para que no permita fecha mayores
    let fechaFormualrio=fechaMin+"-"+mesMin+"-"+diaMin;
    fechaNacimiento.setAttribute("max", fechaFormualrio);




}