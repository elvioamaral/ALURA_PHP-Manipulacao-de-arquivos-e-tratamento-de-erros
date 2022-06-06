<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Funcionario\{Diretor, Desenvolvedor, Gerente, EditorVideo};
use Alura\Banco\Service\ControladorDeBonificacoes;

$funcionario = new Desenvolvedor(
    'Elvio Amaral',
    new CPF('789.456.123-99'),
    1000
);

$funcionaria = new Gerente(
    'Debora Amaral',
    new CPF('123.456.789-10'),
    3000
);

$diretor = new Diretor(
    'Aylla Fabiane',
    new CPF('321.654.987-99'),
    5000
);

$editorVideo = new EditorVideo(
    'Fabiane',
    new CPF('456.789.123-99'),
    1500
);

$funcionario->sobeDeNivel();

$controlador = new ControladorDeBonificacoes;
$controlador->addBonificacao($funcionario);
$controlador->addBonificacao($funcionaria);
$controlador->addBonificacao($diretor);
$controlador->addBonificacao($editorVideo);

echo $controlador->recuperaTotal();