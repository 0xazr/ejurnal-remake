<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UsersModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new UsersModel();

        $user->insertBatch([
            [
                "username" => "admin",
                "role" => "admin",
                "email" => "admin@gmail.com",
                "password" => password_hash("admin", PASSWORD_BCRYPT)
            ],
        ]);
    }
}
