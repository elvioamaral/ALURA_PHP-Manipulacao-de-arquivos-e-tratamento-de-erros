<?php

use Alura\Banco\Modelo\Conta\ContaCorrente;
use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Endereco;
use Alura\Banco\Modelo\NomeInvalidoException;

require_once 'autoload.php';

try {
    $contaCorrente = new ContaCorrente(
        new Titular(
            new CPF('123.456.789-10'),
            'Jão',
            new Endereco(
                'Moc', 'Centro', 'Rua', '2022'
            )
        ));

    /*Aqui mantive o tratamento anterior para esse tipo de exceção.*/
    try {
        $contaCorrente->deposita(100);
    } catch (InvalidArgumentException $exception) {
        echo "Valor a depositar precisa ser positivo, ixpertinho!" . PHP_EOL;
    }

    echo $contaCorrente->recuperaSaldo();

    /*Aqui eu usei o multi catch para as exceções.*/
} catch (InvalidArgumentException | NomeInvalidoException $exception) {
    echo "Parametro incorreto: " . PHP_EOL;
    echo $exception->getMessage();
}

