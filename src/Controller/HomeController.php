<?php

namespace Friendeals\Controller;

use Friendeals\Entity\Expense;
use Friendeals\Form\Expense\AmountEditType;
use Friendeals\Form\Expense\ExpenseCreationType;
use Friendeals\Repository\ExpenseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET","POST"})
     */
    public function home(Request $request): Response
    {
        $expense = new Expense();
        $expense->setPaymentDate(new \DateTime());
        $form = $this->createForm(ExpenseCreationType::class, $expense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($expense);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('home.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/expenses", name="expenses_last", methods={"GET"})
     */
    public function lastExpenses(ExpenseRepository $expenseRepository): Response
    {
        $expenses = $expenseRepository->findLastExpenses();

        return $this->render('last_expenses.html.twig', [
            'expenses' => $expenses
        ]);
    }
}
