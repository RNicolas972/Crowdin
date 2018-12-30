<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profile")
 */
class ProfileController extends AbstractController
{
    /**
     * @Route("/", name="profile")
     */
    public function index()
    {
        return $this->render('profile/index.html.twig', [
            'user' => $this->getUser(),
            'controller_name' => 'My Account',
        ]);
    }

    /**  
     * @Route("/project", name="profile_project")
     */
    public function user()
    {
        return $this->render('project/index.html.twig', [
            'projects' => $this->getUser()->getProjects(),
            'controller_name' => 'My Projects',
        ]);
    }
}
