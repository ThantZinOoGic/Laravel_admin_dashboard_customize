@extends('dashboard.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">Create Category</div>
                <div class="card-body">
                    <form class="p-5" method="post" action="{{ route('categories.store') }}">
                        @csrf
                        @method('post')
                        <div class="form-group">
                          <label for="exampleInputEmail1">Category Name <small class="text-danger">*</small></label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" name="name">
                          @error('name')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
