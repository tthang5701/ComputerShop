<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=Poppins:wght@200;300&display=swap" rel="stylesheet">
  <script src="https://cdn.ckeditor.com/4.19.1/basic/ckeditor.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <style>
    .LogOutbtn {
      width: 100%;
      height: 100%;
      margin-top: 4px;
      padding: 5px;
      padding-left: 10px;
      padding-right: 10px;
      display: inline-block;
      text-decoration: none;
      color: black;
      background-color: #fff;
      border-radius: 20px;
      font-size: 14px;
    }

    .LogOutbtn:hover {
      text-decoration: none;
      background-color: rgb(121, 82, 179, 0.6);
      color: #fff;
    }

    .img {
      width: 100%;
    }

    body {
      position: relative;
      font-family: 'Poppins', sans-serif;
      font-weight: 900 !important;
    }

    .messageNotice {
      position: absolute;
      width: 300px;
      height: 100px;
      background-color: rgb(40, 167, 69, 0.9);
      color: #ffff;
      top: 0px;
      left: 550px;
      z-index: 200;
      border-bottom-left-radius: 30px;
      border-bottom-right-radius: 30px;
      transition: all 1s ease-in 1s;
      animation: message 2s linear alternate;
      visibility: hidden;
    }

    @keyframes message {
      0% {
        top: -100px;
      }

      100% {
        top: 0px;
        visibility: visible;
      }
    }

    .Content {
      width: 100%;
      height: 50px;
      color: #fff;
      background-color: black;
    }
  </style>
</head>

<body>