<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['parent_category_id'=>'', 'name'=>'Bathroom', 'image_id'=>1], //1
            ['parent_category_id'=>'', 'name'=>'Kitchen', 'image_id'=>2],  //2

            ['parent_category_id'=>1,'name'=>'Bathroom Furniture','image_id'=>3], //3
            ['parent_category_id'=>1,'name'=>'Basins','image_id'=>4],  //4
            ['parent_category_id'=>1,'name'=>'Toilets & Bidets','image_id'=>5],//5
            ['parent_category_id'=>1,'name'=>'Bathroom Tapware','image_id'=>6], //6
            ['parent_category_id'=>1,'name'=>'Shower Tapware','image_id'=>7], //7
            ['parent_category_id'=>1,'name'=>'Outdoor Tapware','image_id'=>8],//8
            ['parent_category_id'=>1,'name'=>'Baths','image_id'=>9], //9
            ['parent_category_id'=>1,'name'=>'Shower Enclosures','image_id'=>10],//10
            ['parent_category_id'=>1,'name'=>'Bathroom Accessories','image_id'=>11],//11
            ['parent_category_id'=>1,'name'=>'Heated Towel Rails','image_id'=>12], //12
            ['parent_category_id'=>1,'name'=>'Medical & Commercial','image_id'=>13], //13
            ['parent_category_id'=>1,'name'=>'Sundries & Parts','image_id'=>14], //14

            ['parent_category_id'=>2,'name'=>'Butler Sinks','image_id'=>15],
            ['parent_category_id'=>2,'name'=>'Kitchen Tapware','image_id'=>16],

            ['parent_category_id'=>3,'name'=>'Wall Vanities','image_id'=>''],
            ['parent_category_id'=>3,'name'=>'Floor Vanities','image_id'=>''],
            ['parent_category_id'=>3,'name'=>'Double Vanities','image_id'=>''],
            ['parent_category_id'=>3,'name'=>'Small Vanities','image_id'=>''],
            ['parent_category_id'=>3,'name'=>'Mirrors & Mirror Cabinets','image_id'=>''],
            ['parent_category_id'=>3,'name'=>'Tower Units & Storage','image_id'=>''],

            ['parent_category_id'=>4,'name'=>'Wall Hung Basins','image_id'=>''],
            ['parent_category_id'=>4,'name'=>'Bench Mount & Inset Basins','image_id'=>''],
            ['parent_category_id'=>4,'name'=>'Undermount Basins','image_id'=>''],
            ['parent_category_id'=>4,'name'=>'Semi Recessed Basins','image_id'=>''],
            ['parent_category_id'=>4,'name'=>'Freestanding & Pedestal Basins','image_id'=>''],
            ['parent_category_id'=>4,'name'=>'Vanity Tops','image_id'=>''],

            ['parent_category_id'=>5,'name'=>'Toilet Suites','image_id'=>''],
            ['parent_category_id'=>5,'name'=>'Floor Mount Toilets','image_id'=>''],
            ['parent_category_id'=>5,'name'=>'Wall Hung Toilets','image_id'=>''],
            ['parent_category_id'=>5,'name'=>'Accessible Toilets','image_id'=>''],
            ['parent_category_id'=>5,'name'=>'Bidets','image_id'=>''],
            ['parent_category_id'=>5,'name'=>'Cisterns & Flush Panels','image_id'=>''],

            ['parent_category_id'=>6,'name'=>'Basin Mixers & Taps','image_id'=>''],
            ['parent_category_id'=>6,'name'=>'Shower Mixers & Taps','image_id'=>''],
            ['parent_category_id'=>6,'name'=>'Bath Spouts & Mixers','image_id'=>''],
            ['parent_category_id'=>6,'name'=>'Bidet Mixers','image_id'=>''],

            ['parent_category_id'=>7,'name'=>'Body Jets & Sprays','image_id'=>''],
            ['parent_category_id'=>7,'name'=>'Slide Showers & Shower Kits','image_id'=>''],
            ['parent_category_id'=>7,'name'=>'Shower Columns','image_id'=>''],
            ['parent_category_id'=>7,'name'=>'Ceiling Mount Showers','image_id'=>''],
            ['parent_category_id'=>7,'name'=>'Wall Mount Showers','image_id'=>''],

            ['parent_category_id'=>8,'name'=>'Outdoor Showers','image_id'=>''],
            ['parent_category_id'=>8,'name'=>'Shower Components','image_id'=>''],

            ['parent_category_id'=>9,'name'=>'Bath Wastes & Tapware','image_id'=>''],
            ['parent_category_id'=>9,'name'=>'Freestanding Baths','image_id'=>''],
            ['parent_category_id'=>9,'name'=>'Inset & Built In Baths','image_id'=>''],
            ['parent_category_id'=>9,'name'=>'Clawfoot Baths','image_id'=>''],


            ['parent_category_id'=>11,'name'=>'Curtain Rings','image_id'=>''],
            ['parent_category_id'=>11,'name'=>'Toilet Roll Holders','image_id'=>''],
            ['parent_category_id'=>11,'name'=>'Towel Rails & Towel Rings','image_id'=>''],
            ['parent_category_id'=>11,'name'=>'Shelving & Baskets','image_id'=>''],
            ['parent_category_id'=>11,'name'=>'Soap Dispensers, Dishes & Tumblers','image_id'=>''],
            ['parent_category_id'=>11,'name'=>'Toilet Brushes','image_id'=>''],
            ['parent_category_id'=>11,'name'=>'Robe Hooks','image_id'=>''],
            ['parent_category_id'=>11,'name'=>'Mirrors','image_id'=>''],
            ['parent_category_id'=>11,'name'=>'Other','image_id'=>''],

            ['parent_category_id'=>12,'name'=>'Heated Towel Ladders','image_id'=>''],
            ['parent_category_id'=>12,'name'=>'Heated Towel Rails','image_id'=>''],
            ['parent_category_id'=>12,'name'=>'Un-Heated Towel Rails','image_id'=>''],

            ['parent_category_id'=>13,'name'=>'Accessible Toilets','image_id'=>''],
            ['parent_category_id'=>13,'name'=>'Accessible Basins','image_id'=>''],
            ['parent_category_id'=>13,'name'=>'Urinals','image_id'=>''],
            ['parent_category_id'=>13,'name'=>'Commercial Tapware','image_id'=>''],
            ['parent_category_id'=>13,'name'=>'Grab Rails & Accessories','image_id'=>''],
            ['parent_category_id'=>13,'name'=>'Shower Seats','image_id'=>''],

            ['parent_category_id'=>14,'name'=>'Basin Wastes & Traps','image_id'=>''],
            ['parent_category_id'=>14,'name'=>'Bath Wastes & Traps','image_id'=>''],
            ['parent_category_id'=>14,'name'=>'Tapware Parts','image_id'=>''],
            ['parent_category_id'=>14,'name'=>'Shower Parts','image_id'=>''],
            ['parent_category_id'=>14,'name'=>'Toilet Seats & Parts','image_id'=>''],
            ['parent_category_id'=>14,'name'=>'Cleaners & Repair Kits','image_id'=>''],

            ['parent_category_id'=>15,'name'=>'Single Butler Sinks','image_id'=>''],
            ['parent_category_id'=>15,'name'=>'Double Butler Sinks','image_id'=>''],
            ['parent_category_id'=>15,'name'=>'Wastes & Accessories','image_id'=>''],

            ['parent_category_id'=>16,'name'=>'Kitchen Mixers','image_id'=>''],
            ['parent_category_id'=>16,'name'=>'Filter Taps','image_id'=>''],
            ['parent_category_id'=>16,'name'=>'Soap Dispensers','image_id'=>''],
            ['parent_category_id'=>16,'name'=>'Pot Fillers','image_id'=>'']
        ]);
    }
}
