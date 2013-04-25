<?php
namespace Ober;

class Entity
{
    private $xml;
    public $pn;
    public $ln;
    public $attributeAry;
    public $index;
    public function __construct($xml, $index) {
        $this->index = $index;
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
        $index = 0;
        foreach ($list as $it) {
            $this->attributeAry[] = new \Ober\Attribute($it, $index);
            $index += 1;
        }
    }
}