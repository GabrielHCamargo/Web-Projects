<?php

    header('Access-Control-Allow-Origin: *');

    include_once("../conexao.php");

    $email = $_GET['email'];
    $status = $_GET['status'];
    $access_key = $_GET['access_key'];

    if ($access_key == $key) {

        $dados = array();

        $query = $pdo->query(
            "SELECT * from pay where email = '$email' and status = '$status'"
        );

        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        
        for ($i=0; $i < count($res); $i++) { 
        
            foreach ($res[$i] as $key => $value) {}
        
                $dados = $res;
        
        }

        echo ($res) ?
        json_encode(
            array(
                "code" => 1, 
                "result"=>$dados
            )
        ) : json_encode(
                array(
                    "code" => 0, 
                    "message"=>"Dados incorretos!"
                )
            );

    } else {

        header("HTTP/1.0 404 Not Found");

    }

?>