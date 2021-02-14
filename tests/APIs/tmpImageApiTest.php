<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\tmpImage;

class tmpImageApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tmp_image()
    {
        $tmpImage = tmpImage::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tmp_images', $tmpImage
        );

        $this->assertApiResponse($tmpImage);
    }

    /**
     * @test
     */
    public function test_read_tmp_image()
    {
        $tmpImage = tmpImage::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/tmp_images/'.$tmpImage->id
        );

        $this->assertApiResponse($tmpImage->toArray());
    }

    /**
     * @test
     */
    public function test_update_tmp_image()
    {
        $tmpImage = tmpImage::factory()->create();
        $editedtmpImage = tmpImage::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tmp_images/'.$tmpImage->id,
            $editedtmpImage
        );

        $this->assertApiResponse($editedtmpImage);
    }

    /**
     * @test
     */
    public function test_delete_tmp_image()
    {
        $tmpImage = tmpImage::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tmp_images/'.$tmpImage->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tmp_images/'.$tmpImage->id
        );

        $this->response->assertStatus(404);
    }
}
