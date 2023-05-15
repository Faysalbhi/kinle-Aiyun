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
@endpush
<!-- Modal -->
<div class="modal fade" id="createModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <form action="{{ route('color.store') }}" method="post" enctype="multipart/form-data" id="createFormData">
          <div class="modal-body">
              @csrf
              <div class="form-group">
                <label for="type">Color Name</label>
                <input type="text" name="color_name" class="form-control" id="type" placeholder="Enter Category Name">
              </div>
              <div class="form-group">
                <label for="type">Color Code</label>
                <input type="color" name="color_code" class="form-control" id="type" placeholder="Enter Category Name">
              </div>

          </div>
          <div class="modal-footer">
            <button type="submit" id="createSubmit" class="btn btn-dark">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancle</button>
          </div>
        </form>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="createModel2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <form action="{{ route('size.store') }}" method="post" enctype="multipart/form-data" id="createFormData">
          <div class="modal-body">
              @csrf
              <div class="form-group">
                <label for="type">Size Name</label>
                <input type="text" name="size_name" class="form-control" id="type" placeholder="Enter Size Name">
              </div>

          </div>
          <div class="modal-footer">
            <button type="submit" id="createSubmit" class="btn btn-dark">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancle</button>
          </div>
        </form>
    </div>
  </div>
</div>


<div class="row my-5">
  <div class="col">

    <div class="card">
      <div class="card-header">
          <h3 class="d-inline ">Size List</h3>
          <form action="" class="d-inline search">
          @csrf
          <input type="search" placeholder="search" />
          <i class="fa fa-search"></i>
          </form>
            <div style="float:right">
            
            <a href="{{ route('categories.trashed') }}" class="btn btn-danger my-2"><i data-feather="trash" class="icon-sm mr-2"></i> </a>
            <button type="button" id="addRole" class="btn btn-dark "> Add New</button>
              
            </div>
            
          
          
      </div>
        <div class="card-body">
        <div>
          <a href="{{ route('subcategories.trashed') }}" class="btn btn-danger my-2">Recycle bin</a>
        </div>
        <div class="table-responsive ">
        <table class="table tabel-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Sl no</th>
              <th scope="col">Color Name</th>
              <th scope="col">Color Code</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @forelse($colors as $color)
            <tr>
              <th scope="row">{{ $loop->index+1 }}</th>
              <td>{{ $color->color_name }}</td>
              <td><span style="background-color:{{ $color->color_code}}" class="badge"><span style="opacity:0">color</span></span> </td>
                 
              <td>
                <div class="dropdown mb-2">
                        <button class="btn p-0 " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="{{ route('subcategories.edit', $color->id) }}"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="{{ route('subcategories.delete', $color->id) }}"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
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


<div class="row text-primary">
  <div class="col">

    <div class="card">
      <div class="card-header">
          <h3 class="d-inline">Size List</h3>
          <form action="" class="d-inline search">
          @csrf
          <input type="search" placeholder="search" />
          <i class="fa fa-search"></i>
          </form>
            <div style="float:right">
            
            <a href="{{ route('categories.trashed') }}" class="btn btn-primary my-2"><i data-feather="trash" class="icon-sm mr-2"></i> </a>
            <button type="button" id="addSize" class="btn btn-primary "> Add New</button>
              
            </div>
            
          
          
      </div>
        <div class="card-body">
        <div>
          <a href="{{ route('subcategories.trashed') }}" class="btn btn-danger my-2">Recycle bin</a>
        </div>
        <div class="table-responsive ">
        <table class="table tabel-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Sl no</th>
              <th scope="col">Size Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @forelse($sizes as $size)
            <tr>
              <th scope="row">{{ $loop->index+1 }}</th>
              <td>{{ $size->size_name }}</td>
                 
              <td>
                <div class="dropdown mb-2">
                        <button class="btn p-0 " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="{{ route('subcategories.edit', $color->id) }}"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="{{ route('subcategories.delete', $color->id) }}"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
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

$(document).ready(function(){
  
    $('#addSize').click(function(){
      $('#createModel2').modal('show');
    });

    

});
</script>

@endpush


</x-backend.layouts.master>
