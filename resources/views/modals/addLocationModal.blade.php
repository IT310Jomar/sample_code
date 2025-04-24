<!-- Modal -->
<div class="modal addModal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeData()">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
            </div>
            <div class="modal-body">
                {{-- modal body --}}
                <div class="form-group">
                    <label for="deptName">Location Name:</label>
                    <input type="text" class="form-control test" id="locationName">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect2"></label>
                    <select class="form-control countryData" id="exampleFormControlSelect2">
                        @foreach ($country as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    onclick="closeData()">Close</button>
                <button type="button" class="btn btn-primary submitLoc">Save changes</button>
            </div>
        </div>
    </div>
</div>
