<?php namespace Tests\Repositories;

use App\Models\Typecompte;
use App\Repositories\TypecompteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TypecompteRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TypecompteRepository
     */
    protected $typecompteRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->typecompteRepo = \App::make(TypecompteRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_typecompte()
    {
        $typecompte = factory(Typecompte::class)->make()->toArray();

        $createdTypecompte = $this->typecompteRepo->create($typecompte);

        $createdTypecompte = $createdTypecompte->toArray();
        $this->assertArrayHasKey('id', $createdTypecompte);
        $this->assertNotNull($createdTypecompte['id'], 'Created Typecompte must have id specified');
        $this->assertNotNull(Typecompte::find($createdTypecompte['id']), 'Typecompte with given id must be in DB');
        $this->assertModelData($typecompte, $createdTypecompte);
    }

    /**
     * @test read
     */
    public function test_read_typecompte()
    {
        $typecompte = factory(Typecompte::class)->create();

        $dbTypecompte = $this->typecompteRepo->find($typecompte->id);

        $dbTypecompte = $dbTypecompte->toArray();
        $this->assertModelData($typecompte->toArray(), $dbTypecompte);
    }

    /**
     * @test update
     */
    public function test_update_typecompte()
    {
        $typecompte = factory(Typecompte::class)->create();
        $fakeTypecompte = factory(Typecompte::class)->make()->toArray();

        $updatedTypecompte = $this->typecompteRepo->update($fakeTypecompte, $typecompte->id);

        $this->assertModelData($fakeTypecompte, $updatedTypecompte->toArray());
        $dbTypecompte = $this->typecompteRepo->find($typecompte->id);
        $this->assertModelData($fakeTypecompte, $dbTypecompte->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_typecompte()
    {
        $typecompte = factory(Typecompte::class)->create();

        $resp = $this->typecompteRepo->delete($typecompte->id);

        $this->assertTrue($resp);
        $this->assertNull(Typecompte::find($typecompte->id), 'Typecompte should not exist in DB');
    }
}
