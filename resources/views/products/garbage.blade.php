<div class="row mb-1">
                            @foreach($images as $image)
                            <div class="col-md-4">
                                <form action="{{route('product.album.update_360_image',$image->id)}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <img class="img-responsive" src="{{url($image->path)}}" alt="image" width="270"
                                             height="150">
                                        <input type="file" class="btn btn-secondary" name="path">
                                        <!-- <button class="btn btn-secondary">upload</button> -->
                                        <button type="submit" class="btn btn-primary ">Submit</button>
                                        <button type="submit" value="reset" name="action" class="btn btn-secondary ">Reset</button>
                                    </div>
                                </form>
                            </div>
                            @endforeach