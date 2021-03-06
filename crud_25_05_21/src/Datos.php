<?php
namespace Clases;
require dirname(__DIR__).'/vendor/autoload.php';
use Clases\Clientes;
use Faker\Factory;

class Datos {
    public $faker;
    public function __construct($tabla, $cantidad){
        $this->faker=Factory::create('es_ES');
        switch($tabla){
            case 'clientes': 
                $this->crearClientes($cantidad);
                break;
        }
    }
    public function crearClientes($c){
        $cliente =new Clientes();
        if($cliente->hayClientes()){
            for ($i=0; $i < $c; $i++) { 
                $cliente->setApellidos($this->faker->lastName." ".$this->faker->lastName);
                $cliente->setNombre($this->faker->firstName());
                $cliente->setEmail($this->faker->unique()->freeEmail);
                $cliente->create();
            }
        }
        $cliente=null;
    }
    public function crearHoteles($c){
        $hoteles =new Hoteles();
        $hoteles->deleteAll();
        
    }
}