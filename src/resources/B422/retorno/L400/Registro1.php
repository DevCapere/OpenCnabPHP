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

namespace CnabPHP\resources\B422\retorno\L400;

use CnabPHP\resources\generico\retorno\L400\Generico1;
use CnabPHP\RetornoAbstract;

/**
 * Classe Registro1 - Detalhe do arquivo de retorno CNAB 400 do Banco Safra (422)
 *
 * Layout conforme Manual de Transferências de Arquivos | Cobrança - Produto 001
 * Seção 6.3.2 - REGISTRO DETALHE DE ARQUIVO (OBRIGATÓRIO - RETORNO)
 */
class Registro1 extends Generico1
{
    public $trailler;

    protected $meta = array(
        // Pos 001-001 (01) - Identificação do Registro Transação
        'tipo_registro' => array(
            'tamanho' => 1,
            'default' => '1',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 002-003 (02) - Tipo de Inscrição da Empresa (01=CPF, 02=CNPJ)
        'tipo_inscricao_empresa' => array(
            'tamanho' => 2,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 004-017 (14) - Número de Inscrição da Empresa
        'numero_inscricao_empresa' => array(
            'tamanho' => 14,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 018-031 (14) - Identificação da Empresa no Banco (Agência 5 + Conta cobrança 9)
        'agencia' => array(
            'tamanho' => 5,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ),
        'conta' => array(
            'tamanho' => 8,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ),
        'conta_dv' => array(
            'tamanho' => 1,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 032-037 (06) - Brancos
        'filler1' => array(
            'tamanho' => 6,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 038-062 (25) - Uso Exclusivo da Empresa
        'seu_numero' => array(
            'tamanho' => 25,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 063-071 (09) - Identificação do Título no Banco
        'nosso_numero' => array(
            'tamanho' => 9,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 072-102 (31) - Brancos
        'filler2' => array(
            'tamanho' => 31,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 103-104 (02) - Código Ocorrência Recebida no Arquivo REMESSA
        'ocorrencia_origem' => array(
            'tamanho' => 2,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 105-107 (03) - Código de Motivo de Rejeição
        'erros_mensagens' => array(
            'tamanho' => 3,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 108-108 (01) - Identificação do Tipo de Carteira
        'cod_carteira' => array(
            'tamanho' => 1,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 109-110 (02) - Identificação da Ocorrência (Retorno)
        'codigo_movimento' => array(
            'tamanho' => 2,
            'default' => '02',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 111-116 (06) - Data da Ocorrência no Banco
        'data_ocorrencia' => array(
            'tamanho' => 6,
            'default' => '0',
            'tipo' => 'date',
            'required' => true
        ),
        // Pos 117-126 (10) - Identificação do Título na Empresa
        'seu_numero2' => array(
            'tamanho' => 10,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 127-135 (09) - Confirmação do Nosso Número Atribuído ao Título
        'nosso_numero2' => array(
            'tamanho' => 9,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 136-146 (11) - Brancos
        'filler3' => array(
            'tamanho' => 11,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 147-152 (06) - Data de Vencimento do Título
        'data_vencimento' => array(
            'tamanho' => 6,
            'default' => '',
            'tipo' => 'date',
            'required' => true
        ),
        // Pos 153-165 (13) - Valor Nominal do Título (11 inteiro + 2 decimal)
        'valor' => array(
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 166-168 (03) - Código do Banco Encarregado da Cobrança
        'codigo_banco' => array(
            'tamanho' => 3,
            'default' => '422',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 169-173 (05) - Agência Encarregada da Cobrança
        'agencia_cobradora' => array(
            'tamanho' => 5,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 174-175 (02) - Espécie do Título
        'especie_titulo' => array(
            'tamanho' => 2,
            'default' => '01',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 176-188 (13) - Tarifa de Cobrança (11 inteiro + 2 decimal)
        'vlr_tarifas' => array(
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 189-201 (13) - Valor de Outras Despesas (11 inteiro + 2 decimal)
        'vlr_outras_despesas' => array(
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 202-214 (13) - Zeros (11 inteiro + 2 decimal)
        'filler4' => array(
            'tamanho' => 11,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 215-227 (13) - IOF de Operações de Seguro (11 inteiro + 2 decimal)
        'vlr_iof' => array(
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 228-240 (13) - Valor Abatimento Concedido ou Cancelado (11 inteiro + 2 decimal)
        'vlr_abatimento' => array(
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 241-253 (13) - Valor do Desconto Concedido (11 inteiro + 2 decimal)
        'vlr_desconto' => array(
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 254-266 (13) - Valor Líquido Pago pelo Pagador (11 inteiro + 2 decimal)
        'vlr_pago' => array(
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 267-279 (13) - Valor de Juros Mora Pago pelo Pagador (11 inteiro + 2 decimal)
        'vlr_juros_multa' => array(
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 280-292 (13) - Valor de Outros Créditos (11 inteiro + 2 decimal)
        'vlr_outros' => array(
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 293-295 (03) - Código de Moeda
        'codigo_moeda' => array(
            'tamanho' => 3,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 296-301 (06) - Data de Crédito (para Ocorrências 06, 15 e 41)
        'data_credito' => array(
            'tamanho' => 6,
            'default' => '',
            'tipo' => 'date',
            'required' => false
        ),
        // Pos 302-307 (06) - Brancos
        'filler5' => array(
            'tamanho' => 6,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 308-321 (14) - Código Beneficiário Transferido (Ocorrência 21)
        'beneficiario_transferido' => array(
            'tamanho' => 14,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 322-322 (01) - Indicador Entrada DDA (S=Pagador Eletrônico DDA, N=Pagador)
        'boleto_dda' => array(
            'tamanho' => 1,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 323-324 (02) - Meio de Liquidação (01=Cheque, Brancos=Outros)
        'meio_liquidacao' => array(
            'tamanho' => 2,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 325-326 (02) - Código de Inscrição do Pagador (01=CPF, 02=CNPJ)
        'codigo_inscricao_pagador' => array(
            'tamanho' => 2,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 327-340 (14) - Número de Inscrição do Pagador
        'numero_inscricao_pagador' => array(
            'tamanho' => 14,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 341-375 (35) - Nome do Pagador
        'nome_pagador' => array(
            'tamanho' => 35,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 376-390 (15) - Seu Número
        'seu_numero_retorno' => array(
            'tamanho' => 15,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 391-391 (01) - Brancos
        'filler6' => array(
            'tamanho' => 1,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 392-394 (03) - Número Sequencial Geração Arquivo Retorno
        'numero_sequencial_arquivo' => array(
            'tamanho' => 3,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 395-400 (06) - Número Sequencial do Registro no Arquivo
        'numero_registro' => array(
            'tamanho' => 6,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
    );

    public function __construct($linhaTxt)
    {
        parent::__construct($linhaTxt);
        RetornoAbstract::$linesCounter++;
    }
}
