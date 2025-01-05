<?php
include('../config/db.php');

// Fetch all locations and display them in the table
$sql = "SELECT area.area_id, country.country_name, state.state_name, city.city_name, area.area_name, area.location_name
        FROM area
        JOIN city ON area.city_id = city.city_id
        JOIN state ON city.state_id = state.state_id
        JOIN country ON state.country_id = country.country_id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['country_name']}</td>
                <td>{$row['state_name']}</td>
                <td>{$row['city_name']}</td>
                <td>{$row['area_name']}</td>
                <td>{$row['location_name']}</td>
                <td>
                    <button class='edit-btn Yellow-btn' data-id='{$row['area_id']}'>Edit</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No locations found</td></tr>";
}
