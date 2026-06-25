<?php

namespace Tests\Feature;

use App\Contracts\ReviewInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery\MockInterface;

class ReviewControllerTest extends TestCase
{
    /**
     * Test index endpoint
     */
    public function test_index_returns_successful_response(): void
    {
        $this->mock(ReviewInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('getReviews')
                 ->with('1')
                 ->once()
                 ->andReturn([['id' => 1, 'review' => 'Great!']]);
        });

        $response = $this->getJson('/api/reviews/1');

        $response->assertStatus(200)
                 ->assertJson([['id' => 1, 'review' => 'Great!']]);
    }

    /**
     * Test store endpoint
     */
    public function test_store_returns_successful_response(): void
    {
        $this->mock(ReviewInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('addReview')
                 ->with(1, 1, 'Great!', 5)
                 ->once()
                 ->andReturn(true);
        });

        $response = $this->postJson('/api/reviews', [
            'user_id' => 1,
            'item_id' => 1,
            'review' => 'Great!',
            'rating' => 5
        ]);

        $response->assertStatus(200)
                 ->assertJson(['success' => true]);
    }

    /**
     * Test update endpoint
     */
    public function test_update_returns_successful_response(): void
    {
        $this->mock(ReviewInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('updateReview')
                 ->with('1', 'Updated review', 4)
                 ->once()
                 ->andReturn(true);
        });

        $response = $this->putJson('/api/reviews/1', [
            'review' => 'Updated review',
            'rating' => 4
        ]);

        $response->assertStatus(200)
                 ->assertJson(['success' => true]);
    }

    /**
     * Test destroy endpoint
     */
    public function test_destroy_returns_successful_response(): void
    {
        $this->mock(ReviewInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('deleteReview')
                 ->with('1')
                 ->once()
                 ->andReturn(true);
        });

        $response = $this->deleteJson('/api/reviews/1');

        $response->assertStatus(200)
                 ->assertJson(['success' => true]);
    }

    /**
     * Test average endpoint
     */
    public function test_average_returns_successful_response(): void
    {
        $this->mock(ReviewInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('getAverageRating')
                 ->with('1')
                 ->once()
                 ->andReturn(4.5);
        });

        $response = $this->getJson('/api/reviews/1/average');

        $response->assertStatus(200)
                 ->assertJson(['average_rating' => 4.5]);
    }
}
