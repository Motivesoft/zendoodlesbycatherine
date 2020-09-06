<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'functions.php'; ?>
<?php include 'head.php'; ?>
    
    <title>Zen Doodles by Catherine : Downloads</title>
    <meta name="description" content="Zen Doodles by Catherine. File download page." />

</head>
<body>
<?php include 'banner.php'; ?>
<?php pagehit( "get" ); ?>

<?php
    $directory = $_GET['directory'];
    $file = $_GET['file'];

    if( strlen( $file ) == 0 ) {
        downloaderror( 'missing' );

        echo 'No file specified';
        add_return_link();
    }
    else {
        $filename = make_download_filename( $directory, $file );

        if( !file_exists( $filename ) ) {
            downloaderror( 'unknown' );

            echo 'No such file: ' . $file;
            add_return_link();
        }
        else {    
            downloadhit( $directory . '-' . $file );
            
            header( 'Location: ' . $filename );
        }
    }
?>

<?php include 'footer.php'; ?>
</body>
</html>
