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

use CnabPHP\resources\generico\retorno\L400\Generico0;
use CnabPHP\RetornoAbstract;

/**
 * Registro 0 - Header de retorno CNAB 400 da CAIXA Economica Federal
 *
 * Layout baseado no manual "67.126 v029 micro" (Layout de Cobranca 400)
 */
class Registro0 extends Generico0
{
    public $trailler;

    // Campos de outros bancos nao existentes neste layout; declarados para
    // evitar warning de propriedade indefinida no parseRetorno padrao.
    public $conta;
    public $conta_dv;
    public $filler3;

    protected $meta = array(
        'tipo_registro' => array( // Pos: 001-001
            'tamanho' => 1,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
        'operacao' => array( // Pos: 002-002 - Preencher com '2'
            'tamanho' => 1,
            'default' => '2',
            'tipo' => 'int',
            'required' => true),
        'literal_retorno' => array( // Pos: 003-009 - NE031
            'tamanho' => 7,
            'default' => 'RETORNO',
            'tipo' => 'alfa',
            'required' => true),
        'tipo_servico' => array( // Pos: 010-011 - NE002
            'tamanho' => 2,
            'default' => '01',
            'tipo' => 'int',
            'required' => true),
        'literal_servico' => array( // Pos: 012-026
            'tamanho' => 15,
            'default' => 'COBRANCA',
            'tipo' => 'alfa',
            'required' => true),
        'agencia' => array( // Pos: 027-030 - NE003 (Agencia de vinculacao do Beneficiario)
            'tamanho' => 4,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'codigo_beneficiario' => array( // Pos: 031-037 - NE004
            'tamanho' => 7,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'filler1' => array( // Pos: 038-046 - Uso exclusivo CAIXA (espacos)
            'tamanho' => 9,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'nome_empresa' => array( // Pos: 047-076 - NE005
            'tamanho' => 30,
            'default' => ' ',
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
        'data_gravacao' => array( // Pos: 095-100 - NE008 (DDMMAA)
            'tamanho' => 6,
            'default' => '',
            'tipo' => 'date',
            'required' => true),
        'mensagem' => array( // Pos: 101-158 - Mensagem de retorno
            'tamanho' => 58,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'versao_layout' => array( // Pos: 159-161 - NE065
            'tamanho' => 3,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
        'filler2' => array( // Pos: 162-389 - Uso exclusivo CAIXA (espacos)
            'tamanho' => 228,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'numero_sequencial_arquivo' => array( // Pos: 390-394 - NE009
            'tamanho' => 5,
            'default' => '',
            'tipo' => 'int',
            'required' => true),
        'numero_sequencial' => array( // Pos: 395-400
            'tamanho' => 6,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
    );

    public function __construct($linhaTxt)
    {
        parent::__construct($linhaTxt);

        RetornoAbstract::$linesCounter++;
        $this->inserirDetalhe();
    }

    public function inserirDetalhe()
    {
        while (RetornoAbstract::$linesCounter < (count(RetornoAbstract::$lines) - 2)) {
            $class = 'CnabPHP\resources\\B' . RetornoAbstract::$banco . '\retorno\\' . RetornoAbstract::$layout . '\Registro1';
            $this->children[] = new $class(RetornoAbstract::$lines[RetornoAbstract::$linesCounter]);
        }
    }
}
