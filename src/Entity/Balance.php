<?php

namespace Friendeals\Entity;

class Balance
{
    /**
     * @var Player
     */
    private $player;

    /**
     * @var string
     */
    private $sum;

    public function __construct(
        Player $player,
        $sum
    ) {
        $this->player = $player;
        $this->sum = $sum;
    }

    private function getFormattedMoney(int $amount): string
    {
        return sprintf(
            '%s €',
            number_format($amount / 100, 2, ',', ' ')
        );
    }

    public function getResult(): string
    {
        return sprintf(
            '%s: %s - %s',
            $this->player->getName(),
            $this->getFormattedMoney($this->sum),
            $this->getFormattedMoney($this->sum / 2)
        );
    }
}
