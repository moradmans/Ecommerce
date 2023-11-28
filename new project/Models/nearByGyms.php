<?php
include_once "dbCon.php";

class Gym {
     public function addGym($name, $address) {
        global $conn;

        // Use OpenCage Geocoding API to get latitude and longitude from the address
        $addressForGeocoding = urlencode($address);
        $apiKey = "6a96d8f092364ab0b1676a10aa58a59d"; // Replace with your actual OpenCage API key
        $geocodeUrl = "https://api.opencagedata.com/geocode/v1/json?q={$addressForGeocoding}&key={$apiKey}";

        $geocodeResponse = file_get_contents($geocodeUrl);
        $geocodeData = json_decode($geocodeResponse);

        // Check if geocoding was successful
        if ($geocodeData && $geocodeData->status->code == 200) {
            $location = $geocodeData->results[0]->geometry;

            // Insert the gym with latitude, longitude, and name into the database
            $sql = "INSERT INTO gyms (name, address, lat, lng) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("ssdd", $name, $address, $location->lat, $location->lng);
                $stmt->execute();
                $stmt->close();

                return true; // Gym added successfully
            } else {
                // Handle prepared statement creation error
                echo "Error: " . $conn->error;
                return false; // Failed to add gym
            }
        } else {
            // Handle geocoding error
            echo "Geocoding failed for address: {$address}";
            return false; // Failed to add gym
        }
    }

    public function getGyms() {
        global $conn;
    
        $gyms = [];
    
        // Sample query to retrieve gym data
        $query = "SELECT name, lat, lng FROM gyms";
        $result = mysqli_query($conn, $query);
    
        // Check for errors in the query
        if (!$result) {
            die('Query failed: ' . mysqli_error($conn));
        }
    
        // Fetch gym data from the result set
        while ($row = mysqli_fetch_assoc($result)) {
            $gyms[] = $row;
        }
    
        // Close the result set
        mysqli_free_result($result);
    
        return $gyms;
    }
    
}
?>
