<!DOCTYPE html>
<html>
<head>
    <title>Weather App</title>
</head>
<body>

<h2>Select a City</h2>

<form method="post">
    <label for="city">City:</label>
    <select id="city" name="city">
        <option value="London">London</option>
        <option value="New-York">New-York</option>
        <option value="Tokyo">Tokyo</option>
        <option value="Ahmedabad">Ahmedabad</option>
        <option value="Gandhinagar">Gandhinagar</option>
        <option value="Mehsana">Mehsana</option>
        <option value="Visnagar">Visnagar</option>
        <option value="Unjha">Unjha</option>
        <option value="Mumbai">Mumbai</option>
        <option value="Bangalore">Bangalore</option>
        <option value="Delhi">Delhi</option>
        <option value="Chennai">Chennai</option>
        <option value="Melbourne">Melbourne</option>
        <option value="California">California</option>
        <option value="Kolkata">Kolkata</option>
        <!-- Add more cities as needed -->
    </select>
    <button type="submit">Get Weather</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace 'YOUR_API_KEY' with your actual API key
    $apiKey = 'YOUR_API_KEY';
    $city = $_POST['city'];

    // Create API URL
    $url = "http://api.weatherapi.com/v1/current.json?key={$apiKey}&q={$city}";

    // Fetch data from the API
    $response = file_get_contents($url);

    // Decode JSON response
    $data = json_decode($response, true);

    // Check if data is successfully fetched
    if ($data && isset($data['current'])) {
        // Extract relevant weather information
        $temperature = $data['current']['temp_c'];
        $weatherDescription = $data['current']['condition']['text'];

        // Output the weather information
        echo "<h2>Weather in {$city}</h2>";
        echo "Current temperature: {$temperature}°C<br>";
        echo "Weather: {$weatherDescription}";
    } else {
        echo "Failed to fetch weather data";
    }
}
?>

</body>
</html>
