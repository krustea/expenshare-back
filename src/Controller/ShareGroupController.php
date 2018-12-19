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
class ShareGroupController extends BaseController
{

    /**
     * @Route("/{slug}", name="share_group", methods="GET")
     */
    public function index(ShareGroup $shareGroup): Response
    {
        return $this->json($this->serialize($shareGroup));
    }

    /**
     * @Route("/", name="sharegroup_new", methods="POST")
     */
    public function new(Request $request)
    {
        $data = $request->getContent();

        $jsonData = json_decode($data, true);

        $em = $this->getDoctrine()->getManager();

        $sharegroup = new ShareGroup();
        $sharegroup->setSlug($jsonData["slug"]);
        $sharegroup->setCreatedAt(new \DateTime());
        $sharegroup->setClosed(false);

        $em->persist($sharegroup);
        $em->flush();

        return $this->json($this->serialize($sharegroup));
    }
}
