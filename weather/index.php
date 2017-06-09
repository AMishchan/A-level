<!DOCTYPE html>

<html>
    <head>
        <title>Weather</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body>
        <form name="weatherForm" action="index.php" method="GET">
            <h1>weather today</h1>
            Enter your city: <input type="text" name="city" placeholder="city"/></br>
            Enter your country: <input type="text" name="country" placeholder="country"/></br>
            <input type="submit" name="submit" value="submit"/>
        </form>
        <br/>
        <hr/>

        <?php
        if (isset($_GET)) {
            $user_city = $_GET['city'];
            $user_country = $_GET['country'];

            $api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $user_city . "," . $user_country . "&APPID=955ad6b8aedd837cd0a471013718e9ad";
            $weather_data = file_get_contents($api_url);
            $json = json_decode($weather_data, TRUE);
            $user_temp = $json['main']['temp'];
            $user_humidity = $json['main']['humidity'];
            $user_conditions = $json['weather'][0]['main'];
            $user_wind = $json['wind']['speed'];
            $user_wind_direction = $json['wind']['deg'];
           
            echo"<strong> City: </strong>" . $user_city . "</br>";
            echo"<strong> Country: </strong>" . $user_country . "</br>";
            echo"<strong> Humidity: </strong>" . $user_humidity . "</br>";
            echo"<strong> Current conditions: </strong>" . $user_conditions . "</br>";
            echo"<strong> Wind speed: </strong>" . $user_wind . "</br>";
            echo"<strong> Wind direction: </strong>" . $user_wind_direction . "</br>";
            echo"<strong> Current temperature: </strong>" . $user_temp . "</br>";
            echo '<pre>';
            print_r($json);
            echo '</pre>';
        };
        ?>
        <?php
        if (isset($_GET['submit'])) {
            $data = "data.json";
            $json_string = json_encode($_GET);
            file_put_contents($data, $json_string, FILE_APPEND);
        }
        ?>
    </body>
</html>

