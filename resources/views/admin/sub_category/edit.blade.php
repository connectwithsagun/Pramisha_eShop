   
   
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
            <h2>Edit Sub-Category</h2>
            <form action="{{ url('/updateSubCategory/'.$subcategories -> id) }}" method="POST" enctype="multipart/form-data">
             
      

                @csrf
                @method('PUT')

                Sub-Category Name: <input type="text" name="name" id="" class="form-control" value="{{ old('name') ?? $subcategories ->name }}"
                @error('name')
                    style="border-color: red;"
                @enderror
                >
             
                <br><br>
                Sub-Category Desc: <textarea name="description" id="" cols="30" rows="10" class="form-control"
                @error('description')
                style="border-color: red;"
                @enderror
                >{{ old('description') ?? $subcategories ->description }}</textarea> <br><br>

               
                 Category: 
                <select name="category_id" class="form-control"
                @error('category_id')
                style="border-color: red;"
                @enderror
                
                >
                    <option value="0">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? "selected": '' }}>{{ $category->name }}</option>
                       
                    @endforeach
                    
                   
                <select><br><br>
                {{-- <input type="file" name="image_upload" id=""> --}}
                    {{-- <select name="category_id" id="">
                        <option value="0">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>  --}}
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