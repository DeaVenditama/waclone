<?php namespace App\Database\Seeds;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
                $data = [
                    [
                        'screen_name' => 'Dea Venditama',
                        'avatar'    => ''
                    ],
                    [
                        'screen_name' => 'Florencia',
                        'avatar'    => ''
                    ],
                    [
                        'screen_name' => 'Joni',
                        'avatar'    => ''
                    ],
                    [
                        'screen_name' => 'Jesicca',
                        'avatar'    => ''
                    ],
                ];

                // Using Query Builder
                $this->db->table('user')->insertBatch($data);
        }
}