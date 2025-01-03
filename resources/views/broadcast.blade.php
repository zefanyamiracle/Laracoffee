@extends('layouts\main')

@section('content')
<div class="container">
    <h2>Form Broadcast</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('broadcast.send') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="judul">Judul Broadcast</label>
            <input type="text" id="judul" name="judul" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal (dd/mm/yyyy)</label>
            <input type="text" id="tanggal" name="tanggal" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="isi">Isi Broadcast</label>
            <textarea id="isi" name="isi" class="form-control" rows="5" required></textarea>
        </div>

        <!-- Dropdown untuk Pilih Target Broadcast -->
        <div class="mb-3">
            <label for="target" class="form-label">Target Broadcast</label>
            <select class="form-control" id="target" name="target" required>
                <option value="all">Semua Pengguna</option>
                <option value="selected">Pilih Pengguna</option>
            </select>
        </div>

        <!-- Pilihan untuk memilih pengguna hanya muncul jika 'Pilih Pengguna' dipilih -->
        <div id="emails-section" class="form-group" style="display:none;">
            <label for="emails">Pilih Target Broadcast</label>
            <select id="emails" name="emails[]" class="form-control" multiple required>
                @foreach($subscribers as $subscriber)
                    <option value="{{ $subscriber->email }}">{{ $subscriber->email }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Broadcast</button>
    </form>
</div>

<script>
    // Ambil elemen target dan section email
    const targetSelect = document.getElementById('target');
    const emailsSection = document.getElementById('emails-section');
    
    // Tambahkan event listener pada perubahan pilihan di dropdown target
    targetSelect.addEventListener('change', function () {
        if (targetSelect.value === 'selected') {
            // Jika memilih 'Pilih Pengguna', tampilkan pilihan email
            emailsSection.style.display = 'block';
        } else {
            // Jika memilih 'Semua Pengguna', sembunyikan pilihan email
            emailsSection.style.display = 'none';
        }
    });
</script>
@endsection
