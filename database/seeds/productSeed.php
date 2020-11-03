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
	        ['nama_produk' => 'Es Krim', 'image' => '985df401-ac19-4ed0-ae36-4bdbf5e68981_43.jpeg', 'harga' => '50000', 'stock' => '20']
	    ];

	    Product::insert($user);
    }
}
