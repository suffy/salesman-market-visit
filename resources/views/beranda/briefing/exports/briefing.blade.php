<table>
    <thead>
        <tr>
            <th class="data-title">Tanggal</th>
            <th class="data-title">Jenis</th>
            <th class="data-title">Keterangan</th>
            <th class="data-title">Created</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($briefing as $item)
        <tr>
            <td><span class="data-list">{{ $item->tgl_briefing }}</span></td>
            <td><span class="data-list">{{ $item->jenis }}</span></td>
            <td><span class="data-list">{!! $item->keterangan !!}</span></td>
            <td><span class="data-list">{{ $item->created_by }}</span></td>
        </tr>
        @endforeach
    </tbody>
</table>
