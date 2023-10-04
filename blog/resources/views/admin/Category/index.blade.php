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
  


          <div class="card-header"> All Category </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Category Name</th>
      <th scope="col">User</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
      $i=1;
    @endphp    
    @foreach ($categories as $category)
        
  <tr>
    <th scope="row">{{ $i++ }}</th>
    <td>{{ $category->category_name }}</td>
    <td>{{$category->user->name}}</td>
    <td>{{ $category->created_at }}</td>
    <td> 
      <a href="{{url('Category/edit/'.$category->id)}}" class="btn btn-info">Edit</a>
      <a href="{{url('Category/softdelete/'.$category->id)}}" class="btn btn-danger">Delete</a>
       </td> 
  </tr>

  @endforeach
</tbody>
</table>

  
       </div>
    </div>


    <div class="col-md-4">
     <div class="card">
          <div class="card-header"> Add Category </div>
          <div class="card-body">
          
         
         
          <form method="post" action="{{ route('store.category') }}" >
          @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('category_name')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>
     
  <button type="submit" class="btn btn-primary">Add Category</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 




























  <div class="py-12"> 
    <div class="container">
     <div class="row">
 
 
     <div class="col-md-8">
      <div class="card">
 
           <div class="card-header"> Trash List</div>
     <table class="table">
   <thead>
     <tr>
       <th scope="col">SL No</th>
       <th scope="col">Category Name</th>
       <th scope="col">User</th>
       <th scope="col">Created At</th>
       <th scope="col">Action</th>
     </tr>
   </thead>
   <tbody>
     @php
       $i=1;
     @endphp    
     @foreach ($trachCat as $category)
         
   <tr>
     <th scope="row">{{ $i++ }}</th>
     <td>{{ $category->category_name }}</td>
     <td>{{$category->user->name}}</td>
     <td>{{ $category->created_at }}</td>
     <td> 
       <a href="{{url('Category/restore/'.$category->id)}}" class="btn btn-info">Restore</a>
       <a href="{{url('Category/pdelete/'.$category->id)}}" class="btn btn-danger">P Delete</a>
        </td> 
   </tr>
 
   @endforeach

  
 </tbody>
 </table>
 {{ $trachCat->links() }}

 
   
        </div>
     </div>
 
 

  @endsection


  