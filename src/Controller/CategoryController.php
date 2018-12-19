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
class CategoryController extends BaseController
{
    /**
     * @Route("/", name="category", methods="GET")
     */
    public function index(Category $category): Response
    {
        return $this->json($this->serialize($category));

    }

    /**
     * @Route("/", name="category_new", methods="POST")
     */
    public function new(Request $request)
    {
        $data = $request->getContent();

        $jsonData = json_decode($data, true);

        $em = $this->getDoctrine()->getManager();

        $category = new ShareGroup();
        $category->setSlug($jsonData["slug"]);
        $category->setCreatedAt(new \DateTime());
        $category->setClosed(false);

        $em->persist($category);
        $em->flush();

        return $this->json($this->serialize($category));
    }

}
