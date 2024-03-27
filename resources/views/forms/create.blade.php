<!-- resources/views/forms/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Create Form</h1>
    <form method="POST" action="{{ route('forms.store') }}">
        @csrf

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <hr>

        <h2>Add Form Fields</h2>

        <div id="form-fields">
            <!-- Dynamic fields will be added here -->
        </div>

        <button type="button" id="add-field" class="btn btn-primary">Add Field</button>

        <hr>

        <button type="submit" class="btn btn-success">Create</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Counter to keep track of added fields
            let fieldCounter = 0;

            // Function to add a new form field input
            function addFormField() {
                const fieldDiv = document.createElement('div');
                fieldDiv.classList.add('form-group');

                fieldDiv.innerHTML = `
                    <label for="field_label_${fieldCounter}">Field Label:</label>
                    <input type="text" name="fields[${fieldCounter}][label]" id="field_label_${fieldCounter}" class="form-control" required>

                    <label for="field_type_${fieldCounter}">Field Type:</label>
                    <select name="fields[${fieldCounter}][type]" id="field_type_${fieldCounter}" class="form-control" required>
                        <option value="text">Text</option>
                        <option value="textarea">Textarea</option>
                        <!-- Add more field types as needed -->
                    </select>

                    <!-- Add more field configuration inputs as needed -->
                `;

                document.getElementById('form-fields').appendChild(fieldDiv);

                fieldCounter++;
            }

            // Event listener to add a new form field when "Add Field" button is clicked
            document.getElementById('add-field').addEventListener('click', function () {
                addFormField();
            });

            // Add initial form field
            addFormField();
        });
    </script>
@endsection
