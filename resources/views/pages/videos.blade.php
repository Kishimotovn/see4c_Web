@extends('layout')

@section('content')
    <!-- Portfolio Item Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Video Title
                <small>{{count($clips)}}</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <div class="row">

        <div class="col-lg-12">
            <h3 class="page-header">All Nature Videos:</h3>
        </div>
    </div>
    <ul class="list-unstyled video-list-thumbs row">
        @foreach ($clips as $clip)
        <li class="col-lg-3 col-sm-4 col-xs-6">
            <a href="#" title="Claudio Bravo, antes su debut con el Barça en la Liga">
                <img src="http://i.ytimg.com/vi/ZKOtE9DOwGE/mqdefault.jpg" alt="Barca" class="img-responsive" height="130px" />
                <h2>{{ $clip->videoName }}</h2>
                <span class="glyphicon glyphicon-play-circle"></span>
                <span class="duration">03:15</span>
            </a>
        </li>
        @endforeach
    </ul>
    <!-- /.row -->

    <hr>
@stop