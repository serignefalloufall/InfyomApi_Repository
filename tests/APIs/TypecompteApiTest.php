<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Typecompte;

class TypecompteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_typecompte()
    {
        $typecompte = factory(Typecompte::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/typecomptes', $typecompte
        );

        $this->assertApiResponse($typecompte);
    }

    /**
     * @test
     */
    public function test_read_typecompte()
    {
        $typecompte = factory(Typecompte::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/typecomptes/'.$typecompte->id
        );

        $this->assertApiResponse($typecompte->toArray());
    }

    /**
     * @test
     */
    public function test_update_typecompte()
    {
        $typecompte = factory(Typecompte::class)->create();
        $editedTypecompte = factory(Typecompte::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/typecomptes/'.$typecompte->id,
            $editedTypecompte
        );

        $this->assertApiResponse($editedTypecompte);
    }

    /**
     * @test
     */
    public function test_delete_typecompte()
    {
        $typecompte = factory(Typecompte::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/typecomptes/'.$typecompte->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/typecomptes/'.$typecompte->id
        );

        $this->response->assertStatus(404);
    }
}
