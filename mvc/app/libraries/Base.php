<?php

/**
 * Clase para conectarse a la base de datos
 */
class Base
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        //Configurar la conexión
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->password, $options);

            //Solucion para caracteres extraños
            $this->dbh->exec('set  names utf8');
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
    //Preparamos la consulta
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }
    //Vincula la consulta con bind
    public function bind($param, $value, $type=null)
    {
        if (is_null($tipo)) {
            switch (true) {
                case is_int($value):
                    $tipo = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $tipo = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $tipo = PDO::PARAM_NULL;
                    break;
                default:
                    $tipo = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    //Ejecuta la consulta
    public function execute()
    {
        return $this->stmt->execute();
    }

    //Obtener los registros de la consulta
    public function registers()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    //Obtener un registro
    public function register()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //Obtener la cantidad de registros
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
