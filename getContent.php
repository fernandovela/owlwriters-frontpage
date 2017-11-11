<?php
    include 'database.php'; // database credentials
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection 
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Array of article IDs to randomly select from (until newline issue is resolved 
    // and can randomly select from published posts)
    $postsIdArray = [12, 18, 19, 25, 27, 63, 66];
    $randPostIndex = mt_rand(0, sizeof($postsIdArray) - 1);
    
    $sql = "SELECT post_content 
    FROM wp_posts
    WHERE ID = '$postsIdArray[$randPostIndex]'";

    mysqli_query($conn,"SET CHARACTER SET 'utf8'");

    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);
    
    // $post = nl2br($result[0]);   // Used to pass line breaks (from \n to <br />):
                                    // <br/> printed directly to page due to JS fcn
    
    echo $result[0];
?>