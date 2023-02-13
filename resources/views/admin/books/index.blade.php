@extends('admin.master')
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
                        <div>
                            <button type="button" class="btn btn-success ml-3" data-toggle="modal"
                                    data-target="#modal-filter">
                                <i class="fa fa-filter"></i> {{ __("messages.filter") }}
                            </button>
                        </div>
                        @include('admin.books.modal_upload')
                        @include('admin.books.modal_outlay')
                        @include('admin.books.modal_filter')
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

                                        <button type="button" onclick="outlay({{ $item->id }}, {{ $item->count }})"
                                                class="btn btn-success ml-3" data-toggle="modal"
                                                data-target="#modal-car">
                                            <i class="fa fa-car"></i>
                                        </button>

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

        function outlay(id, count) {
            $('#book_id').val(id);
            $('#count').attr('max', count);
        }

    </script>
@endsection
