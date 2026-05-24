@extends('admin.layouts.app')

@section('title', 'Pesan Pengguna')

@section('content')
<div class="row g-4 mb-4 align-items-center">
    <div class="col">
        <h4 class="mb-0 fw-bold text-dark">Pesan Masuk</h4>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm border-0 rounded-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light">
                <tr>
                    <th class="ps-4">Pengirim</th>
                    <th>Subjek</th>
                    <th>Pesan</th>
                    <th>Tanggal</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                    <tr>
                        <td class="ps-4">
                            <div class="fw-bold">{{ $message->name }}</div>
                            <div class="small text-muted">{{ $message->email }}</div>
                        </td>
                        <td>
                            <span class="badge bg-info-subtle text-info rounded-pill px-3">{{ $message->subject }}</span>
                        </td>
                        <td>
                            <div class="text-truncate" style="max-width: 300px;" title="{{ $message->message }}">
                                {{ $message->message }}
                            </div>
                        </td>
                        <td class="small text-muted">
                            {{ $message->created_at->translatedFormat('d M Y, H:i') }}
                        </td>
                        <td class="text-end pe-4">
                            <div class="d-flex justify-content-end gap-2">
                                @php
                                    $replySubject = "Re: " . $message->subject;
                                    $gmailUrl = "https://mail.google.com/mail/?view=cm&fs=1&to=" . $message->email . "&su=" . rawurlencode($replySubject);
                                @endphp
                                <a href="{{ $gmailUrl }}" target="_blank" class="btn btn-sm btn-outline-success rounded-3" title="Balas via Gmail">
                                    <i class="bi bi-google"></i>
                                </a>
                                <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-sm btn-outline-primary rounded-3" title="Lihat Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-3" title="Hapus Pesan">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="bi bi-chat-left-dots fs-1 d-block mb-3"></i>
                            Belum ada pesan masuk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($messages->hasPages())
        <div class="card-footer bg-white border-0 py-3">
            {{ $messages->links() }}
        </div>
    @endif
</div>
@endsection
