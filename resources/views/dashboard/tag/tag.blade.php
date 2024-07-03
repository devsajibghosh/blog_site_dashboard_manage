@extends('layouts.dashboard_master')

@section('content')

<div class="row">
    <div class="col">
        <div class="page-description">
            <h2 class="text-warning">Tags</h2>
        </div>
    </div>
</div>

{{-- trashesh data restore && delet --}}
<div class="row">
    <div class="d-flex justify-content-end mb-2 gap-4">
        {{-- force delet --}}
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#forcedelet">
         Trash
        </button>
        {{-- restore --}}
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Restore Trash
          </button>
    </div>


    {{-- modal of restore --}}
    <div class="modal fade bg-success" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
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
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ( $trashes as $trash )
                        <tr>
                            <td>{{ $trashes->firstItem() + $loop->index }}</td>
                            <td>{{ $trash->title }}</td>
                            <td>
                                <form action="{{ route('tags.restore',$trash->id) }}" method="post">
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

    {{-- modal of forcedelet --}}

    <div class="modal fade bg-danger" id="forcedelet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
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
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ( $trashes as $trash )
                        <tr>
                            <td>{{ $trashes->firstItem() + $loop->index }}</td>
                            <td>{{ $trash->title }}</td>
                            <td>
                                <form action="{{ route('tags.forcedelet',$trash->id) }}" method="post">
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


{{-- tags insert data --}}

<div class="row">
    <div class="col-md-6 col-lg-7">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tag Title</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($tags as $tag )
                      <tr>
                        <td>{{ $tags->firstItem() + $loop->index }}</td>
                        <td>{{ $tag->title }}</td>
                        <td>
                            <form action="{{ route('tags.delete',$tag->id) }}" method="post">
                                @csrf
                                <button class="badge bg-danger">
                                    Delete
                                </button>
                            </form>

                            <form action="{{ route('tags.status.update',$tag->id ) }}" method="post">
                                @csrf
                                @if ($tag->status == 'active')
                                <button type="submit" class="badge bg-success">active</button>
                                @else
                                <button type="submit" class="badge bg-danger">deactive</button>
                                @endif
                            </form>

                        </td>
                      </tr>

                         @empty
                         <tr>
                            <td class="text-danger text-center" colspan="4">No Data Found</td>
                         </tr>

                      @endforelse
                    </tbody>
                  </table>
                  {{ $tags->links() }}
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-5">
        <div class="card">
            <div class="card-header">
                <span class="text-primary">Insert Tag Tittle</span>
            </div>
            <div class="card-body">
                <form action="{{ route('tags.insert') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Tag Title</label>
                        <input type="text" class="form-control @error('title')
                        is-invalid
                        @enderror" name="title">
                      </div>
                          <button type="submit" class="btn btn-primary">Insert</button>
                    </form>
            </div>
        </div>
    </div>
</div>


@endsection


@section('foter_content')


@if (session('success'))

<script>
const Toast = Swal.mixin({
  toast: true,
  position: "center-end",
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
