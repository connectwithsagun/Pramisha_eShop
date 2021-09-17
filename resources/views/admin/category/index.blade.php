@extends('admin.layouts.dashboard_header')

@section('content')
   
<div class="az-content az-content-dashboard">
    <div class="container">
      <div class="az-content-body">
        <a href="createCategory">Create Category</a>
        {{-- {{ route('admin.products.create') }} --}}
        <table width="900" align="center">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
            @foreach ($viewCategory as $product)
              <tr>
                <td>{{ $product->id }}</td>
                <td> {{ $product->name }} </td>
                <td> {{ substr($product->description, 0, 50) }} </td>
                <td>
                    <a href="editCategory/{{ $product -> id }}" class="btn btn-primary"> Edit </a>  <a href="deleteCategory/{{ $product -> id }}" class="btn btn-danger"> Delete </a>

                    {{-- <a href="{{ url('/editCategory/'.$product -> id) }}"> Edit </a> | <a href="deleteCategory/{{ $product -> id }}"> Delete </a> --}}


                    {{-- /admin/products/edit/{{ $product->id }} --}}
                </td>
              </tr>
            @endforeach
        </table>
      </div>
    </div>
  </div>



@endsection
  