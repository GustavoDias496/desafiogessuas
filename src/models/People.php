<?php

namespace Gustavodias\Desafiogesuas\models;

class People
{
    private int $id;
    private string $name;
    private string $nis;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getNis(): string
    {
        return $this->nis;
    }

    public function setNis(string $nis): void
    {
        $this->nis = $nis;
    }

}