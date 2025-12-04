<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artikel;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artikel = [
            [
                'title' => 'Naruto Shippuden',
                'content' => 'Naruto Uzumaki adalah karakter utama dalam serial anime dan manga Naruto yang dibuat oleh Masashi Kishimoto. Dia adalah seorang ninja muda dari desa Konohagakure yang bercita-cita menjadi Hokage, pemimpin desa, untuk mendapatkan pengakuan dari orang-orang di sekitarnya. Sepanjang seri, Naruto menghadapi berbagai tantangan, berteman dengan banyak karakter, dan berjuang melawan musuh-musuh yang kuat sambil mengendalikan kekuatan rubah berekor sembilan yang tersegel di dalam dirinya.',
            ],
            [
                'title' => 'One Piece',
                'content' => 'Monkey D. Luffy adalah protagonis utama dalam serial manga dan anime One Piece yang dibuat oleh Eiichiro Oda. Luffy adalah seorang bajak laut muda yang bercita-cita menjadi Raja Bajak Laut dengan menemukan harta karun legendaris yang dikenal sebagai One Piece. Dia memiliki kemampuan unik untuk meregangkan tubuhnya seperti karet setelah memakan Buah Iblis Gomu Gomu no Mi. Sepanjang perjalanannya, Luffy membentuk kru bajak laut yang beragam dan menghadapi berbagai petualangan di lautan luas.',
            ],
            [
                'title' => 'Attack on Titan',
                'content' => 'Eren Yeager adalah karakter utama dalam serial manga dan anime Attack on Titan yang dibuat oleh Hajime Isayama. Eren adalah seorang prajurit muda yang bergabung dengan militer untuk melawan ancaman raksasa yang dikenal sebagai Titan yang mengancam umat manusia. Setelah menyaksikan kehancuran desanya dan kematian ibunya akibat serangan Titan, Eren bersumpah untuk menghapus semua Titan dari dunia. Sepanjang seri, Eren menghadapi konflik internal dan eksternal yang kompleks seiring dia mengungkap rahasia di balik keberadaan Titan.',
            ],
        ];

        foreach ($artikel as $data) {
            Artikel::create($data);
        }
    }
}
