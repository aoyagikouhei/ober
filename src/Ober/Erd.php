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

    public function read($path)
    {
        $this->xml = simplexml_load_file($path);
        $list = $this->xml->xpath('/ERD/ENTITY');
        $this->entityAry = [];
        foreach ($list as $it) {
            $this->entityAry[] = new \Ober\Entity($it);
        }
    }

    public function getEntityAry()
    {
        return $this->entityAry;
    }
}