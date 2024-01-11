<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait TimableTrait
{
    #[ORM\Column(
        type: 'datetime',
        nullable: true
    )]
    private $createdAt;

    #[ORM\Column(
        type: 'datetime',
        nullable: true
    )]
    private $updatedAt;

    public function getCreatedAt(): mixed
    {
        return $this->createdAt;
    }

    public function setCreatedAt(
        $createdAt
    ): void {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): mixed
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(
        $updatedAt
    ): void {
        $this->updatedAt = $updatedAt;
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function setUpdatedAtValue()
    {
        $this->setUpdatedAt(
            new \DateTime()
        );
    }

    #[ORM\PrePersist]
    public function setCreatedAtValue()
    {
        $this->setCreatedAt(
            new \DateTime()
        );
    }
}