<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Jam;

class JamApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_jam()
    {
        $jam = Jam::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/jams', $jam
        );

        $this->assertApiResponse($jam);
    }

    /**
     * @test
     */
    public function test_read_jam()
    {
        $jam = Jam::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/jams/'.$jam->id
        );

        $this->assertApiResponse($jam->toArray());
    }

    /**
     * @test
     */
    public function test_update_jam()
    {
        $jam = Jam::factory()->create();
        $editedJam = Jam::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/jams/'.$jam->id,
            $editedJam
        );

        $this->assertApiResponse($editedJam);
    }

    /**
     * @test
     */
    public function test_delete_jam()
    {
        $jam = Jam::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/jams/'.$jam->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/jams/'.$jam->id
        );

        $this->response->assertStatus(404);
    }
}
