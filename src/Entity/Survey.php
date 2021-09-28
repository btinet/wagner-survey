<?php

namespace App\Entity;

use App\Repository\SurveyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SurveyRepository::class)
 */
class Survey
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
    private $title;

    /**
     * @ORM\ManyToMany(targetEntity=SurveyLine::class, inversedBy="surveys")
     */
    private $surveyLines;

    public function __construct()
    {
        $this->surveyLines = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->title;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|SurveyLine[]
     */
    public function getSurveyLines(): Collection
    {
        return $this->surveyLines;
    }

    public function addSurveyLine(SurveyLine $surveyLine): self
    {
        if (!$this->surveyLines->contains($surveyLine)) {
            $this->surveyLines[] = $surveyLine;
        }

        return $this;
    }

    public function removeSurveyLine(SurveyLine $surveyLine): self
    {
        $this->surveyLines->removeElement($surveyLine);

        return $this;
    }
}
