<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BonjourController extends Controller
{

    public function sayHello($firstname,$age)
    {

        if($age < 18)
        {
            return $this->redirect('https://disney.fr/');
        }
        return new Response('Bonjour '. $firstname . ' Vous avez '.$age.' ans');
    }
    
}