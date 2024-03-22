@extends('layout.master', ['title' => $announcement->title])
@section('content')
<div class="container">
    <div class="headerSection">
        <div class="header-category">
            <div class="box-pointer"></div>
            <div class="header-category-title">
                <h6>Announcement</h6>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 my-3">
            <h4 class="mt-3">{{$announcement->title}}</h4>
            <small class="my-3 border-start border-5 p-1">{{\Carbon\Carbon::parse($announcement->created_at)->format('d M, Y')}} By Dreamssel</small>
            <p class="border-bottom mt-2 pb-2">{{ $announcement->short_description }}</p>
            <p>{!! $announcement->description !!}</p>
        </div>
    </div>
</div>
@endsection