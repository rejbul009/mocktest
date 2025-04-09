<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mock Test Templates</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Mock Test Templates</h1>
            <a href="{{ route('admin.mockTestTemplates.create') }}" class="btn btn-primary">Add New Template</a>
        </div>

        {{-- Flash Messages --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
    @forelse($templates as $template)
        <tr>
            <td>{{ $template->id }}</td>
            <td><a href="{{ route('admin.mockTestTemplates.questions.create', $template->id) }}" class="btn btn-link">
                    {{ $template->name }}
                </a></td>
            <td>{{ $template->created_at ? $template->created_at->format('Y-m-d H:i:s') : 'N/A' }}</td>
            <td>{{ $template->updated_at ? $template->updated_at->format('Y-m-d H:i:s') : 'N/A' }}</td>
            <td class="text-center">
                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('admin.mockTestTemplates.edit', $template->id) }}" class="btn btn-warning btn-sm mr-1">Edit</a>

                    <form action="{{ route('admin.mockTestTemplates.destroy', $template->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this template?')" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">No templates found.</td>
        </tr>
    @endforelse
</tbody>

            </table>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
