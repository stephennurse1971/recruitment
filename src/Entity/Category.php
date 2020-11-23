<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=Job::class, mappedBy="category")
     */
    private $job;

    /**
     * @ORM\ManyToOne(targetEntity=Candidates::class, inversedBy="Category")
     */
    private $candidates;

    /**
     * @ORM\ManyToOne(targetEntity=Candidates::class, inversedBy="category")
     */
    private $catgoryCandidate;

    public function __construct()
    {
        $this->job = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

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
            $job->setCategory($this);
        }

        return $this;
    }

    public function removeJob(Job $job): self
    {
        if ($this->job->removeElement($job)) {
            // set the owning side to null (unless already changed)
            if ($job->getCategory() === $this) {
                $job->setCategory(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        // to show the name of the Category in the select
        return $this->category;
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

    public function getCatgoryCandidate(): ?Candidates
    {
        return $this->catgoryCandidate;
    }

    public function setCatgoryCandidate(?Candidates $catgoryCandidate): self
    {
        $this->catgoryCandidate = $catgoryCandidate;

        return $this;
    }
}