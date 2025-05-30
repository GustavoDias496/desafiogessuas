<?php

namespace Gustavodias\Desafiogesuas\repositories;

use Gustavodias\Desafiogesuas\config\Database;
use Gustavodias\Desafiogesuas\models\People;

class PeopleRepository
{
    private $conn;

    public function __construct(?\PDO $conn = null)
    {
        $this->conn = $conn ?: Database::getInstance();
    }

    public function registerPeople(People $person): bool
    {
        $stmt = $this->conn->prepare("INSERT INTO people (name, nis) VALUES (:name, :nis)");
        return $stmt->execute([
            'name' => $person->getName(),
            'nis' => $person->getNis()
        ]);
    }

    public function findByNis(string $nis): ?People
    {
        $stmt = $this->conn->prepare("SELECT * FROM people WHERE nis = :nis");
        $stmt->execute(['nis' => $nis]);
        $data = $stmt->fetch();

        if (!$data)
            return null;

        $person = new People();
        $person->setName($data['name']);
        $person->setNis($data['nis']);
        return $person;
    }
}