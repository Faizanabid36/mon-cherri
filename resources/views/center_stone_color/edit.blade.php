<form action="{{route('center_stone.color.update',$color->id)}}" method="post">
    <input type="hidden" name="_method" value="put">
    <input type="text" name="id" value="{{$color->id}}" hidden/>
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Color Title </label>
                <input type="text" name="title" value="{{ucwords($color->title)}}" class="form-control" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Color Ranking </label>
                <input type="text" name="priority" value="{{ucwords($color->priority)}}" class="form-control" required>
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success bs_dashboard_btn bs_btn_variation btn-block">UPDATE</button>
        </div>
    </div>
    </div>
</form>
