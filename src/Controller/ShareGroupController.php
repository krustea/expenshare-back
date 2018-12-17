<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ShareGroup;

/**
 * Class ShareGroupController
 * @package App\Controller
 * @Route("/sharegroup")
 */
class ShareGroupController extends AbstractController
{

    /**
     * @Route("/", name="share_group", methods="GET")
     */
    public function index(Request $request): Response
    {$share = $this->getDoctrine()->getRepository(ShareGroup::class)
        ->createQueryBuilder('s')
        ->getQuery()
        ->getArrayResult();

        if ($request->isXmlHttpRequest()) {
            return $this->json($share);
        }
    }
}
