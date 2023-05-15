<x-backend.layouts.master>

<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card">
            @if (session('updated'))
                <div class="alert alert-success">{{session('updated')}}</div>
            @endif
            <div class="card-header bg-primary">
                <h3 class="text-white">Edit Category</h3>
            </div>
            <div class="card-body">
                <form action="{{route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" class="form-control" value="{{ $category->name }}" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category Image</label>
                        <input type="file" class="form-control" name="img" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <img src="{{ asset('uploads/category') }}/{{ $category->img }}" id="blah" alt="" width="200">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend.layouts.master>