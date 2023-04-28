@extends('layouts.frontend')
@section('content')
@can('post_show')
<div class="row my-3" >
    <div class="col-lg-8 mx-auto" >
        <div class="card shadow" >
            <div class="card-header">
                <div class="pull-left">
                    <h3 class="text-dark fw-bold">Passport Details</h3>
                </div>
                <div class="pull-right">
                    <a class="btn btn-outline-dark my-2 my-sm-0" href="{{route('frontend.post.edit', $post)}}">Edit Passport</a> 
                </div>
            </div>
            <div class="card-body p-4">
                <form class="text-center">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <h6>Employee Name:</h6>
                        </div>
                        <div class="col-sm-6">
                            <input placeholder="{{$post->employee}}" readonly disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <h6>Passport Number:</h6>
                        </div>
                        <div class="col-sm-6">
                            <input placeholder="{{$post->passport_num}}" readonly disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <h6>Passport Type:</h6>
                        </div>
                        <div class="col-sm-6">
                            <input placeholder="{{$post->passport_type}}" readonly disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <h6>Issue Date:</h6>
                        </div>
                        <div class="col-sm-6">
                            <input placeholder="{{$post->issue_date}}" readonly disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <h6>Expiry Date:</h6>
                        </div>
                        <div class="col-sm-6">
                            <input placeholder="{{$post->expiry_date}}" readonly disabled>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <h6>Passport Photo:</h6>
                        </div>
                        <div class="col-sm-6">
                            <img src="{{ asset('storage/images/'.$post->image) }}" class="img-fluid card-img-top" width="20" height="20">
                            <p>{{ $post->comment }}</p>
                        </div>
                    </div>
                    <div class="box-footer text-left">
                        <a class="btn btn-outline-danger my-2 my-sm-0" href="{{ route('frontend.post.index') }}">
                            <i class="ti-trash"></i> Back
                        </a>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>
@endcan

@endsection