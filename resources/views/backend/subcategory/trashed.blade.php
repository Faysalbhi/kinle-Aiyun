<x-backend.layouts.master>
<x-slot:title>
 Kinile Role
</x-slot>

@push('style')
<style>
  .search {
    padding: 16px;
  }
  
  input {
    border-radius: 3px;
    border: none;
    padding: 8px;
    color: rgb(14, 12, 12);
    background: #e6e9f5;
    width: 30%;
    font-size: 14px;

  }
  
  .fa-search {
    position: relative;
    left: 0px;
  }
</style>


<div class="row">
  <div class="col">

    <div class="card">
      <div class="card-header">
          
            <a href="{{ route('subcategories') }}" style="float:right" type="button" class="btn btn-dark ">Subategory List</a>
          <h3 class="d-inline text-danger">Recycle Bin</h3>
              
              <form action="" class="d-inline search">
              @csrf
              <input type="search" placeholder="search" />
              <i class="fa fa-search"></i>
              </form>
            
          
          
      </div>
      <div class="card-body">
        {{-- <div>
          <button class="btn btn-danger my-2">All Category</button>
        </div> --}}
        <div class="table-responsive ">
        <table class="table tabel-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Sl no</th>
              <th scope="col">Category Name</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @forelse($trashed as $category)
            <tr>
              <th scope="row">{{ $loop->index+1 }}</th>
              <td>{{ $category->name }}</td>
              <td><img width="50" src="{{asset('uploads/category')}}/{{$category->img}}" alt=""></td>
                 
              <td>
                <div class="dropdown mb-2">
                        <button class="btn p-0 " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item d-flex align-items-center" href="{{ route('categories.restore', $category->id) }}"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="text-success">Restore</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="{{ route('categories.forcedelete', $category->id) }}"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="text-danger">Parmanent Delete</span></a>
                        </div>
                      </div>
              </td>
            </tr>
            @empty
            <tr>
             <td colspan="10" style="text-align:center">
              <strong class="text-danger text-cnter">No data to Show!</strong>
             </td>
            </tr>
          @endforelse
          </tbody>
        </table>

      </div>
      </div>
    </div>
  </div>
</div>
@push('script')
<script>
$(document).ready(function(){
  
    $('#addRole').click(function(){
      $('#createModel').modal('show');
    });

    

});
</script>

@endpush


</x-backend.layouts.master>
