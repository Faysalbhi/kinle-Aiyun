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
    background: #fafbff;
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
    <form action="{{ route('role.create') }}" method="post" id="createFormData">
          <div class="modal-body">
              @csrf
              <div class="form-group">
                <label for="type">Role Type</label>
                <input type="text" name="type" class="form-control" id="type" placeholder="Enter Role Type">
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


<div class="row">
  <div class="col">

    <div class="card">
      <div class="card-header">
          
          <button style="float:right" type="button" id="addRole" class="btn btn-dark "> Add New</button>
          <h3 class="d-inline">Role List</h3>
          <form action="" class="d-inline search">
          @csrf
          <input type="search" placeholder="search" />
          <i class="fa fa-search"></i>
          </form>
            
          
          
      </div>
      <div class="card-body">
        <div class="table-responsive ">
        <table class="table tabel-striped">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Sl no</th>
              <th scope="col">Type</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @forelse($roles as $role)
            <tr>
              <th scope="row">{{ $roles->firstItem()+$loop->index }}</th>
              <td>{{ $role->type }}</td>
              <td>
                <div class="dropdown mb-2">
                        <button class="btn p-0 " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                        </div>
                      </div>
              </td>
            </tr>
            @empty
            <strong class="text-danger text-cnter">No data to Show!</strong>
          @endforelse
          </tbody>
        </table>
        {{ $roles->links()}}

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