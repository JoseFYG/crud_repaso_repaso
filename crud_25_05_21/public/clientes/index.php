<?php
session_start();
require_once dirname(__DIR__, 2)."/vendor/autoload.php";
use Clases\Clientes;

$cli= new Clientes();
$todos=$cli->getTodos();
$cli=null;

require dirname(__DIR__, 2)."/plantillas/cabecera.php";
?>
<h3 class="text-center">Clientes registrados</h3>
<div class="container mt-3">
<a href="create.php" class="btn btn-success mb-2"><i class="fas fa-plus"></i> Nuevo</a>
<table id="tabClientes" class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Correo Electrónico</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php
  while($fila=$todos->fetch(PDO::FETCH_OBJ)){
    echo <<< CADENA
    <tr>
      <th scope="row">{$fila->id}</th>
      <td>{$fila->apellidos}, {$fila->nombre}</td>
      <td>{$fila->email}</td>
      <td>Acciones</td>
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
    $('#tabClientes').DataTable();
} );
</script>
</body>
</html>