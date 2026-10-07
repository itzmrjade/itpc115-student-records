@extends('layouts.app')
@section('title', 'Add Student')
@section('content')
<h2>Add Student</h2>
<form action="{{ route('students.store') }}" method="POST">
    @include('students._form', ['buttonText' => 'Save Student'])
</form>
@endsection