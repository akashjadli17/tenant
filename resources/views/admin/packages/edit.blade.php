@extends('layouts.adminmaster')

 
@section('content')
<div class="container">
    <h2>Edit Package</h2>
    <form method="POST" action="{{ route('admin.packages.update', $package) }}">
        @csrf
        @method('PUT')
        @include('admin.packages.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
