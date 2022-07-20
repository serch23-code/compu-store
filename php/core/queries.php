<?php
class EntityBase extends Connect{
    private $table;
    private $connection;

    public function __construct($table) {
        $this->table=(string) $table;
        $this->connection = parent::connectToDataBase();
    }

    public function getAll(){
        $query = ("SELECT * FROM $this->table");
        $query = $connection->prepare($query);
        $query->execute();
        $resulset = $query->fetchAll();

        return json_encode($resulset);
    }
}
?>