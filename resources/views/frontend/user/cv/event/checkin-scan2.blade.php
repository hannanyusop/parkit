<!DOCTYPE html>

<html lang="en">
<head>


    <meta charset="utf-8">
    <meta name="description" content="Simplest possible examples of HTML, CSS and JavaScript.">
    <meta name="author" content="//samdutton.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta itemprop="name" content="simpl.info: simplest possible examples of HTML, CSS and JavaScript">
    <meta itemprop="image" content="/images/icons/icon192.png">
    <meta id="theme-color" name="theme-color" content="#fff">


    <base target="_blank">


    <title>mediaDevices.enumerateDevices()</title>

    <link rel="stylesheet" href="{{ asset('plugin/html_qr/css/change-cam.css') }}">

    <style>
        h1 {
            margin: 0 0 24px 0;
        }
        select {
            width: 150px;
        }
        video {
            margin: 10px 0 0 0;
        }
    </style>

</head>

<body>

<div id="container">

    <div class="select">
        <label for="audioSource">Audio source: </label><select id="audioSource"></select>
    </div>

    <div class="select">
        <label for="videoSource">Video source: </label><select id="videoSource"></select>
    </div>

    <video autoplay muted playsinline></video>

    <script async src="{{ asset('plugin/html_qr/js/cam-ori.js') }}"></script>

</div>


</body>
</html>
