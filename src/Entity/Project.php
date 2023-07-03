<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\ManyToOne(inversedBy: 'projects')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $creator = null;

    #[ORM\ManyToOne(inversedBy: 'projects')]
    private ?Vico $vico = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

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

    public function getCreatorId(): ?Client
    {
        return $this->creator;
    }

    public function setCreatorId(?Client $creator_id): static
    {
        $this->creator = $creator_id;

        return $this;
    }

    public function getVicoId(): ?Vico
    {
        return $this->vico;
    }

    public function setVicoId(?Vico $vico_id): static
    {
        $this->vico = $vico_id;

        return $this;
    }
}
