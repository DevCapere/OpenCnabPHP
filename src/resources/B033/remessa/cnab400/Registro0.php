<?php
/* CnabPHP - Geração de arquivos de remessa e retorno em PHP */

namespace CnabPHP\resources\B033\remessa\cnab400;

use CnabPHP\resources\generico\remessa\cnab400\Generico0;

class Registro0 extends Generico0
{
    protected $meta = array(
        'codigo_registro' => array(
            'tamanho' => 1,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),

        'codigo_remessa' => array(
            'tamanho' => 1,
            'default' => '1',
            'tipo' => 'int',
            'required' => true
        ),

        'literal_transmissao' => array(
            'tamanho' => 7,
            'default' => 'remessa',
            'tipo' => 'alfa',
            'required' => true
        ),

        'tipo_servico' => array(
            'tamanho' => 2,
            'default' => '01',
            'tipo' => 'int',
            'required' => true
        ),

        'literal_servico' => array(
            'tamanho' => 15,
            'default' => 'COBRANCA',
            'tipo' => 'alfa',
            'required' => true
        ),

        'codigo_transmissao' => array(
            'tamanho' => 20,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'nome_empresa' => array(
            'tamanho' => 30,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'codigo_banco' => array(
            'tamanho' => 3,
            'default' => '033',
            'tipo' => 'int',
            'required' => true
        ),

        'nome_banco' => array(
            'tamanho' => 15,
            'default' => 'Santander',
            'tipo' => 'alfa',
            'required' => true
        ),

        'data_geracao_arquivo' => array(
            'tamanho' => 6,
            'default' => ' ',
            'tipo' => 'date',
            'required' => true
        ),

        'reservado' => array(
            'tamanho' => 16,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),

        'mensagem_1' => array(
            'tamanho' => 47,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'mensagem_2' => array(
            'tamanho' => 47,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'mensagem_3' => array(
            'tamanho' => 47,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'mensagem_4' => array(
            'tamanho' => 47,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'mensagem_5' => array(
            'tamanho' => 47,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'reservado2' => array(
            'tamanho' => 34,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'reservado3' => array(
            'tamanho' => 6,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'numero_seq_arquivo' => array(
            'tamanho' => 3,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),

        'numero_sequencial_registro_arquivo' => array(
            'tamanho' => 6,
            'default' => '000001',
            'tipo' => 'int',
            'required' => true
        ),
    );
}