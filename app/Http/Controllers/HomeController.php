<?php

namespace App\Http\Controllers;

use App\Models\MembershipType;

class HomeController extends Controller
{
    public function index()
    {
        $benefits = [
            [
                'title' => 'Komunitas Solid',
                'description' => 'Terhubung dengan pelaku UMKM, mentor, serta ekosistem bisnis lokal yang suportif.',
            ],
            [
                'title' => 'Pendampingan Bisnis',
                'description' => 'Akses pelatihan, workshop, dan konsultasi untuk pengembangan usaha berkelanjutan.',
            ],
            [
                'title' => 'Akses Pembiayaan',
                'description' => 'Kesempatan terhubung ke lembaga pembiayaan serta program dukungan dari BUMN.',
            ],
            [
                'title' => 'Peluang Kolaborasi',
                'description' => 'Perluas jejaring dan kerja sama untuk meningkatkan daya saing produk dan layanan Anda.',
            ],
        ];

        return view('pages.home', [
            'benefits' => $benefits,
            'membershipTypes' => MembershipType::all(),
        ]);
    }
}
