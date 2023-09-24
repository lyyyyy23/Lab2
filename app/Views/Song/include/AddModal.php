<div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Song</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

    <form action= "/saveSong" method="post" enctype= "multipart/form-data" >
        <div class="input-group mb-3">
            <label class="input-group-text" for ="inputGroupFile02">Upload Songs</label>
            <input type="file" class="form-control col-6" id="inputGroupFile02" name="songFile">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      

    </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>