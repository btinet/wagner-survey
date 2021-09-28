<?php

namespace App\Entity;

use App\Repository\SurveyQuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=SurveyQuestionRepository::class)
 */
class SurveyQuestion
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
    private $question;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     * @Gedmo\Slug(fields={"question"})
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=SurveyLine::class, mappedBy="question")
     */
    private $surveyLines;

    public function __construct()
    {
        $this->surveyLines = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->question;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

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
            $surveyLine->setQuestion($this);
        }

        return $this;
    }

    public function removeSurveyLine(SurveyLine $surveyLine): self
    {
        if ($this->surveyLines->removeElement($surveyLine)) {
            // set the owning side to null (unless already changed)
            if ($surveyLine->getQuestion() === $this) {
                $surveyLine->setQuestion(null);
            }
        }

        return $this;
    }
}
