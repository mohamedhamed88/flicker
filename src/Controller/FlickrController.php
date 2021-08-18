<?php

namespace App\Controller;

use App\Infrastructure\FlickrService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/flickr")
 */
class FlickrController extends Controller
{
    /**
     * @Route("/", name="flickr_list", methods={"GET"})
     */
    public function indexAction()
    {
        return $this->render('flickr.html.twig');
    }

    /*
     * L'argument de la classe Request peut porter n'importe quel nom du moment
     * qu'il y a le type hint Request. Il peut se trouver n'importe où dans la
     * liste des arguments de la méthode.
     */
    /**
     * @Route("/", name="flickr_search", methods={"POST"})
     */
    public function searchAction(Request $request)
    {
        // Equivalent Symfony à $_POST['search']
        $search = $request->get('search');
        // Recherche des photos utilisant la liste de tags spécifiée.
        $flickrService = new FlickrService();
        $flickrPhotos = $flickrService->searchPhotos($search);

        // Demande à Twig de générer la vue en partant du template flickr.html.twig.
        return $this->render('flickr.html.twig', [
            // Liste des variables Twig disponibles dans le template.
            'search'       => $search,
            'flickrPhotos' => $flickrPhotos,
        ]);
    }
}
