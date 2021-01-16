<?php

use App\Models\Person;

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    private $data = [
        'id', 'name', 'created_at', 'updated_at'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Person::class, 10)->create();
    }
}
