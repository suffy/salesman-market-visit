@if ($errors->any())
<div class="pesan-error">
    <ul>
        @foreach ($errors->all() as $item)
            <li>* {{ $item }}</li>
        @endforeach
    </ul>
</div>     
@endif

@if (Session::has('success'))
    <div class="pesan-success">
        {{ Session::get('success') }}
    </div>
@endif