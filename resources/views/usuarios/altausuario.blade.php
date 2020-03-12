@extends('indexadmin')

@section('contenido')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
		crossorigin="anonymous"></script>


		<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>


	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Alta Usuario</title>
	<style type="text/css">
	
	</style>
</head>		
<body>
	            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
	<div class="container">
		<center>
			<h2>Alta Usuario</h2>
		</center>
		<table class="table">
			<form method="POST" action="{{route('guardarusuario')}}" enctype="multipart/form-data">
				{{csrf_field()}}
				<tr>
					<td colspan="3">
						<h4>Datos Necesarios</h4>
					</td>
				</tr>
				<tr>
					<div class="form-group row col-sm-2">
						<td>
							<label class="control-label" for="nombre">Nombre:</label>
							<input type="text" class="form-control" id="Nombre" placeholder="Ingresa el Nombre"
								name="nombre" onblur="tamnombre()">
							<div id="namerror"></div>
						</td>
					</div>
					<div class="form-group">
						<td>
							<label class="control-label" for="apellidop">Apellido Paterno:</label>
							<input type="text" class="form-control" id="ApellidoP"
								placeholder="Ingresa el Apellido Paterno" name="apellidop" onblur="tamapp()">
							<div id="apperror"></div>
						</td>
					</div>
					<div class="form-group">
						<td>
							<label class="control-label" for="apellidom">Apellido Materno:</label>
							<input type="text" class="form-control" id="ApellidoM"
								placeholder="Ingresa el Apellido Materno" name="apellidom" onblur="tamapm()">
							<div id="apmerror"></div>
						</td>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<td>
							<label class="control-label" for="genero">Genero:</label><br>
							<input  type="radio" name="genero" id="Genero" value="masculino" checked>Masculino<br>
							<input  type="radio" name="genero" id="Genero" value="femenino">Femenino
						</td>
					</div>
					<div class="form-group">
						<td>
							<label class="control-label" for="fn">Fecha de Nacimiento:</label><br>
							<input type="date" name="fn" required>
						</td>
					</div>
					<div class="form-group">
						<td>
							<label class="control-label" for="fn">Foto de Perfil:</label><br>
							<input type="file" name="archivo">
						</td>
					</div>
				<tr>
					<div class="form-group">
						<td colspan="3">
							<label class="control-label" for="telefono">Teléfono:</label>
							<input type="text" class="form-control" id="Telefono" placeholder="Ingresa el Teleféno"
								name="telefono" onblur="tamtel()">
							<div id="telerror"></div>
						</td>
					</div>

			
				</tr>
				<tr>
					<td colspan="3">
						<h4>Localidad</h4>
					</td>
				</tr>
				<tr>
					<div class="form-group">
						<td>
							<label class="mdb-main-label" for="estado">Estado:</label><br>
							<select class="mdb-select md-form colorful-select dropdown-primary" name="estado">
								<option value="1">Estado 1</option>
								<option value="2">Estado 2</option>
								<option value="3">Estado 3</option>
							</select>
						</td>
					</div>
					<div class="form-group">
						<td>
							<label class="mdb-main-label" for="municipio">Municpio:</label><br>
							<select class="mdb-select md-form colorful-select dropdown-primary" name="municipio">
								<option value="1">Municpio 1</option>
								<option value="2">Municpio 2</option>
								<option value="3">Municpio 3</option>
							</select>
						</td>
					</div>
					<div class="form-group">
						<td>
							<label class="control-label" for="direccion">Dirección:</label>
							<input type="text" class="form-control" id="Direccion" placeholder="Ingresa la Dirección"
								name="direccion">
								<div id="direcerror"></div>
						</td>
					</div>
				</tr>
				<tr>
					<td colspan="3">
						<h4>Inicio de Sesion</h4>
					</td>
				</tr>
				<tr>
					<div class="form-group">
						<td>
							<label class="control-label" for="tipo_u">Tipo de Usuario:</label><br>
							<input type="radio" name="tipo_u" id="Tipou" value="cliente" checked>Cliente<br>
							<input type="radio" name="tipo_u" id="Tipou" value="admin">Administrador
						</td>
					</div>
					<div class="form-group">
						<td>
							<label class="control-label" for="correo">Correo:</label>
							<input type="email" class="form-control" id="Correo" placeholder="Ingresa el correo"
								name="correo" required>
						</td>
					</div>
					<div class="form-group">
						<td>
							<label class="control-label" for="password">Contraseña:</label>
							<input required type="password" class="form-control" id="Password"
								placeholder="Ingrese la Contraseña" name="password">
						</td>
					</div>
				</tr>
				<tr >
					<div class="form-group">
						<td colspan="2"><input type="submit" class="btn btn-outline-primary" id="Guardar"  value="Guardar"></td>
					</div>
					
				</tr>
			</form>
		</table>
	</div>
</div>
</div>
</div>	
<style type="text/css">
		.form-control {
			width: 265px;
		}
	</style>

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
@stop
