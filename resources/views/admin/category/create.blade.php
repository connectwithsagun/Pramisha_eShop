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
        <h2>Create Category</h2>
        <form action="storeCategory" method="POST" enctype="multipart/form-data">
            @csrf
            Category Name: <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
            @error('name')
                style="border-color: red;"
            @enderror
            >
            <br><br>
           
            Category Desc: <textarea name="description" id="" cols="30" rows="10" class="form-control"    
            @error('description')
                style="border-color: red;"
            @enderror
            >{{ old('description') }}
            
            </textarea> <br><br>
            {{-- Parent Category: 
            <select name="subcategory_id" class="form-control">
                <option value="0">Select a category</option>
                @foreach ($subcategories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('subcategory_id') ? "selected": '' }}>{{ $category->name }}</option>
                @endforeach
            </select><br><br> --}}
            


            <input type="submit" name="submit" value="Save" class="form-control">
        </form>
      </div>
    </div>
</div>

    
@endsection