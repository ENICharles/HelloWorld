<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("",name="main_accueil")
     */
    #[Route('',name:"main_accueil")]
    public function accueil()
    {
        $nombre = '<h1>42</h1>';
        $films = ['gladiator','alien','terminator','judge dread'];

        return $this->render('main/accueil.html.twig',compact("nombre","films"));
        //return $this->render('heritage.html.twig');
    }
}