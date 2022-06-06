<?php

namespace Alura\Banco\Modelo\Conta;

use Alura\Banco\Modelo\Conta\Titular;
use http\Exception\InvalidArgumentException;

abstract class Conta
{
    private Titular $titular;
    protected float $saldo;
    private static $qtdContas = 0;

    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;

        self::$qtdContas++;
    }
    
    public function __destruct()
    {
        return self::$qtdContas--;
    }

    public function saca(float $valorASacar): void
    {
        $tarifaSaque = $valorASacar * $this->percentualTarifa();
        $valorASacar = $valorASacar + $tarifaSaque;
        if ($valorASacar > $this->saldo) {
            throw new SaldoInsuficienteException($valorASacar, $this->saldo);
        }

        $this->saldo -= $valorASacar;
    }

    public function deposita(float $valorADepositar): void
    {
        if ($valorADepositar < 0) {
            throw new \InvalidArgumentException();
        }

        $this->saldo += $valorADepositar;
    }

    public function recuperaSaldo(): float
    {
        return $this->saldo;
    }

    public function recuperaCpfTitular(): string
    {
        return $this->titular->recuperaCpf();
    }

    public function recuperaNomeTitular(): string
    {
        return $this->titular->recuperaNome();
    }

    public static function recuperaQtdContas(): int
    {
        return self::$qtdContas;
    }

    abstract protected function percentualTarifa(): float;
}