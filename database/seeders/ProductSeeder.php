<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Robot Aspirapolvere
        Product::create([
            'name' => 'Dreame X40 Ultra Complete',
            'description' => 'Robot aspirapolvere di ultima generazione con tecnologia avanzata',
            'price' => 999.00,
            'image' => 'Dreame_X40_Ultra_Complete.png',
            'category' => 'robot_aspirapolvere'
        ]);

        Product::create([
            'name' => 'Dreame X40 Master',
            'description' => 'Robot aspirapolvere professionale con funzionalità premium',
            'price' => 1399.00,
            'image' => 'Dreame_X40_Master.png',
            'category' => 'robot_aspirapolvere'
        ]);

        Product::create([
            'name' => 'Dreame X50 Ultra Complete',
            'description' => 'Robot aspirapolvere ultra-performante con intelligenza artificiale',
            'price' => 1199.00,
            'image' => 'Dreame_X50_Ultra.png',
            'category' => 'robot_aspirapolvere'
        ]);

        // Asciugacapelli
        Product::create([
            'name' => 'Asciugacapelli ad alta velocità Dreame Pocket',
            'description' => 'Asciugacapelli compatto e potente per uso quotidiano',
            'price' => 79.00,
            'image' => 'Asciugacapelli_ad_alta_velocità_Dreame_Pocket.png',
            'category' => 'asciugacapelli'
        ]);

        Product::create([
            'name' => 'Asciugacapelli Dreame Hair Glory Combo',
            'description' => 'Set completo per styling professionale dei capelli',
            'price' => 79.00,
            'image' => 'Dreame_Hair_Glory_Combo.png',
            'category' => 'asciugacapelli'
        ]);

        Product::create([
            'name' => 'Multistyler Asciugacapelli Dreame AirStyle Pro',
            'description' => 'Multistyler professionale per ogni tipo di styling',
            'price' => 299.00,
            'image' => 'Multistyler_Asciugacapelli_Dreame_AirStyle_Pro.png',
            'category' => 'asciugacapelli'
        ]);

        // Aspirapolvere senza fili
        Product::create([
            'name' => 'Aspirapolvere senza fili Dreame Z40 Station',
            'description' => 'Aspirapolvere senza fili con stazione di ricarica e svuotamento automatico',
            'price' => 899.00,
            'image' => 'Dreame_Z40_Station.png',
            'category' => 'aspirapolvere_senza_fili'
        ]);

        Product::create([
            'name' => 'Aspirapolvere senza fili Dreame Z20',
            'description' => 'Aspirapolvere senza fili leggero e maneggevole',
            'price' => 349.00,
            'image' => 'Dreame_Z20.png',
            'category' => 'aspirapolvere_senza_fili'
        ]);

        Product::create([
            'name' => 'Aspirapolvere senza fili Dreame Z30',
            'description' => 'Aspirapolvere senza fili con batteria a lunga durata',
            'price' => 379.00,
            'image' => 'Dreame_Z30.png',
            'category' => 'aspirapolvere_senza_fili'
        ]);

        // Aspirapolvere Lavapavimenti
        Product::create([
            'name' => 'Aspirapolvere Lavapavimenti Dreame H12 Pro',
            'description' => 'Aspirapolvere e lavapavimenti 2-in-1 per pulizia completa',
            'price' => 299.00,
            'image' => 'Dreame_H12_Pro.png',
            'category' => 'aspiraliquidi_aspirapolvere'
        ]);

        Product::create([
            'name' => 'Aspirapolvere Lavapavimenti Dreame H14 Pro',
            'description' => 'Aspirapolvere lavapavimenti professionale con funzioni avanzate',
            'price' => 459.00,
            'image' => 'Dreame_H14_Pro.png',
            'category' => 'aspiraliquidi_aspirapolvere'
        ]);

        Product::create([
            'name' => 'Aspirapolvere Lavapavimenti Dreame H15 Pro',
            'description' => 'Top di gamma per aspirazione e lavaggio pavimenti',
            'price' => 699.00,
            'image' => 'Dreame_H15_Pro.png',
            'category' => 'aspiraliquidi_aspirapolvere'
        ]);

        // Robot Tagliaerba
        Product::create([
            'name' => 'Robot Tagliaerba Dreame A1',
            'description' => 'Robot tagliaerba automatico per giardini di medie dimensioni',
            'price' => 1249.00,
            'image' => 'Dreame_A1.png',
            'category' => 'robot_tagliaerba'
        ]);

        Product::create([
            'name' => 'Robot Tagliaerba Dreame A1 Pro',
            'description' => 'Robot tagliaerba professionale con GPS e app mobile',
            'price' => 1299.00,
            'image' => 'Dreame_A1_Pro.png',
            'category' => 'robot_tagliaerba'
        ]);

        Product::create([
            'name' => 'Robot Tagliaerba Dreame A2',
            'description' => 'Robot tagliaerba premium per grandi superfici',
            'price' => 2499.00,
            'image' => 'Dreame_A2.png',
            'category' => 'robot_tagliaerba'
        ]);

        // Robot Piscina
        Product::create([
            'name' => 'Robot Piscina Dreame Z1 Pro',
            'description' => 'Robot pulitore piscina con tecnologia avanzata di navigazione',
            'price' => 1299.00,
            'image' => 'Dreame_Z1_Pro.png',
            'category' => 'robot_piscina'
        ]);

        Product::create([
            'name' => 'Robot Piscina Dreame Z1',
            'description' => 'Robot pulitore piscina automatico per pulizia efficace',
            'price' => 999.00,
            'image' => 'Dreame_Z1.png',
            'category' => 'robot_piscina'
        ]);

        Product::create([
            'name' => 'Robot Piscina Dreame Z1 Landing',
            'description' => 'Robot pulitore piscina entry-level con ottime prestazioni',
            'price' => 799.00,
            'image' => 'Dreame_Z1_Landing.png',
            'category' => 'robot_piscina'
        ]);
    }
}
