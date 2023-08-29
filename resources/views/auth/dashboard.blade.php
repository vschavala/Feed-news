@extends('auth.layouts')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            @if (session('bookmarked'))
                <div class="alert alert-success">
                    {{ session('bookmarked') }}
                </div>
            @endif
            @if ($bookmarked)
                <div class="card">
                    <div class="card-header">Book Marked</div>
                    <div class="card-body">
                        <section class="section-01">
                            <div class="container">
                                <div class="row">


                                    @foreach ($bookmarked as $markedData)
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <form method="post" action="{{ route('bookmars.store') }}">
                                                    @csrf
                                                    <div class="card"> <img class="img-fluid" name="urlimage"
                                                            src="{{ $markedData->urlToImage }}" alt="">

                                                        <div class="card-body">
                                                            <div class="news-title"><a href="{{ $markedData->url }}"
                                                                    target="_blank">
                                                                    <h6 class=" title-small">{{ $markedData->title }}</h6>
                                                                </a></div>


                                                            <p class="card-text">{{ $markedData->description }}</p>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Feed List</div>
                <div class="card-body">
                    <section class="section-01">
                        <div class="container">
                            <div class="row">

                                @foreach ($newsFeedData as $feedData)
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <form method="post" action="{{ route('bookmars.store') }}">
                                                @csrf
                                                <div class="card"> <img class="img-fluid" name="urlimage"
                                                        src="{{ $feedData->urlToImage }}" alt="">
                                                    <input type="hidden" name="title" value="{{ $feedData->title }}">
                                                    <input type="hidden" name="link" value="{{ $feedData->url }}">

                                                    <div class="card-body">
                                                        <div class="news-title"><a href="{{ $feedData->url }}"
                                                                target="_blank">
                                                                <h5 class=" title-small">{{ $feedData->title }}</h5>
                                                            </a></div>


                                                        <p class="card-text">{{ $feedData->description }}</p>
                                                        <input type="hidden" name="description"
                                                            value="{{ $feedData->description }}">
                                                        <p class="card-text"><small
                                                                class="text-time"><em>{{ $feedData->publishedAt }}</em></small>
                                                        </p>
                                                        <input type="hidden" name="imageurl"
                                                            value="{{ $feedData->urlToImage }}">

                                                        <button class="btn btn-primary" type="submit">BookMark</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
