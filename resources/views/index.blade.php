@extends ('layouts.main-layout')

@section('container')

<h1 class="mt-2">Data karyawan</h1>

<a href="/staff" class="btn btn-primary my-2">Tambah data karyawan</a>


<div class="row">
    <div class="col-md-8">
        <table class="table mt-3">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            @foreach ($staffs as $staff)           
            <tbody>
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $staff->nama }}</td>
                <td>
                    <a href="/staff/export/{{ $staff->id }}" class="badge badge-primary">Export</a>
                    <a href="/staff/{{ $staff->id }}" class="badge badge-warning">Detail</a>
                    <form action="/staff/{{ $staff->id }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge badge-danger border-0" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>
    </div>
</div>

@endsection

