<?php
/*
Template Name: sports
*/

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MCQ Questions</title>
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
            Select rank :
            <select name="type" id="type" onchange="this.form.submit()">
                <option value="">Select rank...</option>
                <option value="1">SSgt</option>
                <option value="2">TSgt</option>
                <option value="3">MSgt</option>
            </select>
        </form>
    </body>