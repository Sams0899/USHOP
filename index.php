<!DOCTYPE HTML>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="assets/login.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="USHOP" />
            </div>

            <!-- Login Form -->
            <form action = "Controller/login.php" method="POST">
                <input type="text" id="login" class="fadeIn second" id="username" name="userid" placeholder="User ID">
                <input type="password" id="password" class="fadeIn third" id="password" name="password" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="Log In"> 
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <p>Note: To get the ID, contact admin to look at the database</p>
                <a class="underlineHover" href="about.php">About</a>
            </div>

        </div>
    </div>
</body>
</html>