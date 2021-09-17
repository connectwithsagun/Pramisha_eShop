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
            <h2>Create Sub-Category</h2>
            <form action="storeSubCategory" method="POST" enctype="multipart/form-data">
                @csrf
                Sub-Category Name: <input type="text" name="name" id="" class="form-control" value="{{ old('name') }}"
                @error('name')
                    style="border-color: red;"
                @enderror
                >
             
                <br><br>
                Sub-Category Desc: <textarea name="description" id="" cols="30" rows="10" class="form-control"
                @error('description')
                style="border-color: red;"
                @enderror
                >{{ old('description') }}</textarea> <br><br>

                {{-- Price: <input type="text" name="price" id="" class="form-control" value="{{ old('price') }}"><br><br> --}}
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