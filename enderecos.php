<?php

use Alura\Banco\Modelo\Endereco;

require_once "autoload.php";

$endereco1 = new Endereco('Montes Claros', 'Centro', 'Rua ali', '2021');
$endereco2 = new Endereco('Montes Claros', 'São Judas', 'Rua certa', '2022');

$endereco1->estado = "Minas Gerais";
$endereco2->estado = "MG";


echo $endereco1 . PHP_EOL;
echo $endereco2 . PHP_EOL;