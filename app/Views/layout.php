<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <link type="image/png" rel="icon" href="img/favicon.png" />

    <!-- Load Font Awesome Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href='../fullcalendar/main.css' rel='stylesheet' />
<!---->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>-->

<!--    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">-->

    <?php echo $styles; ?>
    <?php echo $scripts; ?>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Clinic's schedule</title>

</head>
<body class="font-sans text-lg bg-white items-center flex flex-col m-0">
    <div class="container">
        <?php echo $header;?>

        <?php echo $content;?>

        <?php echo $footer;?>
    </div>
</body>
</html>