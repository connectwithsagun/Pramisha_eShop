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
        <h2>Create Product</h2>
        <form action="storeProduct" method="POST" enctype="multipart/form-data">
            @csrf
           
            Product Name: <input type="text" name="product_name" id="" class="form-control" value="{{ old('product_name') }}"
            @error('product_name')
                style="border-color: red;"
            @enderror
            >
            {{-- @error('product_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror --}}
            <br><br>
            Product Desc: <textarea name="product_desc" id="" cols="30" rows="10" class="form-control"    
            @error('product_desc')
            style="border-color: red;"
            @enderror
            >{{ old('product_desc') }}</textarea> <br><br>

            Old Price: <input type="text" name="old_price" id="" class="form-control" value="{{ old('old_price') }}"
            @error('old_price')
            style="border-color: red;"
            @enderror
            ><br><br>

            Discount: <input type="text" name="discount" id="" class="form-control" value="{{ old('discount') }}"
            @error('discount')
            style="border-color: red;"
            @enderror
            ><br><br>
         

            Price: <input type="text" name="price" id="" class="form-control" value="{{ old('price') }}"
            @error('price')
            style="border-color: red;"
            @enderror
            ><br><br>

            {{-- Category: 
            <select name="category_id" class="form-control"
            @error('category_id')
            style="border-color: red;"
            @enderror
            >
                <option value="0">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? "selected": '' }}>{{ $category->name }}</option>
                @endforeach
            <select><br><br> --}}

                Category: 
                <select name="category_id"class="productcategory form-control" id="category_id"
                @error('category_id')
                style="border-color: red;"
                @enderror
                >
                    <option value="0" disabled="true" selected="true">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? "selected": '' }}>{{ $category->name }}</option>
                    @endforeach
                <select><br><br>
              


                {{-- <select style="width: 200px" class="productcategory" id="prod_cat_id">
  	
                    <option value="0" disabled="true" selected="true">-Select-</option>
                    @foreach($prod as $cat)
                        <option value="{{$cat->id}}">{{$cat->product_cat_name}}</option>
                    @endforeach
              
                </select> --}}
              



            {{-- Sub-Category: 
            <select name="sub_category_id" class="form-control"    
            @error('sub_category_id')
            style="border-color: red;"
            @enderror
            >
                <option value="0">Select a sub-category</option>
                @foreach ($subcategories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('sub_category_id') ? "selected": '' }}>{{ $category->name }}</option>
                @endforeach
            <select><br><br>

            <input type="file" name="image" id="">
            <br><br> --}}

            {{-- Sub-Category: 
            <select name="sub_category_id" class="form-control"    
            @error('sub_category_id')
            style="border-color: red;"
            @enderror
            >
               
            	<option value="0" disabled="true" selected="true">Select a sub-category</option>
            <select><br><br> --}}
                Sub-Category: 
                <select name="sub_category_id" class="name form-control"
                @error('sub_category_id')
                style="border-color: red;"
                @enderror
                >

                    <option value="0" disabled="true" selected="true">Select a sub-category</option>
                </select>
                <br><br>
              
            <input type="file" name="image" id="">
            <br><br>

                {{-- <select name="category_id" id="">
                    <option value="0">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select> --}}
            <input type="submit" name="submit" value="Save" class="form-control">
        </form>
      </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('change','.productcategory',function(){
			// console.log("hmm its change");

			var cat_id=$(this).val();
			 //console.log(cat_id);
			var div=$(this).parent();

			var op=" ";

			$.ajax({
				type:'get',
                
				url:'{!!URL::to('findProductName')!!}',
			//	url:'findProductName',
          
                data:{'id':cat_id},
 
            
				success:function(data){
					//console.log('success');

					//console.log(data);

					//console.log(data.length);
					op+='<option value="0" selected disabled>Choose Sub-Category</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
				   }

				   div.find('.name').html(" ");
				   div.find('.name').append(op);
				},
				error:function(){
					//console.log(data);

				}
			});
		});




	});
</script>

{{-- <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script> --}}
@endsection