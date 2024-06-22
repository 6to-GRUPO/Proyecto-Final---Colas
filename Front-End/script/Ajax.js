function cambiarPacientes(){
    var cambiar = document.getElementById('base');
    cambiar.innerHTML="";
    var ajax = new XMLHttpRequest();
    ajax.open("GET",'Paciente.html', true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            cambiar.innerHTML = ajax.responseText;
        }
    };
    ajax.send();
}
function cambiarInicio(){
    var cambiar = document.getElementById('base');
    cambiar.innerHTML="";
    var ajax = new XMLHttpRequest();
    ajax.open("GET",'Citas_inicio.html', true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            cambiar.innerHTML = ajax.responseText;
        }
    };
    ajax.send();
}
function cambiarReceta(){
    var cambiar = document.getElementById('base');
    cambiar.innerHTML="";
    var ajax = new XMLHttpRequest();
    ajax.open("GET",'Receta.html', true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            cambiar.innerHTML = ajax.responseText;
        }
    };
    ajax.send();
}