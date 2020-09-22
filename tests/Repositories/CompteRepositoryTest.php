<?php namespace Tests\Repositories;

use App\Models\Compte;
use App\Repositories\CompteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CompteRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CompteRepository
     */
    protected $compteRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->compteRepo = \App::make(CompteRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_compte()
    {
        $compte = factory(Compte::class)->make()->toArray();

        $createdCompte = $this->compteRepo->create($compte);

        $createdCompte = $createdCompte->toArray();
        $this->assertArrayHasKey('id', $createdCompte);
        $this->assertNotNull($createdCompte['id'], 'Created Compte must have id specified');
        $this->assertNotNull(Compte::find($createdCompte['id']), 'Compte with given id must be in DB');
        $this->assertModelData($compte, $createdCompte);
    }

    /**
     * @test read
     */
    public function test_read_compte()
    {
        $compte = factory(Compte::class)->create();

        $dbCompte = $this->compteRepo->find($compte->id);

        $dbCompte = $dbCompte->toArray();
        $this->assertModelData($compte->toArray(), $dbCompte);
    }

    /**
     * @test update
     */
    public function test_update_compte()
    {
        $compte = factory(Compte::class)->create();
        $fakeCompte = factory(Compte::class)->make()->toArray();

        $updatedCompte = $this->compteRepo->update($fakeCompte, $compte->id);

        $this->assertModelData($fakeCompte, $updatedCompte->toArray());
        $dbCompte = $this->compteRepo->find($compte->id);
        $this->assertModelData($fakeCompte, $dbCompte->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_compte()
    {
        $compte = factory(Compte::class)->create();

        $resp = $this->compteRepo->delete($compte->id);

        $this->assertTrue($resp);
        $this->assertNull(Compte::find($compte->id), 'Compte should not exist in DB');
    }
}
