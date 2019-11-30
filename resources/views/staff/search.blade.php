@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="col-md-3">
                        <a class="btn btn-primary pull-right" href="{{ route('staffmanagement.index') }}">All Staff</a> 
                    </div>
                    <div class="col-md-6">
                        <form method="POST" action="/search/staff" class="form-inline">
                            @csrf
                          <div class="form-group mx-sm-3 mb-2">
                            <label for="search" >Search For Staff</label>&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" class="form-control" id="search" placeholder="Enter Search terms" name="search">&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="submit" class="btn btn-primary mb-2">Search Staff</button>
                          </div>
                        </form>                        
                    </div>

                    
                    <br>
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">First Name</th>
                          <th scope="col">Last Name</th>
                          <th scope="col">Mobile</th>
                          <th scope="col">Email</th>
                          <th scope="col">Address</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($staff as $member)
                            <tr>
                              <td>{{$member->first_name}}</td>
                              <td>{{$member->last_name}}</td>
                              <td>{{$member->mobile}}</td>
                              <td>{{$member->email}}</td>
                              <td>{{$member->address}}</td>
                            </tr>
                          </tbody>
                        @endforeach
                    </table>


                        
                        
                        
                        
                        
                </div>
                <div class="card-footer">
                    {{$staff->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
