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
                    <div class="col-md-10">
                        <form action="{{ route('staffmanagement.update', $staff->id) }}" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="fname">First Name</label>
                              <input type="text" class="form-control" id="fname" placeholder="Email" value="{{$staff->first_name}}" name="first_name">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="l_name">Last Name</label>
                              <input type="text" class="form-control" id="l_name" value="{{$staff->last_name}}" name="last_name">
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="mobile">Mobile</label>
                              <input type="text" class="form-control" id="mobile" name="mobile" value="{{$staff->mobile}}">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="email">Email</label>
                              <input type="email" name="email" class="form-control" id="email" value="{{$staff->email}}">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <textarea name="address">{{$staff->address}}</textarea>
                          </div>
                          <button type="submit" class="btn btn-primary">Update Staff</button>
                        </form>                       
                    </div>

                    

                            <tr>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
