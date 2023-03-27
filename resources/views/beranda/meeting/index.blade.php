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

    <form action="{{ route('meeting.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="details personal">
                {{-- <span class="title">Data Toko</span> --}}

                <div class="fields">
                    <div class="input-field">
                        <label>Tanggal Meeting (Mulai)</label>
                        <input type="datetime-local" name="tgl_meeting" value="{{ Session::get('tgl_meeting') }}" />
                    </div>
                </div>
                <div class="fields">
                    <div class="input-field">
                        <label>Tanggal Meeting (Selesai)</label>
                        <input type="datetime-local" name="tgl_meeting_selesai" value="{{ Session::get('tgl_meeting_selesai') }}" />
                    </div>
                </div>
                <div class="fields">
                    <div class="input-field">
                        <label>Jenis Meeting</label>
                        <input type="text" name="jenis" placeholder="jenis meeting .." value="{{ Session::get('jenis') }}" />
                    </div>
                </div>

            </div>
        </div>

        <div class="fields">
            <div class="input-field">
                <label>Notulen / Keterangan</label>
                <textarea name="keterangan" id="meeting" cols="30" rows="4">{{ Session::get('keterangan') }}</textarea>
            </div>

        </div>
        <div class="fields">

            <div class="input-field">
                <label>latitude (* diinput otomatis)</label>
                <input type="text" name="latitude" id="latitude" readonly>
            </div>
            <div class="input-field">
                <label>longitude (* diinput otomatis)</label>
                <input type="text" name="longitude" id="longitude" readonly>
            </div>
            <div class="input-field">
                <label>accuracy (* diinput otomatis)</label>
                <input type="text" name="accuracy" id="accuracy" readonly>
            </div>
            <div class="input-field">
                <label>Provinsi (* diinput otomatis)</label>
                <input type="text" name="provinsi" id="provinsi" readonly>
            </div>
            <div class="input-field">
                <label>Kota (* diinput otomatis)</label>
                <input type="text" name="kota" id="kota" readonly>
            </div>
            <div class="input-field">
                <label>Kecamatan (* diinput otomatis)</label>
                <input type="text" name="kecamatan" id="kecamatan" readonly>
            </div>
        </div>

        <div class="field-button-left">
            <input type="submit" value="Save" class="submit-link">
            <a href="{{ route('meetingController.exportmeeting') }}" class="export-link">Export</a>
        </div>


    </form>


    <div class="container-tabel">
        <table id="example">
            <thead>
                <tr>
                    <th class="data-title">createdBy</th>
                    <th class="data-title">Tanggal</th>
                    <th class="data-title">Waktu</th>
                    <th class="data-title">Jenis</th>
                    <th class="data-title">Notulen</th>
                    <th class="data-title">#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['query'] as $item)
                @php
                $akhir=date_create($item->tgl_meeting_selesai);
                $awal=date_create($item->tgl_meeting);
                $diff=date_diff($akhir,$awal);
                @endphp
                <tr>
                    <td><span class="data-list">{{ $item->created_by }}</span></td>
                    <td><span class="data-list">{{ $item->tgl_meeting }}</span></td>
                    {{-- <td><span class="data-list">{{ date('d-m-Y', strtotime($item->tgl_meeting)) }}</span></td> --}}
                    <td><span class="data-list">{{ $diff->format("%h Jam %i Menit")}}</span></td>
                    <td><span class="data-list">{{ $item->jenis }}</span></td>
                    <td><span class="data-list">{!! $item->keterangan !!}</span></td>
                    <td>
                        <a href="{{ route('meeting.edit', $item->id) }}" class="edit-link">Edit</a>
                        <a href="{{ url('beranda/meeting_export_pdf', $item->id) }}" target="_blank" class="pdf-link">Pdf</a>
                        <form onsubmit="return confirm('Yakin hapus data ini ?')" action="{{ route('meeting.destroy', $item->id) }}" class="d-inline" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            {{-- <a href="#" class="delete-link">delete</a> --}}
                            <button class="delete-link" type="submit" name="submit">delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

</div>
</section>
@endsection