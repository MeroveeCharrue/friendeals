<?php

namespace Friendeals\Service;

use Friendeals\Entity\Balance;
use Friendeals\Repository\PlayerRepository;

class BalanceService
{
    /**
     * @var PlayerRepository
     */
    private $playerRepository;

    /**
     * @var PlayerService
     */
    private $playerService;

    public function __construct(
        PlayerRepository $playerRepository,
        PlayerService $playerService
    ) {
        $this->playerRepository = $playerRepository;
        $this->playerService = $playerService;
    }

    public function getCurrentBalance(): array
    {
        $players = $this->playerRepository->findAll();
        $balances = [];

        foreach ($players as $player) {
            $sum = $this->playerService->getExpenseSum($player);
            $balances[] = new Balance($player, $sum);
        }

        return $balances;
    }
}
