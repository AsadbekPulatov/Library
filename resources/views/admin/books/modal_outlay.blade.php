<div class="modal fade" id="modal-car">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __("messages.outlay") }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('outlays.store')}}">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="book_id" class="form-control" id="book_id">
                        <div class="form-group">
                            <label for="count">{{ __("messages.count") }}:</label>
                            <input type="number" name="count" class="form-control" id="count"
                                   min="1" value="1">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">{{ __("messages.close") }}</button>
                        <button type="submit"
                                class="btn btn-primary">{{ __("messages.save") }}</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
