@extends('layouts.admin')

@section('content')
    <h1>Edit {{ $project->title }}</h1>
    @include('partials.validate-errors')

    <form action="{{ route('admin.projects.update', $project) }}" method="post" enctype="multipart/form-data">
        @csrf {{-- this is a laravel directive to protect your application from cross-site request forgery --}}
        @method('PUT')
        {{-- title input --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                placeholder="add the title" value="{{ old('title', $project->title) }}" />
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
                    {{ old('is_in_evidence', $project->is_in_evidence) ? 'checked' : '' }} />

            </div>
        </div>
        @error('is_in_evidence')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        {{-- card image input --}}
        <div class="mb-3">
            <label for="card_image" class="form-label">Image that will be shown in the crad</label>
            <input type="file" name="card_image" id="card_image"
                class="form-control  @error('card_image') is-invalid @enderror" placeholder="add the card_image"
                value="{{ old('card_image', $project->card_image) }}" />
            @error('card_image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- show image input --}}
        <div class="mb-3">
            <label for="show_image" class="form-label">Image that will be shown in the single project page</label>
            <input type="file" name="show_image" id="show_image"
                class="form-control  @error('show_image') is-invalid @enderror" placeholder="add the show_image"
                value="{{ old('show_image', $project->show_image) }}" />
            @error('show_image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Preview Link input --}}
        <div class="mb-3">
            <label for="preview_link" class="form-label">Preview Link</label>
            <input type="text" name="preview_link" id="preview_link"
                class="form-control  @error('preview_link') is-invalid @enderror"
                placeholder="add a link for the project preview"
                value="{{ old('preview_link', $project->preview_link) }}" />
            @error('preview_link')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- GitHub Link input --}}
        <div class="mb-3">
            <label for="github_link" class="form-label">GitHub Link</label>
            <input type="text" name="github_link" id="github_link"
                class="form-control  @error('github_link') is-invalid @enderror"
                placeholder="add a link for the project's github"
                value="{{ old('github_link', $project->github_link) }}" />
            @error('github_link')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- YouTube Link input --}}
        <div class="mb-3">
            <label for="yt_link" class="form-label">YouTube Link</label>
            <input type="text" name="yt_link" id="yt_link" class="form-control  @error('yt_link') is-invalid @enderror"
                placeholder="add a link for the project' showcase video" value="{{ old('yt_link', $project->yt_link) }}" />
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
                    <option class="text-uppercase" value="{{ $type->id }}"
                        {{ $type->id == old('type_id', $project->type_id) ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Technologies input --}}
        <label for="technologies" class="form-label">Technologies</label>
        <div class="mb-3 d-flex gap-4">
            @foreach ($technologies as $technology)
                <div class="form-check">
                    {{-- @dd($project->technologies->contains($technology)) --}}
                    @if ($errors->any())
                        <input name="technologies[]" class="form-check-input" type="checkbox" value="{{ $technology->id }}"
                            id="technology-{{ $technology->id }}"
                            {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }} />
                    @else
                        <input name="technologies[]" class="form-check-input" type="checkbox" value="{{ $technology->id }}"
                            id="technology-{{ $technology->id }}"
                            {{ $project->technologies->contains($technology) ? 'checked' : '' }} />
                    @endif
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
                placeholder="add the sale date" value="{{ old('date', $project->date) }}" />
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Description input --}}
        <div class="mb-3">
            <label for="description" class="form-label ">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                rows="5" placeholder="add the description">{{ old('description', $project->description) }}</textarea>
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
