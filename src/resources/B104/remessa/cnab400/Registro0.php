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

use CnabPHP\resources\generico\remessa\cnab400\Generico0;

/**
 * Registro 0 - Header do arquivo de remessa CNAB 400 da CAIXA Economica Federal
 *
 * Layout baseado no manual "67.126 v029 micro" (Layout de Cobranca 400)
 */
class Registro0 extends Generico0
{
    protected $meta = array(
        'tipo_registro' => array( // Pos: 001-001
            'tamanho' => 1,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
        'operacao' => array( // Pos: 002-002 - Codigo da Remessa
            'tamanho' => 1,
            'default' => '1',
            'tipo' => 'int',
            'required' => true),
        'literal_remessa' => array( // Pos: 003-009 - NE001
            'tamanho' => 7,
            'default' => 'REMESSA',
            'tipo' => 'alfa',
            'required' => true),
        'tipo_servico' => array( // Pos: 010-011
            'tamanho' => 2,
            'default' => '01',
            'tipo' => 'int',
            'required' => true),
        'literal_servico' => array( // Pos: 012-026 - NE002
            'tamanho' => 15,
            'default' => 'COBRANCA',
            'tipo' => 'alfa',
            'required' => true),
        'agencia' => array( // Pos: 027-030 - NE003
            'tamanho' => 4,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'codigo_beneficiario' => array( // Pos: 031-037 - NE004
            'tamanho' => 7,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'uso_exclusivo1' => array( // Pos: 038-046 - Uso exclusivo CAIXA (brancos)
            'tamanho' => 9,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'nome_empresa' => array( // Pos: 047-076 - NE005
            'tamanho' => 30,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true),
        'codigo_banco' => array( // Pos: 077-079 - NE006
            'tamanho' => 3,
            'default' => '104',
            'tipo' => 'int',
            'required' => true),
        'nome_banco' => array( // Pos: 080-094 - NE007
            'tamanho' => 15,
            'default' => 'CAIXA ECONOMICA',
            'tipo' => 'alfa',
            'required' => true),
        'data_gravacao' => array( // Pos: 095-100 - NE008 (DDMMAA) - nao informar na instanciação, gerada dinamicamente
            'tamanho' => 6,
            'default' => '',
            'tipo' => 'date',
            'required' => true),
        // Manual 67.126: pos 101-389 = Uso Exclusivo CAIXA (brancos).
        // Nao existe "versao_layout" 030 aqui — valor 030 foi rejeitado pela Caixa (SUS-3983).
        'uso_exclusivo2' => array( // Pos: 101-389 - Uso exclusivo CAIXA (brancos)
            'tamanho' => 289,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'numero_sequencial_arquivo' => array( // Pos: 390-394 - NE009
            'tamanho' => 5,
            'default' => '1',
            'tipo' => 'int',
            'required' => true),
        'numero_sequencial' => array( // Pos: 395-400 - NE010
            'tamanho' => 6,
            'default' => '1',
            'tipo' => 'int',
            'required' => true),
    );

    protected function set_codigo_banco($value)
    {
        $this->data['codigo_banco'] = '104';
    }

    protected function set_nome_banco($value)
    {
        $this->data['nome_banco'] = 'CAIXA ECONOMICA';
    }
}
