<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{

    public function showHome()
    {
        $fruits = ['banane' => 'jaune', 'abricot' => 'orange', 'fraise' => 'rouge'];

        return $this->render(
            'homepage.html.twig',
            ['firstName' => 'Yann',
            'fruits' => $fruits
            ]

        );
    }
    
}