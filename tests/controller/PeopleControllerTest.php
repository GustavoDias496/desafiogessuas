<?php

namespace Tests\Controllers;

use Gustavodias\Desafiogessuas\controller\PeopleController;
use Gustavodias\Desafiogessuas\models\People;
use Gustavodias\Desafiogessuas\repositories\PeopleRepository;
use PHPUnit\Framework\TestCase;

class PeopleControllerTest extends TestCase
{
    private $repository;
    private $controller;

    protected function setUp(): void
    {
        $this->repository = $this->createMock(PeopleRepository::class);
        $this->controller = new PeopleController($this->repository);
    }

    public function testRegisterSuccess()
    {
        $name = 'Maria';

        $this->repository->expects($this->once())
            ->method('registerPeople')
            ->willReturn(true);

        $person = $this->controller->register($name);

        $this->assertInstanceOf(People::class, $person);
        $this->assertEquals($name, $person->getName());
        $this->assertEquals(11, strlen($person->getNis()));
    }

    public function testFindByNisFound()
    {
        $nis = '12345678901';
        $expectedPerson = new People();
        $expectedPerson->setName('Julia');
        $expectedPerson->setNis($nis);

        $this->repository->expects($this->once())
            ->method('findByNis')
            ->with($nis)
            ->willReturn($expectedPerson);

        $result = $this->controller->findByNis($nis);
        $this->assertSame($expectedPerson, $result);
    }

    public function testFindByNisNotFound()
    {
        $nis = '00000000000';

        $this->repository->expects($this->once())
            ->method('findByNis')
            ->with($nis)
            ->willReturn(null);

        $result = $this->controller->findByNis($nis);
        $this->assertNull($result);
    }
}