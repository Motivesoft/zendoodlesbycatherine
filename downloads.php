<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'functions.php'; ?>
<?php include 'head.php'; ?>

    <title>Zen Doodles By Catherine | Free download PDF to print and colour</title>
    <meta name="description" content="Free download of new zen doodle, mandala and other designs as PDF and PNG. Print or save the images and colour them in. #ZenDoodlesByCatherine" />

</head>
<body>
<?php include 'banner.php'; ?>
<?php pagehit( "downloads" ); ?>

    <div class="row">
        <?php include 'column.php'; ?>
        <div class="column middle">
            <?php include 'menu.php'; ?>

            <h1>Downloads</h1>

            <?php
                $uses = array(
                    array( "printed", 
                           "Free downloads of PDF files containing several unique black and white designs with decorative borders - ideal for printing off and putting in an A4/Letter folder. If you&apos;re feeling particularly creative you could get out your scissors, stapler etc. and make a little booklet, ideal for kids and gifts!",
                           "Free download of zen doodle and mandala images as printable PDF for A4 or Letter paper"
                         ),
                    array( "imported", 
                           "Or if you&apos;d prefer, download the images in PNG format (design only, borders not included) to open and colour in your favourite art app.",
                           "Free download of zen doodle and mandala images as PNG to import into an art or painting app"
                         ),
                );

                echo '<table style="border: none">' . PHP_EOL;

                foreach ($uses as $use) {
                    echo '    <tr>' . PHP_EOL;
                    echo '        <td style="width:65%; text-align: left">' . $use[1] . '</td>' . PHP_EOL;
                    echo '        <td style="width:35%; text-align: right">' . PHP_EOL;
                    echo( '           <img class="center" style="width: 100%" src="./assets/uses/' . $use[0] . '.jpg" alt="' . $use[2] . '"/>' );
                    echo '        </td>' . PHP_EOL;
                    echo '    </tr>' . PHP_EOL;
                }
                echo '</table>' . PHP_EOL;
            ?>

        </div>
        <?php include 'column.php'; ?>
    </div>

    <?php
        $folders = glob( './downloads/*' );

        usort( $folders, "filemodifiedsort" );

        foreach( $folders as $folder ) {
            if( is_dir( $folder ) ) {
                echo( '<div class="row">' . PHP_EOL );
                echo( '    <div class="column side">' . PHP_EOL );
                echo( '        <p></p>' . PHP_EOL );
                echo( '    </div>' . PHP_EOL );
                echo( '    <div class="column middle">' . PHP_EOL );

                echo '<a id="' . basename( $folder ) . '"></a>' . PHP_EOL;

                $namefile = $folder . '/title.txt';
                if( file_exists( $namefile ) ) {
                    $name = @file_get_contents( $namefile );
                    
                    echo '<h3>' . $name . '</h3>' . PHP_EOL;
                }

                if( file_exists( $folder . '/0-cover_thumb.png' ) ) {
                    $book = removeNewTag( $name );

                    echo '<img style="float: left; display: block; margin: 0 2% 0 2%; width: 15%;" src="' . $folder . '/0-cover_thumb.png" alt="' . $book . '">' . PHP_EOL;
                }

                echo '<div style="float: left; display: block; margin: 0 2% 0 2%; width: 75%;">' . PHP_EOL;
                echo '<ul style="list-style: none; padding-left: 0;">' . PHP_EOL;

                $pdffiles = glob( $folder . '/*a4.pdf' );
                foreach ($pdffiles as $pdffile) {
                    $pdftitle = basename( $pdffile );
                    echo '<li><a href="save.php?directory=' . basename( $folder ). '&file=' . $pdftitle . '">Printable PDF - A4 (11.69&quot; by 8.27&quot;)</a></li>' . PHP_EOL;
                }

                $pdffiles = glob( $folder . '/*letter.pdf' );
                foreach ($pdffiles as $pdffile) {
                    $pdftitle = basename( $pdffile );
                    echo '<li><a href="save.php?directory=' . basename( $folder ). '&file=' . $pdftitle . '">Printable PDF - US Letter (11&quot; by 8.5&quot;)</a></li>' . PHP_EOL;
                }

                #if( file_exists( $folder . '/a4.pdf' ) ) {
                #    echo '<li><a href="save.php?directory=' . basename( $folder ). '&file=a4.pdf">Printable PDF - A4 (11.69&quot; by 8.27&quot;)</a></li>' . PHP_EOL;
                #}
                #if( file_exists( $folder . '/letter.pdf' ) ) {
                #    echo '<li><a href="save.php?directory=' . basename( $folder ). '&file=letter.pdf">Printable PDF - US Letter (11&quot; by 8.5&quot;)</a></li>' . PHP_EOL;
                #}

                echo '<li><a href="gallery.php#' . basename( $folder ) . '">Download individual images from the book (PNG image format)</a></li>' . PHP_EOL;

                $imgfiles = glob( $folder . '/*images.zip' );
                foreach ($imgfiles as $imgfile) {
                    $imgtitle = basename( $imgfile );
                    echo '<li><a href="save.php?directory=' . basename( $folder ). '&file=' . $imgtitle . '">Download all images from the book as a ZIP file (PNG image format)</a></li>' . PHP_EOL;
                }
                #if( file_exists( $folder . '/images.zip' ) ) {
                #    echo '<li><a href="save.php?directory=' . basename( $folder ). '&file=images.zip">Download all images from the book as a ZIP file (PNG image format)</a></li>' . PHP_EOL;
                #}
                echo '</ul>' . PHP_EOL;
                echo '</div>' . PHP_EOL;

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

            <h3>Notes</h3> 
            <ul>
                <li>The higher quality of paper you use in your printer the better, but if you&apos;re using regular paper it might be a good idea to put a blank sheet between pages to avoid bleed-through, especially when using felt-tips.</li>
                <li>Please note, the downloads are digital - no physical book will be mailed to you.</li>
            </ul>
            <p>Feedback is very welcome - I would love to see your finished creations!</p>

        </div>
        <?php include 'column.php'; ?>
    </div>

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