<?php

namespace App\Entity;

use App\Repository\SurveyLineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SurveyLineRepository::class)
 */
class SurveyLine
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
     * @ORM\ManyToOne(targetEntity=SurveyQuestion::class, inversedBy="surveyLines")
     */
    private $question;

    /**
     * @ORM\ManyToMany(targetEntity=SurveyAnswer::class, inversedBy="surveyLines")
     */
    private $answers;

    /**
     * @ORM\ManyToMany(targetEntity=Survey::class, mappedBy="surveyLines")
     */
    private $surveys;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
        $this->surveys = new ArrayCollection();
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

    public function getQuestion(): ?SurveyQuestion
    {
        return $this->question;
    }

    public function setQuestion(?SurveyQuestion $question): self
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @return Collection|SurveyAnswer[]
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function addAnswer(SurveyAnswer $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers[] = $answer;
        }

        return $this;
    }

    public function removeAnswer(SurveyAnswer $answer): self
    {
        $this->answers->removeElement($answer);

        return $this;
    }

    /**
     * @return Collection|Survey[]
     */
    public function getSurveys(): Collection
    {
        return $this->surveys;
    }

    public function addSurvey(Survey $survey): self
    {
        if (!$this->surveys->contains($survey)) {
            $this->surveys[] = $survey;
            $survey->addSurveyLine($this);
        }

        return $this;
    }

    public function removeSurvey(Survey $survey): self
    {
        if ($this->surveys->removeElement($survey)) {
            $survey->removeSurveyLine($this);
        }

        return $this;
    }
}
