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

use CnabPHP\resources\generico\retorno\L400\Generico9;

/**
 * Classe Registro9 - Trailer do arquivo de retorno CNAB 400 do Banco Safra (422)
 *
 * Layout conforme Manual de Transferências de Arquivos | Cobrança - Produto 001
 * Seção 6.3.3 - REGISTRO TRAILLER DE ARQUIVO (OBRIGATÓRIO - RETORNO)
 *
 * Pos 001-001 (01): tipo_registro = "9"
 * Pos 002-002 (01): codigo_arquivo = "2"
 * Pos 003-004 (02): codigo_servico = "01"
 * Pos 005-007 (03): codigo_banco = "422"
 * Pos 008-017 (10): brancos
 * Pos 018-025 (08): qtd_titulos_simples (Quantidade de Títulos)
 * Pos 026-039 (14): vlr_titulos_simples (12+2 decimal) (Valor Total dos Títulos)
 * Pos 040-047 (08): nro_aviso_simples (Número do Aviso Bancário)
 * Pos 048-097 (50): brancos
 * Pos 098-105 (08): qtd_titulos_vinculada
 * Pos 106-119 (14): vlr_titulos_vinculada (12+2 decimal)
 * Pos 120-127 (08): nro_aviso_vinculada
 * Pos 128-135 (08): qtd_titulos_descontada
 * Pos 136-149 (14): vlr_titulos_descontada (12+2 decimal)
 * Pos 150-157 (08): qtd_titulos_vendor
 * Pos 158-171 (14): vlr_titulos_vendor (12+2 decimal)
 * Pos 172-179 (08): qtd_titulos_caucionada
 * Pos 180-193 (14): vlr_titulos_caucionada (12+2 decimal)
 * Pos 194-201 (08): qtd_titulos_fidc
 * Pos 202-213 (12): vlr_titulos_fidc (10+2 decimal)
 * Pos 214-221 (08): qtd_titulos_total_6
 * Pos 222-233 (12): vlr_titulos_total_6 (10+2 decimal)
 * Pos 234-241 (08): qtd_titulos_total_7
 * Pos 242-253 (12): vlr_titulos_total_7 (10+2 decimal)
 * Pos 254-261 (08): qtd_titulos_total_8
 * Pos 262-273 (12): vlr_titulos_total_8 (10+2 decimal)
 * Pos 274-281 (08): qtd_titulos_total_9
 * Pos 282-293 (12): vlr_titulos_total_9 (10+2 decimal)
 * ** TOTAL DE OCORRENCIA 14 – VENCIMENTO ALTERADO **
 * Pos 294-301 (08): qtd_vencimento_alterado
 * Pos 302-313 (12): vlr_vencimento_alterado (10+2 decimal)
 * Pos 314-321 (08): qtd_titulos_total_11
 * Pos 322-333 (12): vlr_titulos_total_11 (10+2 decimal)
 * ** RATEIOS EFETUADOS **
 * Pos 334-341 (08): qtd_rateios
 * Pos 342-353 (12): vlr_rateios (10+2 decimal)
 * Pos 354-391 (38): brancos
 * Pos 392-394 (03): numero_sequencial_arquivo
 * Pos 395-400 (06): numero_sequencial
 */
