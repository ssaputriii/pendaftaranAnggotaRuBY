@extends('admin.layouts.app')

@section('title', 'Detail Pesan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Detail Pesan</h4>
    <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary rounded-3">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-white py-3 border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small d-block">Subjek Pesan</span>
                        <h5 class="fw-bold mb-0 text-primary">{{ $message->subject }}</h5>
                    </div>
                    <span class="badge bg-light text-muted rounded-pill">
                        {{ $message->created_at->translatedFormat('d F Y, H:i') }}
                    </span>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="text-muted small d-block mb-1">Nama Pengirim</label>
                        <div class="fw-bold fs-5">{{ $message->name }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small d-block mb-1">Alamat Email</label>
                        <div class="fw-bold fs-5 text-muted">{{ $message->email }}</div>
                    </div>
                    <div class="col-12 mt-4">
                        <label class="text-muted small d-block mb-2">Isi Pesan</label>
                        <div class="p-4 bg-light rounded-4 border-0" style="white-space: pre-wrap; line-height: 1.8;">{{ $message->message }}</div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white py-3 border-top d-flex justify-content-between align-items-center">
                @php
                    $replySubject = "Re: " . $message->subject;
                    $replyBody = "\n\n\n--- Pesan Asli ---\nDari: " . $message->name . "\nTanggal: " . $message->created_at->format('d M Y') . "\nPesan:\n" . $message->message;
                    $gmailUrl = "https://mail.google.com/mail/?view=cm&fs=1&to=" . $message->email . "&su=" . rawurlencode($replySubject) . "&body=" . rawurlencode($replyBody);
                @endphp
                
                <a href="{{ $gmailUrl }}" target="_blank" class="btn btn-primary px-4 rounded-3 shadow-sm">
                    <i class="bi bi-google me-1"></i> Balas via Gmail
                </a>

                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger px-4 rounded-3">
                        <i class="bi bi-trash me-1"></i> Hapus Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
