<!-- main.php -->
<?php include('header.php'); ?>

<div class="container">
    <?php
        if(isset($_GET['content'])) {
            $content = $_GET['content'];
            $contentFile = $content . '.php';

            if(file_exists($contentFile)) {
                include($contentFile);
            } else {
                echo 'Content not found.';
            }
        } else {
            echo 'Please select a content.';
        }
    ?>
</div>

<?php include('footer.php'); ?>
