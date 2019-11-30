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
                        <h3>{{$staff}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
