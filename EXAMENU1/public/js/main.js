const boton = document.getElementById("btn_generar");
const boton2 = document.getElementById("btn_limpiar");
const expresionOperacion = /[0-9+\-\*/]+/;
let arbol = document.getElementById("arbol");
let arregloRamas = [];

const crear_nodo = (valor) => {
    return `<div class="col-3">
        <input class="nodo text-center" type="text" value="${valor}" readonly>
    </div>`;
}
const crear_row = contenido => `<div class="row justify-content-around mb-5">${contenido}</div>`;

const construir_arbol = () =>{
    let temp = ``;
    if(arregloRamas.length == 2) {
        if(arregloRamas[0][2] == ""){
            temp += crear_row(crear_nodo(arregloRamas[0][1]));
            temp += crear_row(crear_nodo(arregloRamas[0][0])+crear_nodo(arregloRamas[1][1]));
            temp += `<div class="row"><div class="col-7"></div><div class="col-4">${crear_row(crear_nodo(arregloRamas[1][0])+crear_nodo(arregloRamas[1][2]))}</div></div>`;
        }else{
            temp += crear_row(crear_nodo(arregloRamas[1][1]));
            temp += crear_row(crear_nodo(arregloRamas[0][1])+crear_nodo(arregloRamas[1][2]));
            temp += `<div class="row"><div class="col-1"></div><div class="col-4">${crear_row(crear_nodo(arregloRamas[0][0])+crear_nodo(arregloRamas[0][2]))}</div></div>`;
        }
    }else if(arregloRamas.length == 1){
        temp += crear_row(crear_nodo(arregloRamas[0][1]));
        temp += crear_row(crear_nodo(arregloRamas[0][0])+crear_nodo(arregloRamas[0][2]));
    }else{
        temp += crear_row(crear_nodo(arregloRamas[1][1]));
        temp += crear_row(crear_nodo(arregloRamas[0][1])+crear_nodo(arregloRamas[1][1]));
        temp += `<div class="row"><div class="col-6">${crear_row(crear_nodo(arregloRamas[0][0])+crear_nodo(arregloRamas[0][2]))}</div>`
        temp += `<div class="col-6">${crear_row(crear_nodo(arregloRamas[2][0])+crear_nodo(arregloRamas[2][2]))}</div></div>`;
    }
    arbol.innerHTML=temp;    
}

const crear_rama = (expresion)=> {
    let operando = expresion.replace(/[0-9]/g,'');
    let numeros = expresion.split(/[-+/*]/);
    return [numeros[0],operando,numeros[1]];
}

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

const limpiar = () => {
    document.getElementById("frm_arbol").reset();
    arbol.innerHTML="";
}

boton.addEventListener("click", () =>{
    generar();
});

boton2.addEventListener("click", () =>{
    limpiar();
});