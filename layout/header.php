<?php
//require_once("config.php");

?>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>MyBlog</title>

    <link rel="stylesheet" href="<?php echo BASE_URL . '/style/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/style/css/font-awesome.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/style/css/magnific-popup.css'; ?>">


    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo BASE_URL . '/style/css/style.css'; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/style/css/slideStyle.css'; ?>">
    <!--    for the slider-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lora|Merriweather:300,400" rel="stylesheet">

    <!-- Select Plugin css for this page -->
    <link rel="stylesheet" href="<?php echo BASE_URL . '/admin/style/vendors/select2/select2.min.css'; ?>">
    <link rel="stylesheet"
          href="<?php echo BASE_URL . '/admin/style/vendors/select2-bootstrap-theme/select2-bootstrap.min.css'; ?>">
    <!-- End Select plugin css for this page -->

    <!-- styling the tag div -->
    <style>
        .tag-items {
            margin-top: 30px;
            display: block;
        }

        .tag-items a {
            padding: 8px 12px;
            background-color: #f1f4f5;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -ms-border-radius: 3px;
            -o-border-radius: 3px;
            border-radius: 3px;
        }
        .text-light {
            background-color: #3e4b5b !important;
            padding-left: 0.25rem !important;
            color: #f8f9fa !important;
        }
    </style>
    <!--    styling the tag search result cards-->
    <style>
        img {
            height: auto;
            max-width: 100%;
            vertical-align: middle;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .cards_item {
            display: flex;
            padding: 1rem;
        }

        @media (min-width: 40rem) {
            .cards_item {
                width: 50%;
            }
        }

        @media (min-width: 56rem) {
            .cards_item {
                width: 33.3333%;
            }
        }

        .card {
            background-color: white;
            border-radius: 0.25rem;
            box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .card_content {
            padding: 1rem;

        }

        .card_title {
            color: #ffffff;
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: capitalize;
            margin: 0px;
        }
    </style>

    <style>
        .fa:hover {
            opacity: 0.7;
        }
        .share-items a {
            padding: 12px 18px;
            background-color: #f1f4f5;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -ms-border-radius: 3px;
            -o-border-radius: 3px;
            border-radius: 3px;
        }
    </style>
</head>
<body>

<!-- PRE LOADER -->

<div class="preloader">
    <div class="sk-spinner sk-spinner-wordpress">
        <span class="sk-inner-circle"></span>
    </div>
</div>
