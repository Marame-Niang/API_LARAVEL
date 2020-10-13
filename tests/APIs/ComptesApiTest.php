<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Comptes;

class ComptesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_comptes()
    {
        $comptes = factory(Comptes::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/comptes', $comptes
        );

        $this->assertApiResponse($comptes);
    }

    /**
     * @test
     */
    public function test_read_comptes()
    {
        $comptes = factory(Comptes::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/comptes/'.$comptes->id
        );

        $this->assertApiResponse($comptes->toArray());
    }

    /**
     * @test
     */
    public function test_update_comptes()
    {
        $comptes = factory(Comptes::class)->create();
        $editedComptes = factory(Comptes::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/comptes/'.$comptes->id,
            $editedComptes
        );

        $this->assertApiResponse($editedComptes);
    }

    /**
     * @test
     */
    public function test_delete_comptes()
    {
        $comptes = factory(Comptes::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/comptes/'.$comptes->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/comptes/'.$comptes->id
        );

        $this->response->assertStatus(404);
    }
}
