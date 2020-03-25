@extends('indexadmin')

@section('contenido')
<title>Alta Usuario</title>
<body>
	<form method="post" action="{{route('guardarusuario')}}" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-12 col-lg-12 col-md-12">
						<center>
							<h2>Alta Usuario</h2>
						</center>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-12 col-lg-12 col-md-12">
						<strong>Datos Necesarios*</strong>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-12 col-lg-4 col-md-12">
						<div class="form-group">
							<label class="control-label" for="nombre">Nombre:</label>
							<input type="text" class="form-control" id="Nombre" placeholder="Ingresa el Nombre"
								name="nombre" onblur="tamnombre()">
							<div id="namerror"></div>
						</div>
					</div>
					<div class="col-sm-12 col-lg-4 col-md-12">
						<div class="form-group">
							<label class="control-label" for="apellidop">Apellido Paterno:</label>
							<input type="text" class="form-control" id="ApellidoP"
								placeholder="Ingresa el Apellido Paterno" name="apellidop" onblur="tamapp()">
							<div id="apperror"></div>
						</div>
					</div>
					<div class="col-sm-12 col-lg-4 col-md-12">
						<div class="form-group">
							<label class="control-label" for="apellidom">Apellido Materno:</label>
							<input type="text" class="form-control" id="ApellidoM"
								placeholder="Ingresa el Apellido Materno" name="apellidom" onblur="tamapm()">
							<div id="apmerror"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-lg-4 col-md-12">
						<div class="form-group">
							<label class="control-label" for="genero">Genero:</label><br>
							<input type="radio" name="genero" id="Genero" value="masculino" checked>Masculino<br>
							<input type="radio" name="genero" id="Genero" value="femenino">Femenino
						</div>
					</div>
					<div class="col-sm-12 col-lg-4 col-md-12">
						<div class="form-group">
							<label class="control-label" for="fn">Fecha de Nacimiento:</label><br>
							<input type="date" name="fn" required>
						</div>
					</div>
					<div class="col-sm-12 col-lg-4 col-md-12">
						<div class="form-group">
							<label class="control-label" for="telefono">Teléfono:</label>
							<input type="text" class="form-control" id="Telefono" placeholder="Ingresa el Teleféno"
								name="telefono" onblur="tamtel()">
							<div id="telerror"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-lg-12 col-md-12">
						<div class="form-group">
							<center>
								<label class="control-label" for="fn">Foto de Perfil:</label><br>
								<input type="file" name="archivo">
							</center>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-lg-12 col-md-12">
						<strong>Localidad*</strong>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6 col-lg-4 col-md-6">
						<div class="form-group">
							<label class="mdb-main-label" for="estado">Estado:</label><br>
							<select class="mdb-select md-form colorful-select dropdown-primary" name="estado">
								<option value="1">Estado 1</option>
								<option value="2">Estado 2</option>
								<option value="3">Estado 3</option>
							</select>
						</div>
					</div>
					<div class="col-sm-6 col-lg-4 col-md-6">
						<div class="form-group">
							<label class="mdb-main-label" for="municipio">Municipio:</label><br>
							<select class="mdb-select md-form colorful-select dropdown-primary" name="municipio">
								<option value="1">Municpio 1</option>
								<option value="2">Municpio 2</option>
								<option value="3">Municpio 3</option>
							</select>
						</div>
					</div>
					<div class="col-sm-12 col-lg-4 col-md-12">
						<div class="form-group">
							<label class="control-label" for="direccion">Dirección:</label>
							<input type="text" class="form-control" id="Direccion" placeholder="Ingresa la Dirección"
								name="direccion">
							<div id="direcerror"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-lg-12 col-md-12">
						<strong>
							<h4>Inicio de Sesion*</h4>
						</strong>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-12 col-lg-4 col-md-12">
						<div class="form-group">
							<label class="control-label" for="tipo_u">Tipo de Usuario:</label><br>
							<input type="radio" name="tipo_u" id="Tipou" value="user" checked>Cliente<br>
							<input type="radio" name="tipo_u" id="Tipou" value="admin">Administrador
						</div>
					</div>
					<div class="col-sm-12 col-lg-4 col-md-12">
						<div class="form-group">
							<label class="control-label" for="correo">Correo:</label>
							<input type="email" class="form-control" id="Correo" placeholder="Ingresa el correo"
								name="correo" required>
						</div>
					</div>
					<div class="col-sm-12 col-lg-4 col-md-12">
						<div class="form-group">
							<label class="control-label" for="password">Contraseña:</label>
							<input required type="password" class="form-control" id="Password"
								placeholder="Ingrese la Contraseña" name="password">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-lg-4 col-md-12">
						<input type="submit" class="btn btn-outline-primary" id="Guardar" value="Guardar">
					</div>
				</div>
			</div>
		</div>
	</form>
	<script type="text/javascript">


	
