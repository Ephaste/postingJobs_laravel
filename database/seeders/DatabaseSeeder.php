<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         //\App\Models\User::factory(5)->create();
         $user =User::factory()->create([
            'name'=>'john Doe',
            'email'=>'john@gmail.com'
         ]);



         Listing::factory(6)->create([
            'user_id' =>$user->id
         ]);
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Listing::create(
            [
                'title'=>'Laravel senior developer',
                'tags'=>'laravel, javascript',
                'company'=>'Acrime Crop',
                'location'=>'Boston, MA',
                'email'=>'email.com',
                'website'=>'https://www.acme.com',
                'description'=>'Lorem ip and we are doing
                an example for checking we re trting to do 
                an applucartion and the imvigkation
                kuko nariamazei iminsi irikiuza and we are fucusing in our things'
                ] 
        );
        Listing::create(
            [
                'title'=>'nodeks senior developer',
                'tags'=>'laravel, javascript',
                'company'=>'Acrime Crop',
                'location'=>'Boston, MA',
                'email'=>'email.com',
                'website'=>'https://www.acme.com',
                'description'=>'Lorem ip and we are doing
                an example for checking we re trting to do 
                an applucartion and the imvigkation
                kuko nariamazei iminsi irikiuza and we are fucusing in our things'
                ] 
        );
    }
}
