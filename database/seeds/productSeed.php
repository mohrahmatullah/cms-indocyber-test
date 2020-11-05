<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class productSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $user = [
	        ['nama_produk' => 'Es Krim', 'image' => '985df401-ac19-4ed0-ae36-4bdbf5e68981_43.jpeg', 'harga' => '50000', 'stock' => '20'],
            ['nama_produk' => 'Labella Coffe', 'image' => 'galery.jpg', 'harga' => '500000', 'stock' => '30'],
            ['nama_produk' => 'Sam Coffe', 'image' => '1533625546-h-320-SAM_7318.jpg', 'harga' => '300000', 'stock' => '30'],
            ['nama_produk' => 'Otten Coffe', 'image' => '1533487827-h-250-otten-coffee_otten-coffee-arabica-mandheling-biji-kopi--200-g-_full03.jpg', 'harga' => '230000', 'stock' => '30'],
            ['nama_produk' => 'Wild Coffe Luak', 'image' => '1533637985-h-250-Wild-Kopi-Luwak-Civet-Coffee-Kopi-Luwak-Direct-Packaging.jpg', 'harga' => '150000', 'stock' => '50'],
            ['nama_produk' => 'Sentra Coffe', 'image' => '01533487640-h-250-sentra-kopi_arabika-aceh-gayo-500-gram---biji-kopi---whole-bean-coffee_full04.jpg', 'harga' => '200000', 'stock' => '70'],
	    ];

	    Product::insert($user);
    }
}
