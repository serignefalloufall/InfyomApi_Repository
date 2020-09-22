<?php namespace Tests\Repositories;

use App\Models\Typeoperation;
use App\Repositories\TypeoperationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TypeoperationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TypeoperationRepository
     */
    protected $typeoperationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->typeoperationRepo = \App::make(TypeoperationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_typeoperation()
    {
        $typeoperation = factory(Typeoperation::class)->make()->toArray();

        $createdTypeoperation = $this->typeoperationRepo->create($typeoperation);

        $createdTypeoperation = $createdTypeoperation->toArray();
        $this->assertArrayHasKey('id', $createdTypeoperation);
        $this->assertNotNull($createdTypeoperation['id'], 'Created Typeoperation must have id specified');
        $this->assertNotNull(Typeoperation::find($createdTypeoperation['id']), 'Typeoperation with given id must be in DB');
        $this->assertModelData($typeoperation, $createdTypeoperation);
    }

    /**
     * @test read
     */
    public function test_read_typeoperation()
    {
        $typeoperation = factory(Typeoperation::class)->create();

        $dbTypeoperation = $this->typeoperationRepo->find($typeoperation->id);

        $dbTypeoperation = $dbTypeoperation->toArray();
        $this->assertModelData($typeoperation->toArray(), $dbTypeoperation);
    }

    /**
     * @test update
     */
    public function test_update_typeoperation()
    {
        $typeoperation = factory(Typeoperation::class)->create();
        $fakeTypeoperation = factory(Typeoperation::class)->make()->toArray();

        $updatedTypeoperation = $this->typeoperationRepo->update($fakeTypeoperation, $typeoperation->id);

        $this->assertModelData($fakeTypeoperation, $updatedTypeoperation->toArray());
        $dbTypeoperation = $this->typeoperationRepo->find($typeoperation->id);
        $this->assertModelData($fakeTypeoperation, $dbTypeoperation->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_typeoperation()
    {
        $typeoperation = factory(Typeoperation::class)->create();

        $resp = $this->typeoperationRepo->delete($typeoperation->id);

        $this->assertTrue($resp);
        $this->assertNull(Typeoperation::find($typeoperation->id), 'Typeoperation should not exist in DB');
    }
}
