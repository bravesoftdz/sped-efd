<?php

namespace NFePHP\EFD\Blocos;

require_once '../src/Blocos/BlocoBase.php';
require_once '../src/Blocos/BlocoInterface.php';

use stdClass;
use NFePHP\EFD\Blocos\BlocoBase;
use NFePHP\EFD\Blocos\BlocoInterface;

/*
 01 REG Texto fixo contendo “0005” C 004 - O 
 02 FANTASIA Nome de fantasia associado ao nome empresarial. C 060 - O 
 03 CEP Código de Endereçamento Postal. N 008* - O 
 04 END Logradouro e endereço do imóvel. C 060 - O 
 05 NUM Número do imóvel. C 010 - OC 
 06 COMPL Dados complementares do endereço. C 060 - OC 
 07 BAIRRO Bairro em que o imóvel está situado. C 060 - O 
 08 FONE Número do telefone (DDD+FONE). C 11 - OC 
 09 FAX Número do fax. C 11 - OC 
 10 EMAIL Endereço do correio eletrônico. C - - OC 
 */

class Bloco1 extends BlocoBase implements BlocoInterface
{
    const REG = '0001';
    const MIN = 1;
    const MAX = 1;
    
    /**
     * @var string
     */
    public $ind_mov;
        
    //abaixo estão os critérios para validação dos dados passados para a classe
    //esses critérios serão usados para tratar, formatar ou apenas validar
    //os dados passados.
    //nome da propriedade => [
    //                        tipo de dados numerico ou caracter,
    //                        comprimento [ minimo, máximo ],
    //                        numero de decimais,
    //                        obrigatório ou não,
    //                        [ conteúdo obrigatório ]
    //                       ]
    protected $parameters = [
        'ind_mov'    => ['C', [1, 1], 0, true, []]   ];
    
    /**
     * Constructor
     * @param stdClass $std
     */
    public function __construct(stdClass $std)
    {
        parent::__construct($std);
    }
    
    /**
     * Return data in formated EFD string
     * @return string
     */
    public function __toString()
    {
        return '|' . self::REG . '|' . $this->build(self::REG);
    }
}