const $inputell = document.querySelector("#Telefono");
const patrontell = /[0-9]/;

$inputell.addEventListener("keydown",event => {
	if(patrontell.test(event.key)){
		document.getElementById('Telefono').style.border="3px solid #00cc00";
	}else{
		if(event.keyCode==0){
			//alert("backspace");

		}else{
			event.preventDefault();
			//var tcla=event.keyCode;
			//alert(tcla);

		}

	}
});

function tamtel(){
	var tam= document.getElementById("Telefono").value;
	while (tam == 0) {
	
	document.getElementById('telerror').innerHTML = "<i>EL campo Telefono es requerido</i>";

	return false;
}
	if(tam.length>=10 && tam.length<=16){
	
	}else{
		document.getElementById('Telefono').style.border = "3px solid #FF0000";
	document.getElementById('telerror').innerHTML = "<i>Error: Debe de Tener un Minimo de 10 caracteres y Maximo de 16 caracteres</i>";
	
	return false;
	}
}
const $nombre = document.querySelector("#Nombre");
const patronnom = /[A-Za-z -]+/;
$nombre.addEventListener("keydown", event => {
if (patronnom.test(event.key)) {
	document.getElementById('Nombre').style.border = "3px solid #00cc00";
} else {
	if (event.keyCode == 0) {
		//alert("backspace");
	} else {
		event.preventDefault();
		//var tcla=event.keyCode;
		//alert(tcla);
	}

}
});
function tamnombre() {
var tam = document.getElementById("Nombre").value;
while (tam == 0) {
	document.getElementById('namerror').innerHTML = "<i>EL campo Nombre es requerido</i>";
	
	return false;
}
if (tam.length >= 3 && tam.length <= 30) {
	document.getElementById("namerror").innerHTML = "";
} else {
	
	document.getElementById('Nombre').style.border = "3px solid #FF0000";
	
	document.getElementById('namerror').innerHTML = "<i>Error: Debe de Tener un Minimo de 3 caracteres y Maximo de 30 caracteres</i>";
	return false;
}
}

const $inputapp = document.querySelector("#ApellidoP");
const patronapp = /[A-Za-z -]/;
$inputapp.addEventListener("keydown", event => {
if (patronapp.test(event.key)) {
	document.getElementById('ApellidoP').style.border = "3px solid #00cc00";
} else {
	if (event.keyCode == 0) {
		//alert("backspace");
	} else {
		event.preventDefault();
		//var tcla=event.keyCode;
		//alert(tcla);
	}

}
});
function tamapp() {
var tam = document.getElementById("ApellidoP").value;
while (tam == 0) {
	document.getElementById('apperror').innerHTML = "<i>EL campo Apellido Paterno es requerido</i>";
	
	return false;
}
if (tam.length >= 5 && tam.length <= 30) {
	document.getElementById("apperror").innerHTML = "";
} else {
	document.getElementById('ApellidoP').style.border = "3px solid #FF0000";
	
	document.getElementById('apperror').innerHTML = "<i>Error: Debe de Tener un Minimo de 5 caracteres y Maximo de 35 caracteres</i>";
	return false;
}
}
const $inputapm = document.querySelector("#ApellidoM");
const patronapm = /[A-Za-z -]/;
$inputapm.addEventListener("keydown", event => {
if (patronapp.test(event.key)) {
	document.getElementById('ApellidoM').style.border = "3px solid #00cc00";
} else {
	if (event.keyCode == 0) {
		//alert("backspace");
	} else {
		event.preventDefault();
		//var tcla=event.keyCode;
		//alert(tcla);
	}
}
});
function tamapm() {
var tam = document.getElementById("ApellidoM").value;
while (tam == 0) {
	document.getElementById('apmerror').innerHTML = "<i>EL campo Apellido Materno es requerido</i>";
	
	return false;
}
if (tam.length >= 5 && tam.length <= 30) {
	document.getElementById("apmerror").innerHTML = "";

} else {
	document.getElementById('ApellidoM').style.border = "3px solid #FF0000";
	
	document.getElementById('apmerror').innerHTML = "<i>Error: Debe de Tener un Minimo de 5 caracteres y Maximo de 35 caracteres</i>";
	return false;
}
}

</script>
</body>
@stop