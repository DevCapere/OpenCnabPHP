<?php
namespace CnabPHP\resources\B033\remessa\cnab400;

use CnabPHP\resources\generico\remessa\cnab400\Generico9;

class Registro9 extends Generico9
{
    protected $meta = array(
        'codigo_registro' => array(
            'tamanho' => 1,
            'default' => '9',
            'tipo' => 'int',
            'required' => true
        ),

        'qtd_registros' => array(
            'tamanho' => 6,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),

        'valor_total_boletos' => array(
            'tamanho' => 11,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),

        'reservado' => array(
            'tamanho' => 374,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),

        'numero_registro' => array(
            'tamanho' => 6,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
    );
}