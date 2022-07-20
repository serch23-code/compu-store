<?php

require_once '../../config/db.php';

class Product {
    private $table = 'product';
	private $conection;

    private function getConection(){
        $dataBaseConnection = new DBConnection();
        $this->conection = $dataBaseConnection->ConnectionToDB();
    }

    public function getAll(){
		$this->getConection();
		$query = "SELECT * FROM ".$this->table;
		$stmt = $this->conection->prepare($query);
		$stmt->execute();

		return $stmt->fetchAll();
	}

    public function countAll(){
		$this->getConection();
		$query = "SELECT count(*) as total FROM ".$this->table;
		$stmt = $this->conection->prepare($query);
		$stmt->execute();

		return $stmt->fetchAll();
	}

    public function getByID($productID){
        $this->getConection();
        $query = "SELECT *  FROM product WHERE id = '$productID'";
        $stmt = $this->conection->prepare($query);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }


    public function addProducts(
                        $name,
                        $model,
                        $price,
                        $stock,
                        $totalVisits,
                        $specification,
                        $categoryID
                                ){
            $this->getConection();
            $query = "INSERT INTO $this->table(name,model,price,stock,total_visits, specification,category_id) VALUES(?,?,?,?,?,?,?)";
            $stmt = $this->conection->prepare($query);
            $stmt->execute([ $name,
                            $model,
                            $price,
                            $stock,
                            $totalVisits,
                            $specification,
                            $categoryID]);            
    }

}
?>