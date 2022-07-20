<?php
require_once 'config.php';
    class DBConnection {

        function ConnectionToDB(){
            try {
                $connection = new PDO('mysql:host='.constant('DB_HOST').'; dbname='.constant('DB'), constant('DB_USER'), constant('DB_PASS'));
                $connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $connection;
            }
            catch(PDOException $e) {
                 echo 'ERROR: ' . $e->getMessage();
            }

        }

    }
?>
