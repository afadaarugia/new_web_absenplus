<?php namespace Tests\Repositories;

use App\Models\fotoRecognitions;
use App\Repositories\fotoRecognitionsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class fotoRecognitionsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var fotoRecognitionsRepository
     */
    protected $fotoRecognitionsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->fotoRecognitionsRepo = \App::make(fotoRecognitionsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_foto_recognitions()
    {
        $fotoRecognitions = fotoRecognitions::factory()->make()->toArray();

        $createdfotoRecognitions = $this->fotoRecognitionsRepo->create($fotoRecognitions);

        $createdfotoRecognitions = $createdfotoRecognitions->toArray();
        $this->assertArrayHasKey('id', $createdfotoRecognitions);
        $this->assertNotNull($createdfotoRecognitions['id'], 'Created fotoRecognitions must have id specified');
        $this->assertNotNull(fotoRecognitions::find($createdfotoRecognitions['id']), 'fotoRecognitions with given id must be in DB');
        $this->assertModelData($fotoRecognitions, $createdfotoRecognitions);
    }

    /**
     * @test read
     */
    public function test_read_foto_recognitions()
    {
        $fotoRecognitions = fotoRecognitions::factory()->create();

        $dbfotoRecognitions = $this->fotoRecognitionsRepo->find($fotoRecognitions->id);

        $dbfotoRecognitions = $dbfotoRecognitions->toArray();
        $this->assertModelData($fotoRecognitions->toArray(), $dbfotoRecognitions);
    }

    /**
     * @test update
     */
    public function test_update_foto_recognitions()
    {
        $fotoRecognitions = fotoRecognitions::factory()->create();
        $fakefotoRecognitions = fotoRecognitions::factory()->make()->toArray();

        $updatedfotoRecognitions = $this->fotoRecognitionsRepo->update($fakefotoRecognitions, $fotoRecognitions->id);

        $this->assertModelData($fakefotoRecognitions, $updatedfotoRecognitions->toArray());
        $dbfotoRecognitions = $this->fotoRecognitionsRepo->find($fotoRecognitions->id);
        $this->assertModelData($fakefotoRecognitions, $dbfotoRecognitions->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_foto_recognitions()
    {
        $fotoRecognitions = fotoRecognitions::factory()->create();

        $resp = $this->fotoRecognitionsRepo->delete($fotoRecognitions->id);

        $this->assertTrue($resp);
        $this->assertNull(fotoRecognitions::find($fotoRecognitions->id), 'fotoRecognitions should not exist in DB');
    }
}
