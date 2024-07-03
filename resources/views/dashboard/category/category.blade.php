@extends('layouts.dashboard_master')

@section('content')

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1 class="text-primary h3">Category View</h1>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6 col-lg-7">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category )
                      <tr>
                        <td>{{ $categories->firstItem() + $loop->index }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <form action="{{ route('category.delete',$category->id) }}" method="post">
                                @csrf
                                <button class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                            {{-- status change --}}
                            <form action="{{ route('category.status',$category->id) }}" method="post">
                                @csrf
                                @if ($category->status == 'active')
                                <button type="submit" class="badge bg-success">active</button>
                                @else
                                <button type="submit" class="badge bg-danger">deactive</button>
                                @endif
                            </form>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CategoryofInventory{{ $category->id }}">
                          Inventory
                        </button>

                        {{-- category view --}}
                        <a href="{{ route('category.edit.view', $category->slug ) }}" class="badge bg-warning">Edit</a>

                        </td>
                      </tr>

            <!-- Modal -->
            <div class="modal fade" id="CategoryofInventory{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Client Information & Id No - {{ $category->id }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-primary">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <img src="{{ asset('uploads/category') }}/{{ $category->image }}" style="width: 150px; height:150px;">
                                </div>
                                <div class="mb-3">
                                 <b class="text-dark fs-5">Title: {{ $category->title}}</b>
                                </div>
                                <div class="mb-3">
                                 <p>Slug: {{ $category->slug}}</p>
                                </div>
                                <div class="mb-3">
                                 <p>Description: {{ $category->description}}</p>
                                </div>
                                <div class="mb-3">
                                 <p>Status: {{ $category->status}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

                      @endforeach
                    </tbody>
                  </table>
                  {{ $categories->links() }}
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-5">
        <div class="card">
            <div class="card-header">
                <span class="text-warning">Insert Category Table</span>
            </div>
            <div class="card-body">
                <form action="{{ route('category.insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control @error('title')
                        is-invalid
                        @enderror" name="title">
                      </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input class="form-control @error('slug')
                        is-invalid
                        @enderror" name="slug">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Description</label>
                          <textarea name="description" class="form-control @error('description')
                          is-invalid
                          @enderror"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control @error('image')
                            is-invalid
                            @enderror" name="image">
                        </div>
                          <button type="submit" class="btn btn-primary">Insert</button>
                    </form>
            </div>
        </div>
    </div>
</div>


@endsection

{{-- alret area --}}


@section('foter_content')

@if(session('insert_success'))

<script>

const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "{{ session('insert_success') }}"
});

</script>

@endif

@if (session('error'))
<script>
    const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "error",
  title: "{{ session('error') }}"
});
</script>
@endif

@endsection
