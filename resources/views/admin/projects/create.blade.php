@extends('layouts.admin')

@section('content')
    <h1>Add a new Project</h1>
    @include('partials.validate-errors')
    <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
        @csrf {{-- this is a laravel directive to protect your application from cross-site request forgery --}}

        {{-- title input --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                placeholder="add the title" value="{{ old('title') }}" />
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- In Evidence input --}}
        <div class="mb-3 d-flex gap-4">
            <div class="form-check">
                <label class="form-check-label" for="is_in_evidence"> In Evidence
                </label>
                <input name="is_in_evidence" class="form-check-input" type="checkbox" value="1" id="is_in_evidence"
                    {{ old('is_in_evidence') ? 'checked' : '' }} />

            </div>
        </div>
        @error('is_in_evidence')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        {{-- Card Image input --}}
        <div class="mb-3">
            <label for="card_image" class="form-label">Add the image that will be shown in the card</label>
            <input type="file" name="card_image" id="card_image"
                class="form-control  @error('card_image') is-invalid @enderror" placeholder="add the card_image"
                value="{{ old('card_image') }}" />
            @error('card_image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Show Image input --}}
        <div class="mb-3">
            <label for="show_image" class="form-label">Add the image that will be shown in the single project page</label>
            <input type="file" name="show_image" id="show_image"
                class="form-control  @error('show_image') is-invalid @enderror" placeholder="add the show_image"
                value="{{ old('show_image') }}" />
            @error('show_image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        {{-- Preview Link input --}}
        <div class="mb-3">
            <label for="preview_link" class="form-label">Preview Link</label>
            <input type="text" name="preview_link" id="preview_link"
                class="form-control  @error('preview_link') is-invalid @enderror"
                placeholder="add a link for the project preview" value="{{ old('preview_link') }}" />
            @error('preview_link')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- GitHub Link input --}}
        <div class="mb-3">
            <label for="github_link" class="form-label">GitHub Link</label>
            <input type="text" name="github_link" id="github_link"
                class="form-control  @error('github_link') is-invalid @enderror"
                placeholder="add a link for the project's github" value="{{ old('github_link') }}" />
            @error('github_link')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Frontend GitHub Repo Link input --}}
        <div class="mb-3">
            <label for="frontend_link" class="form-label">Frontend repo link</label>
            <input type="text" name="frontend_link" id="frontend_link"
                class="form-control  @error('frontend_link') is-invalid @enderror"
                placeholder="add a link for the project's github" value="{{ old('frontend_link') }}" />
            @error('frontend_link')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Backend GitHub Repo Link input --}}
        <div class="mb-3">
            <label for="backend_link" class="form-label">Backend repo link</label>
            <input type="text" name="backend_link" id="backend_link"
                class="form-control  @error('backend_link') is-invalid @enderror"
                placeholder="add a link for the project's github" value="{{ old('backend_link') }}" />
            @error('backend_link')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>



        {{-- YouTube Link input --}}
        <div class="mb-3">
            <label for="yt_link" class="form-label">YouTube Link</label>
            <input type="text" name="yt_link" id="yt_link" class="form-control  @error('yt_link') is-invalid @enderror"
                placeholder="add a link for the project' showcase video" value="{{ old('yt_link') }}" />
            @error('yt_link')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Type Input --}}
        <div class="mb-3">
            <label for="type_id" class="form-label">Type</label>
            <select class="form-select form-select" name="type_id" id="type_id">
                <option disabled selected>Select a type</option>
                @foreach ($types as $type)
                    <option class="text-uppercase" {{ $type->id == old('type_id') ? 'selected' : '' }}
                        value="{{ $type->id }}">
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
            @error('type_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Technologies input --}}
        <label for="technologies" class="form-label">Technologies</label>
        <div class="mb-3 d-flex gap-4">
            @foreach ($technologies as $technology)
                <div class="form-check">
                    <input name="technologies[]" class="form-check-input" type="checkbox" value="{{ $technology->id }}"
                        id="technology-{{ $technology->id }}"
                        {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }} />
                    <label class="form-check-label" for="technology-{{ $technology->id }}"> {{ $technology->name }}
                    </label>
                </div>
            @endforeach
        </div>
        @error('technologies')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        {{-- date input --}}
        <div class="mb-3">
            <label for="date" class="form-label ">Sale Date</label>
            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror"
                placeholder="add the date" value="{{ old('date') }}" />
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Description input --}}
        <div class="mb-3">
            <label for="description" class="form-label ">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                rows="5" placeholder="add the description">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Submit
        </button>
        <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Back</a>

    </form>
@endsection
