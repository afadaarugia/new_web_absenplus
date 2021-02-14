<?php namespace Tests\Repositories;

use App\Models\Jam;
use App\Repositories\JamRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class JamRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var JamRepository
     */
    protected $jamRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->jamRepo = \App::make(JamRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_jam()
    {
        $jam = Jam::factory()->make()->toArray();

        $createdJam = $this->jamRepo->create($jam);

        $createdJam = $createdJam->toArray();
        $this->assertArrayHasKey('id', $createdJam);
        $this->assertNotNull($createdJam['id'], 'Created Jam must have id specified');
        $this->assertNotNull(Jam::find($createdJam['id']), 'Jam with given id must be in DB');
        $this->assertModelData($jam, $createdJam);
    }

    /**
     * @test read
     */
    public function test_read_jam()
    {
        $jam = Jam::factory()->create();

        $dbJam = $this->jamRepo->find($jam->id);

        $dbJam = $dbJam->toArray();
        $this->assertModelData($jam->toArray(), $dbJam);
    }

    /**
     * @test update
     */
    public function test_update_jam()
    {
        $jam = Jam::factory()->create();
        $fakeJam = Jam::factory()->make()->toArray();

        $updatedJam = $this->jamRepo->update($fakeJam, $jam->id);

        $this->assertModelData($fakeJam, $updatedJam->toArray());
        $dbJam = $this->jamRepo->find($jam->id);
        $this->assertModelData($fakeJam, $dbJam->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_jam()
    {
        $jam = Jam::factory()->create();

        $resp = $this->jamRepo->delete($jam->id);

        $this->assertTrue($resp);
        $this->assertNull(Jam::find($jam->id), 'Jam should not exist in DB');
    }
}
