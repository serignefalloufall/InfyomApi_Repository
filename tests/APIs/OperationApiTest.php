<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Operation;

class OperationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_operation()
    {
        $operation = factory(Operation::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/operations', $operation
        );

        $this->assertApiResponse($operation);
    }

    /**
     * @test
     */
    public function test_read_operation()
    {
        $operation = factory(Operation::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/operations/'.$operation->id
        );

        $this->assertApiResponse($operation->toArray());
    }

    /**
     * @test
     */
    public function test_update_operation()
    {
        $operation = factory(Operation::class)->create();
        $editedOperation = factory(Operation::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/operations/'.$operation->id,
            $editedOperation
        );

        $this->assertApiResponse($editedOperation);
    }

    /**
     * @test
     */
    public function test_delete_operation()
    {
        $operation = factory(Operation::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/operations/'.$operation->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/operations/'.$operation->id
        );

        $this->response->assertStatus(404);
    }
}
