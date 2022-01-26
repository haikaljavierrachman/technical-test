@extends ('layouts.main-layout')

@section('container')



<div class="row">
    <div class="col-md-8">
        <table class="table mt-3 table-dark">
            <thead>
              <tr>
                <th scope="col">Field</th>
                <th scope="col">Value</th>
              </tr>
            </thead>       
            <tbody>
              <tr>
                <td>Nama</td>
                <td>{{ $staff->nama }}</td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>{{ $staff->gender }}</td>
              </tr>
              <tr>
                <td>No HP</td>
                <td>{{ $staff->nohp }}</td>
              </tr>
              <tr>
                <td>Email Aktif</td>
                <td>{{ $staff->email }}</td>
              </tr>
              <tr>
                <td>Current Salary</td>
                <td>{{ $staff->salary }}</td>
              </tr>
              <tr>
                <td>Foto</td>
                @if ($staff->foto)
                <div class="w-70px h-70px">
                  <td><img src="{{ asset('storage/' . $staff->foto) }}" class="img-thumbnail"></td>
                  @else 
                  <div class="w-70px h-70px">
                    <td><img src="{{ asset('storage/images/default.jpg') }}" class="img-thumbnail"></td>

                @endif
                </div>
              </tr>
            </tbody>
          </table>

          <a href="/staff/export-word/{{ $staff->id }}" class="btn btn-primary mb-2">Export to Word</a>
          <a href="/" class="btn btn-success mb-2">Kembali</a>
    </div>
</div>

@endsection