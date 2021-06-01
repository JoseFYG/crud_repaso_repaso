<?php
namespace Clases;
use PDOException;
use PDO;
class Hoteles extends Conexion{
    private $id, $nombre, $apellidos, $email;

    public function __construct(){
        parent::__construct();
    }

    public function create(){
        $c="insert into hoteles(nombre, localidad, direccion) values (:n, :l, :d)";
        $stmt=parent::$conexion->prepare($c);
        try {
            $stmt->execute([
                ":n"=>$this->nombre,
                ":l"=>$this->localidad,
                ":d"=>$this->direccion
            ]);
        } catch (PDOException $ex) {
            die("Error al conectar con la bbdd: ".$ex->getMessage());
        }
    }
    public function read($id){
        $c="select * from hoteles";
        $stmt=parent::$conexion->prepare($c);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("ERROR");
        }
        $fila=$stmt->fetch(PDO::FETCH_OBJ);
        return $fila;
    }
    public function update(){
        $c="update hoteles(nombre, localidad, direccion) values (:n, :l, :d)";
        $stmt=parent::$conexion->prepare($c);
        try {
            $stmt->execute([
                ":n"=>$this->nombre,
                ":l"=>$this->localidad,
                ":d"=>$this->direccion
            ]);
        } catch (PDOException $ex) {
            die("Error al conectar con la bbdd: ".$ex->getMessage());
        }
    }
    public function delete(){
        $c="delete from hoteles where id=:i";
        $stmt=parent::$conexion->prepare($c);
        try {
            $stmt->execute([
                ":i"=>$this->id
            ]);
        } catch (PDOException $ex) {
            die("ERROR al borrar cliente");
        }
    }
    public function hayHotel(){
        $c="select * from hoteles";
        $stmt=parent::$conexion->prepare($c);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("ERROR");
        }
        $datos=$stmt->fetch(PDO::FETCH_OBJ);
        return ($datos==null)? true:false;
    }

    public function getTodos(){
        $c="select * from hoteles order by localidad, nombre";
        $stmt=parent::$conexion->prepare($c);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al devolver clientes");
        }
        return $stmt;
    }

    public function existeNombre($n){
        $c="select * from hoteles where nombre=:n";
        $stmt=parent::$conexion->prepare($c);
        try {
            $stmt->execute([
                ":n"=>$this->$n
            ]);
        } catch (PDOException $ex) {
            die("ERROR");
        }
        $fila=$stmt->fetch(PDO::FETCH_OBJ);
        return ($fila)? false:true;
    }

    /*public function existeEmailU($m, $id){
        $c="select * from clientes where email=:m AND id=:i";
        $stmt=parent::$conexion->prepare($c);
        try {
            $stmt->execute([
                ":m"=>$m,
                ":i"=>$id
            ]);
        } catch (PDOException $ex) {
            die("ERROR");
        }
        $fila=$stmt->fetch(PDO::FETCH_OBJ);
        return ($fila)? true:false;
    }*/

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}