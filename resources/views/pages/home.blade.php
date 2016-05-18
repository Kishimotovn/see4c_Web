@extends('layout')

@section('content')
    <!-- Portfolio Item Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Video Title
                <small>Video Category</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-8">
            <!-- <img class="img-responsive" src="{{url('/img/1.png')}}" alt=""> -->
            <video id="vid" width="750" height="500" controls>
			  <source src="http://pageperso.lif.univ-mrs.fr/~anh.phan.tran/video.mp4" type="video/mp4">
			  Your browser does not support HTML5 video.
			</video>
			<!-- <iframe width="750" height="500" src="//www.youtube.com/embed/BstTBw6BLrE" frameborder="0" allowfullscreen></iframe> -->
        </div>

        <div class="col-md-4">
    		<row>
    			<div class="input-group">
				  <span class="input-group-addon">frame:</span>
				  <input id="input" type="number" class="form-control" aria-label="Frame Number" placeholder="25fps">
				  <span id="btn" class="input-group-addon" onclick="clicked()">Go</span>
				</div>
				<div></div>

    		</row>
        	<row>
        		<h3>Charts:</h3>
	               <canvas id="myLineChart" height="200"></canvas>
	            <h3>Project Details</h3>
	            <ul>
	                <li>Lorem Ipsum</li>
	                <li>Dolor Sit Amet</li>
	                <li>Consectetur</li>
	                <li>Adipiscing Elit</li>
	            </ul>
        	</row>
        </div>

    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <div class="row">

        <div class="col-lg-12">
            <h3 class="page-header">Related Projects</h3>
        </div>

        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
            </a>
        </div>

        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
            </a>
        </div>

        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
            </a>
        </div>

        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
            </a>
        </div>

    </div>
    <!-- /.row -->

    <hr>
@stop

@section('footer')
	<script type="text/javascript">
		function clicked() {
			// var input = document.getElementById("input");
			// var frameNumber = input.value;

			// var vid = document.getElementById("vid");
			// var sec = frameNumber / 25;

			// alert(sec);
			// vid.currentTime = sec;
        }
	</script>
    <script type="text/javascript">
        alert('lol');
        $.ajax({url:'http://localhost:8000/data/data.json'})
          .fail(function(){alert("Im a failure")})
          .done(function(data){
            //var myData = JSON.parse(data);
            console.log(data);
            Array.prototype.mapProperty = function(property) {
                return this.map(function (obj) {
                    return obj[property];
                });

            };

            // Example: myData.mapProperty('rank') to get an array of all ranks
            lineChartData = {
                labels : myData.mapProperty('X'),
                datasets : [
                   {
                       label: "My First dataset",
                       fillColor : "rgba(220,220,220,0.2)",
                       strokeColor : "rgba(220,220,220,1)",
                       pointColor : "rgba(220,220,220,1)",
                       pointStrokeColor : "#fff",
                       pointHighlightFill : "#fff",
                       pointHighlightStroke : "rgba(220,220,220,1)",
                       data : myData.mapProperty('Y0')
                    }
                ]
            };


            console.log("cheerio")
            var ctx = document.getElementById("myLineChart").getContext("2d");
            window.myLine = new Chart(ctx).Line(lineChartData);
        });
    </script>