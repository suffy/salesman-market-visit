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
                            <label>Nama</label>
                            <input type="text" name="nama_toko" placeholder="nama toko .." />
                        </div>

                        <div class="input-field">
                            <label>Pemilik</label>
                            <input type="text" name="nama_pemilik" placeholder="nama pemilik .." />
                        </div>

                        <div class="input-field">
                            <label>Jenis</label>
                            <select name="jenis_toko">
                            <option value="" disabled selected>Select Jenis</option>
                            <option value="ACC">TK ACCESORIS</option>
                            <option value="AGY">AGENCY</option>
                            <option value="APC">Apotik Jaringan/KF/Guardian/Century</option>
                            <option value="APT">Apotik Reguler (Independen)</option>
                            <option value="ASG">ASONGAN</option>
                            <option value="BAB">BABY SHOP</option>
                            <option value="BID">BIDAN</option>
                            <option value="BUM">BUMBU</option>
                            <option value="CFE">Cafe</option>
                            <option value="CMT">COSMETIK</option>
                            <option value="COS">TO/COSMETIC</option>
                            <option value="DOK">DOKTER</option>
                            <option value="ECM">E-Commerce</option>
                            <option value="EVN">Event</option>
                            <option value="HPM">Hypermarket</option>
                            <option value="HRB">TOKO HERBA</option>
                            <option value="HRK">Hotel Resto Kantin</option>
                            <option value="HTL">Hotel</option>
                            <option value="INS">INSTITUSI</option>
                            <option value="KSM">KOSMETIK</option>
                            <option value="MML">Minimarket Lokal/Independen</option>
                            <option value="MMN">Minimarket Nasional</option>
                            <option value="OLH">Oleh - Oleh</option>
                            <option value="OTH">OTHERS</option>
                            <option value="PBF">PERUSAHAAN BESAR</option>
                            <option value="PDC">Pedagang Besar Consumer</option>
                            <option value="PLK">POLOKILINIK</option>
                            <option value="PLT">PLASTIK</option>
                            <option value="PRI">Perorangan</option>
                            <option value="RST">Restourant</option>
                            <option value="SAY">SAYUR</option>
                            <option value="SMB">SEMBAKO</option>
                            <option value="SML">Supermarket Lokal</option>
                            <option value="SMN">Supermarket Nasional</option>
                            <option value="SMR">Supermarket</option>
                            <option value="SNC">Toko Snack</option>
                            <option value="SNK">Snack</option>
                            <option value="SUB">Sub Distributor Resmi</option>
                            <option value="SWL">SWALAYAN</option>
                            <option value="TBK">TOKO BAHAN KUE</option>
                            <option value="TCO">Toko Kosmetik</option>
                            <option value="TJM">Toko Jamu</option>
                            <option value="TKL">TOKO KELONTONG/KIOS ROKO /PD</option>
                            <option value="TKO">TOKO. OBAT</option>
                            <option value="TOB">Toko Obat</option>
                            <option value="TRD">Trading (Insidentil)</option>
                            <option value="WRG">Warung</option>
                            <option value="TBS">TOKO KELONTONG</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Foto Toko</label>
                            <input type="file" name="foto_toko" />
                        </div>

                        <div class="input-field">
                            <label>Alamat</label>
                            <textarea name="alamat_toko" cols="30" rows="4"></textarea>
                        </div>
                    </div>
                </div>

                <div class="details personal">
                    <span class="title">Data Produk MPM</span>
        
                    <div class="fields-full-width">

                        <div class="input-field">

                            <div class="select-btn">
                                <span class="btn-text">Deltomed (click to open)</span>
                                <span class="arrow-dwn">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </span>
                            </div>

                            <ul class="list-items">

                                @foreach ($data['deltomed'] as $item)   
                                <li class="item">
                                    <input type="checkbox" class="checkbox fa-solid fa-check check-icon" name="deltomed[]" id="{{ $item->kodeprod }}" value="{{ $item->kodeprod }}">
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
                                    <input type="checkbox" class="checkbox fa-solid fa-check check-icon" name="us[]" id="{{ $item->kodeprod }}" value="{{ $item->kodeprod }}">
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
                                    <input type="checkbox" class="checkbox fa-solid fa-check check-icon" name="marguna[]" id="{{ $item->kodeprod }}" value="{{ $item->kodeprod }}">
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
                                    <input type="checkbox" class="checkbox fa-solid fa-check check-icon" name="intrafood[]" id="{{ $item->kodeprod }}" value="{{ $item->kodeprod }}">
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
                            <textarea name="produk_kompetitor" cols="30" rows="4"></textarea>
                        </div>

                        <div class="input-field">
                            <label>Catatan</label>
                            <textarea name="catatan" cols="30" rows="4"></textarea>
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

            <div class="activity-data">
                <table id="example" class="hover" style="width:100%">
                    <thead>
                        <tr>
                            <th class="data-title">CreatedBy</th>
                            <th class="data-title">Toko</th>
                            <th class="data-title">Pemilik</th>
                            <th class="data-title">Jenis</th>
                            <th class="data-title">Alamat</th>
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
                                <form onsubmit="return confirm('Yakin hapus data ini ?')" action="{{ route('visit.destroy', $item->id) }}" class="d-inline" method="POST">
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
