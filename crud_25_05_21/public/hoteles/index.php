<?php
session_start();
require_once dirname(__DIR__, 2)."/vendor/autoload.php";
use Clases\Hoteles;

$hotel= new Hoteles();
$todos=$hotel->getTodos();
$hotel=null;

require dirname(__DIR__, 2)."/plantillas/cabecera.php";
?>
<h3 class="text-center">Clientes registrados</h3>
<div class="container mt-3">
<a href="create.php" class="btn btn-success mb-2"><i class="fas fa-plus"></i> Nuevo</a>
<table id="tabHoteles" class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Nombre</th>
      <th scope="col">Dirección</th>
      <th scope="col" colspan="2">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php
  while($fila=$todos->fetch(PDO::FETCH_OBJ)){
    echo <<< CADENA
    <tr>
      <th scope="row">{$fila->id}</th>
      <td>{$fila->nombre}</td>
      <td>{$fila->direccion}, {$fila->localidad}</td>
      <td>
      <form name"as" action="borrar.php" method="POST" class="form form-inline">
      <a href="edit.php?id=($fila->id)" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
      <input type="hidden" name="id" value={$fila->id}
      <a href="delete.php?id=($fila->id)" class="btn btn-danger"><i class="fas fa-edit"></i></a>
      </td>
    </tr>
    CADENA;
  }
  ?>
  </tbody>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#tabHoteles').DataTable();
} );
</script>
</body>
</html>