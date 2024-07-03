@extends('layouts.dashboard_master')

@section('content')


<div class="row">
    <div class="col">
        <div class="page-description">
            <h2 class="text-warning">Edit Category Page</h2>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Catagory Update</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('category.edit', $category->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Title</label>
                      <input type="text" name="title" class="form-control @error('title')
                        is-invalid
                      @enderror" value="{{ $category->title }}">
                      </div>

                    <div class="mb-3">
                      <label class="form-label">Slug</label>
                      <input type="text" name="slug" class="form-control @error('slug')
                        is-invalid
                      @enderror" value="{{ $category->slug }}">
                      </div>

                    <div class="mb-3">
                      <label class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description')
                        is-invalid
                        @enderror">{{ $category->description }}</textarea>
                      </div>

                      <div class="mb-3">
                        <img src="{{ asset('uploads/category') }}/{{ $category->image }}" style="width: 150px; height:150px; border: 1px solid red; border-radius:10px">
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control @error('image')
                        is-invalid
                        @enderror">
                        </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</div>

@endsection
