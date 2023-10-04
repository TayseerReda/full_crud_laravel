@extends('layouts.app')

@section('content')
    <div class="py-12"> 
   <div class="container">
    <div class="row">

      <div class="col-md-8">
        <div class="card-group">
          @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>{{session('success') }}</strong> 
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
          @endif
           
        @foreach($images as $multi)
        <div class="col-md-4 mt-5">
             <div class="card">
             <img src="{{ asset($multi->images) }}" alt="">
             
             </div>
        
        </div> 
        @endforeach
   
        </div>
   
   
       </div>


    <div class="col-md-4">
     <div class="card">
          <div class="card-header"> Add Images </div>
          <div class="card-body">
          
         
         
          <form method="post" action="{{route('store.img')}}" enctype="multipart/form-data">
          @csrf
  <div class="form-group">
    
          <label for="exampleInputEmail1">Multi imgage</label>
          <input type="file" name="images[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" multiple="">
      

  </div>
     
  <button type="submit" class="btn btn-primary">Add Images</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 




























  @endsection


  