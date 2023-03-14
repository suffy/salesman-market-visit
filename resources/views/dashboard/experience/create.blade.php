@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{ route('experience.index') }}" class="btn btn-secondary"> << kembali</a></div>

    <form action="{{ route('experience.store') }}" method="POST">
        @csrf
    <div class="mb-3">
      <label for="posisi" class="form-label">Posisi</label>
      <input type="text"
        class="form-control form-control-sm" name="judul" id="posisi" aria-describedby="helpId" placeholder="posisi" value="{{ Session::get('judul') }}">
    </div>
    <div class="mb-3">
      <label for="info1" class="form-label">Nama Perusahaan</label>
      <input type="text"
        class="form-control form-control-sm" name="info1" id="info1" aria-describedby="helpId" placeholder="Nama Perusahaan" value="{{ Session::get('info1') }}">
    </div>
    <div class="mb-3">
      <div class="row">
        <div class="col-auto">Tanggal Mulai</div>
        <div class="col-auto">
          <input type="date" class="form-control form-control-sm" name="tgl_mulai" placeholder="dd/mm/yyyy" value="{{ Session::get('tgl_mulai') }}">
        </div>
        <div class="col-auto">Tanggal Akhir</div>
        <div class="col-auto">
          <input type="date" class="form-control form-control-sm" name="tgl_akhir" placeholder="dd/mm/yyyy" value="{{ Session::get('tgl_akhir') }}">
        </div>
      </div>
    </div>
    <div class="mb-3">
      <label for="info1" class="form-label">Isi</label>
      <textarea name="isi" id="isi" class="form-control summernote" rows="5">{{ Session::get('isi') }}</textarea>
    </div>
    <button class="btn btn-primary" name="simpan" type="submit">simpan</button>
    
    </form>


@endsection