<?php

namespace App\Entity;

use App\Repository\TestExamRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestExamRepository::class)]
class TestExam
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $test1;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $test2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTest1(): ?string
    {
        return $this->test1;
    }

    public function setTest1(?string $test1): self
    {
        $this->test1 = $test1;

        return $this;
    }

    public function getTest2(): ?string
    {
        return $this->test2;
    }

    public function setTest2(?string $test2): self
    {
        $this->test2 = $test2;

        return $this;
    }
}
