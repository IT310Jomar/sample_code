

<!-- Modal -->
<div class="modal editModal" tabindex="-1">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Location</h5>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeData()">
            <i class="tim-icons icon-simple-remove"></i>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="forEdit" id="forEdit" readonly hidden >
            <label for="deptName">Location Name:</label>
            <input type="text" class="form-control test" id="toUpdateInput">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="closeData()">Close</button>
          <button type="button" class="btn btn-primary updateBtn">Update</button>
        </div>
      </div>
    </div>
  </div>