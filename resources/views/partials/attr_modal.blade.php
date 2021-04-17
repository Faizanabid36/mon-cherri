<div class="modal fade bs_edit_modal" tabindex="-1" role="dialog" aria-labelledby="BrandzshopEditModal" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="edit_data">
        
      </div>
    </div>
  </div>
</div>
<div class="modal bs_delete_modal" tabindex="-1" role="dialog" aria-labelledby="BrandzshopDeleteModal" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="icon-box">
          <i class="material-icons">&#xE5CD;</i>
        </div>        
        <br>
        <h4 class="modal-title">Are you sure?</h4>  
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete these records?</p>
      </div>
      <div class="modal-footer">
        <form action="#" method="post" id="bs_delete_form">
              @csrf
            <input type="hidden" name="_method" value="delete">
            <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger btn-sm">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>