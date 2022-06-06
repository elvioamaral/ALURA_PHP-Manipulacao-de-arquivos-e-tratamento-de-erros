<?php

use Alura\Banco\Modelo\Conta\ContaCorrente;
use Alura\Banco\Modelo\Conta\ContaPoupanca;
use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\Endereco;
use Alura\Banco\Modelo\CPF;

require_once 'autoload.php';

$endereco = new Endereco('Montes Claros', 'meu bairro', 'minha rua', '2022');

$elvio = new Titular(new CPF("123.456.789-10"), "Elvio Amaral", $endereco);
$primeiraConta = new ContaCorrente($elvio);

$primeiraConta->deposita(500);
$primeiraConta->saca(300);

echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;
echo Conta::recuperaQtdContas() . PHP_EOL;

$debora = new Titular(new CPF("789.456.123-99"), "Debora Amaral", $endereco);
$segundaConta = new ContaCorrente($debora);
var_dump($segundaConta);

$outra = new ContaPoupanca(new Titular(new CPF('123.654.789-01'), 'Abcdefg', $endereco));
unset($segundaConta);
echo Conta::recuperaQtdContas();