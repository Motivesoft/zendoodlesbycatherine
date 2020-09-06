<?php
    $founded = "2019";

    echo '    <br/>' . PHP_EOL;
    echo '    <div class="footer">' . PHP_EOL;

    echo '    <noscript>' . PHP_EOL;
    $year = date( "Y" );
    if( $year <> $founded ) {
        $year = $founded . "-" . $year;
    }
    echo '        <footer>Copyright &copy; ' . $year . ' Catherine Brown.</footer>' . PHP_EOL;
    echo '    </noscript>' . PHP_EOL;

    echo '    <a id="footerHTML"></a>' . PHP_EOL;
    echo '    <script>' . PHP_EOL;
    echo '       d = new Date();' . PHP_EOL;
    echo '       y = d.getFullYear();' . PHP_EOL;
    echo '       if( y != "' . $founded . '" )' . PHP_EOL;
    echo '       { y = "' . $founded . '".concat("-").concat(y); }' . PHP_EOL;
    echo '       document.getElementById("footerHTML").innerHTML = "<footer>Copyright &copy; " + y + " Catherine Brown.</footer>";' . PHP_EOL;
    echo '    </script>' . PHP_EOL;

    echo '    </div>' . PHP_EOL;
?>
