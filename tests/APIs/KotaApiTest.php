<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Kota;

class KotaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kota()
    {
        $kota = Kota::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/kotas', $kota
        );

        $this->assertApiResponse($kota);
    }

    /**
     * @test
     */
    public function test_read_kota()
    {
        $kota = Kota::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/kotas/'.$kota->id
        );

        $this->assertApiResponse($kota->toArray());
    }

    /**
     * @test
     */
    public function test_update_kota()
    {
        $kota = Kota::factory()->create();
        $editedKota = Kota::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/kotas/'.$kota->id,
            $editedKota
        );

        $this->assertApiResponse($editedKota);
    }

    /**
     * @test
     */
    public function test_delete_kota()
    {
        $kota = Kota::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/kotas/'.$kota->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/kotas/'.$kota->id
        );

        $this->response->assertStatus(404);
    }
}
