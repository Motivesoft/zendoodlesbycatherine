<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'functions.php'; ?>
<?php include 'head.php'; ?>
    
    <title>Zen Doodles By Catherine | Download, print and colour mindful designs</title>
    <meta name="description" content="Free download of new zen doodle, mandala and other designs as PDF and PNG. Print or save the images and colour them in. #ZenDoodlesByCatherine" />

</head>
<body>
<?php include 'banner.php'; ?>
<?php pagehit( "index" ); ?>

    <div class="row">
        <?php include 'column.php'; ?>
        <div class="column middle">

            <?php include 'menu.php'; ?>

            <br/>
            <p><b>NEW!</b> Visit my sister site, <a href="https://condaluna.com">condaluna.com</a>, for downloadable wallpapers, fonts, stickers and GIFs!</p>

            <h1>Home</h1>

            <p>Mindfulness colouring is a great way of relaxing and focusing on the present moment. It is both therapeutic and calming, and has been shown to reduce stress and anxiety.</p>
            <p>It is fun for both adults and children, it improves focus and motor skills, encourages creativity, and provides a sense of satisfaction.</p>
            <p>I create Zen Doodles, Mandalas, and other designs, ideal for you to download & colour. Some of my designs are quite simple, while some are more intricate. 
                Click <a href="./downloads.php">free downloads</a> for design booklets you can download or visit our <a href="./gallery.php">gallery</a>.</p>
            <p>You might prefer to ink with a black pen, or colour in any way you choose - crayons, felt-tips, coloured pencils, or you can upload the images into your favourite art app and colour digitally.</p>
            <p>Here are a couple of examples -</p>
            <?php 
                $mandala_example = array(
                    array( "m1", "Mandala basic outline" ),
                    array( "m2", "The Mandala after adding extra detail and inking with black pen" ),
                    array( "m3", "The Mandala after adding colour" ),
                );
                make_example_3_panel( $mandala_example );
                echo '<p></p>';
                $basic_example = array(
                    array( "o1", "Basic lines" ),
                    array( "o2", "Zen Doodles added" ),
                    array( "o3", "Inked with black pen" ),
                );
                make_example_3_panel( $basic_example );
            ?>
            <p>Remember - as long as you&apos;re enjoying yourself, you are doing it right!</p>
            <p>I would love to see your finished pieces, so if you post them on Instagram or Facebook, please tag me @catherinebrown666 and use the hashtag #ZenDoodlesByCatherine</p>
            <p>- Catherine</p>

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