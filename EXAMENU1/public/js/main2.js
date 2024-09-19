const boton = document.getElementById("btn_generar");
const boton2 = document.getElementById("btn_limpiar");
const expresionOperacion = /[0-9+\-\*/]+/;
let arbol = document.getElementById("arbol");
let arregloRamas = [];


const generar = () => {
    arregloRamas = [];
    let op = document.getElementById("operacion").value;
    if(!expresionOperacion.test(op)){
        alert("Datos ingresados no validos!!")
        return false;
    } 
    let numeros = op.replace(/\(/g,' ').replace(/\)/g,' ').split(' ');
    for(let i = 0; i < numeros.length; i++){
        if(numeros[i] != ""){
            if(/^[-+/*][0-9]+||[0-9][-+/*][0-9]+/.test(numeros[i])){
                arregloRamas.push(crear_rama(numeros[i]));
                continue;
            }
            arregloRamas.push(numeros[i]);
        }
    }
    construir_arbol();
}