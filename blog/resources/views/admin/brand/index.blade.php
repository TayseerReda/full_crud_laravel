@extends('layouts.app')

@section('content')
    <div class="py-12"> 
   <div class="container">
    <div class="row">


    <div class="col-md-8">
     <div class="card">
 @if (session('success'))
 <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success') }}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
 @endif
  


      <div class="card-header"> All Brands </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Brand image</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
      $i=1;
    @endphp    
    @foreach ($brands as $brand)
        
  <tr>
    <th scope="row">{{ $i++ }}</th>
    <td>{{ $brand->brand_name }}</td>
    <td> <img src="{{ asset($brand->brand_img) }}" style="height:40px; width:70px;" > </td> 
    <td>{{ $brand->created_at }}</td>
    <td> 
      <a href="{{url('brand/edit/'.$brand->id)}}" class="btn btn-info">Edit</a>
      <a href="{{url('brand/delete/'.$brand->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a>
       </td> 
  </tr>

  @endforeach
</tbody>
</table>
{{ $brands->links() }}
  
       </div>
    </div>


    <div class="col-md-4">
     <div class="card">
          <div class="card-header"> Add Brand </div>
          <div class="card-body">
          
         
         
          <form method="post" action="{{ route('store.brand') }}" enctype="multipart/form-data">
          @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Brand Name</label>
    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('brand_name')
               <span class="text-danger"> {{ $message }}</span>
          @enderror
          <label for="exampleInputEmail1">Brand img</label>
          <input type="file" name="brand_img" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      

  </div>
     
  <button type="submit" class="btn btn-primary">Add Brand</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 




























  @endsection


  