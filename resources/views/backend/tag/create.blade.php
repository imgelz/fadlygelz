
@extends('layouts.backend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data</div>
                <div class="card-body">
                <form action="{{ route('tag.store')}}" method="POST">
                {{ csrf_field()}}
                <div class="form-group">
                        <label for="">Nama Tag</label>
                        <input class="form-control {{ $errors->has('nama_tag') ? ' is-invalid' : '' }}" type="text" name="nama_tag">
                        @if ($errors->has('nama_tag'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nama_tag') }}</strong>
                        </span>
                        @endif
                </div>
                <div class="form-group">
                        <button type ="submit" class="btn btn-primary btn-floating" data-qt-block="body">Simpan</button>
                </div>
                </form>
                </div>
        </div>
    </div>
</div>
@endsection
