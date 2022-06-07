<?php

namespace Alura\Banco\Modelo;

class NomeInvalidoException extends \DomainException
{
    public function __construct(string $nome)
    {
        $sizeString = strlen($nome);
        $message = "Nome do Titular deve ter ao menos 5 caracteres, '$nome' tem tamanho de $sizeString!";
        parent::__construct($message);
    }
}