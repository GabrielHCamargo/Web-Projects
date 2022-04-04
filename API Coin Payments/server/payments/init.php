<?php

    header('Access-Control-Allow-Origin: *');

    require "Coin.php";
    require "vendor/autoload.php";

    use Illuminate\Database\Capsule\Manager as Capsule;

    $capsule = new Capsule;
    $capsule->addConnection(
        [
            'driver' => "mysql",
            'host' => "SEU HOST",
            'database' => "SEU BANCO DE DADOS",
            'username' => "SEU USUÁRIO",
            "password" => "SUA SENHA",
        ]
    );
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    require "Payment.php";

    $coin = new CoinPaymentsAPI();
    $coin->Setup(
        "CHAVE PRIVADA",
        "CHAVE PÚBLICA"
    );

?>