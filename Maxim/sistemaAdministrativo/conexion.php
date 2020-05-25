<?php

class conexion
{
    private $host = "db5000479684.hosting-data.io";
    private $usuario = "dbu802425";
    private $clave = "F3t3s2020";
    private $db = "dbs459651";
    private $port = "3306";
    public $conexion;

    /**
     * conexion constructor.
     * @param string $host
     */
    public function __construct()
    {
        $this->conexion = new  mysqli($this->host, $this->usuario, $this->clave, $this->db,$this->port)
        or die ("noconecta");
        $this->conexion->set_charset();
    }



    //INSERTAR
    public function insertar($tabla, $datos)
    {
        $resultado = $this->conexion->query("INSERT INTO ".$this->db.".$tabla VALUES ($datos)") or die ($this->conexion->error);
        if ($resultado)
            return true;
        return false;
    }

    //BORRAR
    public function borrar($tabla, $condicion)
    {
        $resultado = $this->conexion->query("DELETE FROM $tabla WHERE $condicion") or die ($this->conexion->error);
        if ($resultado)
            return true;
        return false;
    }

    //ACTUALIZAR
    public function actualizar($tabla, $campos, $condicion)
    {
        $resultado = $this->conexion->query("UPDATE $tabla SET $campos WHERE $condicion") or die ($this->conexion->error);
        if ($resultado)
            return true;
        return false;
    }

    //BUSCAR
    public function buscar($tabla, $condicion=' 1=1 ')
    {
        $query="SELECT * FROM $tabla WHERE $condicion ;";
        $resultado = $this->conexion->query($query) or die ($query." Error ".$this->conexion->error);
        if ($resultado)
            return $resultado;
        return false;
    }
}
