<?php

namespace App\Entity;

use App\Repository\SurveyAnswerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SurveyAnswerRepository::class)
 */
class SurveyAnswer
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
    private $answer;

    /**
     * @ORM\ManyToMany(targetEntity=SurveyLine::class, mappedBy="answers")
     */
    private $surveyLines;

    public function __construct()
    {
        $this->surveyLines = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->answer;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): self
    {
        $this->answer = $answer;

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
            $surveyLine->addAnswer($this);
        }

        return $this;
    }

    public function removeSurveyLine(SurveyLine $surveyLine): self
    {
        if ($this->surveyLines->removeElement($surveyLine)) {
            $surveyLine->removeAnswer($this);
        }

        return $this;
    }
}
