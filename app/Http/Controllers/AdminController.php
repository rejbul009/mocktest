<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MockTestTemplate; 
use App\Models\Question; 
use App\Models\Answer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Constructor to ensure only admins can access admin panel
   

    public function index()
    {
        // Simply load the dashboard view without any checks
        return view('admin.dashboard');
    }
    


    // Show a list of all users
    public function showUsers()
    {
        $users = User::all(); // Or paginate, depending on your preference
        return view('admin.users.index', compact('users'));
    }

    // Show a specific user details
    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    // Update user status or delete a user
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }

    //

    // MOCKTEST

    // In AdminController

// Show the create mock test template form
public function createMockTestTemplate()
{
    return view('admin.mock_test_template.create');
}

public function storeMockTestTemplate(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    MockTestTemplate::create([
        'name' => $request->name,
    ]);

    return redirect()->route('admin.mockTestTemplates.index')->with('success', 'Mock Test Template created successfully!');
}

public function indexMockTestTemplates()
{
    $templates = MockTestTemplate::all();
    return view('admin.mock_test_template.index', compact('templates'));
}

public function edit($id)
{
    $template = MockTestTemplate::findOrFail($id);
    return view('admin.mock_test_template.edit', compact('template'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $template = MockTestTemplate::findOrFail($id);
    $template->update([
        'name' => $request->name,
    ]);

    return redirect()->route('admin.mockTestTemplates.index')->with('success', 'Mock Test Template updated successfully!');
}

public function destroy($id)
{
    $template = MockTestTemplate::findOrFail($id);
    $template->delete();
    return redirect()->route('admin.mockTestTemplates.index')->with('success', 'Template deleted successfully!');
}


//question 
public function createQuestion($templateId)
{
    // Find the mock test template by its ID
    $template = MockTestTemplate::findOrFail($templateId);

    // Return the view to create a new question under the selected template
    return view('admin.mock_test_template.createQuestion', compact('template'));
}

/**
 * Store a newly created question in the database.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $templateId
 * @return \Illuminate\Http\RedirectResponse
 */
public function storeQuestion(Request $request, $templateId)
{
    // Validate the incoming request data
    $request->validate([
        'questions.*.question_text' => 'required|string',
        'questions.*.option_a' => 'required|string',
        'questions.*.option_b' => 'required|string',
        'questions.*.option_c' => 'required|string',
        'questions.*.option_d' => 'required|string',
        'questions.*.correct_answer' => 'required|integer|between:1,4',
    ]);

    $template = MockTestTemplate::findOrFail($templateId);

    // Loop through each question and save them
    foreach ($request->questions as $questionData) {
        $question = new Question();
        $question->mock_test_template_id = $template->id;
        $question->question_text = $questionData['question_text'];
        $question->option_a = $questionData['option_a'];
        $question->option_b = $questionData['option_b'];
        $question->option_c = $questionData['option_c'];
        $question->option_d = $questionData['option_d'];
        $question->correct_answer = $questionData['correct_answer'];
        $question->save();
    }

    return view('admin.mock_test_template.show', compact('template'));
}
public function mockTestTemplatesshow($templateId)
{
    // Fetch the template with its associated questions
    $template = MockTestTemplate::with('questions')->findOrFail($templateId);

    // Return the view with the template
    return view('admin.mock_test_template.show', compact('template'));
}


}


