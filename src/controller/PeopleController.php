<?php

namespace Gustavodias\Desafiogesuas\controller;

use Gustavodias\Desafiogesuas\models\People;
use Gustavodias\Desafiogesuas\services\NisGenerator;
use Gustavodias\Desafiogesuas\repositories\PeopleRepository;

class PeopleController
{
    private $repository;

    public function __construct(?PeopleRepository $repository = null)
    {
        $this->repository = $repository ?: new PeopleRepository();
    }

    public function register(string $name): People
    {
        $nis = NisGenerator::generate();

        $person = new People();
        $person->setName($name);
        $person->setNis($nis);

        $this->repository->registerPeople($person);

        return $person;
    }

    public function findByNis(string $nis): ?People
    {
        $person = $this->repository->findByNis($nis);

        return $person ?: null;
    }
}