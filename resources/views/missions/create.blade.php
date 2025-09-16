@extends('layouts.app')

@section('content')
<h2>Créer une Mission</h2>
<form action="{{ route('missions.store') }}" method="POST">
    @include('missions.form')
</form>
@endsection
