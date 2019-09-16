<?php
include_once 'Sql.php';
include_once 'config.php';

class MySql extends Sql
{
    protected $connection;
    protected $obj;

    function __construct()
    {
        parent::__construct();
        $this->connection = new PDO("mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DATABASE /*. ";charset=utf8_unicode_ci",*/, USER_NAME, USER_PASS);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function select()
    {
        parent::select();
        $result = array();
        $select = $this->connection->prepare($this->querySelect);

        $select->execute();
        $index = 0;
        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
            $result[$index] = $row;
            $index++;
        }
        return $result;
    }

    function insert()
    {
        parent::insert();
        $result = "";
        $insert = $this->connection->prepare($this->queryInsert);
        $insert->bindParam(':login', $this->values[0]);
        $insert->bindParam(':password', hash('sha256', $this->values[1]));
        if ($insert->execute()) {
            $result = "The field was added";
        } else {
            $result = "The field was NOT added";
        }
        return $result;
    }

}

?>