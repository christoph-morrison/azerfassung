<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AnalysisController extends AbstractController
{
    /**
     * @Route("/analysis", name="analysis")
     */
    public function index()
    {
        return $this->render('analysis/index.html.twig', [
            'controller_name' => 'AnalysisController',
        ]);
    }
}
