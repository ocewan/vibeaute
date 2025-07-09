<?php

namespace App\Entity;

class Photo
{
    protected ?int $id = null;
    protected ?string $alt = null;
    protected ?string $url = null;
    protected ?\DateTime $uploadedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }
    public function setAlt(?string $alt): void
    {
        $this->alt = $alt;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    public function getUploadedAt(): ?\DateTime
    {
        return $this->uploadedAt;
    }
    public function setUploadedAt(?\DateTime $uploadedAt): void
    {
        $this->uploadedAt = $uploadedAt;
    }
}
