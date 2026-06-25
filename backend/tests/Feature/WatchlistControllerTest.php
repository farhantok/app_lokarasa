<?php

namespace Tests\Feature;

use App\Contracts\WatchlistInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery\MockInterface;

class WatchlistControllerTest extends TestCase
{
    /**
     * Test index endpoint
     */
    public function test_index_returns_successful_response(): void
    {
        $this->mock(WatchlistInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('getWatchlist')
                 ->with('1')
                 ->once()
                 ->andReturn([['id' => 1, 'item_id' => 1, 'type' => 'anime', 'status' => 'planning']]);
        });

        $response = $this->getJson('/api/watchlist/1');

        $response->assertStatus(200)
                 ->assertJson([['id' => 1, 'item_id' => 1, 'type' => 'anime', 'status' => 'planning']]);
    }

    /**
     * Test store endpoint
     */
    public function test_store_returns_successful_response(): void
    {
        $this->mock(WatchlistInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('addToWatchlist')
                 ->with(1, 1, 'anime')
                 ->once()
                 ->andReturn(true);
        });

        $response = $this->postJson('/api/watchlist', [
            'user_id' => 1,
            'item_id' => 1,
            'type' => 'anime'
        ]);

        $response->assertStatus(200)
                 ->assertJson(['success' => true]);
    }

    /**
     * Test updateStatus endpoint
     */
    public function test_update_status_returns_successful_response(): void
    {
        $this->mock(WatchlistInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('updateStatus')
                 ->with(1, 1, 'completed')
                 ->once()
                 ->andReturn(true);
        });

        $response = $this->putJson('/api/watchlist/status', [
            'user_id' => 1,
            'item_id' => 1,
            'status' => 'completed'
        ]);

        $response->assertStatus(200)
                 ->assertJson(['success' => true]);
    }

    /**
     * Test destroy endpoint
     */
    public function test_destroy_returns_successful_response(): void
    {
        $this->mock(WatchlistInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('removeFromWatchlist')
                 ->with(1, 1)
                 ->once()
                 ->andReturn(true);
        });

        $response = $this->deleteJson('/api/watchlist', [
            'user_id' => 1,
            'item_id' => 1
        ]);

        $response->assertStatus(200)
                 ->assertJson(['success' => true]);
    }
}
