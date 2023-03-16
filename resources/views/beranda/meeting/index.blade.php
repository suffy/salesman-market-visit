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
        <div class="container">
            
            <form action="{{ route('meeting.store') }}" method="POST" enctype="multipart/form-data">
                @csrf   
                
                <div class="details personal">
                    {{-- <span class="title">Data Toko</span> --}}
        
                    <div class="fields">
                        <div class="input-field">
                            <label>Tanggal Meeting</label>
                            <input type="date" name="tgl_meeting" />
                        </div>
                    </div>
                    <div class="fields">
                        <div class="input-field">
                            <label>Jenis Meeting</label>
                            <input type="text" name="jenis" placeholder="jenis meeting .." />
                        </div>
                    </div>
                    <div class="fields">
                        <div class="input-field">
                            <label>Notulen / Keterangan</label>
                            <textarea name="keterangan" cols="30" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                {{-- <input type="button" value="submit" > --}}
                <div class="field-button-left">
                    {{-- <button class="btn-tambah">Save</button> --}}
                    <input type="submit" value="Save" class="submit-link">
                    <a href="{{ route('meetingController.exportmeeting') }}" class="export-link">Export</a>
                </div>
                      
            </form>
        </div>

            <div class="activity-data">
                <table id="example" class="hover" style="width:100%">
                    <thead>
                        <tr>
                            <th class="data-title">Tanggal</th>
                            <th class="data-title">Jenis</th>
                            <th class="data-title">Notulen</th>
                            <th class="data-title">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['query'] as $item)
                        <tr>
                            <td><span class="data-list">{{ $item->tgl_meeting }}</span></td>
                            <td><span class="data-list">{{ $item->jenis }}</span></td>
                            <td><span class="data-list">{{ $item->keterangan }}</span></td>
                            <td>
                                <form onsubmit="return confirm('Yakin hapus data ini ?')" action="{{ route('meeting.destroy', $item->id) }}" class="d-inline" method="POST">
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
