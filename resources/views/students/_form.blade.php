@csrf

<div class="row g-3">
    <div class="col-12 col-md-6">
        <label for="student_number" class="form-label fw-semibold">Student Number</label>
        <div class="input-group has-validation">
            <span class="input-group-text"><i class="bi bi-hash"></i></span>
            <input type="text" id="student_number" name="student_number"
                   class="form-control @error('student_number') is-invalid @enderror"
                   value="{{ old('student_number', $student->student_number ?? '') }}" required>
            @error('student_number')
                <div class="invalid-feedback fw-semibold">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-12 col-md-6">
        <label for="course" class="form-label fw-semibold">Course</label>
        <div class="input-group has-validation">
            <span class="input-group-text"><i class="bi bi-book"></i></span>
            <input type="text" id="course" name="course"
                   class="form-control @error('course') is-invalid @enderror"
                   value="{{ old('course', $student->course ?? '') }}" required>
            @error('course')
                <div class="invalid-feedback fw-semibold">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-12 col-md-6">
        <label for="first_name" class="form-label fw-semibold">First Name</label>
        <div class="input-group has-validation">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" id="first_name" name="first_name"
                   class="form-control @error('first_name') is-invalid @enderror"
                   value="{{ old('first_name', $student->first_name ?? '') }}" required>
            @error('first_name')
                <div class="invalid-feedback fw-semibold">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-12 col-md-6">
        <label for="last_name" class="form-label fw-semibold">Last Name</label>
        <div class="input-group has-validation">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" id="last_name" name="last_name"
                   class="form-control @error('last_name') is-invalid @enderror"
                   value="{{ old('last_name', $student->last_name ?? '') }}" required>
            @error('last_name')
                <div class="invalid-feedback fw-semibold">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-sm-row justify-content-end gap-2 mt-4 pt-3 border-top">
    <a href="{{ route('students.index') }}" class="btn btn-light border">
        <i class="bi bi-x-lg me-1"></i>Cancel
    </a>
    <button type="submit" class="btn btn-primary btn-submit px-4">
        <i class="bi bi-check-lg me-1"></i>{{ $buttonText }}
    </button>
</div>