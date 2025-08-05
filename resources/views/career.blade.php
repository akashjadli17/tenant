@extends('layouts.master')

@section('title', 'Tenants Management')

@section('content')
    <main class="main">
        <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
            <div class="container">
                <h2 class="breadcrumb-title">Our Career</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="/">Home</a></li>
                    <li class="active">Our Career</li>
                </ul>
            </div>
        </div>

        <div class="container py-5">
            <div class="row g-4">
                @foreach ($careers as $career)
                    <div class="col-md-6">
                        <div class="career-card">
                            <h5 class="career-title">{{ $career->job_profile }}</h5>
                            <div class="career-meta">
                                <span><i class="fas fa-map-marker-alt"></i> {{ $career->location ?? 'N/A' }}</span>
                                <span><i class="fas fa-briefcase"></i> {{ $career->experience ?? 'N/A' }} Experience</span>
                            </div>
                            <div class="career-buttons">
                                <button class="btn-outline read-desc" data-id="{{ $career->id }}">Job
                                    Description</button>
                                <button class="btn-outline apply-btn"
                                    onclick="openApplicationModal('{{ $career->job_profile }}')">Apply Now</button>
                            </div>
                            <div class="job-desc mt-2" id="desc-{{ $career->id }}" style="display: none;">
                                <p>{!! nl2br(e($career->job_description)) !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Application Modal -->
        <div class="modal fade" id="applicationModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Apply for <span id="jobTitle"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('careers.apply') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="job_profile" id="hiddenJobProfile">

                            <div class="mb-3">
                                <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            </div>
                            <div class="mb-3">
                                <input type="tel" class="form-control" name="phone" placeholder="Your Phone" required>
                            </div>
                            <div class="mb-3">
                                <input type="file" class="form-control" name="resume" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="message" class="form-control" rows="3" placeholder="Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Submit Application</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        .career-card {
            border: 1px solid #eee;
            border-radius: 15px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .career-title {
            font-weight: 700;
            margin-bottom: 10px;
        }

        .career-meta span {
            display: inline-block;
            margin-right: 15px;
            color: #666;
        }

        .career-buttons {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
        }

        .btn-outline {
            border: 1px solid #414a53;
            color: #414a53;
            padding: 4px 8px;
            border-radius: 10px;
            background: transparent;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-outline:hover {
            background-color: #414a53;
            color: #fff;
        }
    </style>

    <script>
        function openApplicationModal(jobProfile) {
            document.getElementById('jobTitle').textContent = jobProfile;
            document.getElementById('hiddenJobProfile').value = jobProfile;
            new bootstrap.Modal(document.getElementById('applicationModal')).show();
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.read-desc').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const desc = document.getElementById('desc-' + id);
                    desc.style.display = desc.style.display === 'none' ? 'block' : 'none';
                });
            });
        });
    </script>
@endsection
