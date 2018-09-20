<?php
    
    function fetchBackgrounds() {
        
        $collectionIDs = array(1111678, 1065412, 1111680, 162468, 162213, 357786, 1346770, 1889046, 1922729);
        $numImagesAvailable = 50;
        $url = "https://source.unsplash.com/collection";
        
        echo "<div class='grid-container'>";
        foreach ($collectionIDs as $id) {
            
            $wallpaperID = rand(1, $numImagesAvailable);
            $wallpaperSrc = "$url/$id/?sig=$wallpaperID";
            echo "<img class='wallpaper-option grid-child' src='$wallpaperSrc' alt='wallaper-$id'>";
        }
        echo "</div>";
    }
    
    fetchBackgrounds();
    
?>