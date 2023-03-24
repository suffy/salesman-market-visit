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

        <form action="{{ route('briefing.store') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="container">
                <div class="details personal">
                    <div class="fields">
                        <div class="input-field">
                            <label>Tanggal Briefing</label>
                            <input type="date" name="tgl_briefing" />
                        </div>
                    </div>
                    <div class="fields">
                        <div class="input-field">
                            <label>Jenis Briefing</label>
                            <input type="text" name="jenis" placeholder="subject briefing .." />
                        </div>
                    </div>
                </div>
            </div>

            <div class="details personal">
                <div class="fields">
                    <div class="input-field">
                        <label>Keterangan</label>
                        <textarea id="briefing" name="keterangan" cols="30" rows="4" class="summernotex"></textarea>
                    </div>
                </div>

                <div class="fields">

                    <div class="input-field">
                        <label>latitude</label>
                        <input type="text" name="latitude" id="latitude" readonly>
                    </div>
                    <div class="input-field">
                        <label>longitude</label>
                        <input type="text" name="longitude" id="longitude" readonly>
                    </div>
                </div>
                
            </div>

            

            <div class="field-button-left">
                <input type="submit" value="Save" class="submit-link">
                <a href="{{ route('briefingController.exportbriefing') }}" class="export-link">Export Excel</a>
            </div>


        </form> <br>

        {{-- <div id="summernote"></div> --}}

        <div class="container-tabel">
            <table id="example">
                <thead>
                    <tr>
                        <th class="data-title">createdBy</th>
                        <th class="data-title">Tanggal</th>
                        <th class="data-title">Jenis</th>
                        <th class="data-title">Keterangan</th>
                        <th class="data-title">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['query'] as $item)
                        <tr>
                            <td><span class="data-list">{{ $item->created_by }}</span></td>
                            <td><span class="data-list">{{ $item->tgl_briefing }}</span></td>
                            <td><span class="data-list">{{ $item->jenis }}</span></td>
                            <td><span class="data-list">{!! $item->keterangan !!}</span></td>
                            <td>
                                <a href="{{ route('briefing.edit', $item->id) }}" class="edit-link">Edit</a>
                                <a href="{{ url('beranda/briefing_export_pdf', $item->id) }}" target="_blank" class="pdf-link">Pdf</a>
                                <form onsubmit="return confirm('Yakin hapus data ini ?')"
                                    action="{{ route('briefing.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
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
