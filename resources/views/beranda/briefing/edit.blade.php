@extends('beranda.layout')

@section('konten')
    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Briefing</span>
            </div>
        </div>

        @include('beranda.pesan')

        <form action="{{ route('briefing.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf


            <div class="container">
                <div class="details personal">
                    <div class="fields">
                        <div class="input-field">
                            <label>Tanggal Briefing</label>
                            <input type="date" name="tgl_briefing" value="{{ $data->tgl_briefing }}" />
                        </div>
                    </div>
                    <div class="fields">
                        <div class="input-field">
                            <label>Jenis Briefing</label>
                            <input type="text" name="jenis" value="{{ $data->jenis }}" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="details personal">
                <div class="fields">
                    <div class="input-field">
                        <label>Keterangan</label>
                        <textarea id="briefing" name="keterangan" cols="30" rows="4">{{ $data->keterangan }}</textarea>
                    </div>
                </div>
            </div>

            <div class="field-button-left">
                <input type="submit" value="Update" class="submit-link">
                <a href="{{ url()->previous() }}" class="back-link">Kembali</a>
            </div>


        </form> <br>

        {{-- <div id="summernote"></div> --}}

        
    </div>

    </div>
    </section>
@endsection
