<?php

namespace Database\Factories;

use App\Models\Produk;
use App\Models\Toko;
use App\Models\KategoriProduk;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    protected $model = Produk::class;

    public function definition()
    {
        $namaProduk = implode(' ', $this->faker->words(2));
        $hargaDiskon = rand(0, 1) ? $this->faker->numberBetween(5, 500) : null;
        return [
            'toko_id' => Toko::inRandomOrder()->first()->id,
            'kategori_produk_id' => KategoriProduk::inRandomOrder()->first()->id,
            'nama' => $namaProduk,
            'slug' => Str::slug($namaProduk, '-'),
            'deskripsi' => $this->faker->paragraph,
            'harga' => $this->faker->numberBetween(10, 1000),
            'harga_diskon' => $hargaDiskon,
            'stok' => $this->faker->numberBetween(0, 100),
            'image' => 'default_produk.png',
        ];
    }
}
