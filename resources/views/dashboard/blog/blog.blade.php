@extends('layouts.dashboard_master')

@section('content')

<div class="row">
    <div class="col">
        <div class="page-description">
            <h2 class="text-warning" >Blogs</h2>
        </div>
    </div>
</div>


<div class="row">
    <div class="d-flex justify-content-end mb-2 gap-4">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#PermanentlyDelete">
            Trash
           </button>
           {{-- restore --}}
           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#RestoreallTrash">
               Restore Trash
            </button>
    </div>
</div>


{{-- modal of restore --}}

<div class="modal fade bg-success" id="RestoreallTrash" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-center">
            Restore All Trashes
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ( $trashes as $blog )
                    <tr>
                        <td>{{ $trashes->firstItem() + $loop->index }}</td>
                        <td>
                         <img src="{{ asset('uploads/blogs') }}/{{ $blog->image }}" style="width: 120px; height:100px;">
                        </td>
                        <td>{{ $blog->title }}</td>
                        <td>
                            <form action="{{ route('blog.restore',$blog->id ) }}" method="post">
                                @csrf
                                <button class="btn btn-success">
                                   Restore
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-danger text-center" colspan="4">
                            No Data Found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
              </table>
              {{ $trashes->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

            {{-- force delete --}}

    <div class="modal fade bg-danger" id="PermanentlyDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5 text-center">
                Deleted Permanently
            </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ( $trashes as $blog )
                        <tr>
                            <td>{{ $trashes->firstItem() + $loop->index }}</td>
                            <td>
                            <img src="{{ asset('uploads/blogs') }}/{{ $blog->image }}" style="width: 150px; height:140px; border: 5px solid blue;">
                            </td>
                            <td>{{ $blog->title }}</td>
                            <td>
                                <form action="{{ route('blog.force.delete',$blog->id ) }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger">
                                    Trash
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-danger text-center" colspan="4">
                                No Data Found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $trashes->links() }}
            </div>
        </div>
        </div>
    </div>
    </div>








{{-- table for colspan --}}

<table class="table">
    <thead class="bg-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">User Name</th>
        <th scope="col">Category Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody class="bg-white">
        @forelse ( $blogs as $blog )
        <tr>
            <td>{{ $loop->index +1 }}</td>
            <td>
                <img src="{{ asset('uploads/blogs') }}/{{ $blog->image }}" style="width: 120px; height:100px;">
            </td>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->RelationWithUser->name }}</td>
            <td>{{ $blog->RelationWithCategoory->title }}</td>
                <td>
                    <form action="{{ route('blog.delete', $blog->id ) }}" method="POST">
                        @csrf
                        <button class="badge bg-danger">Delete</button>
                    </form>
                </td>
          </tr>
        @empty
          <tr>
            <td class="text-danger text-center fw-bold" colspan="6">No Data found❌</td>
          </tr>
        @endforelse
    </tbody>
  </table>


@endsection


@section('foter_content')

@if(session('success'))

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
  title: "{{ session('success') }}"
});

</script>

@endif

@endsection

