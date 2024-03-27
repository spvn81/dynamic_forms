@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Forms</h1>

        <!-- Create New Form Button -->
        <div class="mb-3">
            <a href="{{ route('forms.create') }}" class="btn btn-primary">Create New Form</a>
        </div>

        <!-- List of Forms -->
        <div class="list-group">
            @forelse($forms as $form)
                <a href="{{ route('forms.show', $form) }}" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">{{ $form->title }}</h5>
                    <p class="mb-1">{{ $form->description }}</p>
                </a>
            @empty
                <p>No forms available.</p>
            @endforelse
        </div>
    </div>
@endsection
