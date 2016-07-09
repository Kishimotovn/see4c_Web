@extends('layout')

@section('content')
    <!-- Portfolio Item Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{$videosCount}} Videos
                <small>{{$category}} videos</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <div class="row" style="text-align: center">
    {!! $videos->render() !!}
    </div>
    <ul class="list-unstyled video-list-thumbs row">
        @foreach ($videos as $video)
        <li class="col-lg-3 col-sm-4 col-xs-6">
            <a href= "{{url($category . '/'. $video->videoName)}}" title="">
                <img src="{{$thumbLink}}" alt="{{$category}}" class="img-responsive" height="130px" />
                <h2>{{ $video->videoName }}</h2>
                <!-- <span class="glyphicon glyphicon-play-circle"></span> -->
                <span class="duration">03:15</span>
            </a>
        </li>
        @endforeach
    </ul>
    <!-- /.row -->

    <hr>
@stop