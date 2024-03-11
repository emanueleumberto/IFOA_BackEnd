<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    /** Run the database seeds. */
    public function run(): void {

        // Popoliamo manualmente il DB nella tabella Users con dei dati iniziali
        /* $sql = 'INSERT INTO users (name, email, password, created_at)
                VALUES (?,?,?,?)';
        DB::insert($sql, [
                'Mario Rossi',
                'm.rossi@example.com',
                Hash::make('Pa$$w0rd!'), // Hash della password
                Carbon::now() // Classe che genera un timestamp della data/ora corrente
        ]); */

        // Popoliamo il DB nella tabella Users con una classe Factory
        User::factory()->count(5)->create();

    }
}
