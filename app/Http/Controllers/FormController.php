<?php


namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use App\Models\FormField;


class FormController extends Controller
{
    public function index()
    {
        $forms = Form::all();
        return view('forms.index', compact('forms'));
    }

    public function create()
    {
        return view('forms.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $form = new Form();
        $form->title = $validatedData['title'];
        $form->description = $validatedData['description'];

        $form->save();


    foreach ($request->input('fields', []) as $fieldData) {
        $field = new FormField();
        $field->label = $fieldData['label'];
        $field->type = $fieldData['type'];
        $field->options = $fieldData['options'] ?? null;
        $form->fields()->save($field);
    }



        return redirect()->route('forms.show', $form)->with('success', 'Form created successfully!');
    }

    public function show(Form $form)
    {
        return view('forms.show', compact('form'));
    }

    public function edit(Form $form)
    {
        return view('forms.edit', compact('form'));
    }

    public function update(Request $request, Form $form)
    {
        // Validation and updating logic
    }

    public function destroy(Form $form)
    {
        // Deletion logic
    }
}


