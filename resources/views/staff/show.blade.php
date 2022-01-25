@extends ('layouts.main-layout')

@section('container')

<h1 class="mt-2">Data karyawan</h1>


<div class="card" style="width: 18rem;">
  @if ($staff->foto)
  <img src="{{ asset('storage/' . $staff->foto) }}" class="card-img-top">
  @else 
  <img src="{{ asset('storage/images/default.jpg') }}" class="card-img-top"> 
  @endif
    <div class="card-body">
      <h5 class="card-title">Nama : {{ $staff->nama }}</h5>
      <p class="card-text">Jenis Kelamin : {{ $staff->gender }}</p>
      <p class="card-text">No HP : {{ $staff->nohp }}</p>
      <p class="card-text">Email Aktif : {{ $staff->email }}</p>
      <p class="card-text">Current Salary : {{ $staff->salary }}</p>
      <a href="/" class="btn btn-success">Kembali</a>
      <a href="/staff/{{ $staff->id }}/edit" class="btn btn-warning">Edit</a>
      <form action="/staff/{{ $staff->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')">Delete</button>
      </form>
    </div>
  </div>

@endsection

