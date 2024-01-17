@extends('dashboard.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">Edit Category</div>
                <div class="card-body">
                    <form class="p-5" method="post" action="{{ route('categories.update', $category->id) }}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                          <label for="exampleInputEmail1">Category Name <small class="text-danger">*</small></label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" name="name" value="{{ $category->name }}">
                          @error('name')
                              <small>{{ $message }}</small>
                          @enderror
                        </div>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
