<?php


namespace classes;

class WeaponList extends ItemBase
{
    private $name;
    public function getName() {
        return $this->name;
    }
    public function __construct($type)
    {
        $this->name = $type;
        switch ($type) {
            case 'sword':
                $this->attackBuff = 10;
                break;
            case 'axe':
                $this->attackBuff = 15;
                break;
            case 'staff':
                $this->attackBuff = 5;
                break;
            default:
                $this->attackBuff = 0;
                break;
        }
    }
}

