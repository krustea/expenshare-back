<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Debt;


/**
 * Class DebtController
 * @package App\Controller
 * @Route("/debt")
 */
class DebtController extends BaseController
{
    /**
     * @Route("/", name="debt", methods="GET")
     */
    public function index(Debt $debt):Response
    {

        return $this->json($this->serialize($debt));

    }

    /**
     * @Route("/", name="debt_new", methods="POST")
     */
    public function new(Request $request)
    {
        $data = $request->getContent();

        $jsonData = json_decode($data, true);

        $em = $this->getDoctrine()->getManager();

        $debt = new ShareGroup();
        $debt->setSlug($jsonData["slug"]);
        $debt->setCreatedAt(new \DateTime());
        $debt->setClosed(false);

        $em->persist($debt);
        $em->flush();

        return $this->json($this->serialize($debt));
    }

}
