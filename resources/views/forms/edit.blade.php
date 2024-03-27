<!-- resources/views/forms/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Form</h1>
    <form method="POST" action="{{ route('forms.update', $form) }}">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $form->title }}">
        <!-- Add other form fields as needed -->
        <button type="submit">Update</button>
    </form>
@endsection
