// Función Guardar/Nueva Clase.
// Se Ejecuta Al Momento De Presionar El Input guardar/nuevo.

function request(id){
  if(id=="modificar"){
    var respuesta = confirm("¿Está seguro que desea actualizar los datos?");
    if (respuesta){
      var xmlhttp;

      noCuenta = document.getElementById("noCuenta").value;
      dni = document.getElementById("dni").value;
      aniosEstudio = document.getElementById("aniosEstudio").value;
      indiceAcademico = document.getElementById("indiceAcademico").value;
      uvAcumulados = document.getElementById("unidadesValorativas").value;
      planEstudio = document.getElementById("planEstudio").value;
      ciudadOrigen = document.getElementById("ciudadOrigen").value;  
      orientacion = document.getElementById("orientacion").value;
      residenciaActual = document.getElementById("residenciaActual").value;  
      tipoEstudiante = document.getElementById("tipoEstudiante").value;
      correo = document.getElementById("correo").value; 
      mencion = document.getElementById("mencionHonorifica").value;
      telefono = document.getElementById("telefono").value;
      primerNombre =  document.getElementById("primerNombre").value;
      segundoNombre = document.getElementById("segundoNombre").value;
      primerApellido = document.getElementById("primerApellido").value;
      segundoApellido = document.getElementById("segundoApellido").value;
      fechaNacimiento = document.getElementById("dp1").value;
      estadoCivil = document.getElementById("estadoCivil").value;
      nacionalidad = document.getElementById("nacionalidad").value;
      direccion = document.getElementById("direccion").value;

      if(document.getElementById("femenino").checked){
        sexo = 'F';
      } else{
        sexo = 'M';
      }

      params = "noCuenta="+noCuenta+"&dni="+dni+"&aniosEstudio="+aniosEstudio+"&indiceAcademico="+indiceAcademico+
               "&uvAcumulados="+uvAcumulados+"&planEstudio="+planEstudio+"&ciudadOrigen="+ciudadOrigen+"&orientacion="+orientacion+
               "&residenciaActual="+residenciaActual+"&tipoEstudiante="+tipoEstudiante+"&correo="+correo+"&mencion="+mencion+
               "&telefono="+telefono+"&primerNombre="+primerNombre+"&segundoNombre="+segundoNombre+"&primerApellido="+primerNombre+
               "&segundoApellido="+segundoApellido+"&fechaNacimiento="+fechaNacimiento+"&estadoCivil="+estadoCivil+"&nacionalidad="+nacionalidad+
               "&direccion="+direccion+"&sexo="+sexo;

      if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      
      xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          //limpiarControles();
          document.getElementById("alerta").className = "alert alert-success alert-succes";
          document.getElementById("alerta").innerHTML = xmlhttp.responseText;
          cargarEstudiantes();
        }else{
          document.getElementById("alerta").className = "alert alert-danger alert-error";
          document.getElementById("alerta").innerHTML = xmlhttp.responseText;
        }
      }
      
      xmlhttp.open("POST","pages/SecretariaAcademica/MostrarEstudiantes/actualizarEstudiante.php",true);
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      xmlhttp.send(params);
    }

  }
    // fin id modificar
  else if(id=="mostrar"){
    $("#contenedor").load( "pages/SecretariaAcademica/MostrarEstudiantes/mostrarEstudiantes.php");
  }else{
    $("#contenedor").load("pages/SecretariaAcademica/RegistroEstudiantes/RegistroDeEstudiantes.php");
  }
}



$(document).on("click",".elimina",function () {
      var respuesta = confirm("¿Está seguro que desea eliminar el registro seleccionado?");
      if (respuesta){
          var no_cuenta = $(this).parents("tr").find("td").eq(0).attr('id');
          var xmlhttp;
          if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
          } else {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          
          xmlhttp.onreadystatechange = function(){
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              //limpiarControles();
              document.getElementById("alerta").className = "alert alert-success alert-succes";
              document.getElementById("alerta").innerHTML = xmlhttp.responseText;
              cargarEstudiantes();
            }else{
              document.getElementById("alerta").className = "alert alert-danger alert-error";
              document.getElementById("alerta").innerHTML = xmlhttp.responseText;
            }
          }

          xmlhttp.open("POST","pages/SecretariaAcademica/MostrarEstudiantes/eliminarEstudiante.php",true);
          xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
          xmlhttp.send("no_cuenta="+no_cuenta);
      }
});
   
