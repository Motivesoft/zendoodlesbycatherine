<?php
    include 'functions.php';

    $directory = $_GET['directory'];
    $file = $_GET['file'];

    if( strlen( $file ) > 0 ) {
        $filename = make_download_filename( $directory, $file );

        if( file_exists( $filename ) ) {
            downloadhit( $directory . '-' . $file );
            
            $ext = strtolower( pathinfo( $filename, PATHINFO_EXTENSION ) );
            
            if( $ext == "png"  || $ext == "jpg" ) {
                $mime = "image/" . $ext;
            }
            else if( $ext == "pdf" || $ext == "zip" ) {
                $mime = "application/" . $ext;
            }
            else {
                $mime = "application/octet-stream";
            }

            header('Content-Description: File Transfer');
            header('Content-Type: ' . $mime);
            header('Content-Disposition: attachment; filename="'.basename($filename).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filename));
            flush(); // Flush system output buffer
            readfile($filename);
        }
    }
    exit;
?>
