<?php

namespace Friendeals\Service;

use Friendeals\Entity\Expense;
use Friendeals\Entity\Player;
use Friendeals\Repository\ExpenseRepository;

class PlayerService
{
    /**
     * @var ExpenseRepository
     */
    private $expenseRepository;

    public function __construct(ExpenseRepository $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }

    public function getExpenseSum(Player $player): int
    {
        $sum = 0;

        $playerExpenses = $this->getExpenses($player);
        foreach ($playerExpenses as $expense) {
            $sum += $expense->getAmount();
        }

        return $sum;
    }

    /**
     * @return Expense[]
     */
    private function getExpenses(Player $player): array
    {
        return $this->expenseRepository->findBy(
            ['author' => $player]
        );
    }
}
