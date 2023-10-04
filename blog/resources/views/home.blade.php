@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">S_No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created_At</th>
                
              </tr>
            </thead>
            <tbody>
               
                    
                
                @foreach ($users as $user)
                    
                
              <tr>
                <th scope="row">1</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
              </tr>
            
              @endforeach
            </tbody>
          </table>
    </div>

</div>
@endsection
