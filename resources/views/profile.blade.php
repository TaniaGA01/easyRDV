@extends('layouts.app')

@section('content')

<div class="container ptb-5">
        <div class="row">
            @auth


            <div class="form-style-5 bg-white shadow-sm col-12 px-6 py-6">
                    <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                    {{-- <h2>{{ $user->name }}Profile</h2> --}}
                    <form enctype="multipart/form-data" action="/profile" method="POST">
                        <label>Selectionner une image de profile</label>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="pull-right btn btn-sm btn-primary">
                    </form>
            </div>
        </div>
    </div>
    @endauth




@endsection



