<?php

    // fetch random wallpapers
    fetchBackgrounds();
    function fetchBackgrounds() {
        
        // ids of wallpaper categories
        $collectionIDs = array(1111678, 1065412, 1111680, 162468, 162213, 357786, 1346770, 1889046, 1922729);
        $numImagesAvailable = 70;
        $url = "https://source.unsplash.com/collection";

        echo "<div class='grid-container'>";
        foreach ($collectionIDs as $id) {
            
            // fetch random wallpapers and download / display with download url
            $wallpaperID = rand(1, $numImagesAvailable);
            $wallpaperSrc = "$url/$id/?sig=$wallpaperID";
            $imageData = base64_encode(file_get_contents($wallpaperSrc));
            $timestamp = time();
            
            echo "<div class='grid-item blur animated fadeIn'>";
                echo "<img class='wallpaper-option grid-child' src='data:image/jpeg;base64, $imageData' alt='wallpaper-$wallpaperID-$timestamp'>";
                echo "<div class='middle'>";
                    echo "<div class='download-btn'>Download<a href='data:image/jpeg;base64, $imageData' target='_blank' download='wallify$timestamp'></a></div>";
                echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    }
?>