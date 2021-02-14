<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\fotoRecognitions;

class fotoRecognitionsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_foto_recognitions()
    {
        $fotoRecognitions = fotoRecognitions::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/foto_recognitions', $fotoRecognitions
        );

        $this->assertApiResponse($fotoRecognitions);
    }

    /**
     * @test
     */
    public function test_read_foto_recognitions()
    {
        $fotoRecognitions = fotoRecognitions::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/foto_recognitions/'.$fotoRecognitions->id
        );

        $this->assertApiResponse($fotoRecognitions->toArray());
    }

    /**
     * @test
     */
    public function test_update_foto_recognitions()
    {
        $fotoRecognitions = fotoRecognitions::factory()->create();
        $editedfotoRecognitions = fotoRecognitions::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/foto_recognitions/'.$fotoRecognitions->id,
            $editedfotoRecognitions
        );

        $this->assertApiResponse($editedfotoRecognitions);
    }

    /**
     * @test
     */
    public function test_delete_foto_recognitions()
    {
        $fotoRecognitions = fotoRecognitions::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/foto_recognitions/'.$fotoRecognitions->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/foto_recognitions/'.$fotoRecognitions->id
        );

        $this->response->assertStatus(404);
    }
}
