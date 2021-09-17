      <!-- vendor css -->
      <link href="/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
      <link href="/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
      <link href="/lib/typicons.font/typicons.css" rel="stylesheet">
      <link href="/lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
   
   <!-- azia CSS -->
   <link rel="stylesheet" href="/css/azia.css">

@extends('admin.layouts.dashboard_header')

@section('content')


<div class="az-content az-content-dashboard">
    <div class="container">
      <div class="az-content-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>Update Category</h2>
        {{-- <form action="editCategory/{{ $viewCategory -> id }}" method="POST" enctype="multipart/form-data"> --}}
            <form action=" {{ url('/editCategory/'.$viewCategory -> id) }}" method="POST" enctype="multipart/form-data">

           
            @csrf
            @method('PUT')
            Category Name: <input type="text" name="name" id="name" class="form-control" value="{{old('name') ?? $viewCategory->name }}"
            @error('name')
                style="border-color: red;"
            @enderror
            >
            <br><br>
           
            Category Desc: <textarea name="description" id="" cols="30" rows="10" class="form-control"  
            @error('description')
                style="border-color: red;"
            @enderror
            >{{ $viewCategory->description }}
            
            </textarea> <br><br>
    

            <input type="submit" name="submit" value="Save" class="form-control">
        </form>
      </div>
    </div>
</div>

    
@endsection


<script src="/lib/jquery/jquery.min.js"></script>
<script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/lib/ionicons/ionicons.js"></script>
<script src="/lib/jquery.flot/jquery.flot.js"></script>
<script src="/lib/jquery.flot/jquery.flot.resize.js"></script>
<script src="/lib/chart.js/Chart.bundle.min.js"></script>
<script src="/lib/peity/jquery.peity.min.js"></script>

<script src="/js/azia.js"></script>
<script src="/js/chart.flot.sampledata.js"></script>
<script src="/js/dashboard.sampledata.js"></script>
<script src="/js/jquery.cookie.js" type="text/javascript"></script>