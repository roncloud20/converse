<?php
    require 'header.html';
?>
<h1>Welcome</h1>
<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ; ?>" enctype="multipart/form-data">
    <input type="file" name="upload"/> <br/>
    <input type="submit" value="Upload"/>
</form>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $file = $_FILES['upload']; 
        $storage = "storage/";
        $move = $storage . basename($file['name']);
        if(!in_array($file['type'], ['video/mp4', 'video/mkv'])){
            echo "<h1>File type not supported</h1>";
            echo "<h1>Choose an MP4 video</h1>";
        } else {
            if(move_uploaded_file($file['tmp_name'],$move)){
                echo "<h1>File uploaded successfully!</h1>";
            } else {
                echo "<h1>File upload failed!</h1>";
            };
        }
    }
?>
<?php
    include 'footer.html';
?>