@extends('layouts.app')
@section('title', 'Dashboard - Create Variation')
@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Create Variation</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/products')}}">Products</a></li>
                        <li class="breadcrumb-item active">Create Variation</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Variation Details</h4>
                    </div>
                    <div class="card-body">
                        @foreach($errors->all() as $error)
                            <span style="color:red">{{$error}}</span>

                        @endforeach
                        <form action="{{route('product.variations.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input name="product_id" value="{{$product_id}}" hidden/>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Variation</label>
                                                <select class="form-control @error('variation') is-invalid @enderror"
                                                        id="variations" data-route="" name="variations[]" multiple>
                                                    <option value="" disabled>Choose Variation</option>
                                                    @foreach(App\Variation::all() as $variation)
                                                        <option
                                                            title="{{$variation->title}}"
                                                            value="{{$variation->id}}"
                                                            <?php
                                                            if(isset($product->variations))
                                                            { if(in_array($variation->id, json_decode($product->variations)))
                                                            {
                                                                echo "selected";
                                                            }}
                                                            ?>
                                                            >{{ucwords($variation->sub_title)}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('variations'))
                                                    @foreach($errors->get('variations') as $message)
                                                        <span style="color:red">{{$message}}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Size</label>
                                                <select class="form-control @error('sizes') is-invalid @enderror"
                                                        id="sizes" data-route="" name="sizes[]" multiple>
                                                    <option value="" disabled>Choose Size</option>
                                                    @foreach(App\Size::all() as $size)
                                                        <option value="{{$size->id}}"
                                                        <?php
                                                        if(isset($product->sizes))
                                                        {
                                                            if(in_array($size->id, json_decode($product->sizes)))
                                                            {
                                                                echo "selected";
                                                            }
                                                        }
                                                            ?>

                                                        >{{ucwords($size->size)}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('sizes'))
                                                    @foreach($errors->get('sizes') as $message)
                                                        <span style="color:red">{{$message}}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row" id="variants">
                                        <div class="col-md-6">
                                            <div class="form-group"><label>Width</label>
                                                <select class="form-control @error("widths") is-invalid @enderror"id="widths" data-route="" name="widths[]" multiple><option value="" disabled>
                                                Choose Width
                                                </option>
                                                @foreach(App\Width::all() as $width)
                                                <option value="{{$width->id}}"
                                                    <?php
                                                            if(isset($product->widths))
                                                            { if(in_array($width->id, json_decode($product->widths)))
                                                            {
                                                                echo "selected";
                                                            }}
                                                    ?>
                                                >{{ucwords($width->width)}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <a href="#" id="add_variant_btn" class="link-primary"><i class="fe fe-plus"></i> Add
                                        variant</a> -->

                                </div>

                            <!-- <div class="col-md-12">
								<div class="input-images"></div>
								<br>
								@if($errors->has('images'))
                                @foreach($errors->get('images') as $message)
                                    <span style="color:red">{{$message}}</span>
		                            @endforeach
                            @endif
                                </div> -->
                                <div class="col-md-12">

                                </div>
                            <!-- <div class="col-md-12">
								@if($errors->has('description'))
                                @foreach($errors->get('description') as $message)
                                    <span style="color:red">{{$message}}</span>
		                            @endforeach
                            @endif
                                <textarea rows="8" name="description" class="form-control summernote @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
							</div> -->
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-lg btn-success bs_dashboard_btn bs_btn_color">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Products</div>
                        <div class="pull-right">
                            <form action="{{route('product.variations.import_csv')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="product_id" value="{{$product_id}}" hidden>
                                <input type="file" class="btn btn-secondary" name="file">
                                <button class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{route('product.variations.bulk_delete')}}" method="POST"
                                  id="deleteAll">
                                @csrf
                                <input type="hidden" name="items" id="bs_items_forbulkDelete">
                            </form>
                            <table class="datatable table table-stripped">
                                <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="checkAll">
                                    </th>
                                    <th>S.No</th>
                                    <th>Album</th>
                                    <th>Metal</th>
                                    <th>Size</th>
                                    <th>Width</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Weight</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($variations as $variation)
                                    <tr>

                                            <td style="padding:10px 18px;">
                                                <input type="checkbox" value="{{$variation->id}}"
                                                       class="bs_dtrow_checkbox bs_checkItem">
                                                <input value="{{$variation->id}}" hidden name="id"/>
                                            </td>

                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                            {{ucwords($variation->album->title??"NA")}}

                                            </td>
                                            <td>
                                                {{ucwords($variation->variation->title)}}
                                            </td>
                                            <td>{{ucwords($variation->size->size)}}</td>
                                            <td> {{$variation->width?($variation->width->width):''}}</td>
                                            <td>{{$variation->price}}

                                            </td>
                                            <td>
                                            {{$variation->description}}

                                            </td>
                                            <td>
                                            {{$variation->qty}}

                                            </td>
                                            {{--                                            <td style="display: none">--}}
                                            {{--                                                {{$variation->weight}}--}}
                                            {{--                                            </td>--}}
                                            <td>
                                            {{$variation->weight}}

                                            </td>
                                            <td>
                                                <div class="actions">
                                                <button data-id="{{$variation->id}}" class="btn btn-sm bg-success-light mr-2 edit_btn" ><i class="fe fe-edit"></i></button>
                                                    <a href="{{route('product.variations.delete_var',$variation->id)}}"
                                                       class="btn btn-sm bg-danger-light bs_delete"
                                                       title="Delete"
                                                       data-route="{{route('product.variations.delete_var',$variation->id)}}">
                                                        <i class="fe fe-trash"></i>
                                                    </a>
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
    </div>


