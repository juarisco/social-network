@extends('layouts.app')

@section('content')
<div class="container">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $user->name }}'s profile</div>

                <div class="panel-body">
                    <img src="{{ Storage::url($user->avatar) }}" width="70px" height="70px" style="border-radius: 50%;" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-8"></div>
</div>
@endsection