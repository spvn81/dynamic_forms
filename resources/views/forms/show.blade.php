@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $form->title }}</h1>
        <p>Description: {{ $form->description }}</p>

        <h2>Form Fields</h2>
        <form method="POST" action="{{ route('responses.store', $form->id) }}">
            @csrf
            <ul class="list-group">
                @foreach($form->fields as $field)
                    <li class="list-group-item">
                        <strong>{{ $field->label }}</strong>
                        @if($field->type === 'textarea')
                            <textarea class="form-control" name="fields[{{ $field->id }}]" rows="4" cols="50"></textarea>
                        @elseif($field->type === 'text')
                            <input type="text" class="form-control" name="fields[{{ $field->id }}]">
                        @elseif($field->type === 'radio')
                            <div>
                                @foreach(json_decode($field->options) as $option)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fields[{{ $field->id }}]" id="option_{{ $option }}" value="{{ $option }}">
                                        <label class="form-check-label" for="option_{{ $option }}">{{ $option }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
@endsection
