<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <link rel = "stylesheet" type = "text/css" href = "http://localhost/cm-accounting/css/registration.css">
    <title> Регистрация </title>
</head>
<body>
    <div id="div_registration" align="center">
        <form id="form_registration" method="post" action="http://localhost/cm-accounting/index/registrator/registrate">
            <label> Ваш логин </label><br>
            <input type="text" name="login"><br>
            <label> Ваш пароль </label><br>
            <input type="password" name="password"><br>
            <label> Повторите пароль </label><br>
            <input type="password" name="password_repeat"><br>
            <label> email </label><br>
            <input type="text" name="email"><br><br>
            <input type="submit" value="регистрация">
            <?php
                if ($error != '') echo "<br><br> <label id = 'label_error'> $error </label>";
            ?>
        </form>
    </div>
</body>