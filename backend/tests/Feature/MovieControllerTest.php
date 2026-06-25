<?php

namespace Tests\Feature;

use App\Contracts\FilmInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery\MockInterface;

class MovieControllerTest extends TestCase
{
    /**
     * Test search endpoint
     */
    public function test_search_returns_successful_response(): void
    {
        $this->mock(FilmInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('searchByTitle')
                 ->with('avengers')
                 ->once()
                 ->andReturn(['data' => ['title' => 'Avengers']]);
        });

        $response = $this->getJson('/api/movie/search?title=avengers');

        $response->assertStatus(200)
                 ->assertJson(['data' => ['title' => 'Avengers']]);
    }

    /**
     * Test genre endpoint
     */
    public function test_genre_returns_successful_response(): void
    {
        $this->mock(FilmInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('searchByGenre')
                 ->with('28') // e.g. Action
                 ->once()
                 ->andReturn(['data' => ['genre' => 'Action']]);
        });

        $response = $this->getJson('/api/movie/genre/28');

        $response->assertStatus(200)
                 ->assertJson(['data' => ['genre' => 'Action']]);
    }

    /**
     * Test show endpoint
     */
    public function test_show_returns_successful_response(): void
    {
        $this->mock(FilmInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('getDetail')
                 ->with('1')
                 ->once()
                 ->andReturn(['data' => ['id' => 1]]);
        });

        $response = $this->getJson('/api/movie/1');

        $response->assertStatus(200)
                 ->assertJson(['data' => ['id' => 1]]);
    }
}
