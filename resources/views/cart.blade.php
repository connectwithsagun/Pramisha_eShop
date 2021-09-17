@extends('includes/layout')

@section('content')
    

<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="custom.css">


 


<!-- breadcrumbs -->
<div class="breadcrumb_dress">
	<div class="container">
		<ul>

          


			<li><a href="/">


                {{-- <span class="glyphicon glyphicon-home" aria-hidden="true">
                </span> Home --}}

                <span aria-hidden="true"> 
                
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="glyphicon glyphicon-home" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                      </svg>
                      Home
                </span>

            </a> <i>/</i></li>
			<li>Cart</li>
		</ul>
	</div>
</div>
<!-- //breadcrumbs --> 



<div class="container main-section">
<div class="row">

<div class="col-lg-12 pl-3 pt-3">

<table class="table table-hover border bg-white">
<thead>

 
<tr>
<th>Product</th>
<th>Price</th>
<th style="width:10%;">Quantity</th>
<th>Subtotal</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    @foreach ($viewCart as $item)

    {{-- <form action="{{ url('/updateCart/'.$item -> id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') --}}
        <form >
            @csrf
        <tr>
        <td>
        <div class="row">
        <div class="col-lg-2 Product-img">
 
        <img src="{{ $item->Product->image == ' ' ? 'https://via.placeholder.com/300x450': image_crop($item->Product->image) }}" alt=" " class="img-responsive" />
        </div>
        <div class="col-lg-10">
  
        <h4 class="nomargin">{{ $item->Product->product_name }}</h4>

        <p>{{ $item->Product->product_desc }}</p>
        </div>
        </div>
        </td>
        <td>{{ $item->Product->price }} <input type="hidden" class="iprice" value="{{ $item->Product->price }}"> </td>
   
            <td>
        <input type="number" class="text-center iquantity" name = "quantity" onchange="subTotal()" value="{{ $item->quantity }}" min="1" max="10">
        </td>
        <td class="isubtotal"></td>
        <td class="actions" data-th="" style="width:10%;">
        
       


         {{-- <a href="updateCart/{{ $item->id }}"><button class="btn btn-info btn-sm" type="submit"><i class="fa fa-refresh"></i></button></a>
        <a href="deleteCart/{{ $item->id }}"><button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-o"></i></button></a> --}}
        {{-- <input type="submit" name="submit" value="Edit" class="form-control" formaction="{{ url('/updateCart/'.$item -> id) }}"> --}}

        {{-- <input type="submit"   value="Edit" class="btn btn-info btn-sm" formaction="{{ url('/updateCart/'.$item -> id) }}"  @method('GET')>

        <input type="submit" name="submit" value="Cancel" class="btn btn-danger btn-sm" formaction="{{ url('/deleteCart/'.$item -> id) }}" @method('GET')> --}}

        <a ><input type="submit" name="submit" value="Edit" class="btn btn-info btn-sm" formaction="{{ url('/updateCart/'.$item -> id) }}" @method('GET') ></a>
        <a ><input type="submit" name="submit" value="Delete" class="btn btn-danger btn-sm" formaction="{{ url('/deleteCart/'.$item -> id) }}" @method('GET') ></a>


        </td>
        </tr> 
    @endforeach

</form>

</tbody>
<tfoot>
<tr>
<td><a href="/" class="btn btn-warning text-white"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
<td colspan="2" class="hidden-xs"></td>
<td class="hidden-xs text-center"  style="width:10%;"><strong></strong>Grand Total
    <h5 id="gtotal"></h5>
</td>
{{-- <h5 id="gtotal"></h5> --}}
<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
</tr>
</tfoot>


</table>

</div>
</div>
</div>




<script>


var gt=0; 
var iprice = document.getElementsByClassName('iprice');
var iquantity = document.getElementsByClassName('iquantity');
var isubtotal = document.getElementsByClassName('isubtotal');

var gtotal = document.getElementById('gtotal');


function subTotal()
{
    gt=0;
    for(i=0;i<iprice.length;i++)
    {
        isubtotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
        gt = gt + (iprice[i].value) * (iquantity[i].value);
    }
    gtotal.innerText = gt;

}

subTotal();


</script>



@endsection