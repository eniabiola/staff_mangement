@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @if(session()->has('success'))
                  <div class="alert alert-success">
                    {{Session::get('success')}}
                  </div>
                @endif
                  
                </div>
                <div class="card-body">
                    {{-- <div class="col-md-3">
                        <a class="btn btn-primary pull-right" href="{{ route('staffmanagement.create') }}">Create new Staff</a> 
                    </div> --}}
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
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">First Name</th>
                          <th scope="col">Last Name</th>
                          <th scope="col">Mobile</th>
                          <th scope="col">Email</th>
                          <th scope="col">Staff Status</th>
                          <th scope="col">Address</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($staff as $member)
                            <tr>
                              <td>{{$member->first_name}}</td>
                              <td>{{$member->last_name}}</td>
                              <td>{{$member->mobile}}</td>
                              <td>{{$member->email}}</td>
                                @if($member->enable == "true")
                                <td>
                                  <form method="post" action="/disable/staff">
                                    @csrf
                                    <input type="hidden" name="enable" value="{{$member->id}}">
                                    <button class="btn btn-warning">Disble Staff</button>
                                  </form>
                                </td>
                                @else
                                <td>
                                  <form method="post" action="/enable/staff">
                                    @csrf
                                    <input type="hidden" name="enable" value="{{$member->id}}">
                                    <button class="btn btn-success">Enable Staff</button>
                                  </form>
                                </td>
                                  
                                @endif
                              
                              <td>{{$member->address}}</td>
                              <td>
                                <a href="{{ route('staffmanagement.edit', $member->id) }}" class="btn btn-primary">Edit User</a>
                              </td>
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
