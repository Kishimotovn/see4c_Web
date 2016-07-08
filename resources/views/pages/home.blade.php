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

    <div class="row">

        <div class="col-lg-12">
            <h3 class="page-header">Timeline</h3>
        </div>

        <div id="chartParrent" class="col-lg-12">
            <canvas id="myLineChart" height="200" width="300"></canvas>
        </div>
    </div>

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
        $.ajax({url:'http://localhost:8000/data/data.json'})
          .fail(function(){alert("Im a failure")})
          .done(function(data){
            var myData = JSON.parse(data);
            //console.log(data);
            Array.prototype.mapProperty = function(property) {
                return this.map(function (obj) {
                    return obj[property];
                });
            };

            Array.prototype.mapTime = function(property) {
                return this.map(function (obj) {
                    var totalSec = obj[property] / 25;
                    var hours = parseInt( totalSec / 3600 ) % 24;
                    var minutes = parseInt( totalSec / 60 ) % 60;
                    var seconds = totalSec % 60;

                    var result = (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);
                    return result;
                });
            };

            // Example: myData.mapProperty('rank') to get an array of all ranks
            lineChartData = {
                labels : myData.mapTime('X'),
                datasets : [
                   {
                        label: "Y0",
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: "rgba(75,192,192,0.4)",
                        borderColor: "rgba(75,192,192,1)",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "rgba(75,192,192,1)",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(75,192,192,1)",
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data : myData.mapProperty('Y0')
                    },
                    {
                        label: "Y2",
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: "rgba(192,75,192,0.4)",
                        borderColor: "rgba(192,75,192,1)",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "rgba(192,75,192,1)",
                        pointBackgroundColor: "#000",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(192,75,192,1)",
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data : myData.mapProperty('Y2')
                    }
                ]
            };
            var ctx = document.getElementById("myLineChart").getContext("2d");

            var myLineChart = Chart.Line(ctx, {
                data: lineChartData,
                options: {
                    xAxes: [{
                        display: false
                    }]
                }
            });

            var z = document.getElementById("myLineChart")

            z.onclick = function(evt) {
                //alert('clicked');
                var activePoints = myLineChart.getElementsAtEvent(evt);
                console.log(activePoints);
                /* this is where we check if event has keys which means is not empty space */       
                if(Object.keys(activePoints).length > 0)
                {
                    var frameNumber = activePoints[0]["_index"];

                    var vid = document.getElementById("vid");
                    var sec = frameNumber / 25;

                    vid.currentTime = sec;

                }
            };

            var div = document.getElementById("chartParrent");
            div.style.display = 'block';
        });
        </script>
    @stop