<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array([
        'nombre'=> 'Zapatos',
        'precio'=>35.50,
        'marca'=>2,
        'created_at'=>Carbon::now()
     ],
     [
        'nombre'=> 'Gorra',
        'precio'=>12.50,
        'marca'=>1,
        'created_at'=>Carbon::now()
     ],
     [
        'nombre'=> 'Calcetas',
        'precio'=>6.00,
        'marca'=>3,
        'created_at'=>Carbon::now()
     ],
     [
        'nombre'=> 'Bandolera',
        'precio'=>15.99,
        'marca'=>1,
        'created_at'=>Carbon::now()
     ],

    );
    DB::table('productos')->insert($data);
    }
}
