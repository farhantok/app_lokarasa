<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiContractTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test API Contract untuk pencarian Anime
     */
    public function test_anime_search_endpoint_returns_successful_response(): void
    {
        // 1. Tembak endpoint API Anime Search (contoh mencari 'naruto')
        $response = $this->getJson('/api/anime/search?title=naruto');

        // 2. Pastikan HTTP Status Code yang kembali adalah 200 (OK/Success)
        $response->assertStatus(200);
    }

    /**
     * Test API Contract untuk pencarian Movie
     */
    public function test_movie_search_endpoint_returns_successful_response(): void
    {
        // 1. Tembak endpoint API Movie Search (contoh mencari 'avengers')
        $response = $this->getJson('/api/movie/search?title=avengers');

        // 2. Pastikan HTTP Status Code yang kembali adalah 200 (OK/Success)
        $response->assertStatus(200);
    }
}