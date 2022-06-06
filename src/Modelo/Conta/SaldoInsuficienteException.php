<?php

namespace Alura\Banco\Modelo\Conta;
use Throwable;

class SaldoInsuficienteException extends \DomainException
{
    public function __construct(float $valorSaque, float $saldoAtual)
    {
        $mensagem = "Voce tentou sacar $valorSaque, e tem somente $saldoAtual em conta.";
        parent::__construct($mensagem);
    }
}