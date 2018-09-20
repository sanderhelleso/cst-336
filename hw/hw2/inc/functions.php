<?php
    
    // check and erease old files
    ereaseFiles();
    
    // fetch random wallpapers
    fetchBackgrounds();
    function fetchBackgrounds() {
        
        // ids of wallpaper categories
        $collectionIDs = array(1111678, 1065412, 1111680, 162468, 162213, 357786, 1346770, 1889046, 1922729);
        $numImagesAvailable = 50;
        $url = "https://source.unsplash.com/collection";
        $timestamp = time(); // mark folder created to download wallpapers

        echo "<div class='grid-container'>";
        foreach ($collectionIDs as $id) {
            
            // fetch random wallpapers and download / display with download url
            $wallpaperID = rand(1, $numImagesAvailable);
            $wallpaperSrc = "$url/$id/?sig=$wallpaperID";
            $downloadURL = download($wallpaperSrc, $timestamp, $wallpaperID);
            
            echo "<div class='grid-item'>";
                echo "<img class='wallpaper-option grid-child' src='$wallpaperSrc' alt='wallaper-$id'>";
                echo "<div class='middle'>";
                    echo "<div class='download-btn'>Download<a href='$downloadURL' target='_blank' download></a></div>";
                echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    }
    
    // download and returns download path for user
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
    }
?>