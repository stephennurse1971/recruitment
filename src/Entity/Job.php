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
     * @ORM\ManyToOne(targetEntity=Employer::class, inversedBy="job")
     * @ORM\JoinColumn(nullable=false)
     */
    private $employer;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="job")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=Resort::class, inversedBy="job")
     * @ORM\JoinColumn(nullable=false)
     */
    private $resort;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wages;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $accommodation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $skipass;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $equipmenthire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fullboard;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_start;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_end;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $requirements;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $languages;

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

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getAccommodation(): ?string
    {
        return $this->accommodation;
    }

    public function setAccommodation(?string $accommodation): self
    {
        $this->accommodation = $accommodation;

        return $this;
    }

    public function getSkipass(): ?string
    {
        return $this->skipass;
    }

    public function setSkipass(?string $skipass): self
    {
        $this->skipass = $skipass;

        return $this;
    }

    public function getEquipmenthire(): ?string
    {
        return $this->equipmenthire;
    }

    public function setEquipmenthire(?string $equipmenthire): self
    {
        $this->equipmenthire = $equipmenthire;

        return $this;
    }

    public function getFullboard(): ?string
    {
        return $this->fullboard;
    }

    public function setFullboard(?string $fullboard): self
    {
        $this->fullboard = $fullboard;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->date_start;
    }

    public function setDateStart(?\DateTimeInterface $date_start): self
    {
        $this->date_start = $date_start;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->date_end;
    }

    public function setDateEnd(?\DateTimeInterface $date_end): self
    {
        $this->date_end = $date_end;

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

    public function getLanguages(): ?string
    {
        return $this->languages;
    }

    public function setLanguages(?string $languages): self
    {
        $this->languages = $languages;

        return $this;
    }
}
