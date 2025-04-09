<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Question</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Create Question for Template: {{ $template->name }}</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form id="questionForm" action="{{ route('admin.mockTestTemplates.questions.store', $template->id) }}" method="POST">
            @csrf
            <div id="questionsContainer">
                <div class="question" id="question_1">
                    <div class="form-group">
                        <label for="question_text_1">Question Text</label>
                        <textarea class="form-control" id="question_text_1" name="questions[1][question_text]" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="option_a_1">Option A</label>
                        <input type="text" class="form-control" id="option_a_1" name="questions[1][option_a]" required>
                    </div>

                    <div class="form-group">
                        <label for="option_b_1">Option B</label>
                        <input type="text" class="form-control" id="option_b_1" name="questions[1][option_b]" required>
                    </div>

                    <div class="form-group">
                        <label for="option_c_1">Option C</label>
                        <input type="text" class="form-control" id="option_c_1" name="questions[1][option_c]" required>
                    </div>

                    <div class="form-group">
                        <label for="option_d_1">Option D</label>
                        <input type="text" class="form-control" id="option_d_1" name="questions[1][option_d]" required>
                    </div>

                    <div class="form-group">
                        <label for="correct_answer_1">Correct Answer</label>
                        <select class="form-control" id="correct_answer_1" name="questions[1][correct_answer]" required>
                            <option value="1">Option A</option>
                            <option value="2">Option B</option>
                            <option value="3">Option C</option>
                            <option value="4">Option D</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-success" id="addQuestionBtn">Add Question</button>
            <button type="submit" class="btn btn-primary">Create Questions</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        let questionCount = 1;

        $('#addQuestionBtn').on('click', function () {
            questionCount++;
            let questionTemplate = `
                <div class="question" id="question_${questionCount}">
                    <div class="form-group">
                        <label for="question_text_${questionCount}">Question Text</label>
                        <textarea class="form-control" id="question_text_${questionCount}" name="questions[${questionCount}][question_text]" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="option_a_${questionCount}">Option A</label>
                        <input type="text" class="form-control" id="option_a_${questionCount}" name="questions[${questionCount}][option_a]" required>
                    </div>

                    <div class="form-group">
                        <label for="option_b_${questionCount}">Option B</label>
                        <input type="text" class="form-control" id="option_b_${questionCount}" name="questions[${questionCount}][option_b]" required>
                    </div>

                    <div class="form-group">
                        <label for="option_c_${questionCount}">Option C</label>
                        <input type="text" class="form-control" id="option_c_${questionCount}" name="questions[${questionCount}][option_c]" required>
                    </div>

                    <div class="form-group">
                        <label for="option_d_${questionCount}">Option D</label>
                        <input type="text" class="form-control" id="option_d_${questionCount}" name="questions[${questionCount}][option_d]" required>
                    </div>

                    <div class="form-group">
                        <label for="correct_answer_${questionCount}">Correct Answer</label>
                        <select class="form-control" id="correct_answer_${questionCount}" name="questions[${questionCount}][correct_answer]" required>
                            <option value="1">Option A</option>
                            <option value="2">Option B</option>
                            <option value="3">Option C</option>
                            <option value="4">Option D</option>
                        </select>
                    </div>
                </div>
            `;
            $('#questionsContainer').append(questionTemplate);
        });
    </script>
</body>
</html>
