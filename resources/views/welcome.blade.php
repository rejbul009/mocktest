<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>স্বাগতম</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Mock Test Templates</h1>
        <div class="row mt-4">
            @foreach ($templates as $template)
                <div class="col-md-4 mb-3">
                    <div class="card" data-type="mock-test" data-bs-toggle="modal" data-bs-target="#paymentModal" data-template-id="{{ $template->id }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $template->name }}</h5>
                            <p class="card-text">{{ $template->description }}</p>
                            <a href="#" class="btn btn-primary">এখন পেমেন্ট করুন এবং টেস্ট দিন</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">পেমেন্ট</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('payment.submit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="template_id" id="template_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">বিকাশ নম্বর:</label>
                            <div class="input-group">
                                <input type="text" value="01742014282" id="bkashNumber" readonly class="form-control">
                                <button type="button" class="btn btn-outline-secondary" onclick="copyNumber()">কপি</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="payment_id" class="form-label">ট্রানজেকশন আইডি:</label>
                            <input type="text" name="payment_id" id="payment_id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="sender_number" class="form-label">পাঠানোর নম্বর:</label>
                            <input type="text" name="sender_number" id="sender_number" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বন্ধ করুন</button>
                        <button type="submit" class="btn btn-success">পে নাউ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        <p>© 2025 আমার অ্যাপ। সর্বস্বত্ব সংরক্ষিত।</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function copyNumber() {
            let number = document.getElementById('bkashNumber').value;
            navigator.clipboard.writeText(number);
            alert('নম্বর কপি করা হয়েছে!');
        }

        // মডাল ওপেন হওয়ার সময় টাইপ সেট করা
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('click', function () {
                let templateId = this.getAttribute('data-template-id');
                document.getElementById('template_id').value = templateId;
            });
        });
    </script>
</body>
</html>
