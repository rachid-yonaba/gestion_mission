@extends('layouts.app')

@section('content')
<h2>Modifier une Mission</h2>
<form action="{{ route('missions.update',$mission) }}" method="POST">
    @method('PUT')
    @include('missions.form')
</form>
@endsection