$( document).on("click",".edit_estudiante",function () {
  //alert("editar datos");

  var no_cuenta = $(this).parents("tr").find("td").eq(0).attr('id');
  var xmlhttp;
  
  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {// code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  xmlhttp.onreadystatechange = function(){
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      //limpiarControles();
      //document.getElementById("contenedor").className = "alert alert-success alert-succes";
      document.getElementById("contenedor").innerHTML = xmlhttp.responseText;
      cargarEstudiante(no_cuenta);

    }else{
      document.getElementById("alerta").className = "alert alert-danger alert-error";
      document.getElementById("alerta").innerHTML = xmlhttp.responseText;
    }
  }

  xmlhttp.open("POST","pages/SecretariaAcademica/MostrarEstudiantes/modificacionDeEstudiante.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("no_cuenta="+no_cuenta);
});

function cargarEstudiantes() {
  var xmlhttp;

  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {// code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  xmlhttp.onreadystatechange = function(){
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("estudiantes").innerHTML = xmlhttp.responseText;
      //var p = new Paginador(document.getElementById('paginador'),document.getElementById('estudiantes'),4);
      //p.Mostrar();
    }
  }

  xmlhttp.open("GET","pages/SecretariaAcademica/MostrarEstudiantes/cargarEstudiantes.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send();
}

function cargarEstudiante(no_cuenta) {
  var xmlhttp;

  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {// code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  xmlhttp.onreadystatechange = function(){
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("body").onload = cargar(no_cuenta+","+xmlhttp.responseText);
    }
  }

  xmlhttp.open("POST","pages/SecretariaAcademica/MostrarEstudiantes/cargarEstudiante.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("no_cuenta="+no_cuenta.trim());
}

//no_cuenta,dni,aniosEstudio,indiceAcademico,fechaRegistro,uvAcumulados,codPlanEstudio,codCiudadOrigen,codOrientacion,codResidenciaActual,primerNombre,segundoNombre,primerApellido,segundoApellido,sexo,fechaNacimiento,estadoCivil,nacionalidad,direccion
function cargar(cadena){
  array = cadena.split(",");
  noCuenta = array[0];
  dni = array[1];
  aniosEstudio = array[2];
  indiceAcademico = array[3];
  fechaRegistro = array[4];
  uvAcumulados = array[5];
  planEstudio = array[6];
  ciudadOrigen = array[7];
  orientacion = array[8];
  residenciaActual = array[9];
  tipoEstudiante = array[10];
  correo = array[11];
  mencion = array[12];
  telefono = array[13];
  primerNombre =  array[14];
  segundoNombre = array[15];
  primerApellido = array[16];
  segundoApellido = array[17];
  sexo = array[18];
  fechaNacimiento = array[19];
  estadoCivil = array[20];
  nacionalidad = array[21];
  direccion = array[22];
  for (i = 23; i<array.length;i++)
    direccion = direccion + ", " + array[i];
  
  document.getElementById("noCuenta").value = noCuenta.trim();
  document.getElementById("dni").value = dni.trim();
  document.getElementById("aniosEstudio").value = aniosEstudio;
  document.getElementById("indiceAcademico").value = indiceAcademico;
  document.getElementById("unidadesValorativas").value = uvAcumulados;
  document.getElementById("planEstudio").value = planEstudio;
  document.getElementById("ciudadOrigen").value = ciudadOrigen;
  document.getElementById("orientacion").value = orientacion;
  document.getElementById("residenciaActual").value = residenciaActual.trim();
  document.getElementById("tipoEstudiante").value = tipoEstudiante;
  document.getElementById("correo").value = correo.trim();
  document.getElementById("mencionHonorifica").value = mencion;
  document.getElementById("primerNombre").value = primerNombre.trim();
  document.getElementById("segundoNombre").value = segundoNombre.trim();
  document.getElementById("primerApellido").value = primerApellido.trim();
  document.getElementById("segundoApellido").value = segundoApellido.trim();
  document.getElementById("dp1").value = fechaNacimiento.trim();
  document.getElementById("estadoCivil").value = estadoCivil.trim();
  document.getElementById("nacionalidad").value = nacionalidad.trim();
  document.getElementById("direccion").value = direccion.trim();
  document.getElementById("telefono").value = telefono.trim();
  if(sexo=='F'){
    document.getElementById("femenino").checked = true;
    document.getElementById("masculino").checked = false;
  } else{
    document.getElementById("femenino").checked = false;
    document.getElementById("masculino").checked = true;
  }
}

$("#GenerarDocumentos").click(function(event) {
    event.preventDefault();
    window.open('pages/SecretariaAcademica/MostrarEstudiantes/reporte_estudiante.php');
}); 
