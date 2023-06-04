<?php 
    require_once "connection_dbh.php"; 

    ob_start();

    $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : 'application/json';
    
    if ($contentType === "application/json") {
        $jsondata = trim(file_get_contents("php://input"));
        $data = json_decode($jsondata, true);

        if (strlen($data) >= 3) {
            $sql = "SELECT * FROM nabil_products
                    WHERE titre LIKE '$data%'
            ";

            $sth = $dbh -> query($sql);

            $result = $sth -> fetchAll(PDO::FETCH_ASSOC);
        } else {
            $result = [];
        }

        header('Content-Type: text/plain; charset=UTF-8');
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
?>