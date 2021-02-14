<?php

namespace Friendeals\Controller;

use Friendeals\Entity\Expense;
use Friendeals\Form\Expense\AmountEditType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/expense")
 */
class ExpenseController extends AbstractController
{
    /**
     * @Route("/{id}/edit", name="expense_edit", methods={"GET","POST"})
     */
    public function editExpense(Request $request, Expense $expense): Response
    {
        $form = $this->createForm(AmountEditType::class, $expense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('expenses_last');
        }

        return $this->render('expense/edit.html.twig', [
            'expense' => $expense,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="expense_delete", methods={"DELETE"})
     */
    public function deleteExpense(Request $request, Expense $expense): Response
    {
        if ($this->isCsrfTokenValid('delete'.$expense->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($expense);
            $entityManager->flush();
        }

        return $this->redirectToRoute('expenses_last');
    }
}
