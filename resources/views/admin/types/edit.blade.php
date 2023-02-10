
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __("messages.types_edit") }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('types.store')}}" method="post" id="edit_form">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="edit_id">{{ __("messages.type_id") }}:</label>
                            <input type="number" name="id" class="form-control" id="edit_id" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_name">{{ __("messages.type_name") }}:</label>
                            <input type="text" name="name" class="form-control" id="edit_name" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ __("messages.close") }}</button>
                        <button type="submit" class="btn btn-primary">{{ __("messages.save") }}</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
