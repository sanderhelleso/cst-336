<?php

    // fetch random wallpapers
    fetchBackgrounds();
    function fetchBackgrounds() {
        
        // ids of wallpaper categories
        $collectionIDs = array(1111678, 1065412, 1111680, 162468, 162213, 357786, 1346770, 1889046, 1922729, 1538150, 2254180, 935527);
        $numImagesAvailable = 60;
        $url = "https://source.unsplash.com/collection";
        $amount = $_GET['amount']; // fetched from client select box
        
        // create random category options out of amount selected by user
        $selectedCategories = array();
        for ($i = 0; $i < $amount; $i++) {
            
            // make sure we get unique categories
            $id = $collectionIDs[rand(0, sizeof($collectionIDs))];
            while (in_array($id, $selectedCategories)) {
                $id = $collectionIDs[rand(0, sizeof($collectionIDs))];
            }
            
            // add unique category
            array_push($selectedCategories, $id);
        }

        echo "<div class='grid-container'>";
        foreach ($selectedCategories as $id) {
            
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
    
    /**************************************************************************
     **  Following code is commented out due to storage limitation of heroku **
     * ************************************************************************
    /*download and returns download path for user
    function download($url, $timestamp, $id) {
        
        // make dir if not present
        $folder = "generatedWallpapers/$timestamp/";
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
        
        // download img and place in timestamped map
        $imgPath = $folder . $img . "wallpaper$id.jpg";
        file_put_contents($imgPath, file_get_contents($url));
        
        return $imgPath;
    }
    
    // erease folder and files after 2 min
    function ereaseFiles() {
        $folders = glob('generatedWallpapers/*');
        
        foreach($folders as $folder) { 
            if ((time() - filectime($folder)) >= 120) { 
                
                // erease files in folder, then folder
                array_map('unlink', glob("$folder/*.*"));
                rmdir($folder);
            }
        }
    }*/
?>