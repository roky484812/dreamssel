@extends('layouts.client.index', ['title' => 'Announcements'])
@section('content')
    <div class="container">
        <div class="headerSection">
            <div class="header-category">
                <div class="box-pointer"></div>
                <div class="header-category-title">
                    <h6>Announcement</h6>
                </div>
            </div>
            <div class="flashSaleHeader mt-3">
                <div class="header">
                    <h3>Announcement List</h3>
                </div>
            </div>
        </div>
        <div class="row g-2 my-3">
            @if (count($announcements))
                @foreach ($announcements as $announcement)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <a href="{{route('client.announcement.view', $announcement->id)}}" class="mb-4 h5 text-decoration-none">{{ Str::limit($announcement->title, 50) }}</a>
                                    <small>{{ \Carbon\Carbon::createFromDate($announcement->created_at)->diffForHumans() }}</small>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="mb-1">{{ Str::limit($announcement->short_description, 80) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <h3 class="text-muted text-center">No Announcements!</h3>
                </div>        
            @endif
        </div>
        {{ $announcements->links() }}
    </div>
@endsection