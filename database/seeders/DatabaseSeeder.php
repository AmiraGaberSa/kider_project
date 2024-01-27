<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Appointment;
use App\Models\Contact;
use App\Models\Testimonial;
use App\Models\Teacher;
use App\Models\Subject;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

       // Subject::factory(20)->create();
        Appointment::factory(20)->create();
        Contact::factory(20)->create();
        Testimonial::factory(20)->create();
        Teacher::factory(20)->create();
        Subject::factory(20)->create();
        // \App\Models\User::factory(10)->create();
       
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
