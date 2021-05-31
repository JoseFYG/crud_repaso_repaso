<?php 
session_start();
require_once dirname(__DIR__, 2)."/vendor/autoload.php";
use Clases\Clientes;

function mostrarError($txt){
    $_SESSION['errores']=$txt;
    //Por terminar
}

if(isset($_POST['enviar'])){
    //Procesamos el formulario
    $n=ucwords(trim($_POST['nombre']));
    $a=ucwords(trim($_POST['apellidos']));
    $m=trim($_POST['email']);

    if(strlen($n)==0 || strlen($a)==0){
        mostrarError("Rellene los campos !!!");
    }
    $cli=new Clientes();
    if($cli->existeEmail($m)){
      mostrarError("El correo ya esta registrado !!!");
    }
    $cli=setNombre($n);
    $cli=setAepllidos($a);
    $cli=setEmail($m);
    $cli=create();
    $cli=null;
    $_SESSION['mensaje']="Cliente creado";
    header("Location: index.php");
}else{
    //Pintamos el formulario
    require dirname(__DIR__, 2)."/plantillas/cabecera.php";
?>
<h3 class="text-center">Nuevo Cliente</h3>

<div class="container mt-3">
<?php require dirname(__DIR__, 2)."/plantillas/errores.php"; ?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping">Apellidos</span>
  <input type="text" name="apellidos" require class="form-control" placeholder="Apellidos" aria-label="Apellidos" aria-describedby="addon-wrapping">
  <span class="input-group-text" id="addon-wrapping">Nombre</span>
  <input type="text" name="nombre" require class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="addon-wrapping">
</div>
<div class="input-group flex-nowrap mt-2">
  <span class="input-group-text" id="addon-wrapping">Correo Electrónico</span>
  <input type="text" name="email" require class="form-control" placeholder="Correo Electrónico" aria-label="Email" aria-describedby="addon-wrapping">
</div>
<div class="mt-2">
<button type="submit" name="enviar" class="btn btn-success"><i class="fas fa-save"></i> Enviar</button>
<button type="reset" class="btn btn-warning"><i class="fas fa-trash"></i> Limpiar</button>
<a href="index.php" class="btn btn-primary"><i class="fas fa-backward"></i> Volver</a>
</div>
</form>
</div>
</body>
</html>
<?php } ?>