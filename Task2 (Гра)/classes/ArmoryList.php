<?php


namespace classes;

class ArmoryList extends ItemBase
{
    private $name;
    // Метод для отримання назви предмета
    public function getName() {
        return $this->name;
    }

    public function __construct($type)
    {
        $this->name = $type; // Встановлюємо ім'я предмета
        switch ($type) {
            case 'chainmail':
                $this->defenseBuff = 10;

                break;
            case 'plate':
                $this->defenseBuff = 20;
                break;
            case 'leather':
                $this->defenseBuff = 5;
                break;
            default:
                $this->defenseBuff = 0;
                break;
        }
    }

}

