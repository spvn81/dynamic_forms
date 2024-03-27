@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Response Details</h1>
        <p><strong>ID:</strong> {{ $response->id }}</p>
        <p><strong>Form ID:</strong> {{ $response->form_id }}</p>

        <h2>Response Data</h2>
        <ul>

            @foreach(json_decode($response->data) as $fieldId => $value)
                @php
                    $formField = $response->form->fields()->find($fieldId);
                    $label = $formField ? $formField->label : 'Unknown Label';
                @endphp
                <li>
                    <strong>{{ $label }}:</strong> {{ $value }}
                </li>
            @endforeach
        </ul>

        <p><strong>Created At:</strong> {{ $response->created_at }}</p>
        <p><strong>Updated At:</strong> {{ $response->updated_at }}</p>
    </div>
@endsection
