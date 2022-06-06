<?php

use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Funcionario\Diretor;
use Alura\Banco\Modelo\Funcionario\Gerente;
use Alura\Banco\Service\Autenticador;

require_once 'autoload.php';

$autenticador = new Autenticador();
$diretor = new Gerente(
    'João da Silva',
    new CPF('123.456.789-10'),
    100000
);

$autenticador->tentaLogin($diretor, '4321');