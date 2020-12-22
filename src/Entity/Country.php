<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CountryRepository::class)
 */
class Country
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity=Candidates::class, inversedBy="country")
     */
    private $candidates;

    /**
     * @ORM\Column(type="boolean")
     */
    private $include_resort;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }
    public function __toString()
    {
        // to show the name of the Category in the select
        return $this->country;
        // to show the id of the Category in the select
        // return $this->id;

    }

    public function getCandidates(): ?Candidates
    {
        return $this->candidates;
    }

    public function setCandidates(?Candidates $candidates): self
    {
        $this->candidates = $candidates;

        return $this;
    }

    public function getIncludeResort(): ?bool
    {
        return $this->include_resort;
    }

    public function setIncludeResort(bool $include_resort): self
    {
        $this->include_resort = $include_resort;

        return $this;
    }
}
