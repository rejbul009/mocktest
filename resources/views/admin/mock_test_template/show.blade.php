@extends('layouts.admin')

@section('content')
    @if($template->questions->isNotEmpty())
        @foreach($template->questions as $question)
            <div class="card mt-2">
                <div class="card-body">
                    <p><strong>Question:</strong> {{ $question->question_text }}</p>
                    <p><strong>Options:</strong></p>
                    <ul>
                        <li>A. {{ $question->option_a }}</li>
                        <li>B. {{ $question->option_b }}</li>
                        <li>C. {{ $question->option_c }}</li>
                        <li>D. {{ $question->option_d }}</li>
                    </ul>
                    <p><strong>Correct Answer:</strong>
                        @switch($question->correct_answer)
                            @case(1)
                                A. {{ $question->option_a }}
                                @break
                            @case(2)
                                B. {{ $question->option_b }}
                                @break
                            @case(3)
                                C. {{ $question->option_c }}
                                @break
                            @case(4)
                                D. {{ $question->option_d }}
                                @break
                            @default
                                Not Defined
                        @endswitch
                    </p>
                </div>
            </div>
        @endforeach
    @else
        <p>No questions available for this template.</p>
    @endif
@endsection
