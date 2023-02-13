<div class="modal fade" id="modal-filter">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __("messages.filter") }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" action="{{route('books.index')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __("messages.year") }}</label>
                            <select class="select2-multiple-1 form-control" id="select2Multiple1" multiple="multiple"
                                    data-placeholder="Select a State" style="width: 100%;" name="year[]">
                                @foreach($years as $key => $item)
                                    <option value="{{ $item->year }}">{{ $item->year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{ __("messages.type_name") }}</label>
                            <select class="select2-multiple-2 form-control" id="select2Multiple2" multiple="multiple"
                                    data-placeholder="Select a State" style="width: 100%;" name="type_id[]">
                                @foreach($types as $item)
                                    <option value="{{ $item->type->id }}">{{ $item['type']['name'] }}</option>
                                @endforeach
                            </select>
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
