<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Person;

/**
 * Class PersonController
 * @package App\Controller
 * @Route("/person")
 */
class PersonController extends AbstractController
{

    /**
     * @Route("/", name="person", methods="GET")
     * @param \Symfony\Component\HttpFoundation\Response $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request) :Response
    {
        $person = $this->getDoctrine()->getRepository(Person::class)
            ->createQueryBuilder('p')
            ->innerjoin('p.shareGroup','ps')
            ->select('p','ps')
            ->getQuery()
            ->getArrayResult();

        if ($request->isXmlHttpRequest()) {
            return $this->json($person);
        }
    }
}
