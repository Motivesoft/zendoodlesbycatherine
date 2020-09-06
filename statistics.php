<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'functions.php'; ?>
<?php include 'head.php'; ?>
    
    <title>Zen Doodles By Catherine : Statistics Page : #ZenDoodlesByCatherine</title>
    <meta name="description" content="Zen Doodles by Catherine. Free download of new zen doodle, mandala and other designs as PDF and PNG. Print or save the images and colour them in." />

</head>
<body>
<?php include 'banner.php'; ?>
<?php pagehit( "statistics" ); ?>

    <div class="row">
        <?php include 'column.php'; ?>
        <div class="column middle">

            <?php include 'menu.php'; ?>

            <?php
                function show_page_stats( $type ) {
                    $name = ucwords( $type );
                    $ext = '.' . $type;

                    $files = glob( './counters/*' . $ext );

                    echo '<h2>' . $name . ' Counters</h2>' . PHP_EOL;

                    $current = "";
                    if( count( $files ) > 0 ) {
                        echo '<table style="border: 1px solid #000">' . PHP_EOL;
                        echo '    <tr>' . PHP_EOL;
                        echo '        <th style="text-align: left; padding-right:15px">' . $name . '</th>' . PHP_EOL;
                        echo '        <th colspan="2" style="text-align: right; padding-right:15px">Most Recent</th>' . PHP_EOL;
                        echo '        <th style="text-align: right">Count</th>' . PHP_EOL;
                        echo '    </tr>' . PHP_EOL;
                        
                        natsort( $files );
                
                        foreach ($files as $file) {
                            $title = basename( $file, $ext );
                            
                            echo '    <tr>' . PHP_EOL;
                            echo '        <td style="text-align: left; padding-right:15px">' . $title . '</td>' . PHP_EOL;

                            echo '        <td style="text-align: right; padding-right:10px" id="d.' . $title . '">' . PHP_EOL;
                            echo '        <script>' . PHP_EOL;
                            echo '          d = new Date( "' . date( 'c', filemtime( $file ) ). '" );' . PHP_EOL;
                            echo '          document.getElementById("d.' . $title . '").innerHTML = d.toLocaleDateString();' . PHP_EOL;
                            echo '        </script>' . PHP_EOL;
                            
                            echo '        <noscript>';
                            echo            date ("d-m-Y", filemtime( $file ) );
                            echo '        </noscript>' . PHP_EOL;
                            echo '        </td>' . PHP_EOL;

                            echo '        <td style="text-align: right; padding-right:15px" id="t.' . $title . '">' . PHP_EOL;
                            echo '        <script>' . PHP_EOL;
                            echo '          d = new Date( "' . date( 'c', filemtime( $file ) ). '" );' . PHP_EOL;
                            echo '          t = d.toLocaleTimeString( [], { timeStyle: "short", hourCycle: "h24" } );' . PHP_EOL;
                            echo '          document.getElementById("t.' . $title . '").innerHTML = t;' . PHP_EOL;
                            echo '        </script>' . PHP_EOL;
                            
                            echo '        <noscript>';
                            echo            date ("H:i", filemtime( $file ) );
                            echo '        </noscript>' . PHP_EOL;
                            echo '        </td>' . PHP_EOL;

                            echo '        <td style="text-align: right">' . @file_get_contents( $file ) . '</td>' . PHP_EOL;
                            echo '    </tr>' . PHP_EOL;
                        }
                        echo '</table>' . PHP_EOL;
                    }
                    else {
                        echo '<p>No ' . $type . ' statistics.</p>' .  PHP_EOL;
                    }
                }

                function show_book_stats( $type ) {
                    $name = ucwords( $type );
                    $ext = '.' . $type;

                    $files = glob( './counters/*' . $ext );

                    echo '<h2>' . $name . ' Counters</h2>' . PHP_EOL;

                    if( count( $files ) > 0 ) {
                        natsort( $files );
                
                        $current = "";
                        $totaldownloads = 0;
                        foreach ($files as $file) {
                            $title = basename( $file, $ext );
                            
                            $book = explode( "-", $title )[ 0 ];
                            $image = substr( $title, strlen( $book ) + 1 );
                            
                            $titlefile = './downloads/' . $book . '/title.txt';
                            if( file_exists( $titlefile ) ) {
                                $book = removeNewTag( @file_get_contents( $titlefile ) );
                            }

                            if( $current !== $book ) {
                                if( $current !== "" ) { // closing a previous table?
                                    echo '</table>' . PHP_EOL;
                                }

                                echo '<h3>' . $book . '</h3>' . PHP_EOL;
                                echo '<table style="border: 1px solid #000">' . PHP_EOL;
                                echo '    <tr>' . PHP_EOL;
                                echo '        <th style="text-align: left; padding-right:15px">' . $name . '</th>' . PHP_EOL;
                                echo '        <th colspan="2" style="text-align: right; padding-right:15px">Most Recent</th>' . PHP_EOL;
                                echo '        <th style="text-align: right">Count</th>' . PHP_EOL;
                                echo '    </tr>' . PHP_EOL;

                                $current = $book;
                            }
                            
                            echo '    <tr>' . PHP_EOL;
                            echo '        <td style="text-align: left; padding-right:15px">' . $image . '</td>' . PHP_EOL;

                            echo '        <td style="text-align: right; padding-right:10px" id="d.' . $title . '">' . PHP_EOL;
                            echo '        <script>' . PHP_EOL;
                            echo '          d = new Date( "' . date( 'c', filemtime( $file ) ). '" );' . PHP_EOL;
                            echo '          document.getElementById("d.' . $title . '").innerHTML = d.toLocaleDateString();' . PHP_EOL;
                            echo '        </script>' . PHP_EOL;
                            
                            echo '        <noscript>' . PHP_EOL;
                            echo            date ("d-m-Y", filemtime( $file ) ) . PHP_EOL;
                            echo '        </noscript>' . PHP_EOL;
                            echo '        </td>' . PHP_EOL;

                            echo '        <td style="text-align: right; padding-right:15px" id="t.' . $title . '">' . PHP_EOL;
                            echo '        <script>' . PHP_EOL;
                            echo '          d = new Date( "' . date( 'c', filemtime( $file ) ). '" );' . PHP_EOL;
                            echo '          t = d.toLocaleTimeString( [], { timeStyle: "short", hourCycle: "h24" } );' . PHP_EOL;
                            echo '          document.getElementById("t.' . $title . '").innerHTML = t;' . PHP_EOL;
                            echo '        </script>' . PHP_EOL;
                            
                            echo '        <noscript>' . PHP_EOL;
                            echo            date ("H:i", filemtime( $file ) ) . PHP_EOL;
                            echo '        </noscript>' . PHP_EOL;
                            echo '        </td>' . PHP_EOL;
                            
                            $filedownloads = @file_get_contents( $file );
                            $totaldownloads += $filedownloads;
                            echo '        <td style="text-align: right">' . $filedownloads . '</td>' . PHP_EOL;
                            echo '    </tr>' . PHP_EOL;
                        }

                        if( $current !== "" ) { // closing a previous table?
                            echo '</table>' . PHP_EOL;
                        }
                        echo '<p>Total downloads: ' . $totaldownloads . '</p>' . PHP_EOL;
                    }
                    else {
                        echo '<p>No ' . $type . ' statistics.</p>' .  PHP_EOL;
                    }
                }

                echo '<h1>Statistics</h1>' . PHP_EOL;

                echo '<noscript>' . PHP_EOL;
                echo '  <p>Page access and download statistics for ' . date( "d-m-Y H:i" ) . '</p>' . PHP_EOL;
                echo '  <p>All times in GMT</p>' . PHP_EOL;
                echo '</noscript>' . PHP_EOL;

                echo '<p id="summary"></p>' . PHP_EOL;
                echo '<script>' . PHP_EOL;
                echo 'd = new Date();';
                echo 't = d.toLocaleTimeString( [], { timeStyle: "short", hourCycle: "h24" } );' . PHP_EOL;
                echo 'document.getElementById("summary").innerHTML = "Page access and download statistics for " + d.toLocaleDateString() + " " + t;' . PHP_EOL;
                echo '</script>' . PHP_EOL;

                show_page_stats( "page" );
                show_book_stats( "download" );
                show_page_stats( "error" );
            ?>
            
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