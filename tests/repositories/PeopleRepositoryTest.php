<?php

namespace Tests\Repositories;

use Gustavodias\Desafiogessuas\models\People;
use Gustavodias\Desafiogessuas\repositories\PeopleRepository;
use PDO;
use PDOStatement;
use PHPUnit\Framework\TestCase;

class PeopleRepositoryTest extends TestCase
{
    private $pdo;
    private $stmt;
    private $repository;

    protected function setUp(): void
    {
        $this->pdo = $this->createMock(PDO::class);
        $this->stmt = $this->createMock(PDOStatement::class);
        $this->repository = new PeopleRepository($this->pdo);
    }

    public function testRegisterPeople()
    {
        $person = new People();
        $person->setName('Carlos');
        $person->setNis('56854236572');

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->willReturn($this->stmt);

        $this->stmt->expects($this->once())
            ->method('execute')
            ->with(['name' => 'Carlos', 'nis' => '56854236572'])
            ->willReturn(true);

        $result = $this->repository->registerPeople($person);
        $this->assertTrue($result);
    }

    public function testFindByNis()
    {
        $nis = '52476524862';
        $expectedData = ['name' => 'Gustavo', 'nis' => $nis];

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->willReturn($this->stmt);

        $this->stmt->expects($this->once())
            ->method('execute')
            ->with(['nis' => $nis]);

        $this->stmt->expects($this->once())
            ->method('fetch')
            ->willReturn($expectedData);

        $result = $this->repository->findByNis($nis);
        $this->assertInstanceOf(People::class, $result);
        $this->assertEquals('Gustavo', $result->getName());
        $this->assertEquals($nis, $result->getNis());
    }

    public function testFindByNisIfNotFoundData()
    {
        $nis = '00000000000';

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->willReturn($this->stmt);

        $this->stmt->expects($this->once())
            ->method('execute')
            ->with(['nis' => $nis]);

        $this->stmt->expects($this->once())
            ->method('fetch')
            ->willReturn(false);

        $result = $this->repository->findByNis($nis);
        $this->assertNull($result);
    }
}