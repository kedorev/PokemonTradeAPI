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
class PokemonType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Pokemon", mappedBy="type")
     */
    private $pokemonsPatern;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    public function __construct() {
        $this->pokemonsPatern = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Pokemon[]
     */
    public function getPokemonsPatern(): Collection
    {
        return $this->pokemonsPatern;
    }

    public function addPokemonsPatern(Pokemon $pokemonsPatern): self
    {
        if (!$this->pokemonsPatern->contains($pokemonsPatern)) {
            $this->pokemonsPatern[] = $pokemonsPatern;
            $pokemonsPatern->setType($this);
        }

        return $this;
    }

    public function removePokemonsPatern(Pokemon $pokemonsPatern): self
    {
        if ($this->pokemonsPatern->contains($pokemonsPatern)) {
            $this->pokemonsPatern->removeElement($pokemonsPatern);
            // set the owning side to null (unless already changed)
            if ($pokemonsPatern->getType() === $this) {
                $pokemonsPatern->setType(null);
            }
        }

        return $this;
    }
}
