<?php
require_once("../model/product.php");

$product = new Product();

if(isset($_GET["option"])){
    switch($_GET["option"]) {
        case "all":
            echo json_encode($product->getAll());
            break;
        case "id":
            echo json_encode($product->getByID($_POST["productID"]));
            break;
        case "insertProd":
            insertProductsRandom($product);            
    }
}

 function insertProductsRandom($model){
    $productNames = ["Laptop 1","Macbook pro","HP","DELL","Mac","Asus","Lenovo","Lanix"];
                $models = ["Apple iMac", "Aurora Alienware","Inspiron One 2320","XPS One 27 Touch","Compact Desktop",
                "Gateway ZX4300-01e","HP Compaq 500B E6500","HP Omni 220 Quad","HP Touchsmart 600","HP TouchSmart 9300 Elite","Lenovo IdeaCentre A720",
                "Lenovo IdeaCentre B320","Sony VAIO Serie", "Samsung Serie 7 All-in-One","Dell XPS 8950","HP Omen 45L","Apple iMac M1 24 pulgadas",
                "HP Pavilion Gaming Desktop","Lenovo ThinkStation P620"];

                $specifications = ["Procesador Core i3 o Core i5","Memoria RAM de 4 GB a 8 GB","Disco duro de 500 GB","Entradas USB 3.0, multilector de tarjetas, USB-C",
                    "Pantalla Ultra HD","Bateria 10 horas","BLUETOOTH","NUEVA 1 año de Garantía","Gráficos Radeon 2GB VIDEO DEDICADO","Memorias: SD multiformato",
                    "Bateria: 3-cell, 41 Wh Li-ion","Almacenamiento 1TB (500GB INTERNO + 500GB EXTERNO)","COLOR GRIS","Pantalla 14 HD 1366 X 768","Procesador Intel® Core™ i3 de 11.ª generación",
                    "Unidad de estado sólido PCIe® NVMe™ de 256 GB","Windows 11 Home Single Language"];

        for($x = 0; $x < 200; $x++){
         $model->addProducts($productNames[mt_rand(0,count($productNames) -1)],$models[mt_rand(0,count($models) -1)],rand(10000,60000),
            rand(10,400),rand(0,100),$specifications[mt_rand(0,count($specifications) -1)],rand(1,3));
         }
}

?>