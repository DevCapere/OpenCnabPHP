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

use CnabPHP\resources\generico\retorno\L400\Generico9;

/**
 * Registro 9 - Trailler de retorno CNAB 400 da CAIXA Economica Federal
 *
 * Layout baseado no manual "67.126 v029 micro" (Layout de Cobranca 400)
 */
class Registro9 extends Generico9
{
    // Campos de outros bancos nao existentes neste layout; declarados para
    // evitar warning de propriedade indefinida no parseRetorno padrao.
    public $filler3;
    public $qtd_registros;
    public $codigo_lote;
    public $qtd_lotes;

    protected $meta = array(
        'tipo_registro' => array( // Pos: 001-001
            'tamanho' => 1,
            'default' => '9',
            'tipo' => 'int',
            'required' => true),
        'codigo_retorno' => array( // Pos: 002-002 - Preencher com '2'
            'tamanho' => 1,
            'default' => '2',
            'tipo' => 'int',
            'required' => true),
        'tipo_servico' => array( // Pos: 003-004
            'tamanho' => 2,
            'default' => '01',
            'tipo' => 'int',
            'required' => true),
        'codigo_banco' => array( // Pos: 005-007 - NE006
            'tamanho' => 3,
            'default' => '104',
            'tipo' => 'int',
            'required' => true),
        'filler1' => array( // Pos: 008-394 - Uso exclusivo CAIXA (espacos)
            'tamanho' => 387,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true),
        'numero_sequencial' => array( // Pos: 395-400
            'tamanho' => 6,
            'default' => '0',
            'tipo' => 'int',
            'required' => true),
    );
}
