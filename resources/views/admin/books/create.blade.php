@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: x-large">{{ __("messages.books_add") }}</h3>
                </div>
                <form method="post" action="{{route('books.store')}}" id="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="book_name">{{ __("messages.book_name") }}:</label>
                            <input type="text" name="book_name" class="form-control" id="book_name" required>
                        </div>
                        <div class="form-group">
                            <label for="author_name">{{ __("messages.author_name") }}:</label>
                            <input type="text" name="author_name" class="form-control" id="author_name" required>
                        </div>
                        <div class="form-group">
                            <label for="language">{{ __("messages.language") }}:</label>
                            <input type="text" name="language" class="form-control" id="language" required>
                        </div>
                        <div class="form-group">
                            <label for="year">{{ __("messages.year") }}:</label>
                            <input type="number" name="year" class="form-control" id="year" min="1900" max="9999" required>
                        </div>
                        <div class="form-group">
                            <label for="count">{{ __("messages.count") }}:</label>
                            <input type="number" name="count" class="form-control" id="count" required>
                        </div>
                        <div class="form-group">
                            <label for="price">{{ __("messages.price") }}:</label>
                            <input type="text" name="price" class="form-control" id="price" required>
                        </div>
                        <div class="form-group">
                            <label for="type_id">{{ __("messages.type_name") }}:</label>
                            <select name="type_id" class="form-control" id="type_id" required>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
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
