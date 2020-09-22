<?php

use App\Models\Address;
use App\Models\Patient;
use App\Models\Phone;
use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        factory(User::class, 10)->create()->each(function ($user) {

           $patient = $user->patient()->save(factory(Patient::class)->make());

           $patient->phone()->save(factory(Phone::class)->make());

           $patient->address()->save(factory(Address::class)->make());

        });
       
    
    }
}
