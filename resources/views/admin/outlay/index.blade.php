@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: x-large">{{ __("messages.outlays") }}</h3>
                </div>
                <div class="card-body">
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
                            @foreach($outlays as $item)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{ $item->book->book_name }}</td>
                                    <td>{{ $item->book->author_name }}</td>
                                    <td>{{ $item->book->language }}</td>
                                    <td>{{ $item->book->year }}</td>
                                    <td>{{ $item->count }}</td>
                                    <td>{{ $item->book->price }}</td>
                                    <td>
                                        @if(isset($item->book->type->name))
                                            {{ $item->book->type->name }}
                                        @endif
                                    </td>
                                    <td class="d-flex">

                                        <a href="{{ route('outlays.edit', $item->id) }}" class="btn btn-warning">
                                            <i class="fa fa-pen"></i>
                                        </a>

                                        <form action="{{route('outlays.destroy', $item->id)}}" method="post">
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

                        {{ $outlays->links('pagination::bootstrap-5') }}
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
