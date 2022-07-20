<?php 
require_once '../../config/db.php';

class Comment {
    private $table = 'comments';
	private $connection;

    private function getConection(){
        $dataBaseConnection = new DBConnection();
        $this->connection = $dataBaseConnection->ConnectionToDB();
    }

    public function addComments($text,$name,$rating,$productID){
        $this->getConection();
        $query = "INSERT INTO $this->table(text,name,rating,product_id) VALUES(?,?,?,?)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([$text,$name,$rating,$productID]);
        
    }
}
?>