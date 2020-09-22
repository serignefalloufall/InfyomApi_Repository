<?php namespace Tests\Repositories;

use App\Models\Operation;
use App\Repositories\OperationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class OperationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var OperationRepository
     */
    protected $operationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->operationRepo = \App::make(OperationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_operation()
    {
        $operation = factory(Operation::class)->make()->toArray();

        $createdOperation = $this->operationRepo->create($operation);

        $createdOperation = $createdOperation->toArray();
        $this->assertArrayHasKey('id', $createdOperation);
        $this->assertNotNull($createdOperation['id'], 'Created Operation must have id specified');
        $this->assertNotNull(Operation::find($createdOperation['id']), 'Operation with given id must be in DB');
        $this->assertModelData($operation, $createdOperation);
    }

    /**
     * @test read
     */
    public function test_read_operation()
    {
        $operation = factory(Operation::class)->create();

        $dbOperation = $this->operationRepo->find($operation->id);

        $dbOperation = $dbOperation->toArray();
        $this->assertModelData($operation->toArray(), $dbOperation);
    }

    /**
     * @test update
     */
    public function test_update_operation()
    {
        $operation = factory(Operation::class)->create();
        $fakeOperation = factory(Operation::class)->make()->toArray();

        $updatedOperation = $this->operationRepo->update($fakeOperation, $operation->id);

        $this->assertModelData($fakeOperation, $updatedOperation->toArray());
        $dbOperation = $this->operationRepo->find($operation->id);
        $this->assertModelData($fakeOperation, $dbOperation->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_operation()
    {
        $operation = factory(Operation::class)->create();

        $resp = $this->operationRepo->delete($operation->id);

        $this->assertTrue($resp);
        $this->assertNull(Operation::find($operation->id), 'Operation should not exist in DB');
    }
}
