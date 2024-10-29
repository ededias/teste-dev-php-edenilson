<?php

namespace Tests\Feature;

use App\Models\Supplier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SupplierTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_supplier_return_success(): void
    {
        Supplier::factory()->count(5)->create();
        
        $response = $this->getJson('/api/supplier/list');
        
        $response->assertStatus(200);
        
    }

    public function test_supplier_index_empty_list(): void
    {
        Supplier::query()->delete();
        $response = $this->getJson('/api/supplier/list');
        $response->assertStatus(200);
        $response->assertJsonCount(0, 'data');
    }

    public function test_structure_correct(): void
    {
        Supplier::factory()->create();

        $response = $this->getJson('/api/supplier/list');

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'fantasy',
                    'social',
                    'email',
                    'phone',
                    'ie',
                    'im'
                ]
            ]
        ]);
    }

}
