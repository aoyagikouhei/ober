<?php
namespace Ober;

class Entity
{
    private $xml;
    public $pn;
    public $ln;
    public $attributeAry;
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
        $list = $this->xml->xpath('.//ATTR');
        $this->attributeAry = [];
        foreach ($list as $it) {
            $this->attributeAry[] = new \Ober\Attribute($it);
        }
    }
}