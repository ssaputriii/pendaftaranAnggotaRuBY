@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
<section class="contact-section py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">Hubungi Kami</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                Ada pertanyaan atau butuh bantuan mengenai pendaftaran dan program Rumah BUMN Yogyakarta? Tim kami siap membantu Anda.
            </p>
        </div>

        <div class="row g-4">
            <!-- INFO KONTAK -->
            <div class="col-lg-5">
                <div class="d-flex flex-column gap-4">

                    <!-- TELEPON -->
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <div class="d-flex gap-3">
                            <div class="contact-icon-box bg-success-subtle text-success">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Telepon / WhatsApp</h5>
                                <p class="text-muted mb-2 small">085161609877</p>
                                <a href="https://wa.me/6285161609877" target="_blank" class="btn btn-success btn-sm rounded-pill px-3">
                                    <i class="bi bi-whatsapp me-1"></i> Chat Sekarang
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- EMAIL -->
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <div class="d-flex gap-3">
                            <div class="contact-icon-box bg-info-subtle text-info">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Email</h5>
                                <p class="text-muted mb-0 small">rumahbumnyogyakarta@gmail.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- SOSIAL MEDIA -->
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex gap-3">
                                <div class="contact-icon-box bg-danger-subtle text-danger">
                                    <i class="bi bi-instagram"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Instagram</h5>
                                    <p class="text-muted mb-0 small">@rumahbumn.yogyakarta</p>
                                    <a href="https://www.instagram.com/rumahbumn.yogyakarta" target="_blank" class="btn btn-link p-0 text-decoration-none small">Lihat Profil</a>
                                </div>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex gap-3">
                                <div class="contact-icon-box bg-dark-subtle text-dark">
                                    <i class="bi bi-tiktok"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">TikTok</h5>
                                    <p class="text-muted mb-0 small">@rumahbumn.jogja</p>
                                    <a href="https://www.tiktok.com/@rumahbumn.jogja" target="_blank" class="btn btn-link p-0 text-decoration-none small">Lihat Profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FORM & MAP -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    <div class="card-body p-4 p-md-5">
                        <h4 class="fw-bold mb-4">Kirim Pesan</h4>
                        
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger border-0 shadow-sm mb-4">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('kontak.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label fw-semibold small">Nama Lengkap</label>
                                    <input type="text" name="name" id="name" class="form-control bg-light border-0 py-2" value="{{ old('name') }}" placeholder="Masukkan nama Anda" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-semibold small">Email</label>
                                    <input type="email" name="email" id="email" class="form-control bg-light border-0 py-2" value="{{ old('email') }}" placeholder="email@contoh.com" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="subject" class="form-label fw-semibold small">Subjek</label>
                                    <input type="text" name="subject" id="subject" class="form-control bg-light border-0 py-2" value="{{ old('subject') }}" placeholder="Ada yang bisa kami bantu?" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="message" class="form-label fw-semibold small">Pesan</label>
                                    <textarea name="message" id="message" class="form-control bg-light border-0 py-2" rows="4" placeholder="Tuliskan pesan Anda secara detail..." required>{{ old('message') }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 shadow-sm mt-2">
                                        <i class="bi bi-send-fill me-2"></i>Kirim Pesan Sekarang
                                    </button>
                                </div>
                            </div>
                        </form>

                        <hr class="my-5">

                        <h5 class="fw-bold mb-3"><i class="bi bi-map-fill me-2 text-primary"></i>Lokasi Kami</h5>
                        <div class="rounded-4 overflow-hidden shadow-sm">
                            <iframe 
                                src="https://www.google.com/maps?q=Rumah+BUMN+Yogyakarta&output=embed"
                                width="100%" 
                                height="300" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
