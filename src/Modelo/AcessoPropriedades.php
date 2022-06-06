<?php

namespace Alura\Banco\Modelo;

trait AcessoPropriedades
{
    public function __get($nomeAtributo)
    {
        $metodo = "recupera" . ucfirst($nomeAtributo);
        return $this->$metodo();
    }

    public function __set($nomeAtributo, $valor)
    {
        $metodo = "define" . ucfirst($nomeAtributo);
        return $this->$metodo($valor);
    }
}