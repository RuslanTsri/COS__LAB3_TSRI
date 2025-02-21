<?php


namespace classes;

class ArtifactList extends ItemBase
{
    private $name;
    public function getName() {
        return $this->name;
    }
    public function __construct($type)
    {
        $this->name = $type;
        switch ($type) {
            case 'ring':
                $this->hpBuff = 10;
                break;
            case 'amulet':
                $this->hpBuff = 20;
                break;
            case 'book':
                $this->attackBuff = 5;
                break;
            default:
                $this->hpBuff = 0;
                break;
        }
    }
}

