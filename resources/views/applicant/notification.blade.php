@extends('layouts.app')
@section('style')

<link href="{{ asset('applicant/css/notifications.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="section-title mt-5">
        <h2>Notifications
        </h2>
    </div>
    <div class="container">
      <h3 class="mt-3 text-center">{{$notification->data['Title']}}</h3>
      <p class="text-center"><small class="text-muted">{{ $notification->created_at->format('M d, Y') }}</small></p>
      <p class="mt-4 text-center">{{$notification->data['Description']}}</p>
      <!-- <div class="d-flex justify-content-center">
        <button class="btn btn-notif">View on GMAIL</button>
      </div> -->
    </div>
@endsection