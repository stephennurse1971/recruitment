<?php

namespace App\Entity;

use App\Repository\CandidatesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidatesRepository::class)
 */
class Candidates
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateOfBirth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nationality;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $previousSeasonnaire;

    /**
     * @ORM\OneToMany(targetEntity=Category::class, mappedBy="candidates")
     */
    private $Category;

    /**
     * @ORM\OneToMany(targetEntity=Country::class, mappedBy="candidates")
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity=Resort::class, mappedBy="candidates")
     */
    private $resort;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateFrom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateTo;

    /**
     * @ORM\OneToMany(targetEntity=Category::class, mappedBy="catgoryCandidate")
     */
    private $category;

    public function __construct()
    {
        $this->Category = new ArrayCollection();
        $this->country = new ArrayCollection();
        $this->resort = new ArrayCollection();
        $this->category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?\DateTimeInterface $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(?string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getPreviousSeasonnaire(): ?string
    {
        return $this->previousSeasonnaire;
    }

    public function setPreviousSeasonnaire(?string $previousSeasonnaire): self
    {
        $this->previousSeasonnaire = $previousSeasonnaire;

        return $this;
    }

    /**
     * @return Collection|category[]
     */
    public function getCategory(): Collection
    {
        return $this->Category;
    }

    public function addCategory(category $category): self
    {
        if (!$this->Category->contains($category)) {
            $this->Category[] = $category;
            $category->setCandidates($this);
        }

        return $this;
    }

    public function removeCategory(category $category): self
    {
        if ($this->Category->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getCandidates() === $this) {
                $category->setCandidates(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Country[]
     */
    public function getCountry(): Collection
    {
        return $this->country;
    }

    public function addCountry(Country $country): self
    {
        if (!$this->country->contains($country)) {
            $this->country[] = $country;
            $country->setCandidates($this);
        }

        return $this;
    }

    public function removeCountry(Country $country): self
    {
        if ($this->country->removeElement($country)) {
            // set the owning side to null (unless already changed)
            if ($country->getCandidates() === $this) {
                $country->setCandidates(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Resort[]
     */
    public function getResort(): Collection
    {
        return $this->resort;
    }

    public function addResort(Resort $resort): self
    {
        if (!$this->resort->contains($resort)) {
            $this->resort[] = $resort;
            $resort->setCandidates($this);
        }

        return $this;
    }

    public function removeResort(Resort $resort): self
    {
        if ($this->resort->removeElement($resort)) {
            // set the owning side to null (unless already changed)
            if ($resort->getCandidates() === $this) {
                $resort->setCandidates(null);
            }
        }

        return $this;
    }

    public function getDateFrom(): ?\DateTimeInterface
    {
        return $this->DateFrom;
    }

    public function setDateFrom(?\DateTimeInterface $DateFrom): self
    {
        $this->DateFrom = $DateFrom;

        return $this;
    }

    public function getDateTo(): ?\DateTimeInterface
    {
        return $this->dateTo;
    }

    public function setDateTo(?\DateTimeInterface $dateTo): self
    {
        $this->dateTo = $dateTo;

        return $this;
    }
}
