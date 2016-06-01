<?php

use Illuminate\Database\Seeder;

class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert([
            ['name'=>'1.Bathroom Furniture.jpg','path'=>'category/1.Bathroom Furniture.jpg','mime_type'=>'image/jpeg','created_at'=>DB::raw("now()"),'updated_at'=>DB::raw("now()")],
            ['name'=>'14.Kitchen Tapware.jpg','path'=>'category/14.Kitchen Tapware.jpg','mime_type'=>'image/jpeg','created_at'=>DB::raw("now()"),'updated_at'=>DB::raw("now()")],
            ['name'=>'1.Bathroom Furniture.jpg','path'=>'category/1.Bathroom Furniture.jpg','mime_type'=>'image/jpeg','created_at'=>DB::raw("now()"),'updated_at'=>DB::raw("now()")],
            ['name'=>'2.Basins.jpg','path'=>'category/2.Basins.jpg','mime_type'=>'image/jpeg','created_at'=>DB::raw("now()"),'updated_at'=>DB::raw("now()")],
            ['name'=>'3.Toilets & Bidets.jpg','path'=>'category/3.Toilets & Bidets.jpg','mime_type'=>'image/jpeg','created_at'=>DB::raw("now()"),'updated_at'=>DB::raw("now()")],
            ['name'=>'4.Bathroom Tapware.jpg','path'=>'category/4.Bathroom Tapware.jpg','mime_type'=>'image/jpeg','created_at'=>DB::raw("now()"),'updated_at'=>DB::raw("now()")],
            ['name'=>'5.Shower Tapware.jpg','path'=>'category/5.Shower Tapware.jpg','mime_type'=>'image/jpeg','created_at'=>DB::raw("now()"),'updated_at'=>DB::raw("now()")],
            ['name'=>'6.Outdoor Tapware.jpg','path'=>'category/6.Outdoor Tapware.jpg','mime_type'=>'image/jpeg','created_at'=>DB::raw("now()"),'updated_at'=>DB::raw("now()")],
            ['name'=>'7.Baths.jpg','path'=>'category/7.Baths.jpg','mime_type'=>'image/jpeg','created_at'=>DB::raw("now()"),'updated_at'=>DB::raw("now()")],
            ['name'=>'8.Shower Enclosures.jpg','path'=>'category/8.Shower Enclosures.jpg','mime_type'=>'image/jpeg','created_at'=>DB::raw("now()"),'updated_at'=>DB::raw("now()")],
            ['name'=>'9.Bathroom Accessories.jpg','path'=>'category/9.Bathroom Accessories.jpg','mime_type'=>'image/jpeg','created_at'=>DB::raw("now()"),'updated_at'=>DB::raw("now()")],
            ['name'=>'10.Heated Towel Rails.jpg','path'=>'category/10.Heated Towel Rails.jpg','mime_type'=>'image/jpeg','created_at'=>DB::raw("now()"),'updated_at'=>DB::raw("now()")],
            ['name'=>'11.Medical & Commercial.jpg','path'=>'category/11.Medical & Commercial.jpg','mime_type'=>'image/jpeg','created_at'=>DB::raw("now()"),'updated_at'=>DB::raw("now()")],
            ['name'=>'12.Sundries & Parts.jpg','path'=>'category/12.Sundries & Parts.jpg','mime_type'=>'image/jpeg','created_at'=>DB::raw("now()"),'updated_at'=>DB::raw("now()")],
            ['name'=>'13.Butler Sinks.jpg','path'=>'category/13.Butler Sinks.jpg','mime_type'=>'image/jpeg','created_at'=>DB::raw("now()"),'updated_at'=>DB::raw("now()")],
            ['name'=>'14.Kitchen Tapware.jpg','path'=>'category/14.Kitchen Tapware.jpg','mime_type'=>'image/jpeg','created_at'=>DB::raw("now()"),'updated_at'=>DB::raw("now()")]
        ]);
    }
}
