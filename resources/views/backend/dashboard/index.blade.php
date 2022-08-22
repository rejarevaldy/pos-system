@extends('templates.admin')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <div class="title">
                    <h4>{{ $title ?? '' }}</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        @foreach ($breadcrumb as $key => $item)
                            @if (count($breadcrumb) - 1 == $key)
                                <li class="breadcrumb-item">
                                    <a href="#">{{ Str::ucfirst($item) }}</a>
                                </li>
                            @else
                                <li class="breadcrumb-item active" aria-current="page">{{ Str::ucfirst($item) }}
                                </li>
                            @endif
                        @endforeach
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row-fix ">
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <h1>test</h1>
        </div>
    </div>
    </div>
@endsection
