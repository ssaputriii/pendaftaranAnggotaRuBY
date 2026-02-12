@extends('layouts.app')

@section('title', 'Sistem Pendaftaran Anggota Rumah BUMN Yogyakarta')

@section('content')
<section class="hero">
    <div class="container hero-grid">
        <div>
            <h1>Wujudkan Impian Wirausaha Anda Bersama Rumah BUMN Yogyakarta</h1>
            <p>
                Platform inkubasi bisnis yang didukung oleh BUMN untuk memberdayakan
                UMKM dan calon wirausahawan di Yogyakarta.
            </p>
            <a href="#keanggotaan" class="btn btn-light">Daftar Sekarang</a>
        </div>
        <div class="hero-image-frame">
            <img src="{{ asset('assets/images/hero-placeholder.svg') }}" alt="Visual UMKM Rumah BUMN">
        </div>
    </div>
</section>

<section class="about section">
    <div class="container">
        <h2>Tentang Rumah BUMN Yogyakarta</h2>
        <p class="section-intro">
            Rumah BUMN Yogyakarta adalah pusat pengembangan dan pemberdayaan UMKM
            yang berkomitmen untuk menciptakan ekosistem wirausaha yang berkelanjutan dan berdaya saing.
        </p>

        <div class="about-grid">
            <img src="{{ asset('assets/images/about-placeholder.svg') }}" alt="Kegiatan Rumah BUMN" class="about-image">
            <div>
                <h3>VISI</h3>
                <p>
                    Menjadi pusat inkubasi dan pengembangan wirausaha lokal yang adaptif,
                    kolaboratif, dan berdampak bagi pertumbuhan ekonomi daerah.
                </p>

                <h3>MISI</h3>
                <p>
                    Menyediakan pendampingan bisnis, akses jaringan, dan pelatihan terstruktur
                    untuk melahirkan UMKM naik kelas di Yogyakarta.
                </p>
            </div>
        </div>

        <div class="partner-logos">
            <img src="{{ asset('assets/images/logo-bumn.svg') }}" alt="BUMN Untuk Indonesia">
            <img src="{{ asset('assets/images/logo-bri.svg') }}" alt="BRI">
            <img src="{{ asset('assets/images/logo-rbumn.svg') }}" alt="Rumah BUMN Yogyakarta">
        </div>
    </div>
</section>

<section class="benefits section" id="daftar">
    <div class="container">
        <h2>Mengapa Bergabung?</h2>
        <p class="section-intro">
            Rumah BUMN Yogyakarta adalah pusat pengembangan dan pemberdayaan UMKM yang berkomitmen
            untuk menciptakan ekosistem wirausaha yang berkelanjutan dan berdaya saing.
        </p>

        <div class="card-grid">
            @foreach($benefits as $benefit)
                <article class="feature-card">
                    <div class="feature-icon">⬢</div>
                    <h3>{{ $benefit['title'] }}</h3>
                    <p>{{ $benefit['description'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="membership section" id="keanggotaan">
    <div class="container">
        <h2>Pilih Jenis Keanggotaan Anda</h2>
        <p class="section-intro">Klik salah satu untuk langsung mendaftar</p>

        <div class="card-grid membership-grid">
            @foreach($membershipTypes as $type)
                <article class="membership-card">
                    <div class="member-icon">{{ $type['icon'] }}</div>
                    <h3>{{ $type['name'] }}</h3>
                    <p class="member-subtitle">{{ $type['subtitle'] }}</p>

                    <h4>Yang diperlukan:</h4>
                    <ul>
                        @foreach($type['requirements'] as $requirement)
                            <li>{{ $requirement }}</li>
                        @endforeach
                    </ul>

                    <a href="#" class="btn btn-{{ $type['accent'] }}">{{ $type['button_text'] }}</a>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="cta section">
    <div class="container cta-box">
        <h2>Siap Bergabung dengan Rumah BUMN Yogyakarta?</h2>
        <p>Daftar sekarang dan mulai perjalanan wirausaha Anda bersama kami!</p>
        <div class="cta-actions">
            <a href="#keanggotaan" class="btn btn-light">Jenis Keanggotaan</a>
            <a href="#" class="btn btn-light">Daftar Sekarang</a>
        </div>
    </div>
</section>
@endsection
