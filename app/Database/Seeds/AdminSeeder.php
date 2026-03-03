<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name'       => 'Administrator',
            'email'      => 'admin@careerconnect.test',
            'password'   => password_hash('Admin@123', PASSWORD_BCRYPT),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('users')->insert($data);
    }
}
