<?php

namespace Gustavodias\Desafiogessuas\controller;

use Gustavodias\Desafiogessuas\models\People;
use Gustavodias\Desafiogessuas\services\NisGenerator;
use Gustavodias\Desafiogessuas\repositories\PeopleRepository;

class PeopleController {
    private $repository;

    public function __construct(PeopleRepository $repository = null) {
        $this->repository = $repository ?: new PeopleRepository();
    }

    public function register(string $name): People {
        $nis = NisGenerator::generate();

        $person = new People();
        $person->setName($name);
        $person->setNis($nis);

        $this->repository->registerPeople($person);

        return $person;
    }

    public function findByNis(string $nis): ?People {
        $person = $this->repository->findByNis($nis);

        return $person ?:null;
    }
}