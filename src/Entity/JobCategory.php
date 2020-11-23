<?php

namespace App\Entity;

use App\Repository\JobCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobCategoryRepository::class)
 */
class JobCategory
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
    private $description;

    public function __construct()
    {
        $this->description = new ArrayCollection();
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
    public function getDescription(): Collection
    {
        return $this->description;
    }

    public function addDescription(Job $description): self
    {
        if (!$this->description->contains($description)) {
            $this->description[] = $description;
            $description->setCategory($this);
        }

        return $this;
    }

    public function removeDescription(Job $description): self
    {
        if ($this->description->removeElement($description)) {
            // set the owning side to null (unless already changed)
            if ($description->getCategory() === $this) {
                $description->setCategory(null);
            }
        }

        return $this;
    }
}
