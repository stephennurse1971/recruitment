<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobRepository::class)
 */
class Job
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Employer::class, inversedBy="category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $employer;

    /**
     * @ORM\ManyToOne(targetEntity=JobCategory::class, inversedBy="description")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Resort::class, inversedBy="jobs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $resort;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wages;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $accommodationProvided;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $skiPassProvided;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $equipmentProvided;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fullBoard;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateStart;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateEnd;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $requirements;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployer(): ?Employer
    {
        return $this->employer;
    }

    public function setEmployer(?Employer $employer): self
    {
        $this->employer = $employer;

        return $this;
    }

    public function getCategory(): ?JobCategory
    {
        return $this->category;
    }

    public function setCategory(?JobCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getResort(): ?Resort
    {
        return $this->resort;
    }

    public function setResort(?Resort $resort): self
    {
        $this->resort = $resort;

        return $this;
    }

    public function getWages(): ?string
    {
        return $this->wages;
    }

    public function setWages(?string $wages): self
    {
        $this->wages = $wages;

        return $this;
    }

    public function getAccommodationProvided(): ?bool
    {
        return $this->accommodationProvided;
    }

    public function setAccommodationProvided(?bool $accommodationProvided): self
    {
        $this->accommodationProvided = $accommodationProvided;

        return $this;
    }

    public function getSkiPassProvided(): ?bool
    {
        return $this->skiPassProvided;
    }

    public function setSkiPassProvided(?bool $skiPassProvided): self
    {
        $this->skiPassProvided = $skiPassProvided;

        return $this;
    }

    public function getEquipmentProvided(): ?bool
    {
        return $this->equipmentProvided;
    }

    public function setEquipmentProvided(?bool $equipmentProvided): self
    {
        $this->equipmentProvided = $equipmentProvided;

        return $this;
    }

    public function getFullBoard(): ?string
    {
        return $this->fullBoard;
    }

    public function setFullBoard(?string $fullBoard): self
    {
        $this->fullBoard = $fullBoard;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(?\DateTimeInterface $dateStart): self
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(?\DateTimeInterface $dateEnd): self
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getRequirements(): ?string
    {
        return $this->requirements;
    }

    public function setRequirements(?string $requirements): self
    {
        $this->requirements = $requirements;

        return $this;
    }
}
