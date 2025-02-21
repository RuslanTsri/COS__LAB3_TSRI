<?php
namespace classes;

use interfaces\Item;

class ArtifactDecorator extends ItemBase
{
    protected $artifact;

    public function __construct(Item $artifact)
    {
        $this->artifact = $artifact;
    }

    public function baffAttack(): int
    {
        return $this->artifact->baffAttack();
    }

    public function baffDefense(): int
    {
        return $this->artifact->baffDefense();
    }

    public function baffHP(): int
    {
        return $this->artifact->baffHP();
    }

    public function debaffAttack(): int
    {
        return $this->artifact->debaffAttack();
    }

    public function debaffDefense(): int
    {
        return $this->artifact->debaffDefense();
    }

    public function debaffHP(): int
    {
        return $this->artifact->debaffHP();
    }


}
