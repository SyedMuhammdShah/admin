<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="../src/gallery.js"></script>
    <link rel="stylesheet" type="text/css" href="../src/gallery.css" media="screen" />
</head>
<style>
    * {
      margin: 0;
      padding: 0;
      font-family: calibri, Arial, sans-serif;
    }
    .header {
      width: 100%;
      height: 40px;
      text-align: center;
      background-color: #cde5a9;;
      color: black;
      position: fixed;
      z-index: 99999;
      top: 0;
    }
    .Main {
      padding: 20px;
      margin-top: 150px;
    }
    .nav{
      background-color: #cde5a9;
      padding: 5px;
    }
    .nav .bubble{
      padding: 10px;
      background-color: #edffd2;
      border-radius: 100vw;
      max-width: 100px;
      text-align: center;
      margin-top: 5px;
      display: inline-block;
    }
    .nav .bubble a{
      text-decoration: none;
      color: #ababab;
    }
    .Gallery {
      margin: 20px;
    }
    .footer {
      width: 100%;
      height: 30px;
      text-align: center;
      background-color: #cde5a9;
      color: black;
    }
    .footer p {
      padding: 8px;
      font-size: 12px;
    }
  </style>
<body>
    <div class="Gallery">
    
    </div>

    <script>
        /*
        * For every Day/Project a new "addGallery"
        */
  
        JavaScriptGallery.setGalleryTransition("opacity");
        JavaScriptGallery.enableExtraButtons();
        json =
          '{ "Entry": { "Title": "Meine Lieblings Bilder", ' +
          '"Image": ["images/imaeg1.jpg",' +
          '"https://dummyimage.com/800x400/000fff/ffffff",' +
          '"https://dummyimage.com/800x400/00ff00/00ff00",' +
          '"https://dummyimage.com/800x400/000fff/000",' +
          '"https://dummyimage.com/800x400/0000ff/0000ff",' +
          '"https://dummyimage.com/800x400/000fff/fff000" ] } }';
        JavaScriptGallery.addGallery(json);
      </script>
</body>
</html>