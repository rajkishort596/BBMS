<?php
include('../config/db.php');
session_start();
$user = $_SESSION['usertype'];
//Fetch campaign information 
$campaign_sql = "SELECT * FROM campaign WHERE status <> 'completed'";
$campaign_res = mysqli_query($conn, $campaign_sql);


if ($campaign_res && mysqli_num_rows($campaign_res) > 0) {
    // Loop through the result set and fetch each campaign
    while ($row = mysqli_fetch_assoc($campaign_res)) {
        echo '
               <div class="campaign-card card flex-column">
                    <h4>' . $row['campaign_name'] . '</h4>
                    <div class="flex duration">
                        <svg height="24" version="1.1" width="24" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
                            <g transform="translate(0 -1028.4)">
                                <path d="m5 1032.4c-1.1046 0-2 0.9-2 2v14c0 1.1 0.8954 2 2 2h6 2 6c1.105 0 2-0.9 2-2v-14c0-1.1-0.895-2-2-2h-6-2-6z" fill="#bdc3c7" />
                                <path d="m5 3c-1.1046 0-2 0.8954-2 2v14c0 1.105 0.8954 2 2 2h6 2 6c1.105 0 2-0.895 2-2v-14c0-1.1046-0.895-2-2-2h-6-2-6z" fill="#ecf0f1" transform="translate(0 1028.4)" />
                                <path d="m5 3c-1.1046 0-2 0.8954-2 2v3 1h18v-1-3c0-1.1046-0.895-2-2-2h-6-2-6z" fill="#e74c3c" transform="translate(0 1028.4)" />
                                <path d="m7 5.5a1.5 1.5 0 1 1 -3 0 1.5 1.5 0 1 1 3 0z" fill="#c0392b" transform="translate(.5 1028.4)" />
                                <path d="m6 1c-0.5523 0-1 0.4477-1 1v3c0 0.5523 0.4477 1 1 1s1-0.4477 1-1v-3c0-0.5523-0.4477-1-1-1z" fill="#bdc3c7" transform="translate(0 1028.4)" />
                                <path d="m7 5.5a1.5 1.5 0 1 1 -3 0 1.5 1.5 0 1 1 3 0z" fill="#c0392b" transform="translate(12.5 1028.4)" />
                                <g fill="#bdc3c7">
                                    <path d="m18 1029.4c-0.552 0-1 0.4-1 1v3c0 0.5 0.448 1 1 1s1-0.5 1-1v-3c0-0.6-0.448-1-1-1z" />
                                    <path d="m5 1039.4v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2z" />
                                    <path d="m5 1042.4v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2z" />
                                    <path d="m5 1045.4v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2z" />
                                </g>
                            </g>
                        </svg>
                        <p>From: ' . $row['start_date'] . ' to ' . $row['end_date'] . '</p>
                    </div>
                    <div class="flex location">
                        <svg width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.6449 11.2719C20.6449 18.9116 10.8225 25.4599 10.8225 25.4599C10.8225 25.4599 1 18.9116 1 11.2719C1 8.66687 2.03486 6.16849 3.87693 4.32642C5.719 2.48436 8.21738 1.44949 10.8225 1.44949C13.4275 1.44949 15.9259 2.48436 17.768 4.32642C19.61 6.16849 20.6449 8.66687 20.6449 11.2719Z" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10.8227 14.8279C12.631 14.8279 14.0969 13.362 14.0969 11.5537C14.0969 9.74546 12.631 8.27957 10.8227 8.27957C9.01447 8.27957 7.54858 9.74546 7.54858 11.5537C7.54858 13.362 9.01447 14.8279 10.8227 14.8279Z" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p>' . $row['address'] . '</p>
                    </div>
                    <div class="flex organizer">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.69548 10.6994C5.85067 10.6994 3.53717 8.38594 3.53717 5.54113C3.53717 2.69632 5.85067 0.382812 8.69548 0.382812C11.5403 0.382812 13.8538 2.69632 13.8538 5.54113C13.8538 8.38594 11.5403 10.6994 8.69548 10.6994ZM19.442 12.4189H14.2837C13.099 12.4189 12.1344 13.3826 12.1344 14.5682V21.0161H21.5913V14.5682C21.5913 13.3826 20.6267 12.4189 19.442 12.4189ZM18.1524 16.7175H15.5732V14.998H18.1524V16.7175ZM10.4149 13.9191L8.69548 15.8535L5.64262 12.4189H5.25661C2.88636 12.4189 0.958008 14.3472 0.958008 16.7175V21.0161H10.4149V13.9191Z" fill="#FF0000" />
                        </svg>
                        <p>Organizer: ' . $row['organizer'] . '</p>
                    </div>
                   <p class="description">' . $row['description'] . '</p>';
        if ($user == "admin") {
            echo '<div class="Registered-donors flex-column">
                        <h5>Registered Donors</h5>
                        <div class="flex">
                            <svg width="37" height="35" viewBox="0 0 37 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M26.6405 0.21843C24.9391 0.244884 23.2747 0.719666 21.8156 1.59483C20.3564 2.46999 19.1541 3.71454 18.3301 5.2028C17.5061 3.71454 16.3038 2.46999 14.8446 1.59483C13.3854 0.719666 11.7211 0.244884 10.0197 0.21843C7.30735 0.336228 4.75191 1.5223 2.91164 3.51753C1.07137 5.51276 0.0958625 8.15495 0.198233 10.8669C0.198233 21.0999 16.7526 32.9189 17.4567 33.4204L18.3301 34.0382L19.2034 33.4204C19.9076 32.922 36.462 21.0999 36.462 10.8669C36.5643 8.15495 35.5888 5.51276 33.7486 3.51753C31.9083 1.5223 29.3529 0.336228 26.6405 0.21843Z" fill="#FF0000" />
                            </svg>
                            <p>25</p>
                        </div>
                    </div>
                    <div class="card-buttons flex w-100">
                        <button class="Yellow-btn" id="Edit-campaign-btn" data-id="' . $row['campaign_id'] . '">Edit</button>
                        <button class="Red-btn" id="Delete-campaign-btn" data-id="' . $row['campaign_id'] . '">Delete</button>
                    </div>';
        } else {
            echo '<a href="#" class="detail-link flex" data-id="' . $row['campaign_id'] . '">
                            <p href="#">View Details</p>
                            <svg width="36" height="22" viewBox="0 0 36 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25.2386 0.579549L35.8409 11.1818L25.2386 21.7841L23.1932 19.7614L30.2955 12.6591L0.0909127 12.6591V9.70455L30.2955 9.70455L23.1932 2.61364L25.2386 0.579549Z" fill="#FF0000"></path>
                            </svg>
                 </a>
                 <button class="Red-btn" id="join" data-id="' . $row['campaign_id'] . '">Join</button>';
        }
        echo '</div>';
    }
} else {
    echo "No Campaigns found.";
}
