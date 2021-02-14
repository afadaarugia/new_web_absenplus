<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Level;

class LevelApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_level()
    {
        $level = Level::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/levels', $level
        );

        $this->assertApiResponse($level);
    }

    /**
     * @test
     */
    public function test_read_level()
    {
        $level = Level::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/levels/'.$level->id
        );

        $this->assertApiResponse($level->toArray());
    }

    /**
     * @test
     */
    public function test_update_level()
    {
        $level = Level::factory()->create();
        $editedLevel = Level::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/levels/'.$level->id,
            $editedLevel
        );

        $this->assertApiResponse($editedLevel);
    }

    /**
     * @test
     */
    public function test_delete_level()
    {
        $level = Level::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/levels/'.$level->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/levels/'.$level->id
        );

        $this->response->assertStatus(404);
    }
}
