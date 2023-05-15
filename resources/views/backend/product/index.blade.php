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
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" id="createFormData">
          <div class="modal-body">
              @csrf
                    <div class="row">
                      
                      
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <select name="category_id" id="category_id" class="form-control">
                                    <option disable selected >-- select category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <select name="subcategory_id" id="subcategory_id" class="form-control">
                                    <option disable selected>-- select sub category --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <input type="text" name="product_name" class="form-control" placeholder="Product Name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <input type="number" name="product_price" class="form-control" placeholder="Product Price">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <input type="number" name="discount" class="form-control" placeholder="Product Discount">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <input type="text" name="brand" class="form-control" placeholder="Product Brand">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                            <label for="">Short Description:</label>
                            <textarea name="short_desp" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 ">
                            <div class="mb-3">
                             <label for="">Long Description:</label>
                            <textarea name="long_desp" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 ">
                            <div class="mb-3">
                            <label for="">Additionla Info:</label>
                            <textarea name="additional_info" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        
                        
                        
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Preview</label>
                               <input type="file" name="preview" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Thumbnails</label>
                               <input type="file" name="thumbnails[]" multiple class="form-control">
                            </div>
                        </div>
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












<div class="card">
      <div class="card-header">
          <h3 class="d-inline">Product List</h3>
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
          <a href="{{ route('categories.trashed') }}" class="btn btn-danger my-2">Recycle bin</a>
        </div>
        <div class="table-responsive ">
        <table class="table tabel-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Sl no</th>
              <th scope="col">Product Name</th>
              <th scope="col">price </th>
              <th scope="col">Discount </th>
              <th scope="col">After Discount </th>
              <th scope="col">Category </th>
              <th scope="col">Subcategory </th>
              <th scope="col">Variation </th>
              <th scope="col">Quantity </th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
             @forelse($products as $product)
              <tr>
                <th scope="row">{{ $products->firstItem()+$loop->index }}</th>
                <td>{{ $product->product_name }}</td>
                <td>&#2547; {{ $product->product_price }}</td>
                <td>{{ $product->discount }}%</td>
                <td>&#2547; {{ $product->after_discount }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->subcategory->subcategory_name }}</td>
                <td>{{ $product->inventories_count }}</td>
                <td>
                  @php 
                    $quantiy=0;
                    foreach($product->inventories as $inventory){
                      $quantiy+=$inventory->quantity;
                    }
                    echo $quantiy;
                  @endphp
                
                </td>
                <td><img width="50" src="{{asset('uploads/product/preview')}}/{{$product->preview}}" alt=""></td>
                  
                <td>
                  <div class="dropdown mb-2">
                            <button class="btn p-0 " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item d-flex align-items-center" href="{{ route('inventories', $product->id) }}"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">Inventory</span></a>
                              <a class="dropdown-item d-flex align-items-center" href="{{ route('categories.edit', $category->id) }}"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                              <a class="dropdown-item d-flex align-items-center" href="{{ route('categories.delete', $category->id) }}"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
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
        {{ $products->links() }}

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

<script>
    $('#category_id').change(function(){
        var category_id = $(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:'/getSubcategory',
            data:{'category_id':category_id},
            success:function(data){
                $('#subcategory_id').html(data);
                // alert(data);
                
            }
        });

    })
</script>

@endpush


</x-backend.layouts.master>
