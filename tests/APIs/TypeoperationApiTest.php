<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Typeoperation;

class TypeoperationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_typeoperation()
    {
        $typeoperation = factory(Typeoperation::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/typeoperations', $typeoperation
        );

        $this->assertApiResponse($typeoperation);
    }

    /**
     * @test
     */
    public function test_read_typeoperation()
    {
        $typeoperation = factory(Typeoperation::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/typeoperations/'.$typeoperation->id
        );

        $this->assertApiResponse($typeoperation->toArray());
    }

    /**
     * @test
     */
    public function test_update_typeoperation()
    {
        $typeoperation = factory(Typeoperation::class)->create();
        $editedTypeoperation = factory(Typeoperation::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/typeoperations/'.$typeoperation->id,
            $editedTypeoperation
        );

        $this->assertApiResponse($editedTypeoperation);
    }

    /**
     * @test
     */
    public function test_delete_typeoperation()
    {
        $typeoperation = factory(Typeoperation::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/typeoperations/'.$typeoperation->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/typeoperations/'.$typeoperation->id
        );

        $this->response->assertStatus(404);
    }
}
