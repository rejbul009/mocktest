<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>প্রিমিয়াম ক্লাস</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1>প্রিমিয়াম ক্লাস পেজ</h1>
        <p>পেমেন্ট আইডি: {{ $payment_id }}</p>
        <p>এখানে প্রিমিয়াম ক্লাস কন্টেন্ট যোগ করা হবে।</p>
        <a href="{{ route('welcome') }}" class="btn btn-primary">হোমে ফিরুন</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>