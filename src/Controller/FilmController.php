<?php

namespace App\Controller;

use App\Entity\Film;
use App\Repository\FilmRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends AbstractController
{
    #[Route('/film', name: 'film_index')]
    public function index(): Response
    {
        return $this->render('film/index.html.twig', ['controller_name' => 'FilmController',]);
    }

    #[Route('/film/liste', name: 'film_liste')]
    public function liste(FilmRepository $fr): Response
    {
        //$allFilm = $fr->findAll();
        //$allFilm = $fr->findFilm2000();
        $allFilm = $fr->findFilm2008QB();

        return $this->render('film/liste.html.twig',compact('allFilm'));
    }

    #[Route('/film/details/{id}', name: 'film_details',requirements: ['id' => "\d+"])]
    public function detail(FilmRepository $fr,Film $film): Response
    {
        return $this->render('film/details.html.twig', compact('film'));
    }





    #[Route('/film/ajouter/', name: 'film_ajouter')]
    public function ajouter(EntityManagerInterface $em): Response
    {
        $film = new Film();
        $film->setTitre('RobotCop');
        $film->setAnnee('2015');

        $em->persist($film);
        $em->flush();

        return $this->render('film/ajouter.html.twig');
    }
}
