@extends('beranda.layout')

@section('konten')
    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Market Visit</span>
            </div>
        </div>

        @include('beranda.pesan')
        <div class="container">

            <form action="{{ route('visit.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="details personal">
                    <span class="title">Data Toko</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Tgl Visit</label>
                            <input type="date" name="tgl_visit" value="{{ Session::get('tgl_visit') }}" />
                        </div>

                        <div class="input-field">
                            <label>Nama Toko</label>
                            <input type="text" name="nama_toko" placeholder="nama toko .." value="{{ Session::get('nama_toko') }}" />
                        </div>

                        <div class="input-field">
                            <label>Pemilik</label>
                            <input type="text" name="nama_pemilik" placeholder="nama pemilik .." value="{{ Session::get('nama_pemilik') }}" />
                        </div>

                        <div class="input-field">
                            <label>Jenis</label>
                            <select name="jenis_toko">
                                <option value="" @if (old('jenis_toko') == "") {{ 'selected' }} @endif>Select Jenis</option>
                                <option value="APT" @if (old('jenis_toko') == "APT") {{ 'selected' }} @endif>Apotik Reguler (Independen)</option>
                                <option value="APC" @if (old('jenis_toko') == "APC") {{ 'selected' }} @endif>Apotik Jaringan/KF/Guardian/Century</option>
                                <option value="TOB" @if (old('jenis_toko') == "TOB") {{ 'selected' }} @endif>Toko Obat</option>
                                <option value="TKL" @if (old('jenis_toko') == "TKL") {{ 'selected' }} @endif>TOKO KELONTONG/KIOS ROKO /PD</option>
                                <option value="TJM" @if (old('jenis_toko') == "TJM") {{ 'selected' }} @endif>Toko Jamu</option>
                                <option value="TCO" @if (old('jenis_toko') == "TCO") {{ 'selected' }} @endif>Toko Kosmetik</option>
                                <option value="WRG" @if (old('jenis_toko') == "WRG") {{ 'selected' }} @endif>Warung</option>
                                <option value="SNC" @if (old('jenis_toko') == "SNC") {{ 'selected' }} @endif>Toko Snack</option>
                                <option value="MML" @if (old('jenis_toko') == "MML") {{ 'selected' }} @endif>Minimarket Lokal/Independen</option>
                                <option value="MMN" @if (old('jenis_toko') == "MMN") {{ 'selected' }} @endif>Minimarket Nasional</option>
                                <option value="SML" @if (old('jenis_toko') == "SML") {{ 'selected' }} @endif>Supermarket Lokal</option>
                                <option value="SMN" @if (old('jenis_toko') == "SMN") {{ 'selected' }} @endif>Supermarket Nasional</option>
                                <option value="HPM" @if (old('jenis_toko') == "HPM") {{ 'selected' }} @endif>Hypermarket</option>
                                <option value="HRK" @if (old('jenis_toko') == "HRK") {{ 'selected' }} @endif>Hotel Resto Kantin</option>
                                <option value="ECM" @if (old('jenis_toko') == "ECM") {{ 'selected' }} @endif>E-Commerce</option>
                                <option value="TRD" @if (old('jenis_toko') == "TRD") {{ 'selected' }} @endif>Trading (Insidentil)</option>
                                <option value="PBF" @if (old('jenis_toko') == "PBF") {{ 'selected' }} @endif>PERUSAHAAN BESAR</option>
                                <option value="PDC" @if (old('jenis_toko') == "PDC") {{ 'selected' }} @endif>Pedagang Besar Consumer</option>
                                <option value="SUB" @if (old('jenis_toko') == "SUB") {{ 'selected' }} @endif>Sub Distributor Resmi</option>
                                <option value="HEB" @if (old('jenis_toko') == "HEB") {{ 'selected' }} @endif>Toko Herbal</option>
                                <option value="BBS" @if (old('jenis_toko') == "BBS") {{ 'selected' }} @endif>Baby Shop</option>
                                <option value="OTH" @if (old('jenis_toko') == "OTH") {{ 'selected' }} @endif>OTHERS</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Foto Toko</label>
                            <input type="file" name="foto_toko" />
                        </div>

                        <div class="input-field">
                            <label>Alamat</label>
                            <textarea name="alamat_toko" cols="30" rows="4">{{ Session::get('alamat_toko') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="details personal">
                    <span class="title">Data Produk MPM</span>

                    <div class="fields-full-width">
                        <div class="input-field">
                            <div class="select-btn">
                                <span class="btn-text">Herbal (click to open)</span>
                                <span class="arrow-dwn">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </span>
                            </div>

                            <ul class="list-items">
                                @foreach ($data['herbal'] as $item)
                                    <li class="item">
                                        <input type="checkbox" class="checkbox fa-solid fa-check check-icon"
                                            name="deltomed[]" id="{{ $item->kodeprod }}" value="{{ $item->kodeprod }}" {{ (is_array(old('deltomed')) && in_array($item->kodeprod, old('deltomed'))) ? ' checked' : '' }} >
                                        <label for="{{ $item->kodeprod }}">{{ $item->namaprod }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="fields-full-width">
                        <div class="input-field">
                            <div class="select-btn-candy" id="select-btn-candy">
                                <span class="btn-text-candy">Candy (click to open)</span>
                                <span class="arrow-dwn-candy">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </span>
                            </div>
                            <ul class="list-items-candy">
                                @foreach ($data['candy'] as $item)
                                    <li class="item-candy">
                                        <input type="checkbox" class="checkbox fa-solid fa-check check-icon"
                                            name="candy[]" id="{{ $item->kodeprod }}" value="{{ $item->kodeprod }}" {{ (is_array(old('candy')) && in_array($item->kodeprod, old('candy'))) ? ' checked' : '' }}>
                                        <label for="{{ $item->kodeprod }}">{{ $item->namaprod }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                    <div class="fields-full-width">
                        <div class="input-field">
                            <div class="select-btn-us" id="select-btn-us">
                                <span class="btn-text-us">Ultra Sakti (click to open)</span>
                                <span class="arrow-dwn-us">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </span>
                            </div>
                            <ul class="list-items-us">
                                @foreach ($data['us'] as $item)
                                    <li class="item-us">
                                        <input type="checkbox" class="checkbox fa-solid fa-check check-icon"
                                            name="us[]" id="{{ $item->kodeprod }}" value="{{ $item->kodeprod }}" {{ (is_array(old('us')) && in_array($item->kodeprod, old('us'))) ? ' checked' : '' }}>
                                        <label for="{{ $item->kodeprod }}">{{ $item->namaprod }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="fields-full-width">
                        <div class="input-field">
                            <div class="select-btn-marguna" id="select-btn-marguna">
                                <span class="btn-text-marguna">Marguna (click to open)</span>
                                <span class="arrow-dwn-marguna">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </span>
                            </div>
                            <ul class="list-items-marguna">
                                @foreach ($data['marguna'] as $item)
                                    <li class="item-marguna">
                                        <input type="checkbox" class="checkbox fa-solid fa-check check-icon"
                                            name="marguna[]" id="{{ $item->kodeprod }}" value="{{ $item->kodeprod }}" {{ (is_array(old('marguna')) && in_array($item->kodeprod, old('marguna'))) ? ' checked' : '' }}>
                                        <label for="{{ $item->kodeprod }}">{{ $item->namaprod }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="fields-full-width">
                        <div class="input-field">
                            <div class="select-btn-intrafood" id="select-btn-intrafood">
                                <span class="btn-text-intrafood">Intrafood (click to open)</span>
                                <span class="arrow-dwn-intrafood">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </span>
                            </div>
                            <ul class="list-items-intrafood">
                                @foreach ($data['intrafood'] as $item)
                                    <li class="item-intrafood">
                                        <input type="checkbox" class="checkbox fa-solid fa-check check-icon"
                                            name="intrafood[]" id="{{ $item->kodeprod }}"
                                            value="{{ $item->kodeprod }}" {{ (is_array(old('intrafood')) && in_array($item->kodeprod, old('intrafood'))) ? ' checked' : '' }}>
                                        <label for="{{ $item->kodeprod }}">{{ $item->namaprod }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="fields-full-width">
                        <div class="input-field">
                            <div class="select-btn-strive" id="select-btn-strive">
                                <span class="btn-text-strive">Strive (click to open)</span>
                                <span class="arrow-dwn-strive">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </span>
                            </div>
                            <ul class="list-items-strive">
                                @foreach ($data['strive'] as $item)
                                    <li class="item-strive">
                                        <input type="checkbox" class="checkbox fa-solid fa-check check-icon"
                                            name="strive[]" id="{{ $item->kodeprod }}"
                                            value="{{ $item->kodeprod }}" {{ (is_array(old('strive')) && in_array($item->kodeprod, old('strive'))) ? ' checked' : '' }}>
                                        <label for="{{ $item->kodeprod }}">{{ $item->namaprod }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="fields-full-width">
                        <div class="input-field">
                            <div class="select-btn-mdj" id="select-btn-mdj">
                                <span class="btn-text-mdj">MDJ (click to open)</span>
                                <span class="arrow-dwn-mdj">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </span>
                            </div>
                            <ul class="list-items-mdj">
                                @foreach ($data['mdj'] as $item)
                                    <li class="item-mdj">
                                        <input type="checkbox" class="checkbox fa-solid fa-check check-icon"
                                            name="mdj[]" id="{{ $item->kodeprod }}"
                                            value="{{ $item->kodeprod }}" {{ (is_array(old('mdj')) && in_array($item->kodeprod, old('mdj'))) ? ' checked' : '' }}>
                                        <label for="{{ $item->kodeprod }}">{{ $item->namaprod }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

                <br><br>

                <div class="details personal">
                    <span class="title">Data Produk Kompetitor</span>

                    <div class="fields">

                        <div class="input-field">
                            <label>Produk Kompetitor</label>
                            <textarea name="produk_kompetitor" cols="30" rows="4">{{ Session::get('produk_kompetitor') }}</textarea>
                        </div>

                        <div class="input-field">
                            <label>Catatan</label>
                            <textarea name="catatan" cols="30" rows="4">{{ Session::get('catatan') }}</textarea>
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

                </div>

                {{-- <input type="button" value="submit" > --}}
                <div class="field-button">
                    {{-- <button class="btn-tambah">Save</button> --}}
                    <input type="submit" value="Save" class="submit-link">
                    <a href="{{ route('visitController.exportvisit') }}" class="export-link">Export</a>
                </div>

            </form>
        </div>

        <br><br>

        <div class="container-tabel">
            <table id="example">
                <thead>
                    <tr>
                        <th class="data-title">CreatedBy</th>
                        <th class="data-title">Toko</th>
                        <th class="data-title">Pemilik</th>
                        <th class="data-title">Jenis</th>
                        <th class="data-title">Alamat</th>
                        <th class="data-title">Foto</th>
                        <th class="data-title">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['query'] as $item)
                        <tr>
                            <td><span class="data-list">{{ $item->created_by }}</span></td>
                            <td><span class="data-list">{{ $item->nama_toko }}</span></td>
                            <td><span class="data-list">{{ $item->nama_pemilik }}</span></td>
                            <td><span class="data-list">{{ $item->jenis_toko }}</span></td>
                            <td><span class="data-list">{{ $item->alamat_toko }}</span></td>
                            <td>
                                {{-- <span class="data-list"> --}}
                                {{-- {{ $item->foto_toko }} --}}
                                <img src="{{ asset('foto')."/".$item->foto_toko }}" style="max-width:100px;max-height:100px">
                                {{-- </span> --}}
                            </td>
                            <td>
                                <a href="{{ url('beranda/visit_export_pdf', $item->id) }}" target="_blank" class="pdf-link">Pdf</a>
                                <form onsubmit="return confirm('Yakin hapus data ini ?')"
                                    action="{{ route('visit.destroy', $item->id) }}" class="d-inline" method="POST">
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
