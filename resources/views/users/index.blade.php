@extends('layouts.adm')
@section('content')


<link href="{{ URL::asset('adm/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    @if(Auth::User()->level_id == '14' or Auth::User()->level_id == '1' or Auth::User()->level_id == '13' or Auth::User()->level_id == '27' or Auth::User()->level_id == '2'  )

    <h6 class="m-0 font-weight-bold text-primary">User <a href="{{ url('user/create') }}" class="btn btn-sm btn-primary" >Create</a>
      </h6>

    @else
    @endif


  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>NIP</th>
            <th>Nama</th>
            {{-- <th>Tempat</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>alamat</th>
            <th>Nomor HP</th> --}}
            <th>Golongan</th>
            <th>Pendidikan</th>
            {{-- <th>Diklat</th>
            <th>Jenis Jabatan</th> --}}
            <th>Jabatan</th>
            {{-- <th>No SK</th> --}}
            <th>Action</th>
          </tr>
        </thead>
        
        <tbody>
            @php
            $no = 1;
            @endphp
            @foreach($data as $items)
            <tr>
                <td>{{ $no++ }}</td>
                <td>          <img class="img-profile rounded-circle"  style="width:50px" src="{{ URL::asset('images/') }}/{{$items->user->images}}">
                </td>
                <td>{{ $items->user->nip }}</td>
                <td>{{ $items->user->name }}</td>
                {{-- <td>{{ $items->tempat }}</td>
                <td>{{ $items->tanggal }}</td>
                <td>{{ $items->gender }}</td>
                <td>{{ $items->alamat }}</td>
                <td>{{ $items->telepon }}</td> --}}
                <td>{{ $items->user->golongan->name }}</td>
                <td>{{ $items->user->pendidikan }}</td>
                {{-- <td>{{ $items->diklat }}</td>
                <td>{{ $items->jenisjabatan }}</td> --}}
                <td>{{ $items->user->level->name }}</td>
                {{-- <td>{{ $items->nosk }}</td> --}}

                <td>
				
                <form action="{{ route('user.destroy', $items->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <!--<a href="{{ route('user.show',$items->id) }}">Lihat</a>
                    <a class="btn btn-sm btn-success" type="submit" href="{{ route('user.edit',$items->id) }}">Edit</a>-->
                    <a class="btn btn-sm btn-primary" type="submit" href="{{ route('user.show',$items->id) }}">Detail</a>
                    @if(Auth::User()->level_id == '14' or Auth::User()->level_id == '1' or Auth::User()->level_id == '13' or Auth::User()->level_id == '27' or Auth::User()->level_id == '2'  )

                    <a class="btn btn-sm btn-success" type="submit" href="{{ route('user.edit',$items->id) }}">Edit</a>
                    @else
                    @endif
                    <button style="color:white;" class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" href="{{ url('/logout') }}">Logout</a>
  </div>
</div>
</div>
</div>

@endsection
