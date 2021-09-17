@extends('admin.layouts.dashboard_header')

@section('content')
   
<div class="az-content az-content-dashboard">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="createProduct">Create Product</a><br><br>

    <div class="container">
      <div class="az-content-body">
        {{-- {{ route('admin.products.create') }} --}}
        <table width="900" align="center">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Description</td>
                <td>Price</td>
                <td>Action</td>
            </tr>
            @foreach ($viewProduct as $product)
              <tr>
                <td>{{ $product->id }}</td>
                <td> {{ $product->product_name }} </td>
                <td> {{ substr($product->product_desc, 0, 50) }} </td>
                <td>{{ $product->price }}</td>
                <td>
                    {{-- <a href="editProduct/{{ $product -> id }}"> Edit </a> |<a href="deleteProduct/{{ $product -> id }}"> Delete </a> --}}
                    
                    <a href="editProduct/{{ $product -> id }}" class="btn btn-primary" > Edit </a> <a href="deleteProduct/{{ $product -> id }}" class="btn btn-danger"> Delete </a>

                </td>
              </tr>
            @endforeach
        </table>
      </div>
    </div>
  </div>



@endsection
  