@extends('layouts.dashboard_master')

@section('content')
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h2 class="text-primary">Blog Create</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-warning">Create Blog Post</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('blog.insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category Names</label>
                            <select name="category_id" id="" class="form-control">
                                <option>Select One Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="6" id="summernote"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="date" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('foter_content')
{{-- use summer note code here --}}

@endsection
