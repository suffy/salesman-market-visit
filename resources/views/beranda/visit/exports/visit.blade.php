<table>
    <thead>
        <tr>
            <th class="data-title">Toko</th>
            <th class="data-title">Pemilik</th>
            <th class="data-title">Jenis</th>
            <th class="data-title">Alamat</th>
            <th class="data-title">Kodeprod</th>
            <th class="data-title">Nama Produk</th>
            <th class="data-title">Supplier</th>
            <th class="data-title">Kode group</th>
            <th class="data-title">Nama group</th>
            <th class="data-title">Kode Subgroup</th>
            <th class="data-title">Nama Subgroup</th>
            <th class="data-title">Created</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($visit as $item)
        <tr>
            <td><span class="data-list">{{ $item->nama_toko }}</span></td>
            <td><span class="data-list">{{ $item->nama_pemilik }}</span></td>
            <td><span class="data-list">{{ $item->jenis_toko }}</span></td>
            <td><span class="data-list">{{ $item->alamat_toko }}</span></td>
            <td><span class="data-list">{{ $item->kodeprod }}</span></td>
            <td><span class="data-list">{{ $item->namaprod }}</span></td>
            <td><span class="data-list">{{ $item->supp }}</span></td>
            <td><span class="data-list">{{ $item->kode_group }}</span></td>
            <td><span class="data-list">{{ $item->nama_group }}</span></td>
            <td><span class="data-list">{{ $item->kode_subgroup }}</span></td>
            <td><span class="data-list">{{ $item->nama_subgroup }}</span></td>
            <td><span class="data-list">{{ $item->created_by }}</span></td>
        </tr>
        @endforeach

    </tbody>
</table>
