<?php

    header('Access-Control-Allow-Origin: *');

    use Illuminate\Database\Eloquent\Model as Eloquent;

    class Payment extends Eloquent
    {

        protected $table = "pay";

    }

?>