<?php

namespace App\Controller;

use App\Entity\Expense;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class ExpenseController
 * @package App\Controller
 * @Route("/expense")
 */
class ExpenseController extends AbstractController
{
    /**
     * @Route("/", name="expense", methods="GET")
     */
    public function index(Request $request):Response
    {
        $expense = $this->getDoctrine()->getRepository(Expense::class)
            ->createQueryBuilder('e')
            ->innerjoin('e.person','ep')
            ->innerjoin('e.category','eg')
            ->select('e','ep','eg')
            ->getQuery()
            ->getArrayResult();

        if ($request->isXmlHttpRequest()) {
            return $this->json($expense);
        }
    }
}
