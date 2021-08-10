<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\DocumentUser;
use Illuminate\Database\Seeder;

class DocumentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DocumentUser::factory(50)->create();
    }
}
