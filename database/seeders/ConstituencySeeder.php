<?php

namespace Database\Seeders;

use App\Models\County;
use App\Models\Constituency;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConstituencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
     public function run(): void
     {
        
         $json = file_get_contents(base_path('public/org_units/subcounties.json'));
         $json = json_decode($json, true);
     
         // Initialize a counter for inserted records
         $insertedCount = 0;
     
         foreach ($json as $key => $value) {
             foreach ($value as $sub_county) {
                 $parent = $sub_county['parent'];
     
                 // Echo the parent ID
                 echo "Parent ID: {$parent['id']}\n";
     
                 // Check if the parent county exists
                 $county = County::where('county_id', $parent['id'])->first();
                 if (!$county) {
                     echo "Skipping: Constituency '{$sub_county['name']}' does not have a matching county (Parent ID: {$parent['id']}).\n";
                     continue;
                 }
     
                 // Check if the sub_county already exists
                 $exists = Constituency::where('id', $sub_county['id'])
                     ->orWhere('name', $sub_county['name'])
                     ->orWhere('code', $sub_county['code'])
                     ->first();
                 if ($exists) {
                     continue;
                 }
     
                 // Insert the sub_county
                 $newSubCounty = new Constituency();
                //  $newSubCounty->id = $sub_county['id'];
                 $newSubCounty->name = $sub_county['name'];
                 $newSubCounty->code = $sub_county['code'];
                 $newSubCounty->county_code = $parent['id'];
                 $newSubCounty->county_id = $parent['id'];
                $newSubCounty->constituency_id = $sub_county['id'];
                 $newSubCounty->save();
     
                 // Increment the counter
                 $insertedCount++;
             }
         }
     
         // Display the number of inserted records
         echo "Inserted $insertedCount sub-counties.\n";
     }
     
     
     
}
