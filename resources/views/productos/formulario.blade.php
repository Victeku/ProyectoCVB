@extends('indexadmin')

@section('contenido')
        <meta charset="utf-8">
        <title>Productos</title>
        <meta name="description" content="formulario en laravel">
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
    .form-control {
      width: all;
    }
  </style>
    </head>
<body>
                <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
<div class="container">
<div class="col-sm-8">
<h1>Productos</h1>

<form action="guardar" method="POST">
  {{csrf_field()}}
  
  <!-- <div class="form-group row">
    <label for="inputid_producto" class="col-sm-2 col-form-label">id_Producto</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputid_producto" placeholder="Producto">
    </div>
  </div> -->

  <!-- <div class="form-group row">
    <label for="inputproducto" class="col-sm-2 col-form-label">Producto</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputproducto" placeholder="Producto">
    </div>
  </div> -->
  
  <div class="form-group row">
    <label for="inputNombre_producto" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nombre" id="NombreP" placeholder="Nombre de producto" onblur="tamnombre()">
    </div>
    <div class="col-sm-10" id="namerror"></div>
  </div>

  <div class="form-group row">
    <label for="inputCategoria" class="col-sm-2 col-form-label">Categoria</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="categoria" id="Categoria" placeholder="Categoria">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPrecio" class="col-sm-2 col-form-label">Precio</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="precio" id="Precio" placeholder="Precio" onblur="tamprecio()">
    </div>
    <div class="col-sm-10" id="precioerror"></div>
  </div>
  
  <div class="form-group row">
    <label for="inputColor" class="col-sm-2 col-form-label">Color</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="color" id="Color" placeholder="Color">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="inputTamaño" class="col-sm-2 col-form-label">Tamaño</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tamano" id="inputTamaño" placeholder="Tamaño">
    </div>
  </div>
<br>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>
</form>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
  
    const $nombre = document.querySelector("#NombreP");
    const patronnom = /[A-Za-z -]+/;
    $nombre.addEventListener("keydown", event => {
      if (patronnom.test(event.key)) {
        document.getElementById('NombreP').style.border = "3px solid #00cc00";
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
      var tam = document.getElementById("NombreP").value;
      while (tam == 0) {
        document.getElementById('namerror').innerHTML = "<i>EL campo Nombre es requerido</i>";
        
        return false;
      }
      if (tam.length >= 3 && tam.length <= 30) {
        document.getElementById("namerror").innerHTML = "";
      } else {
        document.getElementById('NombreP').style.border = "3px solid #FF0000";
        
        document.getElementById('namerror').innerHTML = "<i>Error: Debe de Tener un Minimo de 3 caracteres y Maximo de 30 caracteres</i>";
        return false;
      }
    }

    const $inputell = document.querySelector("#Precio");
            const patrontell = /[0-9]/;

            $inputell.addEventListener("keydown",event => {
                if(patrontell.test(event.key)){
                    document.getElementById('Precio').style.border="3px solid #00cc00";
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

            function tamprecio(){
                var tam= document.getElementById("Precio").value;
        while (tam == 0) {
        
        document.getElementById('precioerror').innerHTML = "<i>EL campo Precio es requerido</i>";
      
        return false;
      }
                if(tam.length>=3 && tam.length<=7){
        
                }else{
          document.getElementById('Precio').style.border = "3px solid #FF0000";
        document.getElementById('precioerror').innerHTML = "<i>Error: Debe de Tener un Minimo de 3 caracteres y Maximo de 7 caracteres</i>";
        
        return false;
                }
            }


</script>
@stop