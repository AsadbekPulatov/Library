@extends('admin.master')
{{--@section('title', 'Фермерлар')--}}
@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: x-large">{{ __("messages.books") }}</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div>
                            <a href="{{ route('books.create') }}" class="btn btn-success">
                                <i class="fa fa-plus"></i> {{ __("messages.add") }}
                            </a>
                        </div>
                        <div>
                            <button type="button" class="btn btn-success ml-3" data-toggle="modal"
                                    data-target="#modal-create">
                                <i class="fa fa-upload"></i> {{ __("messages.import") }}
                            </button>
                        </div>
                        <div class="modal fade" id="modal-create">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ __("messages.import") }}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{route('books.import')}}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="file">{{ __("messages.file_upload") }}:</label>
                                                    <input type="file" name="file" class="form-control" id="file"
                                                           required>
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
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __("messages.book_name") }}</th>
                                <th>{{ __("messages.author_name") }}</th>
                                <th>{{ __("messages.language") }}</th>
                                <th>{{ __("messages.year") }}</th>
                                <th>{{ __("messages.count") }}</th>
                                <th>{{ __("messages.price") }}</th>
                                <th>{{ __("messages.type_name") }}</th>
                                <th>{{ __("messages.action") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $item)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{ $item->book_name }}</td>
                                    <td>{{ $item->author_name }}</td>
                                    <td>{{ $item->language }}</td>
                                    <td>{{ $item->year }}</td>
                                    <td>{{ $item->count }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        @if(isset($item->type->name))
                                            {{ $item->type->name }}
                                        @endif
                                    </td>
                                    <td class="d-flex">

                                        <a href="{{ route('books.edit', $item->id) }}" class="btn btn-warning">
                                            <i class="fa fa-pen"></i>
                                        </a>


                                        <form action="{{route('books.destroy', $item->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger show_confirm"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $books->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

        </div>
        <!-- /.col-md-6 -->
    </div>
@endsection
@section('custom-scripts')
    <script>

        @if ($message = Session::get('success'))
        toastr.success("{{$message}}");
        @endif

    </script>
@endsection
