<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PokemonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PokemonRepository::class)
 */
class PokemonPatern
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * * @ORM\ManyToOne(targetEntity="App\Entity\PokemonType", inversedBy="pokemonsPatern")
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Pokemon", mappedBy="pokemonPatern")
     */
    private $pokemons;

    public function __construct() {
        $this->pokemons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?PokemonType
    {
        return $this->type;
    }

    public function setType(?PokemonType $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Pokemon[]
     */
    public function getPokemons(): Collection
    {
        return $this->pokemons;
    }

    public function addPokemon(Pokemon $pokemon): self
    {
        if (!$this->pokemons->contains($pokemon)) {
            $this->pokemons[] = $pokemon;
            $pokemon->setPokemonPatern($this);
        }

        return $this;
    }

    public function removePokemon(Pokemon $pokemon): self
    {
        if ($this->pokemons->contains($pokemon)) {
            $this->pokemons->removeElement($pokemon);
            // set the owning side to null (unless already changed)
            if ($pokemon->getPokemonPatern() === $this) {
                $pokemon->setPokemonPatern(null);
            }
        }

        return $this;
    }
}
