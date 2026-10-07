@extends('layouts.app')
@section('title', 'All Students')
@section('content')

<div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-4">
    <div>
        <h2 class="h4 fw-bold mb-0">All Students</h2>
        <small class="text-muted">{{ $students->count() }} {{ Str::plural('record', $students->count()) }}</small>
    </div>
    <a href="{{ route('students.create') }}" class="btn btn-primary">
        <i class="bi bi-person-plus me-1"></i>Add Student
    </a>
</div>

@if ($students->isEmpty())
    <div class="text-center py-5">
        <i class="bi bi-people display-4 text-muted"></i>
        <p class="text-muted mt-3 mb-3">No students have been added yet.</p>
        <a href="{{ route('students.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>Add your first student
        </a>
    </div>
@else
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Student Number</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr>
                    <td class="text-muted">{{ $student->id }}</td>
                    <td><span class="badge text-bg-light border font-monospace">{{ $student->student_number }}</span></td>
                    <td class="fw-semibold">{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->course }}</td>
                    <td class="text-end">
                        <div class="d-inline-flex gap-1">
                            <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil-square me-1"></i>Edit
                            </a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Delete this student?')">
                                    <i class="bi bi-trash me-1"></i>Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif

@endsection