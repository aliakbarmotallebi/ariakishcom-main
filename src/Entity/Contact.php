<?php

namespace App\Entity;

use App\Entity\Traits\TimableTrait;
use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
#[ORM\Table(name: '`contacts`')]
#[ORM\HasLifecycleCallbacks]
class Contact
{
    use TimableTrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $fullname = null;

    #[ORM\Column(length: 11)]
    #[Assert\NotBlank]
    #[Assert\Regex('/^09[0-9]{9}$/')]
    private ?string $phoneNumber = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;
    
    #[ORM\Column(
        options: ['default' => 'STATUS_UNPUBLISHED'],
        columnDefinition: "ENUM('STATUS_PUBLISHED', 'STATUS_UNPUBLISHED') NOT NULL DEFAULT 'STATUS_UNPUBLISHED'"
    )]
    private ?string $status = 'STATUS_UNPUBLISHED';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): static
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }
}