<?php
    include 'php/main.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard HT</title>
    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS without progress-bar component -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <!-- Circle progress css -->
    <link rel="stylesheet" href="css/jQuery-plugin-progressbar.css">
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Example Dashboard</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="https://play.google.com/store/music" target="_blank">Google Play</a></li>
                <li><a href="https://play.spotify.com/" target="_blank">Spotify</a></li>
                <li><a href="http://www.apple.com/apple-music/" target="_blank">Apple Music</a></li>
                <li><a href="https://soundcloud.com/" target="_blank">SoundCloud</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Overview </a></li>
                <li><a href="https://play.spotify.com/" target="_blank">Spotify</a></li>
                <li><a href="http://www.apple.com/apple-music/" target="_blank">Apple Music</a></li>
                <li><a href="https://soundcloud.com/" target="_blank">SoundCloud</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Dashboard</h1>
            <div class="row placeholders">
                <div class="col-xs-6 col-sm-3 ">
                    <div class="progress-bar position"
                        <?php echo 'data-percent="' . $profile_image_percentage . '"'; ?>
                         data-color="#ccc,RoyalBlue"></div>
                    <span class="text-muted"> artists have an profile image </span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <div class="progress-bar position"
                        <?php echo 'data-percent="' . $followers_percentage . '"'; ?>
                         data-color="#ccc,LightCoral"></div>
                    <span class="text-muted">artists have less than 5000 followers</span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <div class="progress-bar position"
                        <?php echo 'data-percent="' . $popularity_percentage . '"'; ?>
                         data-color="#ccc,LightSalmon"></div>
                    <span class="text-muted">artists with a popularity more than 50</span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <div class="progress-bar position"
                        <?php echo 'data-percent="' . $genders_percentage . '"'; ?>
                         data-color="#ccc,MediumSpringGreen"></div>
                    <span class="text-muted">artists sing more than 1 gender</span>
                </div>
            </div>

            <h2 class="sub-header">Spotify Artists</h2>
            <div class="table-responsive">
                <table id="artist-table" class="table table-striped table-bordered table-responsive table-hover">
                    <thead class="thead-inverse">
                    <tr>
                        <th>Artist Name</th>
                        <th>Genders</th>
                        <th>Followers</th>
                        <th>Popularity</th>
                        <th>URL</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($artist_array as $artist) {
                        echo "
                          <tr>
                            <th> " . $artist['name'] . "</th>
                            <th> " . $artist['genres'][0];
                        $genres_zize = count($artist['genres']);
                        for ($i = 1; $i < $genres_zize; ++$i) {
                            echo ", " . $artist['genres'][$i];
                        }
                        echo "
                            </th>
                            <th> " . $artist['followers']['total'] . "</th>
                            <th> " . $artist['popularity'] . "</th>
                            <th> <a  href='" . $artist['external_urls']['spotify'] . "' target='_blank'>" .
                            $artist['external_urls']['spotify'] . "</a></th>
                            <th> <img src='" . $artist['images'][0]['url'] . "' width='50px'></th>
                          </tr>";
                    }
                    ?>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script src="js/jQuery-plugin-progressbar.js"></script>
<script src="js/main.js"></script>
</body>
</html>

