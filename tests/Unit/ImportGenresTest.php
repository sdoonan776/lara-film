<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class ImportGenresTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_that_imported_genre_can_be_found_in_database(): void
    {
        $this->artisan('import:genres');
        $this->assertDatabaseHas('genres', [
            'name' => 'Action'
        ]);
    }
}
