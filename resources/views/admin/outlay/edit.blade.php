@extends('admin.master')
{{--@section('title', 'Фермерни таҳрирлаш')--}}
@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: x-large">Фермерни таҳрирлаш</h3>
                </div>
                <form method="post" action="{{route('books.update', $book->id)}}" id="form">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="book_name">{{ __("messages.book_name") }}:</label>
                            <input type="text" name="book_name" class="form-control" id="book_name" required
                                   value="{{ $book->book_name }}">
                        </div>
                        <div class="form-group">
                            <label for="author_name">{{ __("messages.author_name") }}:</label>
                            <input type="text" name="author_name" class="form-control" id="author_name" required
                                   value="{{ $book->author_name }}">
                        </div>
                        <div class="form-group">
                            <label for="language">{{ __("messages.language") }}:</label>
                            <input type="text" name="language" class="form-control" id="language" required
                                   value="{{ $book->language }}">
                        </div>
                        <div class="form-group">
                            <label for="year">{{ __("messages.year") }}:</label>
                            <input type="number" name="year" class="form-control" id="year" min="1900" max="9999"
                                   required value="{{ $book->year }}">
                        </div>
                        <div class="form-group">
                            <label for="count">{{ __("messages.count") }}:</label>
                            <input type="number" name="count" class="form-control" id="count" required
                                   value="{{ $book->count }}">
                        </div>
                        <div class="form-group">
                            <label for="price">{{ __("messages.price") }}:</label>
                            <input type="text" name="price" class="form-control" id="price" required
                                   value="{{ $book->price }}">
                        </div>
                        <div class="form-group">
                            <label for="type_id">{{ __("messages.type_name") }}:</label>
                            <select name="type_id" class="form-control" id="type_id" required>
                                @foreach($types as $type)
                                    @if($type->id == $book->type_id)
                                        <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                                    @else
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">{{__("messages.save")}}</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.col-md-6 -->
    </div>
@endsection
