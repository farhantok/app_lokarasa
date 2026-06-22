<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/menu', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Data menu berhasil diambil',
        'data' => [
            [
                'id' => 1,
                'nama_menu' => 'Nasi Goreng LokaRasa',
                'deskripsi' => 'Nasi goreng khas dengan bumbu pilihan',
                'harga' => 25000,
                'kategori' => 'makanan',
                'gambar_url' => 'http://link-gambar.com/nasgor.png',
                'created_at' => now()
            ]
        ]
    ]); // <-- Di sini harus menggunakan titik koma (;) bukan cuma kurung biasa
}); // <-- Di sini juga wajib memakai titik koma (;)