<div class="modal fade" id="edit_var_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Variation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('product.variations.edit_var')}}"
                                              method="post">
                                            @csrf
      <input value="" hidden name="id" id="id"/>
      <div class="modal-body">

            <div class="col-md-12">
                <div class="form-group">
                    <label>Album</label>
                    <select id="album" name="album_id" class="form-control">
                        <option selected disabled>Album</option>
                        @foreach(App\ProductAlbum::whereProductId($product_id)->get()->unique('title') as $album)
                            <option
                                title="{{$album->title}}"
                                value="{{$album->id}}"
                            >{{ucwords($album->title)}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Variation</label>
                    <select class="form-control @error('variation') is-invalid @enderror"
                            id="variation" data-route="" name="variation_id">
                        <option value="" disabled>Choose Variation</option>
                        @foreach(App\Variation::all() as $variation)
                            <option
                                title="{{$variation->title}}"
                                value="{{$variation->id}}">{{ucwords($variation->title)}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('variations'))
                        @foreach($errors->get('variations') as $message)
                            <span style="color:red">{{$message}}</span>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Size</label>
                    <select class="form-control @error('sizes') is-invalid @enderror"
                            id="size" data-route="" name="size_id">
                        <option value="" disabled>Choose Size</option>
                        @foreach(App\Size::all() as $size)
                            <option value="{{$size->id}}">{{ucwords($size->size)}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('sizes'))
                        @foreach($errors->get('sizes') as $message)
                            <span style="color:red">{{$message}}</span>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Width</label>
                    <select class="form-control @error('widths') is-invalid @enderror"
                            id="width" data-route="" name="width_id">
                        <option value="" disabled>Choose Size</option>
                        @foreach(App\Width::all() as $width)
                            <option value="{{$width->id}}">{{ucwords($width->width)}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('widths'))
                        @foreach($errors->get('widths') as $message)
                            <span style="color:red">{{$message}}</span>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" id="price" value="" class="form-control" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Weight</label>
                    <input type="number" name="weight" id="weight" value="" class="form-control" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="description" id="description" value="" class="form-control" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="qty" id="qty" value="" class="form-control" required>
                </div>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            var variant = 0
            $('#variations').select2();
            $('#sizes').select2();
            $('#widths').select2();
            $('.input-images').imageUploader({Default: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml']});
            $('#add_variant_btn').on('click', function () {
                if (variant === 0) {
                    $('#variants').append(`<div class="col-md-6"><div class="form-group"><label>Width</label>
                     <select class="form-control @error("widths") is-invalid @enderror"id="widths" data-route="" name="widths[]" multiple><option value="" disabled>
                     Choose Width
                     </option>
                     @foreach(App\Width::all() as $width)
                     <option value="{{$width->id}}">{{ucwords($width->width)}}</option>
                     @endforeach
                     </select> </div></div>`);

                    $(this).hide();
                }
            })

            $(".edit_btn").on('click',function(){
                var id=$(this).attr("data-id");
                $.ajax({
                    url:"{{route('product.variations.edit')}}",
                    type:'post',
                    data:{
                        id:$(this).attr("data-id"),
                        _token:'{{csrf_token()}}'
                    }

                })
                .done(function(result) {
                    $('#id').val(id);
                    $('#album').val(''+result['album_id']+'');
                    $('#variation').val(''+result['variation_id']+'');
                    $('#width').val(''+result['width_id']+'');
                    $('#size').val(''+result['size_id']+'');
                    $('#price').val(result['price']);
                    $('#weight').val(result['weight']);
                    $('#description').val(result['description']);
                    $('#qty').val(result['qty']);
                    $('#edit_var_modal').modal('show');
                });
            })
        })
    </script>
@endsection
