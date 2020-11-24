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
     * @ORM\ManyToMany(targetEntity=Candidates::class, mappedBy="category")
     */
    private $candidates;


    public function __construct()
    {
        $this->job = new ArrayCollection();
        $this->candidates = new ArrayCollection();
    }

    public function __toString()
    {
        // to show the name of the Category in the select
        return $this->category;
        // to show the id of the Category in the select
        // return $this->id;
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

    /**
     * @return Collection|Candidates[]
     */
    public function getCandidates(): Collection
    {
        return $this->candidates;
    }

    public function addCandidate(Candidates $candidate): self
    {
        if (!$this->candidates->contains($candidate)) {
            $this->candidates[] = $candidate;
            $candidate->addCategory($this);
        }

        return $this;
    }

    public function removeCandidate(Candidates $candidate): self
    {
        if ($this->candidates->removeElement($candidate)) {
            $candidate->removeCategory($this);
        }

        return $this;
    }

}
