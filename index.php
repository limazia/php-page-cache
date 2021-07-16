<?php
// Settings
$validitySeconds = 60;
$cacheFile = "store/index.html";
$dynamicURL = __DIR__ . "/_page.php";

// Checks if the cache file exists and if it is still valid
if (file_exists($cacheFile) && (filemtime($cacheFile) > time() - $validitySeconds)) {
    // Read the cached file
    $content = file_get_contents($cacheFile);
} else {
    // Access the dynamic version
    $content = file_get_contents($dynamicURL);

    // Create cache
    file_put_contents($cacheFile, $content);
}

// Displays page content
echo $content;