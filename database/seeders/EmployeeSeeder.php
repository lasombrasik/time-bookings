<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $employees = [
            [
                'firstname' => 'admin',
                'lastname' => 'admin',
                'email' => 'admin@admin.com',
                'photo' => 'images/employee.png',
            ],
            [
                'firstname' => 'admin2',
                'lastname' => 'admin2',
                'email' => 'admin2@admin.com',
                'photo' => 'images/employee.png',
            ],
        ];

        $users = [
            [
                'name' => 'login',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'login2',
                'email' => 'admin2@admin.com',
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
