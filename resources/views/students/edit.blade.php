@extends('layouts.app')
@section('title', 'Edit Student')
@section('content')
<h2>Edit Student</h2>
<form action="{{ route('students.update', $student) }}" method="POST">
    @method('PUT')
    @include('students._form', ['buttonText' => 'Update Student'])
</form>
@endsection