<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/animate.min.css" rel="stylesheet"/>
    <link href="bootstrap/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="img/sidebar-5.jpg">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <img src="https://www.georanker.com/app/themes/georanker/img/misc/logo/logo-georanker-header.png" title="GeoRanker" alt="GeoRanker">
            </div>

            <ul class="nav">
                <li>
                    <a href="index.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="new-report.php">
                        <i class="pe-7s-note"></i>
                        <p>New Report</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">New Report</a>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Create Report</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Type </label>
                                                <div class="dropdown">
                                                    <button id="drop-btn" class="btn btn-primary dropdown-toggle" style="border-color: #E3E3E3;color: #565656; background: transparent; width: 100%; text-align: left;" type="button" data-toggle="dropdown">ranktracker
                                                    <span class="caret" style="border-top-color: #565656;text-align: rigth;margin-left: 85%"></span></button>
                                                    <ul id="demolist" class="dropdown-menu" style="width: 100%;">
                                                        <li><a href="#">heatmap</a></li>
                                                        <li><a href="#">1stpage</a></li>
                                                        <li><a href="#">advertisers</a></li>
                                                        <li><a href="#">authors</a></li>
                                                        <li><a href="#">citations</a></li>
                                                        <li><a href="#">sitereport</a></li>
                                                        <li><a href="#">keywordrankings</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Keywords</label>
                                                <input type="email" class="form-control" placeholder="Keywords (Key1, Key2, Key3)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Countries</label>
                                                <input type="text" class="form-control" placeholder="Countries (BR, CA, GB, US)">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Search Engine</label>
                                                <input type="text" class="form-control" placeholder="Search Engine (google, googlelocal, yahoo)">
                                            </div>
                                        </div>
                                    </div> 

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Create</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                           
                            <div class="content">
                                <h3 class="title">Instructions</h><br/>
                                <br/>
                                <h5 class="title">Search Engines</h4><br/> 
                                <p class="form-control" style="height: 75px;">List of Search Engines (google, googlelocal, yahoo, bing, yandex, youtube, naverwebdocs, naverlocal, baidu,googlenews, googleimages). Default: google.
                                </p><br/>
                                <h5 class="title">Countries</h4><br/> 
                                <p class="form-control">List of Country codes. Use this param or Region.</p>
                                <br/>
                                <h5 class="title">Countries</h4><br/> 
                                <p class="form-control">List of Country codes. Use this param or Region.</p>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="index.php">
                                Home
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2017 <a href="https://github.com/hygorluz">Hygor Luz</a>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <script src="js/jquery-1.11.1.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap-checkbox-radio-switch.js"></script>
    <script src="bootstrap/js/bootstrap-notify.js"></script>
	<script src="bootstrap/js/light-bootstrap-dashboard.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            $('#demolist li a').on('click', function(){
                $('#drop-btn').val($(this).html());
                $('#drop-btn')[0].innerHTML = $(this).html();
                
            });
        });
    </script>

</html>
