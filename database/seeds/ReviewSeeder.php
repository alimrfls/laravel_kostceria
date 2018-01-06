<?php

use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviews = [
            [
                'id_kos' => '1',
                'review_data' => 'Lorem Ipsum Dolor Sit Amet',
                'nama_user' => 'Alim',
                'user_rate' => '4',
            ],
            [
                'id_kos' => '1',
                'review_data' => 'Lorem Ipsum Dolor Sit Amet',
                'nama_user' => 'Deny',
                'user_rate' => '5',
            ],
            [
                'id_kos' => '1',
                'review_data' => 'Lorem Ipsum Dolor Sit Amet',
                'nama_user' => 'Yusuf',
                'user_rate' => '3',
            ],

            [
                'id_kos' => '2',
                'review_data' => 'Lorem Ipsum Dolor Sit Amet',
                'nama_user' => 'Yusuf',
                'user_rate' => '3',
            ],
            [
                'id_kos' => '2',
                'review_data' => 'Lorem Ipsum Dolor Sit Amet',
                'nama_user' => 'Alim',
                'user_rate' => '3',
            ],
            [
                'id_kos' => '2',
                'review_data' => 'Lorem Ipsum Dolor Sit Amet',
                'nama_user' => 'Deny',
                'user_rate' => '3',
            ],

            [
                'id_kos' => '3',
                'review_data' => 'Lorem Ipsum Dolor Sit Amet',
                'nama_user' => 'Deny',
                'user_rate' => '3',
            ],
            [
                'id_kos' => '3',
                'review_data' => 'Lorem Ipsum Dolor Sit Amet',
                'nama_user' => 'Alim',
                'user_rate' => '3',
            ],
            [
                'id_kos' => '3',
                'review_data' => 'Lorem Ipsum Dolor Sit Amet',
                'nama_user' => 'Yusuf',
                'user_rate' => '5',
            ],
        ];

        foreach ($reviews as $rev){
            DB::table('review')->insert($rev);
        }

    }
}
