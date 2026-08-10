<?php
/*
 * CnabPHP - Geração de arquivos de remessa e retorno em PHP
 *
 * LICENSE: The MIT License (MIT)
 *
 * Copyright (C) 2013 Ciatec.net
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this
 * software and associated documentation files (the "Software"), to deal in the Software
 * without restriction, including without limitation the rights to use, copy, modify,
 * merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to the following
 * conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies
 * or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A
 * PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
 * SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
namespace CnabPHP\resources\B104\retorno\L400;

use CnabPHP\resources\generico\retorno\L400\Generico1;
use CnabPHP\RetornoAbstract;

/**
 * Registro 1 - Detalhe de retorno CNAB 400 da CAIXA Economica Federal
 *
 * Layout baseado no manual "67.126 v029 micro" (Layout de Cobranca 400)
 */
class Registro1 extends Generico1
{
    public $trailler;

    protected $meta = array(
        'tipo_registro' => array( // Pos: 001-001
            'tamanho' => 1,
            'default' => '1',
            'tipo' => 'int',
            'required' => true),
        'tipo_inscricao_empresa' => array( // Pos: 002-003 - NE011 (1 CPF / 2 CNPJ)
            'tamanho' => 2,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'numero_inscricao_empresa' => array( // Pos: 004-017 - NE012
            'tamanho' => 14,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'filler1' => array( // Pos: 018-020 - Uso exclusivo CAIXA (zeros)
            'tamanho' => 3,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
        'codigo_beneficiario' => array( // Pos: 021-027 - NE004
            'tamanho' => 7,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'id_emissao' => array( // Pos: 028-028 - NE027
            'tamanho' => 1,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'id_postagem' => array( // Pos: 029-029 - NE028
            'tamanho' => 1,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'filler2' => array( // Pos: 030-031 - Uso exclusivo CAIXA (espacos)
            'tamanho' => 2,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'seu_numero' => array( // Pos: 032-056 - NE014 (Identificacao do titulo na empresa)
            'tamanho' => 25,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'nosso_numero' => array( // Pos: 057-073 - NE015 (modalidade 2 + identificacao 15)
            'tamanho' => 17,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'filler3' => array( // Pos: 074-079 - Uso exclusivo CAIXA (espacos)
            'tamanho' => 6,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'codigo_rejeicao' => array( // Pos: 080-082 - NE032 (motivo de rejeicao)
            'tamanho' => 3,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'filler34' => array( // Pos: 083-106 - Uso exclusivo CAIXA (espacos)
            'tamanho' => 24,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'carteira' => array( // Pos: 107-108 - NE016
            'tamanho' => 2,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'codigo_movimento' => array( // Pos: 109-110 - NE033 (codigo de ocorrencia)
            'tamanho' => 2,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true),
        'data_ocorrencia' => array( // Pos: 111-116 - Data da ocorrencia (DDMMAA)
            'tamanho' => 6,
            'default' => '',
            'tipo' => 'date',
            'required' => true),
        'seu_numero2' => array( // Pos: 117-126 - NE018 (Numero do documento - Seu Numero)
            'tamanho' => 10,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'filler4' => array( // Pos: 127-146 - Uso exclusivo CAIXA (espacos)
            'tamanho' => 20,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'data_vencimento' => array( // Pos: 147-152 - Data de vencimento do titulo (DDMMAA)
            'tamanho' => 6,
            'default' => '',
            'tipo' => 'date',
            'required' => true),
        'valor' => array( // Pos: 153-165 - Valor nominal do titulo
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true),
        'codigo_banco' => array( // Pos: 166-168 - NE006
            'tamanho' => 3,
            'default' => '104',
            'tipo' => 'int',
            'required' => true),
        'agencia_cobradora' => array( // Pos: 169-173 - NE021
            'tamanho' => 5,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
        'especie_titulo' => array( // Pos: 174-175 - NE022
            'tamanho' => 2,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'vlr_tarifas' => array( // Pos: 176-188 - Valor da tarifa / despesa de cobranca
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true),
        'cod_liquidacao' => array( // Pos: 189-191 - NE035 (canal de liquidacao ou baixa)
            'tamanho' => 3,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'codigo_forma_pagamento' => array( // Pos: 192-192 - NE036
            'tamanho' => 1,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true),
        'float_negociado' => array( // Pos: 193-194 - NE034 (float negociado)
            'tamanho' => 2,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
        'data_debito_tarifa' => array( // Pos: 195-200 - NE034 (data do debito da tarifa DDMMAA)
            'tamanho' => 6,
            'default' => '',
            'tipo' => 'date',
            'required' => false),
        'filler41' => array( // Pos: 201-214 - Uso exclusivo CAIXA (espacos)
            'tamanho' => 14,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'vlr_iof' => array( // Pos: 215-227 - Valor do IOF a ser recolhido
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true),
        'vlr_abatimento' => array( // Pos: 228-240 - Valor do abatimento concedido
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true),
        'vlr_desconto' => array( // Pos: 241-253 - Valor do desconto concedido
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true),
        'vlr_pago' => array( // Pos: 254-266 - Valor principal pago pelo Pagador
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true),
        'vlr_juros_multa' => array( // Pos: 267-279 - Valor dos juros pago pelo Pagador
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true),
        'vlr_multa' => array( // Pos: 280-292 - Valor da multa paga pelo Pagador
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true),
        'codigo_moeda' => array( // Pos: 293-293 - NE026 (1 = REAL)
            'tamanho' => 1,
            'default' => '1',
            'tipo' => 'int',
            'required' => true),
        'data_credito' => array( // Pos: 294-299 - NE037 (data do credito DDMMAA)
            'tamanho' => 6,
            'default' => '',
            'tipo' => 'date',
            'required' => false),
        'tipo_inscricao_pagador' => array( // Pos: 300-300 - NE012 (1 CPF / 2 CNPJ)
            'tamanho' => 1,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'numero_inscricao_pagador' => array( // Pos: 301-314 - NE012
            'tamanho' => 14,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'filler5' => array( // Pos: 315-394 - Uso exclusivo CAIXA (espacos)
            'tamanho' => 80,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'numero_registro' => array( // Pos: 395-400 - NE010
            'tamanho' => 6,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
    );

    public function __construct($linhaTxt)
    {
        parent::__construct($linhaTxt);

        RetornoAbstract::$linesCounter++;
    }
}
