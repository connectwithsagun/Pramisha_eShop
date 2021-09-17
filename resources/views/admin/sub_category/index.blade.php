@extends('admin.layouts.dashboard_header')

@section('content')
   
<div class="az-content az-content-dashboard">
    <div class="container">
      <div class="az-content-body">
        <a href="createSubCategory">Create Sub-Category</a>
        {{-- {{ route('admin.products.create') }} --}}
        <table width="900" align="center">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Description</td>
          
                <td>Action</td>
            </tr>
            @foreach ($subcategory as $product)
       
              <tr>
                <td>{{ $product->id }}</td>
                <td> {{ $product->name }} </td>
                <td> {{ substr($product->description, 0, 200) }} </td>
            

                <td>
                    <a href="editSubCategory/{{ $product -> id }}" class="btn btn-primary"> Edit </a>  <a href="deleteSubCategory/{{ $product->id }}" class="btn btn-danger"> Delete </a>
                   
                </td>
              </tr>
            @endforeach
        </table>
      </div>
    </div>
  </div>



@endsection
  