@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Create Mock Test Template</h1>

        <!-- Display success message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form to create a mock test template -->
        <form action="{{ route('admin.mockTestTemplates.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Test Template Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Template</button>
        </form>
    </div>
@endsection
