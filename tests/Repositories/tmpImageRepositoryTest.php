<?php namespace Tests\Repositories;

use App\Models\tmpImage;
use App\Repositories\tmpImageRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class tmpImageRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var tmpImageRepository
     */
    protected $tmpImageRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tmpImageRepo = \App::make(tmpImageRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tmp_image()
    {
        $tmpImage = tmpImage::factory()->make()->toArray();

        $createdtmpImage = $this->tmpImageRepo->create($tmpImage);

        $createdtmpImage = $createdtmpImage->toArray();
        $this->assertArrayHasKey('id', $createdtmpImage);
        $this->assertNotNull($createdtmpImage['id'], 'Created tmpImage must have id specified');
        $this->assertNotNull(tmpImage::find($createdtmpImage['id']), 'tmpImage with given id must be in DB');
        $this->assertModelData($tmpImage, $createdtmpImage);
    }

    /**
     * @test read
     */
    public function test_read_tmp_image()
    {
        $tmpImage = tmpImage::factory()->create();

        $dbtmpImage = $this->tmpImageRepo->find($tmpImage->id);

        $dbtmpImage = $dbtmpImage->toArray();
        $this->assertModelData($tmpImage->toArray(), $dbtmpImage);
    }

    /**
     * @test update
     */
    public function test_update_tmp_image()
    {
        $tmpImage = tmpImage::factory()->create();
        $faketmpImage = tmpImage::factory()->make()->toArray();

        $updatedtmpImage = $this->tmpImageRepo->update($faketmpImage, $tmpImage->id);

        $this->assertModelData($faketmpImage, $updatedtmpImage->toArray());
        $dbtmpImage = $this->tmpImageRepo->find($tmpImage->id);
        $this->assertModelData($faketmpImage, $dbtmpImage->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tmp_image()
    {
        $tmpImage = tmpImage::factory()->create();

        $resp = $this->tmpImageRepo->delete($tmpImage->id);

        $this->assertTrue($resp);
        $this->assertNull(tmpImage::find($tmpImage->id), 'tmpImage should not exist in DB');
    }
}
