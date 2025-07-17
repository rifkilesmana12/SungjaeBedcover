@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh; background-color: #f8f9fa;">
  <div class="card shadow p-4 w-100" style="max-width: 400px;">
    <h4 class="text-center mb-4 fw-bold">Lupa Password</h4>

    {{-- Status pesan sukses --}}
    @if (session('status'))
      <div class="alert alert-success text-center">
        {{ session('status') }}
      </div>
    @endif

    <form action="{{ route('lupa.password') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Masukkan Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="contoh@email.com" required>
      </div>

      <button type="submit" class="btn btn-dark w-100">Kirim Reset Password</button>
    </form>

    <div class="mt-3 text-center">
      <small><a href="{{ route('pengaturan') }}" class="text-decoration-none">← Kembali ke Login</a></small>
    </div>
  </div>
</div>
@endsection