class Registro9 extends Generico9
{
    protected $meta = array(
        // Pos 001-001 (01)
        'tipo_registro' => array(
            'tamanho' => 1,
            'default' => '9',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 002-002 (01)
        'codigo_arquivo' => array(
            'tamanho' => 1,
            'default' => '2',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 003-004 (02)
        'codigo_servico' => array(
            'tamanho' => 2,
            'default' => '01',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 005-007 (03)
        'codigo_banco' => array(
            'tamanho' => 3,
            'default' => '422',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 008-017 (10)
        'filler1' => array(
            'tamanho' => 10,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 018-025 (08) - Quantidade de Títulos (Simples)
        'qtd_titulos_simples' => array(
            'tamanho' => 8,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 026-039 (14) - Valor Total dos Títulos (Simples) - 12 inteiro + 2 decimal
        'vlr_titulos_simples' => array(
            'tamanho' => 12,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 040-047 (08) - Número do Aviso Bancário
        'nro_aviso_simples' => array(
            'tamanho' => 8,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 048-097 (50) - Brancos
        'filler2' => array(
            'tamanho' => 50,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 098-105 (08) - Quantidade de Títulos (Vinculada)
        'qtd_titulos_vinculada' => array(
            'tamanho' => 8,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 106-119 (14) - Valor Total dos Títulos (Vinculada) - 12 inteiro + 2 decimal
        'vlr_titulos_vinculada' => array(
            'tamanho' => 12,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 120-127 (08) - Número do Aviso Bancário (Vinculada)
        'nro_aviso_vinculada' => array(
            'tamanho' => 8,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 128-135 (08) - Quantidade de Títulos (Descontada)
        'qtd_titulos_descontada' => array(
            'tamanho' => 8,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 136-149 (14) - Valor Total dos Títulos (Descontada) - 12 inteiro + 2 decimal
        'vlr_titulos_descontada' => array(
            'tamanho' => 12,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 150-157 (08) - Quantidade de Títulos (Vendor)
        'qtd_titulos_vendor' => array(
            'tamanho' => 8,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 158-171 (14) - Valor Total dos Títulos (Vendor) - 12 inteiro + 2 decimal
        'vlr_titulos_vendor' => array(
            'tamanho' => 12,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 172-179 (08) - Quantidade de Títulos (Caucionada)
        'qtd_titulos_caucionada' => array(
            'tamanho' => 8,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 180-193 (14) - Valor Total dos Títulos (Caucionada) - 12 inteiro + 2 decimal
        'vlr_titulos_caucionada' => array(
            'tamanho' => 12,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 194-201 (08) - Quantidade (grupo 6)
        'qtd_titulos_6' => array(
            'tamanho' => 8,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 202-213 (12) - Valor (grupo 6) - 10 inteiro + 2 decimal
        'vlr_titulos_6' => array(
            'tamanho' => 10,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 214-221 (08) - Quantidade (grupo 7)
        'qtd_titulos_7' => array(
            'tamanho' => 8,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 222-233 (12) - Valor (grupo 7) - 10 inteiro + 2 decimal
        'vlr_titulos_7' => array(
            'tamanho' => 10,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 234-241 (08) - Quantidade (grupo 8)
        'qtd_titulos_8' => array(
            'tamanho' => 8,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 242-253 (12) - Valor (grupo 8) - 10 inteiro + 2 decimal
        'vlr_titulos_8' => array(
            'tamanho' => 10,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 254-261 (08) - Quantidade (grupo 9)
        'qtd_titulos_9' => array(
            'tamanho' => 8,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 262-273 (12) - Valor (grupo 9) - 10 inteiro + 2 decimal
        'vlr_titulos_9' => array(
            'tamanho' => 10,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 274-281 (08) - Quantidade vencimento alterado
        'qtd_vencimento_alterado' => array(
            'tamanho' => 8,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 282-293 (12) - Valor vencimento alterado - 10 inteiro + 2 decimal
        'vlr_vencimento_alterado' => array(
            'tamanho' => 10,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 294-301 (08) - Quantidade (grupo 11)
        'qtd_titulos_11' => array(
            'tamanho' => 8,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 302-313 (12) - Valor (grupo 11) - 10 inteiro + 2 decimal
        'vlr_titulos_11' => array(
            'tamanho' => 10,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 314-321 (08) - Quantidade total de rateios efetuados
        'qtd_rateios' => array(
            'tamanho' => 8,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 322-333 (12) - Valor total de rateios efetuados - 10 inteiro + 2 decimal
        'vlr_rateios' => array(
            'tamanho' => 10,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ),
        // Pos 334-391 (38+20=58) -- wait, let me recalculate
        // Pos 334-391 (58) - Brancos
        'filler3' => array(
            'tamanho' => 58,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ),
        // Pos 392-394 (03) - Número Sequencial Geração Arquivo Retorno
        'numero_sequencial_arquivo' => array(
            'tamanho' => 3,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
        // Pos 395-400 (06) - Número Sequencial Do Registro No Arquivo
        'numero_sequencial' => array(
            'tamanho' => 6,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ),
    );
}
