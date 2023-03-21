@extends('beranda.layout')

@section('konten')
    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Meeting</span>
            </div>
        </div>

        @include('beranda.pesan')

        <form action="{{ route('meeting.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
            <div class="container">
                <div class="details personal">
                    <div class="fields">
                        <div class="input-field">
                            <label>Tanggal Meeting</label>
                            <input type="date" name="tgl_meeting" value="{{ $data->tgl_meeting }}" />
                        </div>
                    </div>
                    <div class="fields">
                        <div class="input-field">
                            <label>Jenis Meeting</label>
                            <input type="text" name="jenis" value="{{ $data->jenis }}" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="fields">
                <div class="input-field">
                    <label>Notulen / Keterangan</label>
                    <textarea name="keterangan" id="meeting" cols="30" rows="4">
                        {{ $data->keterangan }}
                    </textarea>
                </div>
            </div>

            <div class="field-button-left">
                <input type="submit" value="Save" class="submit-link">
                <a href="{{ url()->previous() }}" class="back-link">Kembali</a>
            </div>


        </form>


        
    </div>

    </div>
    </section>
@endsection
