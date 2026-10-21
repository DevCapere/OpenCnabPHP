<?php
namespace CnabPHP\Tests;

use CnabPHP\Remessa;
use PHPUnit\Framework\TestCase;

/**
 * SUS-3983 — criticas Caixa CNAB 400 (header/detalhe posicoes).
 */
class RemessaCaixaCnab400Sus3983Test extends TestCase
{
    public function testHeaderDetalhePosicoesPilotoBlueTree()
    {
        $remessa = new Remessa(104, 'cnab400', array(
            'nome_empresa'              => 'ALPHALINS TURISMO LTDA',
            'tipo_inscricao'            => 2,
            'numero_inscricao'          => '04291622000177',
            'agencia'                   => '3090',
            'codigo_beneficiario'       => '0518869', // 0 + CCCCCC (header pos 31-37)
            'numero_sequencial_arquivo' => 1,
        ));

        $remessa->inserirDetalhe(array(
            'codigo_beneficiario' => '518869',
            'seu_numero'          => 'DOC-TESTE-3983',
            'nosso_numero'        => '14000000000010000',
            'carteira'            => '01',
            'codigo_movimento'    => 1,
            'numero_documento'    => 'FATURA01',
            'data_vencimento'     => '2026-09-25',
            'valor'               => 92.66,
            'especie_titulo'      => 1,
            'aceite'              => 'N',
            'data_emissao'        => '2026-09-11',
            'uso_livre'           => '1',
            'codigo_juros'        => 5,
            'tipo_inscricao'      => 2,
            'numero_inscricao'    => '08857016000127',
            'nome_pagador'        => 'EUROPLUS VIAGENS E TURISMO LTDA',
            'endereco_pagador'    => 'R DOS ANDRADAS, N 1001',
            'bairro_pagador'      => 'CENTRO',
            'cep_pagador'         => '90020015',
            'cidade_pagador'      => 'PORTO ALEGRE',
            'uf_pagador'          => 'RS',
            'cod_instrucao1'      => '02',
            'cod_instrucao2'      => '00',
            'prazo_protesto'      => 6,
        ));

        $conteudo = $remessa->getText();
        $linhas = preg_split("/\r\n|\n|\r/", trim($conteudo));
        $this->assertGreaterThanOrEqual(2, count($linhas));

        $header = $linhas[0];
        $detalhe = $linhas[1];

        $this->assertSame(400, strlen($header), 'header deve ter 400 caracteres');
        $this->assertSame(400, strlen($detalhe), 'detalhe deve ter 400 caracteres');

        $this->assertSame('0518869', substr($header, 30, 7), 'header pos 31-37 = 0+CCCCCC');
        $this->assertSame('   ', substr($header, 100, 3), 'header pos 101-103 em branco');

        $this->assertSame('0518869', substr($detalhe, 20, 7), 'linha 2 pos 21-27 = 0+CCCCCC');
        $this->assertSame('00', substr($detalhe, 29, 2), 'taxa permanencia pos 30-31 = zeros');
        $this->assertSame('DOC-TESTE-3983', rtrim(substr($detalhe, 31, 25)), 'seu numero começa na pos 32');
        $this->assertNotSame('0518869', substr($detalhe, 30, 7), 'pos 31-37 da linha 2 nao e o codigo do beneficiario');
        $this->assertSame('1', substr($detalhe, 75, 1), 'posicao 76 = 1');
        $this->assertSame('01', substr($detalhe, 106, 2), 'carteira pos 107-108 = 01');
    }

    /**
     * @dataProvider providerCadastros
     */
    public function testCadastroComESemDvGeraMesmoCodigoNasPosicoes($cadastro, $headerEsperado, $detalheEsperado)
    {
        $remessa = new Remessa(104, 'cnab400', array(
            'nome_empresa'              => 'EMPRESA TESTE',
            'tipo_inscricao'            => 2,
            'numero_inscricao'          => '12345678000199',
            'agencia'                   => '3090',
            'codigo_beneficiario'       => $headerEsperado,
            'numero_sequencial_arquivo' => 1,
        ));

        $remessa->inserirDetalhe(array(
            'codigo_beneficiario' => $cadastro,
            'seu_numero'          => 'X',
            'nosso_numero'        => '14000000000000001',
            'carteira'            => '01',
            'codigo_movimento'    => 1,
            'numero_documento'    => 'DOC1',
            'data_vencimento'     => '2026-10-01',
            'valor'               => 10.00,
            'especie_titulo'      => 1,
            'aceite'              => 'N',
            'data_emissao'        => '2026-09-01',
            'uso_livre'           => '1',
            'codigo_juros'        => 5,
            'tipo_inscricao'      => 1,
            'numero_inscricao'    => '12345678901',
            'nome_pagador'        => 'PAGADOR',
            'endereco_pagador'    => 'RUA A',
            'bairro_pagador'      => 'CENTRO',
            'cep_pagador'         => '01310100',
            'cidade_pagador'      => 'SAO PAULO',
            'uf_pagador'          => 'SP',
            'cod_instrucao1'      => '02',
            'prazo_protesto'      => 6,
        ));

        $linhas = preg_split("/\r\n|\n|\r/", trim($remessa->getText()));
        $this->assertSame($headerEsperado, substr($linhas[0], 30, 7));
        $this->assertSame($detalheEsperado, substr($linhas[1], 20, 7));
        $this->assertSame('00', substr($linhas[1], 29, 2));
        $this->assertSame('X', rtrim(substr($linhas[1], 31, 25)));
    }

    public function providerCadastros()
    {
        return array(
            'seis digitos' => array('518869', '0518869', '0518869'),
            'com hifen DV' => array('518869-5', '0518869', '0518869'),
            'sete com DV'  => array('5188695', '0518869', '0518869'),
        );
    }
}
