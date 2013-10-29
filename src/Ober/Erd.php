<?php
namespace Ober;

class Erd
{
    private $xml;
    private $entityAry;
    public function __construct($path=null) {
        if (!is_null($path))
        {
            $this->read($path);
        }
    }

    private function read_file($path) {
        $str = file_get_contents($path);
        $parts = explode("<", $str); //split over <
        array_shift($parts); //remove the blank array element
        $newParts = array(); //create array for storing new parts
        foreach($parts as $p)
        {
            list($attr,$other) = explode(">", $p, 2); //get attribute data into $attr
            $attr = str_replace("\r\n", "&#10;", $attr); //do the replacement
            $newParts[] = $attr.">".$other; // put parts back together
        }
        return "<".implode("<", $newParts); // put parts back together prefixing with
    }

    public function read($path)
    {
        $this->xml = simplexml_load_string($this->read_file($path));
        $list = $this->xml->xpath('/ERD/ENTITY');
        $this->entityAry = [];
        $index = 0;
        foreach ($list as $it) {
            $this->entityAry[] = new \Ober\Entity($it, $index);
            $index += 1;
        }
    }

    public function getEntityAry()
    {
        return $this->entityAry;
    }
}
