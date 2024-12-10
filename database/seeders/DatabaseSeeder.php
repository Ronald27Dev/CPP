<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Nota;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'      => 'admin',
            'email'     => 'admin@admin.com',
            'password'  => Hash::make('admin123'),
            'role'      => 1,
        ]);

        User::factory()->create([
            'name'      => 'Test User',
            'email'     => 'test@example.com',
            'password'  => Hash::make('123456789'),
            'role'      => 3,
        ]);

        User::factory()->create([
            'name'      => 'Raimundo de Oliveira',
            'email'     => 'raimundo@cpp.com',
            'password'  => Hash::make('raimundo'),
            'role'      => 2,
        ]);

        User::factory()->create([
            'name'      => 'Don Gonzales',
            'email'     => 'don@cpp.com',
            'password'  => Hash::make('dongonzales'),
            'role'      => 3,
        ]);

        User::factory()->create([
            'name'      => 'Donária de Souza',
            'email'     => 'donaria@cpp.com',
            'password'  => Hash::make('donaria'),
            'role'      => 2,
        ]);

        User::factory()->create([
            'name'      => 'Gilmar dos Santos',
            'email'     => 'gilmar@cpp.com',
            'password'  => Hash::make('gilmar'),
            'role'      => 2,
        ]);

        SchoolClass::factory()->create([
            'classname'  => '6°A',
            'classroom'  => '101',
            'id_teacher' => 3, 
        ]);

        SchoolClass::factory()->create([
            'classname'  => '6°B',
            'classroom'  => 102,
            'id_teacher' => 5, 
        ]);

        SchoolClass::factory()->create([
            'classname'  => '6°C',
            'classroom'  => 103,
            'id_teacher' => 6, 
        ]);

        Student::factory()->create([
            'name'      => 'JC Retrô Gonzales',
            'parent_id' => 4,
            'id_class'  => 3,
        ]);

        Nota::factory()->create([
            'student_id'      => 1,
            'school_class_id' => 3,
            'portugues'       => 5,
            'matematica'      => 7,
            'historia'        => 6,
            'geografia'       => 6,
            'ciencias'        => 6,
            'artes'           => 3,
            'educacao_fisica' => 8.5,
        ]);
        
        User::factory(10)->create();
    }
}
