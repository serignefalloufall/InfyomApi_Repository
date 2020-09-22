<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Compte;

class CompteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_compte()
    {
        $compte = factory(Compte::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/comptes', $compte
        );

        $this->assertApiResponse($compte);
    }

    /**
     * @test
     */
    public function test_read_compte()
    {
        $compte = factory(Compte::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/comptes/'.$compte->id
        );

        $this->assertApiResponse($compte->toArray());
    }

    /**
     * @test
     */
    public function test_update_compte()
    {
        $compte = factory(Compte::class)->create();
        $editedCompte = factory(Compte::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/comptes/'.$compte->id,
            $editedCompte
        );

        $this->assertApiResponse($editedCompte);
    }

    /**
     * @test
     */
    public function test_delete_compte()
    {
        $compte = factory(Compte::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/comptes/'.$compte->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/comptes/'.$compte->id
        );

        $this->response->assertStatus(404);
    }
}
