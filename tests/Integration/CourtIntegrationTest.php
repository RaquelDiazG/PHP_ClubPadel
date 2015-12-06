<?php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\Court;

class CourtIntegrationTest extends \PHPUnit_Framework_TestCase {

    protected $court;
    protected $entityManager;
    protected $courtRepository;
    protected $total; //Necesario para contar los datos de la BBDD y comprobar si las operaciones CRUD se han realizado correctamente

    protected function setUp() {
        $this->court = new Court(true);
        $this->entityManager = GetEntityManager();
        $this->courtRepository = $this->entityManager->getRepository('AppBundle\Entity\Court');
        $this->total = count($this->courtRepository->findAll());
    }

    public function testGetAll() {
        $this->assertNotEmpty($this->courtRepository->findAll());
    }

    public function testCreate() {
        $this->assertEquals($this->total, count($this->courtRepository->findAll()));
        $this->entityManager->persist($this->court);
        $this->entityManager->flush();
        $this->assertEquals($this->total + 1, count($this->courtRepository->findAll()));
    }

    public function testUpdate() {
        $this->assertEquals($this->total, count($this->courtRepository->findAll()));
        $this->court->setActive(false);
        $this->entityManager->flush();
        $this->assertEquals($this->total, count($this->courtRepository->findAll()));
    }

    public function testDelete() {
        $this->assertEquals($this->total, count($this->courtRepository->findAll()));
        $this->entityManager->persist($this->court);
        $this->entityManager->flush();
        $this->assertEquals($this->total + 1, count($this->courtRepository->findAll()));
        $this->entityManager->remove($this->court);
        $this->entityManager->flush();
        $this->assertEquals($this->total, count($this->courtRepository->findAll()));
    }

}
