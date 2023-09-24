<div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Select from playlist</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form action="/savePlaylist" method="post">
              <!-- <p id="modalData"></p> -->
                <input type="hidden" id="SongID" name="SongID">
                  <select  name="playlistID" class="form-control" >
                    <?php foreach ($playlists as $playlist): ?>
                  
                    <option value="<?=$playlist['playlist_ID']?>" >
                      <?=$playlist['playlistName']?></option>
                  <?php endforeach;?>
                  </select>
                <input type="submit" name="add">
              </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>