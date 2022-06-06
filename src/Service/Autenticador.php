<?php

namespace Alura\Banco\Service;

use Alura\Banco\Modelo\Autenticavel;
use Alura\Banco\Modelo\Funcionario\Diretor;

class Autenticador
{
    public function tentaLogin(Autenticavel $diretor, string $senha): void
    {
        if ($diretor->podeAutenticar($senha)) {
            echo "Ok. Usuário logado no sistema!";
        } else {
            echo "Ops. Senha incorreta.";
        }
    }
}
