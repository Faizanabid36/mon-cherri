@extends('layouts.app')
@section('title', 'Dashboard - Create Variation')
@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary btn-lg">
                        <a href="{{url()->previous()}}" class="text-white"><i
                                class="fe fe-arrow-left">{{' '}}{{ __('Back') }}</i></a>
                    </button>
                </div>
            </div>
        </div>
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Navigation Links</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{url('/products')}}"
                               class="btn btn-danger btn-sm text-white mr-2">
                                <i class="fe fe-list-bullet"></i> Products
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{route('products.edit',$product_id)}}" class="btn btn-sm bg-success-light mr-2">
                                <i class="fe fe-pencil"></i> Edit
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('product.album.product_album',$product_id)}}"
                               class="btn btn-sm bg-warning-light"
                               data-route="{{route('product.album.product_album',$product_id)}}">
                                <i class="fe fe-file-image"></i> Album
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('product.variations.add',$product_id)}}"
                               class="btn btn-sm bg-info-light"
                               data-route="{{route('product.variations.get',$product_id)}}">
                                <i class="fe fe-activity"></i> Variations
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('product.center_stone.add',$product_id)}}"
                               class="btn btn-sm bg-secondary text-white"
                               data-route="{{route('product.center_stone.add',$product_id)}}">
                                <b><u><i><i class="fe fe-diamond"></i> Stone</i></u></b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Stones Details</h4>
                    </div>
                    <div class="card-body">
                        @foreach($errors->all() as $error)
                            <span style="color:red">{{$error}}</span>

                        @endforeach
                        <form action="{{route('product.center_stone.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input name="product_id" value="{{$product_id}}" hidden/>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Stone Shape</label>
                                                <select name="stone_shape" id="stone_shape" class="form-control">
                                                    <option value="" selected disabled>Select Shape</option>
                                                    @foreach($stone_shapes as $shape)
                                                        <option value="{{$shape}}">{{ucfirst($shape)}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('stone_shape'))
                                                    @foreach($errors->get('stone_shape') as $message)
                                                        <span style="color:red">{{$message}}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Color From</label>
                                                <select name="color_from" id="color_from" class="form-control">
                                                    <option value="" selected disabled>Select Starting Color</option>
                                                    @foreach($stone_colors as $stone_color)
                                                        <option
                                                            value="{{$stone_color->id}}">{{ucfirst($stone_color->title)}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('color_from'))
                                                    @foreach($errors->get('color_from') as $message)
                                                        <span style="color:red">{{$message}}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Color To</label>
                                                <select name="color_to" id="color_to" class="form-control">
                                                    <option value="" selected disabled>Select Ending Color</option>
                                                    @foreach($stone_colors as $stone_color)
                                                        <option
                                                            value="{{$stone_color->id}}">{{ucfirst($stone_color->title)}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('color_to'))
                                                    @foreach($errors->get('color_to') as $message)
                                                        <span style="color:red">{{$message}}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Clarity From</label>
                                                <select name="clarity_from" id="clarity_from" class="form-control">
                                                    <option value="" selected disabled>Select Starting Clarity</option>
                                                    @foreach($stone_clarities as $clarity)
                                                        <option
                                                            value="{{$clarity->id}}">{{ucfirst($clarity->title)}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('clarity_from'))
                                                    @foreach($errors->get('clarity_from') as $message)
                                                        <span style="color:red">{{$message}}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Clarity To</label>
                                                <select name="clarity_to" id="clarity_to" class="form-control">
                                                    <option value="" selected disabled>Select Ending Clarity</option>
                                                    @foreach($stone_clarities as $clarity)
                                                        <option
                                                            value="{{$clarity->id}}">{{ucfirst($clarity->title)}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('clarity_to'))
                                                    @foreach($errors->get('clarity_to') as $message)
                                                        <span style="color:red">{{$message}}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Size From</label>
                                                <input type="text" name="size_from" id="size_from" class="form-control">
                                                {{--                                                <select name="size_from" id="size_from" class="form-control">--}}
                                                {{--                                                    <option value="" selected disabled>Select Starting Size</option>--}}
                                                {{--                                                    @foreach($stone_sizes as $size)--}}
                                                {{--                                                        <option--}}
                                                {{--                                                            value="{{$size->id}}">{{ucfirst($size->title)}}</option>--}}
                                                {{--                                                    @endforeach--}}
                                                {{--                                                </select>--}}
                                                @if($errors->has('size_from'))
                                                    @foreach($errors->get('size_from') as $message)
                                                        <span style="color:red">{{$message}}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Size To</label>
                                                <input type="text" name="size_to" id="size_to" class="form-control">
{{--                                                <select name="size_to" id="size_to" class="form-control">--}}
{{--                                                    <option value="" selected disabled>Select Ending Size</option>--}}
{{--                                                    @foreach($stone_sizes as $size)--}}
{{--                                                        <option--}}
{{--                                                            value="{{$size->id}}">{{ucfirst($size->title)}}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
                                                @if($errors->has('size_to'))
                                                    @foreach($errors->get('size_to') as $message)
                                                        <span style="color:red">{{$message}}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>

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
                        <div class="card-title">Stones</div>
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
                                    <th>Shape</th>
                                    <th>Color From</th>
                                    <th>Color To</th>
                                    <th>Clarity From</th>
                                    <th>Clarity To</th>
                                    <th>Size From</th>
                                    <th>Size To</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product_stones as $stone)
                                    <tr>
                                        <td style="padding:10px 18px;">
                                            <input type="checkbox" value="{{$stone->id}}"
                                                   class="bs_dtrow_checkbox bs_checkItem">
                                            <input value="{{$stone->id}}" hidden name="id"/>
                                        </td>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ucfirst($stone->stone_shape)??""}}</td>
                                        <td>{{ucfirst($stone->p_color_from->title)??""}}</td>
                                        <td>{{ucfirst($stone->p_color_to->title)??""}}</td>
                                        <td>{{ucfirst($stone->p_clarity_from->title)??""}}</td>
                                        <td>{{ucfirst($stone->p_clarity_to->title)??""}}</td>
                                        <td>{{ucfirst($stone->size_from)??""}}</td>
                                        <td>{{ucfirst($stone->size_to)??""}}</td>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="edit_var_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
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
                                <input type="text" name="description" id="description" value="" class="form-control"
                                       required>
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
            $('.input-images').imageUploader({Default: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml']});
            $('#add_variant_btn').on('click', function () {
                if (variant === 0) {
                    $('#variants').append(' <div class="col-md-6"><div class="form-group"><label>Width</label> <select class="form-control @error("widths") is-invalid @enderror"id="widths" data-route="" name="widths[]" multiple><option value="" disabled>Choose Width</option> @foreach(App\Width::all() as $width)<option value="{{$width->id}}">{{ucwords($width->width)}}</option>@endforeach </select> </div></div>');
                    $('#widths').select2();
                    $(this).hide();
                }
            })

            $(".edit_btn").on('click', function () {
                var id = $(this).attr("data-id");
                $.ajax({
                    url: "{{route('product.variations.edit')}}",
                    type: 'post',
                    data: {
                        id: $(this).attr("data-id"),
                        _token: '{{csrf_token()}}'
                    }

                })
                    .done(function (result) {
                        $('#id').val(id);
                        $('#album').val('' + result['album_id'] + '');
                        $('#variation').val('' + result['variation_id'] + '');
                        $('#width').val('' + result['width_id'] + '');
                        $('#size').val('' + result['size_id'] + '');
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
