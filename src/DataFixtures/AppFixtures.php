<?php

namespace App\DataFixtures;

use App\Entity\PokemonType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $listType = new ArrayCollection();
        $listType->add("Plante");
        $listType->add("Eau");
        $listType->add("Feu");
        $listType->add("Acier");
        $listType->add("Combat");
        $listType->add("Dragon");
        $listType->add("Électrik");
        $listType->add("Fée");
        $listType->add("Glace");
        $listType->add("Insect");
        $listType->add("Normal");
        $listType->add("Poison");
        $listType->add("Psy");
        $listType->add("Roche");
        $listType->add("Sol");
        $listType->add("Spectre");
        $listType->add("Vol");
        $listType->add("Ténèbre");

        foreach ($listType as $type)
        {
            $pokemonType = new PokemonType();
            $pokemonType->setType($type);
            $manager->persist($pokemonType);
        }

        $manager->flush();
    }
}
