<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PokemonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PokemonRepository::class)
 */
class Pokemon
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * * @ORM\ManyToOne(targetEntity="App\Entity\PokemonPatern", inversedBy="pokemons")
     */
    private $pokemonPatern;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPokemonPatern(): ?PokemonPatern
    {
        return $this->pokemonPatern;
    }

    public function setPokemonPatern(?PokemonPatern $pokemonPatern): self
    {
        $this->pokemonPatern = $pokemonPatern;

        return $this;
    }
}
