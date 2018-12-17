<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;


/**
 * Class CategoryController
 * @package App\Controller
 * @Route("/category")
 */
class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="category", methods="GET")
     */
    public function index(Request $request): Response
    {
        $category = $this->getDoctrine()->getRepository(Category::class)
            ->createQueryBuilder('c')
            ->getQuery()
            ->getArrayResult();

        if ($request->isXmlHttpRequest()) {
            return $this->json($category);
        }
    }
}
