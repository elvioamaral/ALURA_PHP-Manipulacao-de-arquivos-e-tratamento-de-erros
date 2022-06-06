<?php

use Alura\Banco\Modelo\Conta\{ContaCorrente, ContaPoupanca, SaldoInsuficienteException, Titular};
use Alura\Banco\Modelo\{CPF, Endereco};

require_once 'autoload.php';

$conta = new ContaCorrente(
    new Titular(
        new CPF('789.456.123-99'),
        'Elvio Amaral',
        new Endereco('Montes Claros', 'Bairro Teste', 'Rua dos testes', '2022')
    )
);

$conta2 = new ContaPoupanca(
    new Titular(
        new CPF('789.456.123-99'),
        'Elvio Amaral',
        new Endereco('Montes Claros', 'Bairro Teste', 'Rua dos testes', '2022')
    )
);

$conta->deposita(500);
try {
    $conta->saca(600);
} catch (SaldoInsuficienteException $exception) {
    echo "Você não tem esse saldo disponível para saque!" . PHP_EOL;
    echo $exception->getMessage() . PHP_EOL;
}

$conta2->deposita(500);
$conta2->saca(100);

echo $conta->recuperaSaldo().PHP_EOL.$conta2->recuperaSaldo();