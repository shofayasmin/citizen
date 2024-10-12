<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Content extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'judul_acara' => 'kedatangan 01',
                'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem voluptatibus amet aspernatur aliquam omnis. Natus ducimus voluptates alias earum enim nulla vitae perferendis maiores explicabo, ipsam voluptatem unde veritatis, hic ea nam. Ipsam totam aut in reiciendis quidem voluptatibus. Dicta, alias. Error magnam suscipit expedita velit possimus unde nesciunt sed tempore cupiditate, nemo aperiam reiciendis perspiciatis! Unde error vero doloribus velit accusantium ipsa quod magnam voluptate, mollitia ex a sint iusto commodi dicta libero. Optio, nobis. Odit doloremque temporibus velit alias reprehenderit at quisquam voluptatibus minima, quam, cum, eaque officia sed ipsa? Dignissimos, fugit iure quisquam incidunt distinctio voluptates odit.",
                'tipe_acara' => 'Informasi',
                'image' => 'AMIN.webp',
                
            ],
            [
                'judul_acara' => 'Kedatangan 02',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem voluptatibus amet aspernatur aliquam omnis. Natus ducimus voluptates alias earum enim nulla vitae perferendis maiores explicabo, ipsam voluptatem unde veritatis, hic ea nam. Ipsam totam aut in reiciendis quidem voluptatibus. Dicta, alias. Error magnam suscipit expedita velit possimus unde nesciunt sed tempore cupiditate, nemo aperiam reiciendis perspiciatis! Unde error vero doloribus velit accusantium ipsa quod magnam voluptate, mollitia ex a sint iusto commodi dicta libero. Optio, nobis. Odit doloremque temporibus velit alias reprehenderit at quisquam voluptatibus minima, quam, cum, eaque officia sed ipsa? Dignissimos, fugit iure quisquam incidunt distinctio voluptates odit.',
                'tipe_acara' => 'Informasi',
                'image' => 'AMIN.webp',
                
            ],
            [
                'judul_acara' => 'kedatangan 03',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem voluptatibus amet aspernatur aliquam omnis. Natus ducimus voluptates alias earum enim nulla vitae perferendis maiores explicabo, ipsam voluptatem unde veritatis, hic ea nam. Ipsam totam aut in reiciendis quidem voluptatibus. Dicta, alias. Error magnam suscipit expedita velit possimus unde nesciunt sed tempore cupiditate, nemo aperiam reiciendis perspiciatis! Unde error vero doloribus velit accusantium ipsa quod magnam voluptate, mollitia ex a sint iusto commodi dicta libero. Optio, nobis. Odit doloremque temporibus velit alias reprehenderit at quisquam voluptatibus minima, quam, cum, eaque officia sed ipsa? Dignissimos, fugit iure quisquam incidunt distinctio voluptates odit.',
                'tipe_acara' => 'Informasi',
                'image' => 'AMIN.webp',
                
            ],
        ];
        DB::table('content')->insert($data);

    }
}

