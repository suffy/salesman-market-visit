@extends('beranda.layout')

@section('konten')


    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Dashboard</span>
            </div>

            <div class="boxes">
                <div class="box box1">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="text">Total Market Visit</span>
                    <span class="number">
                        {{ $data["total_data"] }}
                    </span>
                </div>
                <div class="box box2">
                    <i class="uil uil-comments"></i>
                    <span class="text">Total Briefing</span>
                    <span class="number">
                        {{ $data["total_briefing"] }}
                    </span>
                </div>
                <div class="box box3">
                    <i class="uil uil-share"></i>
                    <span class="text">Total Meeting</span>
                    <span class="number">
                        {{ $data["total_meeting"] }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection