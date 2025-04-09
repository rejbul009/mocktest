<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ড্যাশবোর্ড</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- নেভিগেশন বার -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">আমার অ্যাপ</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('dashboard') }}">ড্যাশবোর্ড</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link">লগআউট</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- মূল কন্টেন্ট -->
    <div class="container">
        <h1 class="my-4">ড্যাশবোর্ড</h1>

        <!-- স্বাগতম মেসেজ -->
        <div class="alert alert-info">
            স্বাগতম, {{ auth()->user()->name }}!
        </div>

        <!-- মক টেস্টের তালিকা -->
        <h3>আপনার মক টেস্টের স্কোর</h3>
        @forelse ($mockTests as $test)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">টেস্ট: {{ $test->test_name ?? 'Unnamed Test' }}</h5>
                    <p class="card-text">স্কোর: {{ $test->score ?? 'Pending' }}</p>
                    <p class="card-text"><small class="text-muted">তারিখ: {{ $test->created_at->format('d M Y, h:i A') }}</small></p>
                </div>
            </div>
        @empty
            <p>আপনি এখনো কোনো মক টেস্ট দেননি।</p>
        @endforelse
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>