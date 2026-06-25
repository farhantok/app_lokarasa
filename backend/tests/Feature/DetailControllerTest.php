<?php

namespace Tests\Feature;

use App\Contracts\DetailInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery\MockInterface;

class DetailControllerTest extends TestCase
{
    /**
     * Test movie detail endpoint
     */
    public function test_movie_detail_returns_successful_response(): void
    {
        $this->mock(DetailInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('getMovieDetail')
                 ->with('1')
                 ->once()
                 ->andReturn(['data' => ['id' => 1, 'type' => 'movie']]);
        });

        $response = $this->getJson('/api/detail/movie/1');

        $response->assertStatus(200)
                 ->assertJson(['data' => ['id' => 1, 'type' => 'movie']]);
    }

    /**
     * Test anime detail endpoint
     */
    public function test_anime_detail_returns_successful_response(): void
    {
        $this->mock(DetailInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('getAnimeDetail')
                 ->with('1')
                 ->once()
                 ->andReturn(['data' => ['id' => 1, 'type' => 'anime']]);
        });

        $response = $this->getJson('/api/detail/anime/1');

        $response->assertStatus(200)
                 ->assertJson(['data' => ['id' => 1, 'type' => 'anime']]);
    }
}
