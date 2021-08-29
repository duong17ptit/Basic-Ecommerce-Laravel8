<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
        [   'name'=>'Iphone Xsm',
            'price' => '400',
            'category' => 'mobile',
            'description' => 'A smartphone of Apple 2018',
            'gallery' => 'https://cdn.tgdd.vn/Products/Images/42/190321/iphone-xs-max-bac-1-1-1-org.jpg'
        ],
        [   'name'=>'Iphone 11',
            'price' => '300',
            'category' => 'mobile',
            'description' => 'A smartphone of Apple 2019',
            'gallery' => 'https://cdn.tgdd.vn/Products/Images/42/153856/iphone-11-xanh-la-1-1-org.jpg'
        ],
        [   'name'=>'Iphone 11 Pro',
            'price' => '500',
            'category' => 'mobile',
            'description' => 'A smartphone of Apple 2019',
            'gallery' => 'https://cdn.tgdd.vn/Products/Images/42/188705/iphone-11-pro-vang-1-1-org.jpg'
        ],
        [   'name'=>'Iphone 11 Promax',
            'price' => '800',
            'category' => 'mobile',
            'description' => 'A smartphone of Apple 2019',
            'gallery' => 'https://cdn.tgdd.vn/Products/Images/42/200533/iphone-11-pro-max-xanh-1-1-org.jpg'
        ],
        [   'name'=>'Iphone 12 pro',
            'price' => '200',
            'category' => 'mobile',
            'description' => 'A smartphone of Apple 2020',
            'gallery' => 'https://cdn.tgdd.vn/Products/Images/42/213032/iphone-12-pro-xanh-1-org.jpg'
        ],
        ]);
    }
}
