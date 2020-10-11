<?php namespace Tests\Repositories;

use App\Models\Comptes;
use App\Repositories\ComptesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ComptesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ComptesRepository
     */
    protected $comptesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->comptesRepo = \App::make(ComptesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_comptes()
    {
        $comptes = factory(Comptes::class)->make()->toArray();

        $createdComptes = $this->comptesRepo->create($comptes);

        $createdComptes = $createdComptes->toArray();
        $this->assertArrayHasKey('id', $createdComptes);
        $this->assertNotNull($createdComptes['id'], 'Created Comptes must have id specified');
        $this->assertNotNull(Comptes::find($createdComptes['id']), 'Comptes with given id must be in DB');
        $this->assertModelData($comptes, $createdComptes);
    }

    /**
     * @test read
     */
    public function test_read_comptes()
    {
        $comptes = factory(Comptes::class)->create();

        $dbComptes = $this->comptesRepo->find($comptes->id);

        $dbComptes = $dbComptes->toArray();
        $this->assertModelData($comptes->toArray(), $dbComptes);
    }

    /**
     * @test update
     */
    public function test_update_comptes()
    {
        $comptes = factory(Comptes::class)->create();
        $fakeComptes = factory(Comptes::class)->make()->toArray();

        $updatedComptes = $this->comptesRepo->update($fakeComptes, $comptes->id);

        $this->assertModelData($fakeComptes, $updatedComptes->toArray());
        $dbComptes = $this->comptesRepo->find($comptes->id);
        $this->assertModelData($fakeComptes, $dbComptes->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_comptes()
    {
        $comptes = factory(Comptes::class)->create();

        $resp = $this->comptesRepo->delete($comptes->id);

        $this->assertTrue($resp);
        $this->assertNull(Comptes::find($comptes->id), 'Comptes should not exist in DB');
    }
}
