@extends('indexadmin')

@section('contenido')
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
  <title>Reporte Usuarios</title>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.Eliminar').click(function(){
        alert('Eliminacion Exitosa');
      });
      $('.Restaurar').click(function(){
        alert('Restauracion Exitosa');
      });
    });
  </script>
</head>
<style type="text/css">
/*
  Max width before this PARTICULAR table gets nasty. This query will take effect for any screen smaller than 760px and also iPads specifically.
  */
  @media
    only screen 
    and (max-width: 760px), (min-device-width: 768px) 
    and (max-device-width: 1024px)  {

    /* Force table to not be like tables anymore */
    table, thead, tbody, th, td, tr {
      display: block;
    }

    /* Hide table headers (but not display: none;, for accessibility) */
    thead tr {
      position: absolute;
      top: -9999px;
      left: -9999px;
    }

    tr {
      margin: 0 0 1rem 0;

    }
      
    tr:nth-child(odd) {
      background: #ccc;
    }
    
    td {
      /* Behave  like a "row" */
      border: none;
      border-bottom: 1px solid #eee;
      position: relative;
      padding-left: 50%;
    }

    td:before {
      /* Now like a table header */
      position: absolute;
      /* Top/left values mimic padding */
      top: 0;
      left: 6px;
      width: 45%;
      padding-right: 10px;
      white-space: nowrap;
    }

    /*
    Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
    */
    td:nth-of-type(1):before { content: "Clave"; }
    td:nth-of-type(2):before { content: "Foto de Perfil"; }
    td:nth-of-type(3):before { content: "Nombre"; }
    td:nth-of-type(4):before { content: "Apellido Paterno"; }
    td:nth-of-type(5):before { content: "Apellido Materno"; }
    td:nth-of-type(6):before { content: "Fecha de Nacimiento"; }
    td:nth-of-type(7):before { content: "Genero"; }
    td:nth-of-type(8):before { content: "Estado"; }
    td:nth-of-type(9):before { content: "Municipio"; }
    td:nth-of-type(10):before { content: "Direccion"; }
    td:nth-of-type(11):before { content: "Tipo de Usuario"; }
    td:nth-of-type(12):before { content: "Correo"; }
    td:nth-of-type(13):before { content: "Contraseña"; }
    td:nth-of-type(14):before { content: "Operaciones"; }
  }    
</style>

<body>
<div class="table-responsive">
  <table role="table">
    <thead role="rowgroup" >
      <tr role="row">
        <th role="columnheader">Clave</th>
        <th role="columnheader">Foto de Perfil</th>
        <th role="columnheader">Nombre</th>
        <th role="columnheader">Apellido Paterno</th>
        <th role="columnheader">Apellido Materno</th>
        <th role="columnheader">Fecha de Nacimiento</th>
        <th role="columnheader">Genero</th>
        <th role="columnheader">Estado</th>
        <th role="columnheader">Municipio</th>
        <th role="columnheader">Direccion</th>
        <th role="columnheader">Tipo de Usuario</th>
        <th role="columnheader">Correo</th>
        <th role="columnheader">Contraseña</th>
        <th role="columnheader" colspan="3">Operaciones</th>
      </tr>
    </thead>
    <tbody role="rowgroup">
    @foreach($consulta as $u)
      <tr role="row">
        <td role="cell">{{$u->id_usuario}}</td>
        <td role="cell"><img src="{{asset('archivos/'.$u->archivo)}}" height=50 width=50></td>
        <td role="cell">{{$u->nombre}}</td>
        <td role="cell">{{$u->apellidop}}</td>
        <td role="cell">{{$u->apellidom}}</td>
        <td role="cell">{{$u->fn}}</td>
        <td role="cell">{{$u->genero}}</td>
        <td role="cell">{{$u->estado}}</td>
        <td role="cell">{{$u->municipio}}</td>
        <td role="cell">{{$u->direccion}}</td>
        <td role="cell">{{$u->tipo_u}}</td>
        <td role="cell">{{$u->correo}}</td>
        <td role="cell">{{$u->password}}</td>
        <td role="cell">
<a href="{{url('modificausuario',['id_usuario'=>$u->id_usuario])}}" class="btn btn-light"> Modificar<img src="{{asset('icons/062-pencil.png')}}" width="20" height="20"></a>
</td>
<td role="cell">

<a href="{{url('eliminauser',['id_usuario'=>$u->id_usuario])}}"class="Eliminar btn btn-outline-danger">Eliminar 
<img src="{{asset('icons/019-close.png')}}" width="20" height="20"></a>
</td>
<td role="cell">

<a href="{{url('restableceruser',['id_usuario'=>$u->id_usuario])}}" class="Restaurar btn btn-outline-dark"> 
  Restaurar<img src="{{asset('icons/088-time.png')}}" width="20" height="20"></a></td> 
        
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@stop