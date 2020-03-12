<!DOCTYPE html>
<html>

<head>
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
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

  <title>Modifica Usuario</title>
  <style type="text/css">
    .form-control {
      width: all;
    }
  </style>
</head>

<body>
  <div class="container">
    <center>
      <h2>Modificacion de Usuario</h2>
    </center>
    <table class="table">
      <form method="POST" action="{{route('editausuario')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <tr>

          <td colspan="3">

            <h4>Datos Necesarios</h4>
            <br>
            <label class="control-label" for="nombre">Clave:</label>
            <input type="text" class="form-control"
                name="id_usuario" value="{{$consulta->id_usuario}}" readonly>

          </td>

        </tr>
        <tr>
          <div class="form-group">
            <td>
              <label class="control-label" for="nombre">Nombre:</label>
              <input type="text" class="form-control" id="Nombre" placeholder="Ingresa el Nombre"
                name="nombre" value="{{$consulta->nombre}}">
            </td>
          </div>
          <div class="form-group">
            <td>
              <label class="control-label" for="apellidop">Apellido Paterno:</label>
              <input type="text" class="form-control" id="ApellidoP"
                placeholder="Ingresa el Apellido Paterno" name="apellidop" value="{{$consulta->apellidop}}">
            </td>
          </div>
          <div class="form-group">
            <td>
              <label class="control-label" for="apellidom">Apellido Materno:</label>
              <input type="text" class="form-control" id="ApellidoM"
                placeholder="Ingresa el Apellido Materno" name="apellidom" value="{{$consulta->apellidom}}">
            </td>
          </div>

        </tr>
        <tr>
          <div class="form-group">
            <td>
              <label class="control-label" for="genero">Genero:</label><br>
              <input type="radio" name="genero" id="Genero" value="masculino" checked>Masculino<br>
              <input type="radio" name="genero" id="Genero" value="femenino">Femenino
            </td>
          </div>
          <div class="form-group">

            <td>
              <label class="control-label" for="fn">Fecha de Nacimiento:</label><br>
              <input type="date" name="fn" value="{{$consulta->fn}}">
            </td>

          </div>
          <div class="form-group">

            <td>
              <label class="control-label" for="fn">Foto de Perfil:</label><br>
              <input type="file" name="archivo">
            </td>

          </div>
        </tr>
        <tr>

          <td colspan="3">

            <h4>Localidad</h4>
            <div readonly><strong>Su estado actual es:</strong> {{$consulta->estado}} <strong>y municipio es:</strong> {{$consulta->municipio}} </div>
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
              <label class="control-label" for="direccion">Direccion:</label>
              <input type="text" class="form-control" id="Direccion"
                placeholder="Ingresa la Direccion" name="direccion" value="{{$consulta->direccion}}">
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
                name="correo" value="{{$consulta->correo}}">
            </td>
          </div>
          <div class="form-group">
            <td>
              <label class="control-label" for="password">Contraseña:</label>
              <input type="password" class="form-control" id="Password" placeholder="Ingrese la Contraseña"
                name="password" value="{{$consulta->password}}">
            </td>
          </div>

        </tr>
        <tr>
          <div class="form-group">
            <td><input type="submit" class="btn btn-outline-primary" value="Guardar"></td>
          </div>
        </tr>
      
      </form>
    </table>


  </div>
  <style type="text/css">
    .form-control {
      width: 300px;
    }

  </style>
</body>

</html>