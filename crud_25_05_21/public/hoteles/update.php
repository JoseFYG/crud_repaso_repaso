<?php
if(!isset($_POST['id'])){
    header("Location: index.php");
    die();
}
$id=$_POST['id'];
session_start();
require_once dirname(__DIR__, 2)."/vendor/autoload.php";
use Clases\Clientes;

function mostrarError($txt){
    $_SESSION['errores']=$txt;
    //Por terminar
}

$hoteles=new Hoteles();

if(isset($_POST['guardar'])){
    //Procesamos el formulario
    $n=ucwords(trim($_POST['nombre']));
    $d=ucwords(trim($_POST['direccion']));
    $l=ucwords(trim($_POST['localidad']));

    if(strlen($n)==0 || strlen($a)==0){
        mostrarError("Rellene los campos !!!");
    }
    $hotel=new Hoteles();
    if($cli->existeNombre($m)){
      mostrarError("El hotel ya esta registrado !!!");
    }
    $hotel=setNombre($n);
    $hotel=setDireccion($d);
    $hotel=setLocalidad($l);
    $hotel=setId($id);
    $hotel=update();
    $hotel=null;
    $_SESSION['mensaje']="Cliente actualizado";
    header("Location: index.php");
}else{
    //Pintamos el formulario
    require dirname(__DIR__, 2)."/plantillas/cabecera.php";
?>
<h3 class="text-center">Editar Hotel</h3>

<div class="container mt-3">
<?php require dirname(__DIR__, 2)."/plantillas/errores.php"; ?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']."?id=id"; ?>">
<div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping">Nombre</span>
  <input type="text" name="nombre" require class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="addon-wrapping">
</div>
<div class="input-group flex-nowrap mt-2">
  <span class="input-group-text" id="addon-wrapping">Direccion</span>
  <input type="text" name="direccion" require class="form-control" placeholder="Dirección" aria-label="direccion" aria-describedby="addon-wrapping">
  <span class="input-group-text" id="addon-wrapping">Localidad</span>
  <input type="text" name="localidad" require class="form-control" placeholder="Localidad" aria-label="localidad" aria-describedby="addon-wrapping">
</div>
<div class="mt-2">
<button type="submit" name="guardar" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
<button type="reset" class="btn btn-warning"><i class="fas fa-trash"></i> Limpiar</button>
<a href="index.php" class="btn btn-primary"><i class="fas fa-backward"></i> Volver</a>
</div>
</form>
</div>
</body>
</html>
<?php } ?>