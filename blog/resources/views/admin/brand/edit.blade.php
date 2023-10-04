@extends('layouts.app')

@section('content')



<div class="py-12"> 
<div class="container">
<div class="row">




<div class="col-md-8">
<div class="card">
   <div class="card-header"> Edit Brand </div>
   <div class="card-body">
   
  
  
   <form  action="{{ url('brand/update/'.$brands->id)}}" method="POST" enctype="multipart/form-data">
   @csrf
<div class="form-group">
    <input type="hidden" name="old_img" value="{{ $brands->brand_img }}">
<label for="exampleInputEmail1">Update Brand Name</label>
<input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brands->brand_name }}">

<label for="exampleInputEmail1">Update Brand image</label>
<input type="file" name="brand_img" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brands->brand_img }}">

</div>
<div class="form-group">
    <img src="{{ asset($brands->brand_img) }}" style="width:400px; height:200px;" >

</div>

<button type="submit" class="btn btn-primary">Update Category</button>
</form>

</div>

</div>
</div> 



</div>
</div> 
  @endsection


  