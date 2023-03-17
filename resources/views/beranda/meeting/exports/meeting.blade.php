<table>
    <thead>
        <tr>
            <th class="data-title">Tanggal</th>
            <th class="data-title">Jenis</th>
            <th class="data-title">Notulen</th>
            <th class="data-title">created</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($meeting as $item)
            <tr>
                <td><span class="data-list">{{ $item->tgl_meeting }}</span></td>
                <td><span class="data-list">{{ $item->jenis }}</span></td>
                <td><span class="data-list">{!! $item->keterangan !!}</span></td>
                <td><span class="data-list">{{ $item->created_by }}</span></td>
            </tr>
        @endforeach
    </tbody>
</table>
