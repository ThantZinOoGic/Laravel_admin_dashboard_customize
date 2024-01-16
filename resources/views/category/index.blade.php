@extends('dashboard.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-body">
                    @if(@session('success'))
                        <div class="bg-success p-2 rounded m-2">{{ @session('success') }}</div>
                    @endif
                    @if(@session('update'))
                    <div class="bg-secondary p-2 rounded m-2">{{ @session('update') }}</div>
                    @endif
                    @if(@session('delete'))
                    <div class="bg-danger p-2 rounded m-2">{{ @session('delete') }}</div>
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
  