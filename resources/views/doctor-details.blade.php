@extends('layouts.master')

@section('title', $doctor->dr_name . ' | Myraluxa Aesthetic Pvt Ltd')

@section('content')
<main class="main">
    <div class="site-breadcrumb" style="background: url({{ asset('assets/img/breadcrumb/01.jpg') }})">
        <div class="container">
            <h2 class="breadcrumb-title">Doctor Details</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li class="active">Doctor Details</li>
            </ul>
        </div>
    </div>

    <div class="team-single py-120">
        <div class="container">
            <div class="team-single-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="team-single-img">
                            <img src="{{ asset('storage/doctors/' . $doctor->image) }}" alt="doctor image" style="height: 250px;  width: 230px;">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="team-single-content">
                            <div class="team-single-name">
                                <h3>{{ $doctor->dr_name }}</h3>
                                <p>{{ $doctor->speciality }}</p>
                            </div>
                            <div class="team-single-info">
                                <ul>
                                    @if($doctor->phone)
                                    <li><span class="team-single-info-left">Phone:</span>
                                        <span class="team-single-info-right">{{ $doctor->phone }}</span></li>
                                    @endif

                                    @if($doctor->email)
                                    <li><span class="team-single-info-left">Email:</span>
                                        <span class="team-single-info-right"><a href="mailto:{{ $doctor->email }}">{{ $doctor->email }}</a></span></li>
                                    @endif

                                    @if($doctor->speciality)
                                    <li><span class="team-single-info-left">Speciality:</span>
                                        <span class="team-single-info-right">{{ $doctor->speciality }}</span></li>
                                    @endif

                                    @if($doctor->experience)
                                    <li><span class="team-single-info-left">Experience:</span>
                                        <span class="team-single-info-right">{{ $doctor->experience }}</span></li>
                                    @endif

                                    @if($doctor->degree)
                                    <li><span class="team-single-info-left">Degree:</span>
                                        <span class="team-single-info-right">{{ $doctor->degree }}</span></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="team-single-overview py-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="team-single-overview-content">
                                <h4 class="mb-10">Doctor Introduction</h4>
                                <p>{!! $doctor->dr_introduction !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection