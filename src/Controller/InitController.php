<?php

namespace App\Controller;

use App\Entity\PokemonType;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InitController extends AbstractController
{
    /**
     * @Route("Init", name="Init_Datas")
     */
    public function initData()
    {
        $entityManager = $this->getDoctrine()->getManager();




        $listType = new ArrayCollection();
        $listType->add("plate");
        $listType->add("eau");
        $listType->add("feu");
        foreach ($listType as $type)
        {
            $pokemonType = new PokemonType();
            $pokemonType->setType($type);
            $entityManager->persist($pokemonType);
            $entityManager->flush();
        }

        return ('Initialisation done.');

    }
}
