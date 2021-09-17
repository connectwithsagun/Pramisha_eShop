@extends('admin.layouts.dashboard_header')

@section('content')
   
<div class="card-body">
    @if (Session::get('success'))
        <div class="alert alert-success bg-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <h3>Welcome</h3>
</div>


@endsection



