<?php
namespace Provider;
use \PDO;
use \PDOException;
abstract class Database
{
    private $host=DB_HOST;
    private $user=DB_USER;
    private $dbname=DB_NAME;
    private $password=DB_PASS;
    private $connexion;
    private $error;
    private $statement;
    function __construct()
    {
        $dsn='mysql:host='.$this->host.';dbname='.$this->dbname.'';
        // $options=array(
        //     PDO::ATTR_PERSISTENT=>true,
        //     PDO::ATTR_ERRMODE=>PDO::ATTR_EXCEPTION,
        //     PDO::ATTR_ERRMODE=>PDO::ATTR_WARNING
        // );
        try
        {
            $this->connexion=new PDO($dsn,$this->user,$this->password);
        }
        catch(PDOException $e)
        {
            $this->error=$e->getMessage();
            echo $this->error;
        }
    }
    protected function query($query)
    {
        $this->statement=$this->connexion->prepare($query);
    }
    protected function exec()
    {
        $this->statement->execute();
    }
    protected function resultSet()
    {
        $this->exec();
        $result=$this->statement->fetchAll(PDO::FETCH_OBJ);
        $this->statement->closeCursor();
        return $result;
    }
    protected function single()
    {
        $this->exec();
        $result=$this->statement->fetch(PDO::FETCH_OBJ);
        $this->statement->closeCursor();
        return $result;
    }
    protected function lastIdinserted()
    {
        return $this->connexion->lastInsertId();// A la place de connexion on peut mettre statement
    }
    protected function Count()
    {
        return $this->statement->rowCount();
    }
    protected function bind($param,$value,$type=null)
    {
        if(is_null($type))
        {
            switch(true)
            {
                case is_int($value):
                    $type=PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type=PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type=PDO::PARAM_NULL;
                    break;
                default:
                    $type=PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($param,$value,$type);
    }


    protected function beginTransaction()
    {
        return $this->connexion->beginTransaction();
    }

    protected function endTransaction()
    {
        return $this->connexion->commit();
    }

    protected function cancelTransaction()
    {
        return $this->connexion->rollBack();
    }
}