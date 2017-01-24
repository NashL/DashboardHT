<?php
static $num_artists = 30;
static $min_genders = 1;
static $min_followers = 5000;
static $min_popularity = 50;

$url = 'https://api.spotify.com/v1/search?q=ryan&type=artist&limit=' . $num_artists;
$artist_json = file_get_contents($url);
$artist_array = json_decode($artist_json, true)['artists']['items'];

// percentages_variables
$profile_image_percentage = $followers_percentage = $popularity_percentage = $genders_percentage = 0.0;

function get_percentage_by_num_artists($percentage, $round_precision = 2)
{
    global $num_artists;
    if ($percentage <= 0)
        return 0;

    $result = ($percentage * 100) / $num_artists;
    return round($result, $round_precision);
}

function calculate_percentages_variables()
{
    global $artist_array, $min_genders, $min_followers, $min_popularity;
    global $profile_image_percentage, $followers_percentage, $popularity_percentage, $genders_percentage;
    $profile_image_count = $followers_count = $popularity_count = $genders_count = 0;

    foreach ($artist_array as $artist) {
        if (!empty($artist['images'])) {
            $profile_image_count++;
        }
        if (count($artist['genres']) >= $min_genders) {
            $genders_count++;
        }
        if ($artist['followers']['total'] >= $min_followers) {
            $followers_count++;
        }
        if (intval($artist['popularity']) >= $min_popularity) {
            $popularity_count++;
        }
    }
    $profile_image_percentage = get_percentage_by_num_artists($profile_image_count);
    $followers_percentage = get_percentage_by_num_artists($followers_count);
    $popularity_percentage = get_percentage_by_num_artists($popularity_count);
    $genders_percentage = get_percentage_by_num_artists($genders_count);
}

calculate_percentages_variables();

?>
