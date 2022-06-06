<?php

namespace Alura\Banco\Modelo;

class Pessoa
{
    use AcessoPropriedades;

    protected string $nome;
    private CPF $cpf;

    public function __construct(string $nome, CPF $cpf)
    {
        $this->validaNome($nome);
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    public function recuperaNome(): string
    {
        return $this->nome;
    }

    public function recuperaCpf(): string
    {
        return $this->cpf->recuperaNumeroCpf();
    }

    final protected function validaNome(string $nome)
    {
        if (strlen($nome) < 4){
            echo "Nome do Titular deve ter ao menos 5 caracteres!";
        }
    }
}