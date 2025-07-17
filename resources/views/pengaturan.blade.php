@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="card shadow p-4 w-100" style="max-width: 420px;">
    <h4 class="text-center mb-4 fw-bold">Login Admin</h4>

    {{-- Tampilkan error umum --}}
    @if ($errors->has('msg'))
      <div class="alert alert-danger text-center">
        {{ $errors->first('msg') }}
      </div>
    @endif

    <form action="{{ route('pengaturan') }}" method="POST">
      @csrf

      {{-- Username --}}
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input 
          type="text" 
          id="username" 
          name="username" 
          class="form-control @error('username') is-invalid @enderror" 
          value="{{ old('username') }}" 
          required 
          autofocus
        >
        @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      {{-- Password --}}
      <div class="mb-3">
        <label for="password" class="form-label">Kata Sandi</label>
        <div class="input-group">
          <input 
            type="password" 
            id="password" 
            name="password" 
            class="form-control @error('password') is-invalid @enderror" 
            required
          >
          <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
            <i class="fas fa-eye" id="eyeIcon"></i>
          </button>
        </div>
        @error('password')
          <div class="invalid-feedback d-block">
            {{ $message }}
          </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-dark w-100 mt-2">Masuk</button>
    </form>

    <div class="mt-3 text-center">
      <small><a href="{{ route('lupa.password') }}">Lupa password?</a></small>
    </div>
  </div>
</div>

{{-- Toggle password script --}}
<script>
  function togglePassword() {
    const passInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    if (passInput.type === 'password') {
      passInput.type = 'text';
      eyeIcon.classList.remove('fa-eye');
      eyeIcon.classList.add('fa-eye-slash');
    } else {
      passInput.type = 'password';
      eyeIcon.classList.remove('fa-eye-slash');
      eyeIcon.classList.add('fa-eye');
    }
  }
</script>
@endsection
