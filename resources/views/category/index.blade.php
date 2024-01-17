@extends('dashboard.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-body">
                    @if(@session('success'))
                        {{-- <div class="bg-success p-2 rounded m-2">{{ @session('success') }}</div> --}}
                        <div class="alert alert-success alert-dismissible fade show mx-3 mt-3" role="alert">
                            {{ @session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                    @endif
                    @if(@session('update'))
                        {{-- <div class="bg-secondary p-2 rounded m-2">{{ @session('update') }}</div> --}}
                        <div class="alert alert-warning alert-dismissible fade show mx-3 mt-3" role="alert">
                            {{ @session('update') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                    @endif
                    @if(@session('delete'))
                        {{-- <div class="bg-danger p-2 rounded m-2">{{ @session('delete') }}</div> --}}
                        <div class="alert alert-danger alert-dismissible fade show mx-3 mt-3" role="alert">
                            {{ @session('delete') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                    @endif
                    <a href="{{ route('categories.create') }}" class="btn btn-success">Add +</a>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td >
                                    <div class="d-inline-block">
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    </div>
                                    <div class="d-inline-block">
                                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info"><i class="fas fa-info m-1"></i></a>
                                    </div>
                                    <div class="d-inline-block">
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger"
                                                onclick="return confirm('Are you sure to delete!');"
                                            ><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
  