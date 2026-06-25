<?php

namespace Tests\Feature;

use App\Contracts\AnimeInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery\MockInterface;

class AnimeControllerTest extends TestCase
{
    /**
     * Test search endpoint
     */
    public function test_search_returns_successful_response(): void
    {
        $this->mock(AnimeInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('searchByTitle')
                 ->with('naruto')
                 ->once()
                 ->andReturn(['data' => ['title' => 'Naruto']]);
        });

        $response = $this->getJson('/api/anime/search?title=naruto');

        $response->assertStatus(200)
                 ->assertJson(['data' => ['title' => 'Naruto']]);
    }

    /**
     * Test genre endpoint
     */
    public function test_genre_returns_successful_response(): void
    {
        $this->mock(AnimeInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('searchByGenre')
                 ->with('action')
                 ->once()
                 ->andReturn(['data' => ['genre' => 'action']]);
        });

        $response = $this->getJson('/api/anime/genre/action');

        $response->assertStatus(200)
                 ->assertJson(['data' => ['genre' => 'action']]);
    }

    /**
     * Test show endpoint
     */
    public function test_show_returns_successful_response(): void
    {
        $this->mock(AnimeInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('getDetail')
                 ->with('1')
                 ->once()
                 ->andReturn(['data' => ['id' => 1]]);
        });

        $response = $this->getJson('/api/anime/1');

        $response->assertStatus(200)
                 ->assertJson(['data' => ['id' => 1]]);
    }
}
