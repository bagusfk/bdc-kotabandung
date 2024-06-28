<?php

namespace Database\Seeders\user;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role' => 'admin',
            'name' => 'admin',
            'no_wa' => '089123456789',
            'city_id' => 22,
            'address' => 'Jl. Setia Budi No. 15A',
            'password' => bcrypt('admin'),
            'email' => 'admin@admin.com',
        ]);

        User::create([
            'role' => 'kepalabagian',
            'name' => 'kepalabagian',
            'password' => bcrypt('kepalabagian'),
            'no_wa' => '089123456789',
            'city_id' => 22,
            'address' => 'Jl. Setia Budi No. 15B',
            'email' => 'kepalabagian@kepalabagian.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'ksm',
            'password' => bcrypt('ksm'),
            'no_wa' => '089123456789',
            'city_id' => 22,
            'address' => 'Jl. Setia Budi No. 15C',
            'email' => 'ksm@ksm.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'ksm2',
            'password' => bcrypt('ksm2'),
            'no_wa' => '089123456789',
            'city_id' => 22,
            'address' => 'Jl. Setia Budi No. 15C',
            'email' => 'ksm2@ksm2.com',
        ]);

        User::create([
            'role' => 'pembeli',
            'name' => 'pembeli',
            'password' => bcrypt('pembeli'),
            'no_wa' => '089123456789',
            'city_id' => 22,
            'address' => 'Jl. Setia Budi No. 15D',
            'email' => 'pembeli@pembeli.com',
        ]);

        User::create([
            'role' => 'pembeli',
            'name' => 'pembeli2',
            'password' => bcrypt('pembeli2'),
            'no_wa' => '089123456789',
            'city_id' => 22,
            'address' => 'Jl. Setia Budi No. 15E',
            'email' => 'pembeli2@pembeli2.com',
        ]);

        User::create([
            'role' => 'pembeli',
            'name' => 'pembeli3',
            'password' => bcrypt('pembeli3'),
            'no_wa' => '089123456789',
            'city_id' => 22,
            'address' => 'Jl. Setia Budi No. 15F',
            'email' => 'pembeli3@pembeli3.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'heni badriah',
            'password' => bcrypt('heni123'),
            'no_wa' => '085722282088',
            'city_id' => 22,
            'address' => 'Jl. Jatisari II No.79 RT.004/001 Jatisari - Buah Batu - Bandung 40286',
            'email' => 'henybadriah01@gmail.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'agus santoso',
            'password' => bcrypt('agus123'),
            'no_wa' => '085693930588',
            'city_id' => 22,
            'address' => 'Jl. Kebon jayanti Gg Rahayu 04 RT.003/008, Kebon jayanti, Kiaracondong, Bandung',
            'email' => 'erlinamega@gmail.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'arief santoso',
            'password' => bcrypt('arif123'),
            'no_wa' => '088808089909',
            'city_id' => 22,
            'address' => 'Mega Regency kav.69B',
            'email' => 'Arief.afianto@gmail.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'annisah said',
            'password' => bcrypt('annisah123'),
            'no_wa' => '081320230777',
            'city_id' => 22,
            'address' => 'Sarijadi, Sarimanah Blok 14 no 146 RT.004/005 Sukasari Bandung 40151',
            'email' => 'mihichagolf@gmail.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'beny ramdani sofara',
            'password' => bcrypt('beny123'),
            'no_wa' => '08118582207',
            'city_id' => 22,
            'address' => 'Jl. Leuwi Anyar V No.58 Bandung',
            'email' => 'blankenheimstyle@gmail.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'nani zakiah',
            'password' => bcrypt('nani123'),
            'no_wa' => '081221843944',
            'city_id' => 22,
            'address' => 'Jl taman merkuri timur VII No. 20',
            'email' => 'Nanizakiah27@gmail.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'rustini',
            'password' => bcrypt('rustini123'),
            'no_wa' => '085795010906',
            'city_id' => 22,
            'address' => 'Jl Mars utara VI No. 7, Desa Manjahlega, Kec. Rancasari, Kota Bandung, Jawa Barat',
            'email' => 'ara.clothingline28@gmail.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'dinni nurhayati',
            'password' => bcrypt('dinni123'),
            'no_wa' => '081324253499',
            'city_id' => 22,
            'address' => 'Jl Sekar Gambir I no. 17 Kel. Turangga, Kec. Lengkong Kota Bandung 40264',
            'email' => 'jelujurbydh@gmail.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'lilis suhaeti',
            'password' => bcrypt('lilis'),
            'no_wa' => '087890299946',
            'city_id' => 22,
            'address' => 'Jl Siti Munigar No.56 RT.003/002 Kelurahan Nyengseret Kecamatan Astana Anyar Kota Bandung',
            'email' => 'lilissuhaeti2@gmail.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'nurdin ramdan',
            'password' => bcrypt('nurdin123'),
            'no_wa' => '081573115556',
            'city_id' => 22,
            'address' => 'Jl. Terusan Babakan Jeruk 1 No. 3 RT.005/001 Kelurahan Sukagalih Kecamatan Sukajadi Bandung.',
            'email' => 'gyasibizurai@gmail.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'silmi nurhayati',
            'password' => bcrypt('silmi123'),
            'no_wa' => '081394668353',
            'city_id' => 22,
            'address' => 'Jl. Batununggal Lestari No.1',
            'email' => 'yanyudianadigital76@gmail.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'lelly dewi utami',
            'password' => bcrypt('lelly123'),
            'no_wa' => '0818880547',
            'city_id' => 22,
            'address' => 'Jl. Sinom No. 15 RT.006/009 Kelurahan Turangga Kecamatan Lengkong Kota Bandung',
            'email' => 'lellydewiutami@gmail.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'sarah farida',
            'password' => bcrypt('sarah123'),
            'no_wa' => '087722244888',
            'city_id' => 22,
            'address' => 'Jl. Garputala No.12 kota Bandung',
            'email' => 'sarahfarida1804@gmail.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'elvira miranda',
            'password' => bcrypt('pembeli3'),
            'no_wa' => '081323959543',
            'city_id' => 22,
            'address' => 'Kopo Permai II/B2 No.1 Bandung',
            'email' => 'elviramiranda119@gmail.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'widya garini',
            'password' => bcrypt('widya123'),
            'no_wa' => '081323959543',
            'city_id' => 22,
            'address' => 'Jl. Babakan Cianjur no. 6 rt. 06 rw. 07 Kel. Campaka Kec. Andir Bandung 40184',
            'email' => 'garinieoutfit@gmail.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'gita nurhati',
            'password' => bcrypt('gita123'),
            'no_wa' => '08112294905',
            'city_id' => 22,
            'address' => 'Jl. Sawah Kurung Raya 21A, Ciateul, Regol, Bandung',
            'email' => 'hellogergeousindonesia@gmail.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'rita indriany',
            'password' => bcrypt('rita123'),
            'no_wa' => '082214116870',
            'city_id' => 22,
            'address' => 'Jalan Parakan Astri No. SA Bandung',
            'email' => 'acuksae.com@gmail.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'lisda damayanti',
            'password' => bcrypt('lisda123'),
            'no_wa' => '081573115556',
            'city_id' => 22,
            'address' => 'Jl. A H Nasution no.958 Bandung',
            'email' => 'kannasyaid@gmail.com',
        ]);
    }
}
