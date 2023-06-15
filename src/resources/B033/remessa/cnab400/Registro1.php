<?php

namespace CnabPHP\resources\B033\remessa\cnab400;

use CnabPHP\RegistroRemAbstract;
use CnabPHP\RemessaAbstract;
use CnabPHP\resources\generico\remessa\cnab400\Generico1;

class Registro1 extends Generico1
{

    protected $meta = array(
        'codigo_registro' => array(
            'tamanho' => 1,
            'default' => '1',
            'tipo' => 'int',
            'required' => true
        ),

        //01 = CPF, 02 = CNPJ 
        'tipo_inscricao' => array(
            'tamanho' => 2,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'numero_inscricao' => array(
            'tamanho' => 14,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'agencia' => array(
            'tamanho' => 4,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'conta' => array(
            'tamanho' => 8,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'conta_cobranca' => array(
            'tamanho' => 8,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'identificacao_boleto_empresa' => array(
            'tamanho' => 25,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => false
        ),

        'nosso_numero' => array(
            'tamanho' => 8,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'data_desconto_2' => array(
            'tamanho' => 6,
            'default' => ' ',
            'tipo' => 'date',
            'required' => true
        ),

        'reservado' => array(
            'tamanho' => 1,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'codigo_multa' => array(
            'tamanho' => 1,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'percentual_multa' => array(
            'tamanho' => 2,
            'default' => ' ',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),

        'codigo_moeda' => array(
            'tamanho' => 2,
            'default' => '00',
            'tipo' => 'int',
            'required' => true
        ),

        'valor_boleto_outra_unidade' => array(
            'tamanho' => 8,
            'default' => ' ',
            'tipo' => 'decimal',
            'precision' => 5,
            'required' => true
        ),

        'reservado2' => array(
            'tamanho' => 4,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'data_multa' => array(
            'tamanho' => 6,
            'default' => ' ',
            'tipo' => 'date',
            'required' => true
        ),

        'tipo_cobranca' => array(
            'tamanho' => 1,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'codigo_movimento_remessa' => array(
            'tamanho' => 2,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'numero_documento' => array(
            'tamanho' => 10,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'data_vencimento' => array(
            'tamanho' => 6,
            'default' => ' ',
            'tipo' => 'date',
            'required' => true
        ),

        'valor' => array(
            'tamanho' => 11,
            'default' => ' ',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),

        'numero_banco_cobrador' => array(
            'tamanho' => 3,
            'default' => '033',
            'tipo' => 'int',
            'required' => true
        ),

        'codigo_agencia_cobradora' => array(
            'tamanho' => 5,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'especie_titulo' => array(
            'tamanho' => 2,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'aceite' => array(
            'tamanho' => 1,
            'default' => 'N',
            'tipo' => 'alfa',
            'required' => true
        ),

        'data_emissao' => array(
            'tamanho' => 6,
            'default' => ' ',
            'tipo' => 'date',
            'required' => true
        ),

        'primeira_instrucao' => array(
            'tamanho' => 2,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'segunda_instrucao' => array(
            'tamanho' => 2,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'valor_mora_dia' => array(
            'tamanho' => 11,
            'default' => ' ',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),

        'data_limite_concessao_desconto' => array(
            'tamanho' => 6,
            'default' => ' ',
            'tipo' => 'date',
            'required' => true
        ),

        'valor_desconto_concedido' => array(
            'tamanho' => 11,
            'default' => ' ',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),

        'percentual_iof_recolhido' => array(
            'tamanho' => 8,
            'default' => ' ',
            'tipo' => 'decimal',
            'precision' => 5,
            'required' => true
        ),

        'valor_abatimento' => array(
            'tamanho' => 11,
            'default' => ' ',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),

        'tipo_inscricao_pagador' => array(
            'tamanho' => 2,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'numero_inscricao_pagador' => array(
            'tamanho' => 14,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'nome_pagador' => array(
            'tamanho' => 40,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'endereco_pagador' => array(
            'tamanho' => 40,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'bairro_pagador' => array(
            'tamanho' => 12,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'prefixo_cep_pagador' => array(
            'tamanho' => 5,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'sufixo_cep_pagador' => array(
            'tamanho' => 3,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'cidade_pagador' => array(
            'tamanho' => 15,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'uf_pagador' => array(
            'tamanho' => 2,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'reservado3' => array(
            'tamanho' => 30,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'reservado4' => array(
            'tamanho' => 1,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'identificador_complemento' => array(
            'tamanho' => 1,
            'default' => 'I',
            'tipo' => 'alfa',
            'required' => true
        ),

        'complemento' => array(
            'tamanho' => 2,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),

        'reservado5' => array(
            'tamanho' => 6,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'numero_dias_protesto' => array(
            'tamanho' => 2,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ),

        'reservado6' => array(
            'tamanho' => 1,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),

        'numero_registro' => array(
            'tamanho' => 6,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
    );

    public function __construct($data = null)
    {
        if (empty($this->data))
            parent::__construct($data);
        $this->inserirMensagem($data);
    }

    public function inserirMensagem($data)
    {
        if (!empty($data['mensagem'])) {
            $class = 'CnabPHP\resources\\B' . RemessaAbstract::$banco . '\remessa\\' . RemessaAbstract::$layout . '\Registro2';
            $this->children[] = new $class($data);
        }
    }

    protected function set_endereco_pagador($value)
    {
        $this->data['endereco_pagador'] = $value . " " . $this->entryData['bairro_pagador'];
    }

    protected function set_taxa_multa($value)
    {
        $this->data['taxa_multa'] = $value;
        $this->data['codigo_multa'] = ($value > 0) ? 2 : 0;
    }

    protected function set_nosso_numero_dv($value)
    {
        $modulo11 = self::modulo11(str_pad($this->entryData['carteira_banco'], 2, 0, STR_PAD_LEFT) . str_pad($this->data['nosso_numero'], 11, 0, STR_PAD_LEFT), 7);
        switch ($modulo11['resto']) {
            case 1:
                $this->data['nosso_numero_dv'] = 'P';
                break;
            case 0:
                $this->data['nosso_numero_dv'] = " 0";
                break;
            default:
                $this->data['nosso_numero_dv'] = $modulo11['digito'];
        }
    }

    protected static function modulo11($num, $base = 9)
    {
        $fator = 2;

        $soma = 0;
        // Separacao dos numeros.
        for ($i = strlen($num); $i > 0; $i--) {
            //  Pega cada numero isoladamente.
            $numeros[$i] = substr($num, $i - 1, 1);
            //  Efetua multiplicacao do numero pelo falor.
            $parcial[$i] = $numeros[$i] * $fator;
            //  Soma dos digitos.
            $soma += $parcial[$i];
            if ($fator == $base) {
                //  Restaura fator de multiplicacao para 2.
                $fator = 1;
            }
            $fator++;
        }
        $result = array(
            'digito' => ($soma * 10) % 11,
            // Remainder.
            'resto' => $soma % 11,
        );
        if ($result['digito'] == 10) {
            $result['digito'] = 0;
        }
        return $result;
    }

}