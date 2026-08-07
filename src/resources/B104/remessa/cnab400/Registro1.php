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
namespace CnabPHP\resources\B104\remessa\cnab400;

use CnabPHP\resources\generico\remessa\cnab400\Generico1;
use CnabPHP\RemessaAbstract;

/**
 * Registro 1 - Detalhe de titulo da remessa CNAB 400 da CAIXA Economica Federal
 *
 * Layout baseado no manual "67.126 v029 micro" (Layout de Cobranca 400)
 */
class Registro1 extends Generico1
{
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
        'uso_exclusivo1' => array( // Pos: 018-020 - Uso exclusivo CAIXA (zeros)
            'tamanho' => 3,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
        'codigo_beneficiario' => array( // Pos: 021-027 - NE004
            'tamanho' => 7,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'id_emissao' => array( // Pos: 028-028 - NE027 (1 Banco emite / 2 Cliente emite)
            'tamanho' => 1,
            'default' => '2',
            'tipo' => 'int',
            'required' => true),
        'id_postagem' => array( // Pos: 029-029 - NE028 (1 Beneficiario posta / 4 Pagador via e-mail)
            'tamanho' => 1,
            'default' => '1',
            'tipo' => 'int',
            'required' => true),
        'taxa_permanencia' => array( // Pos: 030-031 - NE013 (Comissao de permanencia - zeros)
            'tamanho' => 2,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
        'seu_numero' => array( // Pos: 032-056 - NE014 (Identificacao do titulo na empresa)
            'tamanho' => 25,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'nosso_numero' => array( // Pos: 057-073 - NE015 (CC + 15 posicoes)
            'tamanho' => 17,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true),
        'brancos1' => array( // Pos: 074-075 - Campos em branco
            'tamanho' => 2,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'uso_livre' => array( // Pos: 076-076 - NE055 (0 nao autoriza / 2 autoriza pagamento parcial)
            'tamanho' => 1,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
        'codigo_juros' => array( // Pos: 077-077 - NE066
            'tamanho' => 1,
            'default' => '5',
            'tipo' => 'int',
            'required' => true),
        'data_juros' => array( // Pos: 078-083 - NE063 (DDMMAA)
            'tamanho' => 6,
            'default' => '',
            'tipo' => 'date',
            'required' => false),
        'codigo_desconto' => array( // Pos: 084-084 - NE061
            'tamanho' => 1,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
        'brancos2' => array( // Pos: 085-106 - Campos em branco
            'tamanho' => 22,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'carteira' => array( // Pos: 107-108 - NE016
            'tamanho' => 2,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'codigo_movimento' => array( // Pos: 109-110 - NE017 (01 entrada de titulo)
            'tamanho' => 2,
            'default' => '1',
            'tipo' => 'int',
            'required' => true),
        'numero_documento' => array( // Pos: 111-120 - NE018 (Numero do Documento de Cobranca - Seu Numero)
            'tamanho' => 10,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'data_vencimento' => array( // Pos: 121-126 - NE019 (DDMMAA)
            'tamanho' => 6,
            'default' => '',
            'tipo' => 'date',
            'required' => true),
        'valor' => array( // Pos: 127-139 - NE020
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true),
        'codigo_banco' => array( // Pos: 140-142 - NE006
            'tamanho' => 3,
            'default' => '104',
            'tipo' => 'int',
            'required' => true),
        'agencia_cobradora' => array( // Pos: 143-147 - NE021
            'tamanho' => 5,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
        'especie_titulo' => array( // Pos: 148-149 - NE022
            'tamanho' => 2,
            'default' => '1',
            'tipo' => 'int',
            'required' => true),
        'aceite' => array( // Pos: 150-150 - NE023
            'tamanho' => 1,
            'default' => 'N',
            'tipo' => 'alfa',
            'required' => true),
        'data_emissao' => array( // Pos: 151-156 - NE056 (DDMMAA)
            'tamanho' => 6,
            'default' => '',
            'tipo' => 'date',
            'required' => true),
        'cod_instrucao1' => array( // Pos: 157-158 - NE024 (protesto / devolucao)
            'tamanho' => 2,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
        'cod_instrucao2' => array( // Pos: 159-160
            'tamanho' => 2,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
        'vlr_juros' => array( // Pos: 161-173 - NE064 (Juros de mora por dia / valor)
            'tamanho' => 11,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true),
        'data_desconto' => array( // Pos: 174-179 - NE057 (DDMMAA)
            'tamanho' => 6,
            'default' => '',
            'tipo' => 'date',
            'required' => false),
        'vlr_desconto' => array( // Pos: 180-192 - NE062
            'tamanho' => 11,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true),
        'vlr_iof' => array( // Pos: 193-205 - Valor do IOF
            'tamanho' => 11,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true),
        'vlr_abatimento' => array( // Pos: 206-218 - Valor do abatimento
            'tamanho' => 11,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true),
        'tipo_inscricao' => array( // Pos: 219-220 - NE011 (pagador)
            'tamanho' => 2,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'numero_inscricao' => array( // Pos: 221-234 - NE012 (pagador)
            'tamanho' => 14,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'nome_pagador' => array( // Pos: 235-274 - Nome do pagador
            'tamanho' => 40,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true),
        'endereco_pagador' => array( // Pos: 275-314 - Endereco do pagador
            'tamanho' => 40,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true),
        'bairro_pagador' => array( // Pos: 315-326 - Bairro do pagador
            'tamanho' => 12,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true),
        'cep_pagador' => array( // Pos: 327-334 - CEP do pagador
            'tamanho' => 8,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'cidade_pagador' => array( // Pos: 335-349 - Cidade do pagador
            'tamanho' => 15,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true),
        'uf_pagador' => array( // Pos: 350-351 - UF do pagador
            'tamanho' => 2,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true),
        'data_multa' => array( // Pos: 352-357 - NE059 (DDMMAA)
            'tamanho' => 6,
            'default' => '',
            'tipo' => 'date',
            'required' => false),
        'vlr_multa' => array( // Pos: 358-367 - Valor nominal da multa
            'tamanho' => 8,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true),
        'nome_avalista' => array( // Pos: 368-389 - Sacador / Avalista
            'tamanho' => 22,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'cod_instrucao3' => array( // Pos: 390-391 - NE029 (Mensagem verso do boleto)
            'tamanho' => 2,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
        'prazo_protesto' => array( // Pos: 392-393 - NE025 (protesto / devolucao)
            'tamanho' => 2,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
        'codigo_moeda' => array( // Pos: 394-394 - NE026 (1 = REAL)
            'tamanho' => 1,
            'default' => '1',
            'tipo' => 'int',
            'required' => true),
        'numero_registro' => array( // Pos: 395-400
            'tamanho' => 6,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
    );

    protected function set_codigo_banco($value)
    {
        $this->data['codigo_banco'] = '104';
    }

    protected function set_codigo_moeda($value)
    {
        $this->data['codigo_moeda'] = '1';
    }

    protected function set_codigo_beneficiario($value)
    {
        $this->data['codigo_beneficiario'] = RemessaAbstract::getLote(0)->entryData['codigo_beneficiario'];
    }
}
