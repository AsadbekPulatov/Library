@extends('admin.master')
@section('content')
    <div class="row">
        @foreach($sum as $key => $item)
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $item }}</h3>

                        <p>{{ $types[$key] }}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-chart-bar"></i>
                    </div>
                    <a href="{{ route('books.index', ['type_id' => $key]) }}" class="small-box-footer">
                        {{ __("messages.more_info") }} <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
