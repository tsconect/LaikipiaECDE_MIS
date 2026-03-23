<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EthnicGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    
        $ethnicGroups = [
            "Basuba", "Embu", "Kamba", "Kikuyu", "Kisii", "Kuria", "Luo", "Walwana", 
            "Masai", "Mbeere", "Meru", "Nubi", "Samburu", "Taita", "Taveta", "Teso", 
            "Tharaka", "Turkana", "Luhya", "Luhya ", "Bakhayo", "Banyala", 
            "Banyore", "Batsotso", "Bukusu", "Idakho", "Isukha", "Kabras", "Kisa", 
            "Marachi", "Maragoli", "Marama", "Samia", "Tachoni", "Tiriki", "Tura", 
            "Wanga", "Mijikenda", "Mijikenda ", "Boni", "Chonyi", "Dahalo", 
            "Digo", "Duruma", "Giriama", "Jibana", "Kambe", "Kauma", "Pokomo", "Rabai", 
            "Ribe", "Waata", "Swahili", "Swahili ", "Amu", "Bajuni", 
            "Chitundi", "Jomvu", "Munyoyaya", "Mvita", "Ngare", "Pate", "Siu", "Vumba", 
            "Wachangamwe", "Wafaza", "Wakatwa", "Wakilifi", "Wakilindini", "Wamtwapa", 
            "Washaka", "Watangana", "Watikuu", "Kalenjin", 
            "Arror", "Bung’omek", "Cherangany", "Dorobo", "El Molo", "Endo", "Keiyo", 
            "Kipsigis", "Marakwet", "Nandi", "Ogiek", "Saboat", "Samor", "Senger", 
            "Sengwer", "Terik", "Tugen", "Pokot", "Endorois", "Kenyan Somali", 
            "Somali ", "Ajuran", "Degodia", "Gurreh", "Hawiyah", "Murile", 
            "Ogaden", "Ilchamus", "Njemps", "Borana", "Burji", "Dasenach", "Gabra", 
            "Galla", "Gosha", "Konso", "Orma", "Rendile", "Sakuye", "Waat", "Galjeel", 
            "Kenyan Arabs", "Kenyan Asians", "Kenyan Europeans", "Kenyan Americans", 
            "Isaak", "Leysan", "East Africa", "Uganda", "Tanzania", "Rwanda", 
            "Burundi", "Other Africans", "Asians", "Europe", "Americans", "Caribbeans"
        ];
    
        DB::table('ethnic_groups')->truncate();
        
        foreach ($ethnicGroups as $group) {
            DB::table('ethnic_groups')->insert([
            'name' => $group
            ]);
        }
        }
}
