<?php

/**
 * Created by PhpStorm.
 * User: yulaimy
 * Date: 10-04-2016
 * Time: 07:53 AM
 */
   // $file = fopen("myfile.txt", "r") or exit("Unable to open file!");
?>
<form action="upload_file.php" method="post" enctype="multipart/form-data">
        <label for="file">Filename</label>

        <input type="file" name="file" id="file"/>

        <br />

        <input type="submit" name="submit" value="Submit"/>
    </form>
