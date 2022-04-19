@extends('layouts.app')
@section('style')

<link href="{{ asset('applicant/css/job-offer-main.css') }}" rel="stylesheet">
@endsection

@section('content')


<section>
      <div class="container" data-aos="fade-up">
      @if(count($preDocs) != 12 and count($offers) < 0 )
        <div class="alert alert-warning mb-5" role="alert">
          Your need to upload all of your Pre-employment documents before you can accept job offers. You can find this in the profile page.
        </div>
      @endif
        <div class="section-title">
          <h2>Job Offer</h2>
        </div>

        <div class="row d-flex justify-content-center">
          @if(count($offers) > 0)

          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          @foreach($offers as $offer)
            @if($offer->status == 'pending')
            <div class="cards bg-white text-center">  <img src="{{ asset('applicant/img/programmer.svg') }}" class="img-fluid kard" alt="programmer">
                <div class="title">
                    <h3>{{ $offer->job->name}}</h3>
                </div>
                <p ><small class="text-muted">{{ $offer->date }}</small></p>
                
                <a href="{{ route('view-offer', $offer->id) }}" class="btns btn-primary">View</a>
            </div>
            @endif
            @if($offer->status == 'declined')
            <div class="cards bg-white text-center">  <img src="{{ asset('applicant/img/programmer.svg') }}" class="img-fluid kard" alt="programmer">
                <div class="title">
                    <h3>{{ $offer->job->name}}</h3>
                </div>
                <p ><small class="text-muted">{{ $offer->date }}</small></p>
                
                <button class="btn btn-danger" >Declined</button>
            </div>
            @endif

            @if($offer->status == 'accepted')
            <div class="cards bg-white text-center">  <img src="{{ asset('applicant/img/programmer.svg') }}" class="img-fluid kard" alt="programmer">
                <div class="title">
                    <h3>{{ $offer->job->name}}</h3>
                </div>
                <p ><small class="text-muted">{{ $offer->date }}</small></p>
                
                <button class="btn btn-success ">Accepted</button>
            </div>
            @endif
            
            @endforeach
            @else
            <div class="col-lg-5">
              <div class="cards bg-white text-center">  <img src="{{ asset('applicant/img/no offer.svg') }}" class="img-fluid kards" alt="programmer">
                  <div class="title">
                      <h2>You have no job offers</h2>
                  </div>
                  <p class="text-muted">Come back again, or check your timeline for your application progress</p>
                  
              </div>
            </div>
            @endif
        </div>
       
        </div>
    </section>

@endsection