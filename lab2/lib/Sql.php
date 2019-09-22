<?php

class Sql
{
    protected $fields;
    protected $table;
    protected $values;
    protected $querySelect;
    protected $queryInsert;

    function __construct()
    {
        $this->fields = array();
        $this->values = array();
        $this->table = "";
    }


    public function setFields($field)
    {
        if ($field != "*" && $field != "") {
            array_push($this->fields, $field);
            return $this;
        } else {
            return false;
        }
    }

    public function setValues($value)
    {
        if ($value != "") {
            array_push($this->values, $value);
            return $this;
        } else {
            return false;
        }
    }

    public function getValues()
    {
        return $this->values;
    }

    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    public function getTable()
    {
        return $this->table;
    }


    public function select()
    {
        $this->querySelect = "SELECT id, login, password FROM " . $this->table;
    }

    function insert()
    {
        $this->queryInsert = "INSERT" . " INTO " . $this->table . "(login, password) " . "VALUES (:login, :password);";
    }

}

?>