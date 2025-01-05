<?php
$current_date = date('Y-m-d');

// Initialize counters
$upcoming_count = 0;
$active_count = 0;
$completed_count = 0;

$sql = "SELECT campaign_id, campaign_name, start_date, end_date FROM campaign";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $campaign_id = $row['campaign_id'];
    $start_date = $row['start_date'];
    $end_date = $row['end_date'];

    // Determine the status of the campaign
    if ($current_date < $start_date) {
        $status = 'upcoming';
        $upcoming_count++;  // Increment upcoming counter
    } elseif ($current_date >= $start_date && $current_date <= $end_date) {
        $status = 'active';
        $active_count++;  // Increment active counter
    } else {
        $status = 'completed';
        $completed_count++;  // Increment completed counter
    }
    // Update the status in the database
    $update_sql = "UPDATE campaign SET status='$status' WHERE campaign_id=$campaign_id";
    mysqli_query($conn, $update_sql);
}

// Total campaigns count
$total_campaigns = $upcoming_count + $active_count + $completed_count;

// Prepare data for JavaScript
$campaignCounts = [
    'upcoming' => $upcoming_count,
    'active' => $active_count,
    'completed' => $completed_count,
];

// echo this data for use in chart.js
echo "<script>
    const campaignCounts = " . json_encode($campaignCounts) . ";
</script>";
