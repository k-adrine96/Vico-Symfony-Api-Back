<?php

namespace App\Entity;

use App\Repository\RatingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RatingRepository::class)]
class Rating
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $overall_satisfication_rate = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $review_text = null;

    #[ORM\Column(nullable: true)]
    private ?int $communication_rate = null;

    #[ORM\Column(nullable: true)]
    private ?int $work_quality_rate = null;

    #[ORM\Column(nullable: true)]
    private ?int $money_value_rate = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\ManyToOne(inversedBy: 'ratings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Project $project = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOverallSatisficationRate(): ?int
    {
        return $this->overall_satisfication_rate;
    }

    public function setOverallSatisficationRate(int $overall_satisfication_rate): static
    {
        $this->overall_satisfication_rate = $overall_satisfication_rate;

        return $this;
    }

    public function getReviewText(): ?string
    {
        return $this->review_text;
    }

    public function setReviewText(?string $review_text): static
    {
        $this->review_text = $review_text;

        return $this;
    }

    public function getCommunicationRate(): ?int
    {
        return $this->communication_rate;
    }

    public function setCommunicationRate(?int $communication_rate): static
    {
        $this->communication_rate = $communication_rate;

        return $this;
    }

    public function getWorkQualityRate(): ?int
    {
        return $this->work_quality_rate;
    }

    public function setWorkQualityRate(?int $work_quality_rate): static
    {
        $this->work_quality_rate = $work_quality_rate;

        return $this;
    }

    public function getMoneyValueRate(): ?int
    {
        return $this->money_value_rate;
    }

    public function setMoneyValueRate(?int $money_value_rate): static
    {
        $this->money_value_rate = $money_value_rate;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getVico(): ?Vico
    {
        return $this->vico;
    }

    public function setVico(?Vico $vico): static
    {
        $this->vico = $vico;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): static
    {
        $this->project = $project;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;

        return $this;
    }
}
