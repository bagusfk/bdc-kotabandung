<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelola_data_event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelola_data_event::create([
            'event_name' => 'Panen Melimpah',
            'event_organizer' => 'Soebagdja',
            'event_date' => now()->toDateString(),
            'event_poster' =>  'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ullam soluta dolore omnis enim expedita. Culpa vero quae dicta, distinctio totam corporis amet ab assumenda aspernatur explicabo expedita nam architecto.'
        ]);

        Kelola_data_event::create([
            'event_name' => 'Penghijauan',
            'event_organizer' => 'Soehadi',
            'event_date' => now()->toDateString(),
            'event_poster' =>  'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ullam soluta dolore omnis enim expedita. Culpa vero quae dicta, distinctio totam corporis amet ab assumenda aspernatur explicabo expedita nam architecto.'
        ]);

        Kelola_data_event::create([
            'event_name' => 'Makmur Abadi',
            'event_organizer' => 'Sarkan',
            'event_date' => now()->toDateString(),
            'event_poster' =>  'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ullam soluta dolore omnis enim expedita. Culpa vero quae dicta, distinctio totam corporis amet ab assumenda aspernatur explicabo expedita nam architecto.'
        ]);

        Kelola_data_event::create([
            'event_name' => 'Kemerdekaan',
            'event_organizer' => 'Rose',
            'event_date' => now()->toDateString(),
            'event_poster' =>  'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ullam soluta dolore omnis enim expedita. Culpa vero quae dicta, distinctio totam corporis amet ab assumenda aspernatur explicabo expedita nam architecto.'
        ]);
    }
}
