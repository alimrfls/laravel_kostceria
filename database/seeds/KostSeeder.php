<?php

use Illuminate\Database\Seeder;

class KostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kosts = [
            [
                'fasilitas' => 'AC, TV, Internet, Kamar Mandi, Tempat Tidur, Lemari',
                'tipe_kos' => 'Campur',
                'nama_kos' => 'Kost Orange U9A',
                'alamat_kos' => 'Jalan U Raya No 9A, Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11530',
                'telepon_kos' => '085100258002 ',
                'desc_kos' => 'Kos-kosan eksklusif di bilangan Jakarta Barat tepatnya Jalan Kemanggisan Dekat Dengan Lingkungan Kampus BINUS kemanggisan jalan U Raya No 9A Tempat yang nyaman dan Asri serta yang bersih ada tempat makan di lantai bawah apabila mau sarapan dengan harga yang relatif murah',
                'harga_kos' => '1350000',
                'thumbnail_kos' => 'Kost_Orange_U9A_1.jpg',
                'rating' => '12',
                'total_user' => '3',
                'total_foto_kos' => '2',
                'coordinate_kos' => '-6.201728,106.7843231',
            ],
            [
                'fasilitas' => 'AC, TV, Internet, Kamar Mandi, Tempat Tidur, Lemari',
                'tipe_kos' => 'Campur',
                'nama_kos' => 'Grand Residence Kemanggisan',
                'alamat_kos' => 'Jl. Yunus 97-99, Kemanggisan, Jakarta Barat',
                'telepon_kos' => '082261686899',
                'desc_kos' => 'Bangunan baru 2 lantai, Harga sewa : mulai dari 2,75 juta/bulan (kamar normal) dan 3,2 juta/bulan (kamar dengan teras), kamar double (utk 2 orang) : 4,75 juta/bulan, Special price untuk long stay tenant (di atas 6 bulan)',
                'harga_kos' => '2750000',
                'thumbnail_kos' => 'Grand_Residence_Kemanggisan_1.jpg',
                'rating' => '9',
                'total_user' => '3',
                'total_foto_kos' => '2',
                'coordinate_kos' => '-6.2041857,106.7790761',
            ],[
                'fasilitas' => 'AC, TV, Internet, Kamar Mandi, Tempat Tidur, Lemari',
                'tipe_kos' => 'Campur',
                'nama_kos' => 'Melrose Place',
                'alamat_kos' => 'Jl. Kebon Jeruk Raya No. 56 (d/h Jl. Rawa Belong), seberang Binus Anggrek / Belakang D’Cost',
                'telepon_kos' => '082220002089',
                'desc_kos' => 'Lokasi sangat strategis dekat dengan jalan raya, bangunan dan fasilitas baru, kebersihan & keamanan terjaga, harga bersaing',
                'harga_kos' => '1300000',
                'thumbnail_kos' => 'Melrose_Place_2.jpg',
                'rating' => '11',
                'total_user' => '3',
                'total_foto_kos' => '2',
                'coordinate_kos' => '-6.2028787,106.7828503',
            ]
        ];

        foreach ($kosts as $kost){
            DB::table('koslist')->insert($kost);
        }
    }
}
