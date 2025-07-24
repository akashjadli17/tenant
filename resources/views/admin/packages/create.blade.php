@extends('layouts.adminmaster')

@section('content')<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">


            <h2>Create Package</h2>
            <form method="POST" action="{{ route('admin.packages.store') }}">
                @csrf
                @include('admin.packages.form')
                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>

    </div>
</div>
@endsection