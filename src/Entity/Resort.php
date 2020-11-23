<?php

namespace App\Entity;

use App\Repository\ResortRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResortRepository::class)
 */
class Resort
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
    private $resort;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;


    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Job::class, mappedBy="resort", orphanRemoval=true)
     */
    private $job;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $map_link;

    /**
     * @ORM\ManyToOne(targetEntity=Candidates::class, inversedBy="resort")
     */
    private $candidates;

    public function __construct()
    {
        $this->job = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResort(): ?string
    {
        return $this->resort;
    }

    public function setResort(string $resort): self
    {
        $this->resort = $resort;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }


    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Job[]
     */
    public function getJob(): Collection
    {
        return $this->job;
    }

    public function addJob(Job $job): self
    {
        if (!$this->job->contains($job)) {
            $this->job[] = $job;
            $job->setResort($this);
        }

        return $this;
    }

    public function removeJob(Job $job): self
    {
        if ($this->job->removeElement($job)) {
            // set the owning side to null (unless already changed)
            if ($job->getResort() === $this) {
                $job->setResort(null);
            }
        }

        return $this;
    }

    public function getMapLink(): ?string
    {
        return $this->map_link;
    }

    public function setMapLink(?string $map_link): self
    {
        $this->map_link = $map_link;

        return $this;
    }
    public function __toString()
    {
        // to show the name of the Category in the select
        return $this->resort;
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


}