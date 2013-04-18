<?php
namespace Ober;

class Attribute
{
    private $xml;
    public $pn;
    public $ln;
    public $tp;
    public $ind;
    public $ded;
    public $nu;
    public $def;
    public $pk;
    public function __construct($xml) {
        if (!is_null($xml)) {
            $this->read($xml);
        }
    }

    public function read($xml)
    {
        $this->xml = $xml;
        $this->pn = (string)$this->xml['P-NAME'];
        $this->ln = (string)$this->xml['L-NAME'];
        $this->tp = (string)$this->xml['DATATYPE'];
        $this->ind = (string)$this->xml['LENGTH'];
        $this->ded = (string)$this->xml['SCALE'];
        $this->nu = '1' === (string)$this->xml['NULL'];
        $this->def = (string)$this->xml['DEF'];
        $this->pk = '1' === (string)$this->xml['PK'];
    }
}