@extends ('layouts.main-layout')

@section('container')

<h1 class="mt-2">Ubah Data karyawan</h1>

<div class="row">
    <div class="col-md-8 my-2">
        <form action="/staff/{{ $staff->id }}" method="POST" enctype="multipart/form-data">
          @method('put')
          @csrf
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus required value="{{ old('nama', $staff->nama) }}">
              @error('nama')    
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="gender">Jenis Kelamin</label>
              <select class="form-control" id="gender" name="gender">
                <option>Laki-laki</option>
                <option>Perempuan</option>
              </select>
            </div>
            <div class="form-group">
                <label for="nohp">No HP</label>
                <input type="text" class="form-control @error('nohp') is-invalid @enderror" id="nohp" name="nohp" required value="{{ old('nohp', $staff->nohp) }}">
                @error('nohp')    
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
                <label for="email">Email Aktif</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email', $staff->email) }}">
                @error('email')    
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
                <label for="salary">Current Salary</label>
                <input type="salary" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" required value="{{ old('salary', $staff->salary) }}">
                @error('salary')    
                <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
                <label for="foto">Pilih Foto</label>
                <input type="file" class="form-control-file" id="foto" name="foto" @error('foto') is-invalid @enderror value="{{ $staff->foto }}">
                <input type="hidden" name="fotoLama" value="{{ $staff->foto }}">
                @error('salary')    
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
              </div>
            
            <button type="submit" class="btn btn-primary d-flex">Submit</button>
          </form>
    </div>
</div>

@endsection

