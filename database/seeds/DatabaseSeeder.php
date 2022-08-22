<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('levels')->insert([
            'name' => 'Kepala Satuan',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Sekretaris',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Kepala Bidang Ketentraman dan Ketertiban Umum',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Kepala Bidang Penegakan Per-UU',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Kepala Bidang Pemadam Kebakaran',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Kepala Bidang Linmas dan SDA',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Kepala Seksi Pembinaan dan Pengawasan',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Kepala Seksi Satlinmas',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Kepala Seksi Penyelidikan dan Penyidikan',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Kepala Seksi Pengamanan dan Pengawalan',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Kepala Seksi Bina Potensi Masyarakat',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Kepala Sub Bagian Keuangan dan Aset',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Kepala Sub Bagian Perencaan Program dan Pelaporan',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Kepala Sub Bagian Kepegawaian',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Kepala Seksi Operasi dan Pengendalian',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Kepala Seksi Penanganan Bahan Bahaya Beracun',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Kepala Seksi Penanggulangan Bahaya Kebakaran',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Bendahara',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Pranata Pemadam Kebakaran',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Pelaksana',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Pengelola Pemanfaatan Barang Milik Daerah',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Komandan Petugas Keamanan',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Pengelola Data Keamanan dan Ketertiban',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Satpol PP Ahli Muda',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Pemadam Kebakaran Ahli Muda',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Pelatih Satlinmas',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'name' => 'Pranata Teknologi Informasi Komputer',
            'created_at' => Carbon::now(),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Steven V. Suluh, SSTP,M Si',
            'level_id'=> '1',
            'email' => 'steven',
            'images' => 'admin.png',
            'salary' => '20000000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Xaverius Billy Senduk, S.IP',
            'level_id'=> '2',
            'email' => 'xaverius',
            'images' => 'admin.png',
            'salary' => '7000000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Julius Dondokambey, SH',
            'level_id'=> '5',
            'email' => 'julius',
            'images' => 'admin.png',
            'salary' => '5500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Katrina Kansel,  SE',
            'level_id'=> '3',
            'email' => 'katrina',
            'unit'=> 'bidang ketentraman dan ketertiban umum',
            'images' => 'admin.png',
            'salary' => '5500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Djonny Rommy Kaloh, S.Pd',
            'level_id'=> '6',
            'email' => 'djonny',
            'images' => 'admin.png',
            'salary' => '5500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'David R. L. Rawung, S.Pi, MM',
            'level_id'=> '7',
            'email' => 'david',
            'images' => 'admin.png',
            'salary' => '4500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Sjamsiah Nur Hatala, S.Sos',
            'level_id'=> '24',
            'email' => 'sjamsiah',
            'images' => 'admin.png',
            'salary' => '4500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Robert Koraag, S.Sos',
            'level_id'=> '8',
            'email' => 'robert',
            'images' => 'admin.png',
            'salary' => '4500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Axbin Tulentang, SIP',
            'level_id'=> '9',
            'email' => 'axbin',
            'images' => 'admin.png',
            'salary' => '4500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Jefry Benediktus Kemur, BA',
            'level_id'=> '10',
            'email' => 'jefry',
            'images' => 'admin.png',
            'salary' => '4500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Eveline Maria Manengkei, SE ',
            'level_id'=> '12',
            'email' => 'eveline',
            'images' => 'admin.png',
            'salary' => '4500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Audy Rantung',
            'level_id'=> '25',
            'email' => 'audy',
            'images' => 'admin.png',
            'salary' => '4500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Stenly Sajow, SE',
            'level_id'=> '24',
            'email' => 'stenly',
            'images' => 'admin.png',
            'salary' => '4500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Notje N. Kalengkongan, S.Pd',
            'level_id'=> '11',
            'email' => 'Notje',
            'images' => 'admin.png',
            'salary' => '4500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Eqmond J. Rampengan, SH',
            'level_id'=> '4',
            'email' => 'eqmond',
            'images' => 'admin.png',
            'salary' => '5500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Denny Willdy, SE',
            'level_id'=> '13',
            'email' => 'denny',
            'images' => 'admin.png',
            'salary' => '4500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Sherlly R. Mailangkay, SE',
            'level_id'=> '14',
            'email' => 'sherlly',
            'images' => 'admin.png',
            'salary' => '4500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Hantje Porawouw, S.Sos',
            'level_id'=> '15',
            'email' => 'hantje',
            'images' => 'admin.png',
            'salary' => '4500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Ferry Rudi Tumbel, S.Sos',
            'level_id'=> '16',
            'email' => 'ferry',
            'images' => 'admin.png',
            'salary' => '4500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Yunita Ramumpuk, SIK',
            'level_id'=> '25',
            'email' => 'yunita',
            'images' => 'admin.png',
            'salary' => '4500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Denie Ansiga, S.Sos',
            'level_id'=> '17',
            'email' => 'denie',
            'images' => 'admin.png',
            'salary' => '4500000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Rocky Bawotong',
            'level_id'=> '20',
            'email' => 'rocky',
            'images' => 'admin.png',
            'salary' => '2000000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Ronny Tumiwa',
            'level_id'=> '21',
            'email' => 'ronny',
            'images' => 'admin.png',
            'salary' => '2000000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Danny Victor Wowor',
            'level_id'=> '22',
            'email' => 'danny',
            'images' => 'admin.png',
            'salary' => '1750000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Rusli S. Monoarfa',
            'level_id'=> '22',
            'email' => 'rusli',
            'images' => 'admin.png',
            'salary' => '1750000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Maisyal Lahengko',
            'level_id'=> '22',
            'email' => 'maisyal',
            'images' => 'admin.png',
            'salary' => '1750000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Lahi Roni Bintang',
            'level_id'=> '22',
            'email' => 'lahi',
            'images' => 'admin.png',
            'salary' => '1750000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Oktafianus S. J. Sandeng',
            'level_id'=> '18',
            'email' => 'okta',
            'images' => 'admin.png',
            'salary' => '2000000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Donny E. I. Sarbini',
            'level_id'=> '26',
            'email' => 'donny',
            'images' => 'admin.png',
            'salary' => '1750000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Zainal Bawoel',
            'level_id'=> '26',
            'email' => 'zainal',
            'images' => 'admin.png',
            'salary' => '1750000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Brenviel G. Mononutu',
            'level_id'=> '23',
            'email' => 'brenviel',
            'images' => 'admin.png',
            'salary' => '1750000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Herry Musa Hadinda',
            'level_id'=> '23',
            'email' => 'herry',
            'images' => 'admin.png',
            'salary' => '1750000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Zaenal Humonggio',
            'level_id'=> '23',
            'email' => 'zaenal',
            'images' => 'admin.png',
            'salary' => '1750000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Sofyan Abdul Adam',
            'level_id'=> '19',
            'email' => 'sofyan',
            'images' => 'admin.png',
            'salary' => '1750000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Noldi Onsent',
            'level_id'=> '23',
            'email' => 'noldi',
            'images' => 'admin.png',
            'salary' => '1750000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Marfein Teofilus Assa',
            'level_id'=> '18',
            'email' => 'marfein',
            'images' => 'admin.png',
            'salary' => '2000000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Bani Hentje Maramis',
            'level_id'=> '22',
            'email' => 'bani',
            'images' => 'admin.png',
            'salary' => '1750000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Rawis Mauren Tifani, A.Md.T',
            'level_id'=> '27',
            'email' => 'tifani',
            'images' => 'admin.png',
            'salary' => '1750000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Ridho Wirasembada, A.Md.TE',
            'level_id'=> '27',
            'email' => 'ridho',
            'images' => 'admin.png',
            'salary' => '1750000',
            'password' => bcrypt('bitungsatpolpp'),
            'created_at' => Carbon::now(),
        ]);

       
      
      
    }
}
