<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mock Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Hide answer options until test is complete */
        .answer-options {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Mock Test</h1>

        <form action="{{ route('submit.mockTest') }}" method="POST">
            @csrf

            <div id="questionsContainer">
                @foreach($questions as $index => $question)
                <div class="question" id="question_{{ $question->id }}">
                    <div class="form-group">
                        <label>{{ $question->question_text }}</label>
                    </div>

                    <div class="form-group answer-options">
                        <label for="option_a_{{ $question->id }}">Option A</label>
                        <input type="radio" name="answers[{{ $question->id }}]" value="1" id="option_a_{{ $question->id }}">
                    </div>

                    <div class="form-group answer-options">
                        <label for="option_b_{{ $question->id }}">Option B</label>
                        <input type="radio" name="answers[{{ $question->id }}]" value="2" id="option_b_{{ $question->id }}">
                    </div>

                    <div class="form-group answer-options">
                        <label for="option_c_{{ $question->id }}">Option C</label>
                        <input type="radio" name="answers[{{ $question->id }}]" value="3" id="option_c_{{ $question->id }}">
                    </div>

                    <div class="form-group answer-options">
                        <label for="option_d_{{ $question->id }}">Option D</label>
                        <input type="radio" name="answers[{{ $question->id }}]" value="4" id="option_d_{{ $question->id }}">
                    </div>
                </div>
                @endforeach

            </div>

            <button type="submit" class="btn btn-primary">Submit Test</button>
        </form>
    </div>

    <script>
        // Display answer options when user is ready (e.g., after a time limit or on button click)
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                let answerOptions = document.querySelectorAll('.answer-options');
                answerOptions.forEach(function(option) {
                    option.style.display = 'block'; // Show answer options after some time
                });
            }, 1000); // You can change this time based on your need (1 second delay here)
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
