@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h2>Registrasi</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Input Nama -->
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input id="nama" type="text"
                                    class="form-control @error('nama') is-invalid @enderror" name="nama"
                                    value="{{ old('nama') }}" required autofocus>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Input Email -->
                            <div class="form-group mt-3">
                                <label for="email">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{--  nomor telepon --}}
                            <div class="form-group mt-3">
                                <label for="telepon">Telepon</label>
                                <input id="telepon" type="text"
                                    class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                                    value="{{ old('telepon') }}" required>
                                @error('telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <!-- Pilih Provinsi -->
                            <div class="form-group mt-3">
                                <label for="provinsi_id">Provinsi</label>
                                <select id="provinsi_id" name="provinsi_id"
                                    class="form-control @error('provinsi_id') is-invalid @enderror" required>
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province['id'] }}">{{ $province['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('provinsi_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Pilih Kota -->
                            <div class="form-group mt-3">
                                <label for="kota_id">Kota/Kabupaten</label>
                                <select id="kota_id" name="kota_id"
                                    class="form-control @error('kota_id') is-invalid @enderror" required>
                                    <option value="">Pilih Kota/Kabupaten</option>
                                    <!-- Kota akan diisi oleh JS berdasarkan pilihan Provinsi -->
                                </select>
                                @error('kota_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group mt-3">
                                <label for="kecamatan_id">Kecamatan</label>
                                <select id="kecamatan_id" name="kecamatan_id"
                                    class="form-control @error('kecamatan_id') is-invalid @enderror" required>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                                @error('kecamatan_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="kelurahan_id">Kelurahan/Desa</label>
                                <select id="kelurahan_id" name="kelurahan_id"
                                    class="form-control @error('kelurahan_id') is-invalid @enderror" required>
                                    <option value="">Pilih Kelurahan/Desa</option>
                                </select>
                                @error('kelurahan_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="kode_pos">Kode Pos</label>
                                <input id="kode_pos" type="text"
                                    class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos"
                                    value="{{ old('kode_pos') }}" required>
                                @error('kode_pos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="password">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input id="password_confirmation" type="password" class="form-control"
                                    name="password_confirmation" required>
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('scripts')
    <script>
       
    </script>
@endsection --}}
