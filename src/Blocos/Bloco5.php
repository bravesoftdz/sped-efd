<?php

namespace NFePHP\EFD\Blocos;

require_once '../src/Blocos/BlocoBase.php';
require_once '../src/Blocos/BlocoInterface.php';

use stdClass;
use NFePHP\EFD\Blocos\BlocoBase;
use NFePHP\EFD\Blocos\BlocoInterface;

class Bloco5 extends BlocoBase implements BlocoInterface
{
    const REG = '0005';
    const MIN = 1;
    const MAX = 1;
    
	/**
     * @var string
     */
	public $fantasia;
	
	public $cep;
	/**
     * @var string
     */
	public $end;
	/**
     * @var string
     */
	public $num;
/**
     * @var string
     */	
	public $compl;
/**
     * @var string
     */	
	public $bairro;
	/**
     * @var string
     */
    public $fone;
	/**
     * @var string
     */
    public $fax;
	/**
     * @var string
     */
    public $email;    
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
        'fantasia'    => ['C', [1, 60], 0, true, []],
        'cep'    => ['N', [1, 8], 0, true, []],
        'end'     => ['C', [1, 60], 0, true, []],
        'num'     => ['C', [1, 10], 0, true, []],
        'compl'      => ['C', [1, 60], 0, true, []],
        'bairro'      => ['C', [1, 60], 0, false, []],
        'fone'       => ['C', [1, 11], 0, false, []],
        'fax'        => ['C', [1, 11], 0, true, []],
        'email'        => ['C', [1, 100], 0, true, []]
    ];
    
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
