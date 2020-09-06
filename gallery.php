<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'functions.php'; ?>
<?php include 'head.php'; ?>
    
    <title>Zen Doodles By Catherine | Gallery of images and designs for free download</title>
    <meta name="description" content="Free download of new zen doodle, mandala and other designs as PDF and PNG. Print or save the images and colour them in. #ZenDoodlesByCatherine" />

</head>
<body>
<?php include 'banner.php'; ?>
<?php pagehit( "gallery" ); ?>

    <div class="row">
        <?php include 'column.php'; ?>
        <div class="column middle">
            <?php include 'menu.php'; ?>

            <h1>Gallery</h1>

            <p>Here is a collection of doodles as PNG images, free to download for you to colour in your favourite art app.</p>
            <p>Have fun!</p>
            <p>(these are for personal use only - not for resale)</p>
        </div>
        <?php include 'column.php'; ?>
    </div>

    <?php
        $folders = glob( './downloads/*' );

        usort( $folders, "filemodifiedsort" );

        foreach( $folders as $folder ) {
            if( is_dir( $folder ) ) {
                $namefile = $folder . '/title.txt';
                
                echo( '<div class="row">' . PHP_EOL );
                echo( '    <div class="column side">' . PHP_EOL );
                echo( '        <p></p>' . PHP_EOL );
                echo( '    </div>' . PHP_EOL );
                echo( '    <div class="column middle">' . PHP_EOL );

                echo( '        <a id="' . basename( $folder ) . '">' . PHP_EOL );
                if( file_exists( $namefile ) ) {
                    $name = @file_get_contents( $namefile );
                    
                    echo( '            <h3>' . $name . '</h3>' . PHP_EOL );

                    $name = removeNewTag( $name );
                }
                else {
                    $name = $folder;
                }
                echo( '        </a>' . PHP_EOL );

                $ext = '.png';
                $files = glob( $folder . '/*' . $ext );

                natsort( $files );

                foreach ($files as $file) {
                    $title = basename( $file, $ext );
                    if( endsWith($title,"_thumb") ) {
                        continue;
                    }
                    $img = $file;
                    $thumb = dirname($file) . '/' . $title . '_thumb' . $ext;
                    if( file_exists($thumb) ) {
                        $img = $thumb;
                    } 

                    $title = str_replace( '-', ' ', $title );
                    $title = ucwords( $title );
                    
                    echo( '        <div class="gallery">' . PHP_EOL );
                    echo( '            <a target="_blank" href="save.php?directory=' . basename($folder) . '&file=' . basename($file) . '">' . PHP_EOL );
                    echo( '                <img src="' . $img . '" alt="' . $name . ' - ' . $title . '" width="200" height="200">' . PHP_EOL );
                    echo( '                <div class="desc">' . $title . '</div>' . PHP_EOL );
                    echo( '            </a>' . PHP_EOL );
                    echo( '        </div>' . PHP_EOL );
                }

                echo( '    </div>' . PHP_EOL );
                echo( '    <div class="column side">' . PHP_EOL );
                echo( '        <p></p>' . PHP_EOL );
                echo( '    </div>' . PHP_EOL );
                echo( '</div>' . PHP_EOL );
            }
        }
    ?>
    
    <div class="row">
        <?php include 'column.php'; ?>
        <div class="column middle">
            <?php include 'social.php'; ?>
            <?php include 'footer.php'; ?>
        </div>
        <?php include 'column.php'; ?>
    </div>
    
</body>
</html>