<?php
    function filemodifiedsort( $a, $b ) {
        $da = filemtime($a);
        $db = filemtime($b);
        return $da < $db ? +1 : -1;
    }

    function make_counter_filename( $name, $ext ) {
        return './counters/' . $name . '.' . $ext;
    }

    function make_download_filename( $directory, $name ) {
        return './downloads/' . $directory . '/' . $name;
    }

    function update_counter( $pagename, $ext ) {
        // create the name for the hit count file
        $counter_file = make_counter_filename( $pagename, $ext );
        
        if( !file_exists( $counter_file ) ) {
            touch( $counter_file );
        }
   
        $fh=fopen( $counter_file, "r+" );
        if( $fh ) {
            flock( $fh, LOCK_EX );
   
            if( filesize( $counter_file ) > 0 ) {
                $count = fread( $fh, filesize( $counter_file ) );
            } 
            else {
                $count = "0";
            }
   
            $count++;
            
            ftruncate( $fh, 0 );
            rewind( $fh );
   
            fwrite( $fh, $count );
            fflush( $fh );
   
            flock( $fh, LOCK_UN );
            fclose( $fh );
        }
    }
    function update_counter_old( $pagename, $ext ) {
        // create the name for the hit count file
        $counter_file = make_counter_filename( $pagename, $ext );
        
        // read the hit count from file
        $hit_count = @file_get_contents( $counter_file );
        if( $hit_count == "" ) {
            $hit_count = "0";
        }
        
        // increment the hit count by 1
        $hit_count++;
        
        // store the new hit count
        @file_put_contents( $counter_file, $hit_count );
    }

    function pagehit( $pagename ) {
        update_counter( $pagename, 'page' );
    }

    function downloadhit( $pagename ) {
        update_counter( $pagename, 'download' );
    }

    function downloaderror( $errorname ) {
        update_counter( $errorname, 'error' );
    }

    function add_return_link() {
        echo '<p>Please return to our <a href="./">home</a> page</p>' . PHP_EOL;
    }

    function make_example_3_panel( $examples ) {
        echo '<table style="border: none">' . PHP_EOL;

        echo '    <tr>' . PHP_EOL;
        foreach ($examples as $example) {
            echo '        <td style="width:30%; text-align: center">' . PHP_EOL;
            echo( '           <img class="center" style="width: 100%" src="./assets/examples/' . $example[0] . '.png" alt="' . $example[1] . '"/>' );
            echo '        </td>' . PHP_EOL;
        }
        echo '    </tr>' . PHP_EOL;
        echo '    <tr>' . PHP_EOL;
        foreach ($examples as $example) {
            echo '        <td style="width:30%; text-align: center">' . $example[1] . '</td>' . PHP_EOL;
        }
        echo '    </tr>' . PHP_EOL;
        echo '</table>' . PHP_EOL;
    }

    function startsWith($haystack, $needle) 
    { 
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    } 

    function endsWith($string, $endString) 
    { 
        $len = strlen($endString); 
        if ($len == 0) { 
            return true; 
        } 
        return (substr($string, -$len) === $endString); 
    } 

    function removeNewTag( $title ) {
        $newstr = "**NEW** ";
        if( startsWith( $title, $newstr ) ) {
            return substr( $title, strlen( $newstr ) );
        }
        return $title;
    }
?>