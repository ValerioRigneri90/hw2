<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductImage;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use PhpParser\Node\Expr\PreDec;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductImage::create([
            'productId' => 1,
            'nameImage' => 'principale.png',
            'orderVisualisation' => 1
        ]);

         ProductImage::create([
            'productId' => 1,
            'nameImage' => 'secondaria.png',
            'orderVisualisation' => 2
        ]);

         ProductImage::create([
            'productId' => 1,
            'nameImage' => 'terziaria.png',
            'orderVisualisation' => 3
        ]);



        ProductImage::create([
            'productId' => 2,
            'nameImage' => 'principale.png',
            'orderVisualisation' => 1
        ]);

         ProductImage::create([
            'productId' => 2,
            'nameImage' => 'secondaria.png',
            'orderVisualisation' => 2
        ]);

         ProductImage::create([
            'productId' => 2,
            'nameImage' => 'terziaria.png',
            'orderVisualisation' => 3

        ]);




        ProductImage::create([
            'productId' => 3,
            'nameImage' => 'principale.png',
            'orderVisualisation' => 1
        ]);

         ProductImage::create([
            'productId' => 3,
            'nameImage' => 'secondaria.png',
            'orderVisualisation' => 2
        ]);

         ProductImage::create([
            'productId' => 3,
            'nameImage' => 'terziaria.png',
            'orderVisualisation' => 3

        ]);





           ProductImage::create([
            'productId' => 4,
            'nameImage' => 'principale.png',
            'orderVisualisation' => 1
        ]);

         ProductImage::create([
            'productId' => 4,
            'nameImage' => 'secondaria.png',
            'orderVisualisation' => 2
        ]);

         ProductImage::create([
            'productId' => 4,
            'nameImage' => 'terziaria.png',
            'orderVisualisation' => 3

        ]);




           ProductImage::create([
            'productId' => 5,
            'nameImage' => 'principale.png',
            'orderVisualisation' => 1
        ]);

         ProductImage::create([
            'productId' => 5,
            'nameImage' => 'secondaria.png',
            'orderVisualisation' => 2
        ]);

         ProductImage::create([
            'productId' => 5,
            'nameImage' => 'terziaria.png',
            'orderVisualisation' => 3

        ]);







           ProductImage::create([
            'productId' => 6,
            'nameImage' => 'principale.png',
            'orderVisualisation' => 1
        ]);

         ProductImage::create([
            'productId' => 6,
            'nameImage' => 'secondaria.png',
            'orderVisualisation' => 2
        ]);

         ProductImage::create([
            'productId' => 6,
            'nameImage' => 'terziaria.png',
            'orderVisualisation' => 3

        ]);





           ProductImage::create([
            'productId' => 7,
            'nameImage' => 'principale.png',
            'orderVisualisation' => 1
        ]);

         ProductImage::create([
            'productId' => 7,
            'nameImage' => 'secondaria.png',
            'orderVisualisation' => 2
        ]);

         ProductImage::create([
            'productId' => 7,
            'nameImage' => 'terziaria.png',
            'orderVisualisation' => 3

        ]);






           ProductImage::create([
            'productId' => 8,
            'nameImage' => 'principale.png',
            'orderVisualisation' => 1
        ]);

         ProductImage::create([
            'productId' => 8,
            'nameImage' => 'secondaria.png',
            'orderVisualisation' => 2
        ]);

         ProductImage::create([
            'productId' => 8,
            'nameImage' => 'terziaria.png',
            'orderVisualisation' => 3

        ]);





           ProductImage::create([
            'productId' => 9,
            'nameImage' => 'principale.png',
            'orderVisualisation' => 1
        ]);

         ProductImage::create([
            'productId' => 9,
            'nameImage' => 'secondaria.png',
            'orderVisualisation' => 2
        ]);

         ProductImage::create([
            'productId' => 9,
            'nameImage' => 'terziaria.png',
            'orderVisualisation' => 3

        ]);




           ProductImage::create([
            'productId' => 10,
            'nameImage' => 'principale.png',
            'orderVisualisation' => 1
        ]);

         ProductImage::create([
            'productId' => 10,
            'nameImage' => 'secondaria.png',
            'orderVisualisation' => 2
        ]);

         ProductImage::create([
            'productId' => 10,
            'nameImage' => 'terziaria.png',
            'orderVisualisation' => 3

        ]);

              ProductImage::create([
                'productId' => 11,
                'nameImage' => 'principale.png',
                'orderVisualisation' => 1
          ]);

            ProductImage::create([
                'productId' => 11,
                'nameImage' => 'secondaria.png',
                'orderVisualisation' => 2
          ]);

            ProductImage::create([
                'productId' => 11,
                'nameImage' => 'terziaria.png',
                'orderVisualisation' => 3

          ]);

          ProductImage::create([
            'productId' => 12,
            'nameImage' => 'principale.png',
            'orderVisualisation' => 1
          ]);


            ProductImage::create([
                'productId' => 12,
                'nameImage' => 'secondaria.png',
                'orderVisualisation' => 2
            ]);


            ProductImage::create([
                'productId' => 12,
                'nameImage' => 'terziaria.png',
                'orderVisualisation' => 3
            ]);


            ProductImage::create([
                'productId' => 13,
                'nameImage' => 'principale.png',
                'orderVisualisation' => 1
            ]);


            ProductImage::create([
                'productId' => 13,
                'nameImage' => 'secondaria.png',
                'orderVisualisation' => 2
            ]);


            ProductImage::create([
                'productId' => 13,
                'nameImage' => 'terziaria.png',
                'orderVisualisation' => 3
            ]);




            ProductImage::create([
                'productId' => 14,
                'nameImage' => 'principale.png',
                'orderVisualisation' => 1
            ]);




            ProductImage::create([
                'productId' => 14,
                'nameImage' => 'secondaria.png',
                'orderVisualisation' => 2
            ]);



            ProductImage::create([
                'productId' => 14,
                'nameImage' => 'terziaria.png',
                'orderVisualisation' => 3
            ]);




            ProductImage::create([
                'productId' => 15,
                'nameImage' => 'principale.png',
                'orderVisualisation' => 1
            ]);



            ProductImage::create([
                'productId' => 15,
                'nameImage' => 'secondaria.png',
                'orderVisualisation' => 2
            ]);





            ProductImage::create([
                'productId' => 15,
                'nameImage' => 'terziaria.png',
                'orderVisualisation' => 3
            ]);




            ProductImage::create([
                'productId' => 16,
                'nameImage' => 'principale.png',
                'orderVisualisation' => 1
            ]);

            ProductImage::create([
                'productId' => 16,
                'nameImage' => 'secondaria.png',
                'orderVisualisation' => 2
            ]);


            ProductImage::create([
                'productId' => 16,
                'nameImage' => 'terziaria.png',
                'orderVisualisation' => 3
            ]);



            ProductImage::create([
                'productId' => 17,
                'nameImage' => 'principale.png',
                'orderVisualisation' => 1
            ]);



            ProductImage::create([
                'productId' => 17,
                'nameImage' => 'secondaria.png',
                'orderVisualisation' => 2
            ]);



            ProductImage::create([
                'productId' => 17,
                'nameImage' => 'terziaria.png',
                'orderVisualisation' => 3
            ]);




            ProductImage::create([
                'productId' => 18,
                'nameImage' => 'principale.png',
                'orderVisualisation' => 1
            ]);



            ProductImage::create([
                'productId' => 18,
                'nameImage' => 'secondaria.png',
                'orderVisualisation' => 2
            ]);



            ProductImage::create([
                'productId' => 18,
                'nameImage' => 'terziaria.png',
                'orderVisualisation' => 3
            ]);




































    }
}

