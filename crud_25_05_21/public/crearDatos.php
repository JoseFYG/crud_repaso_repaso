<?php
require dirname(__DIR__).'/vendor/autoload.php';
use Clases\Datos;
$clientes=new Datos('clientes', 50);
echo "<h2>Clientes Creados</h2>";
$hoteles=new Hoteles('hoteles', 10);
echo "<h2>Hoteles Creados</h2>";