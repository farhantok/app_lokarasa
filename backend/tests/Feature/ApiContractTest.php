<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiContractTest extends TestCase
{
    // Gunakan trait ini jika test Anda membutuhkan database kosong yang segar setiap kali dijalankan
    use RefreshDatabase;

    /**
     * Test Kontrak API untuk Mengambil Daftar Menu Makanan LokaRasa
     */
    public function test_get_menu_list_matches_contract(): void
    {
        // 1. Simulasikan data tiruan di database (Opsional, sesuaikan dengan seeder Anda)
        // \App\Models\Menu::factory()->create(['nama' => 'Nasi Goreng Kampoeng', 'harga' => 25000]);

        // 2. Tembak endpoint API Backend yang ingin diuji kontraknya
        $response = $this->getJson('/api/menu');

        // 3. Pastikan HTTP Status Code yang kembali adalah 200 (OK/Success)
        $response->assertStatus(200);

        // 4. Validasi Struktur Kontrak (Memastikan struktur JSON sesuai kesepakatan Frontend & Backend)
        $response->assertJsonStructure([
            'status',
            'message',
            'data' => [
                '*' => [ // Tanda bintang (*) artinya semua item di dalam array 'data' wajib memiliki field di bawah ini
                    'id',
                    'nama_menu',
                    'deskripsi',
                    'harga',
                    'kategori',
                    'gambar_url',
                    'created_at'
                ]
            ]
        ]);

        // 5. Validasi Tipe Data atau Nilai Kontrak (Opsional, memastikan tipe datanya cocok)
        $response->assertJsonFragment([
            'status' => 'success'
        ]);
    }
}