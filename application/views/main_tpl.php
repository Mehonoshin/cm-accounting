<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <link rel = "stylesheet" type = "text/css" href = "http://localhost/cm-accounting/css/main.css">
    <title> Личная бухгалтерия </title>
</head>
<body>
    <div id="div_main">
    <table id="table_main" align="center">
    <tr><td colspan="2">
    <?php
    echo "<label id='label_greeting'> Добро пожаловать, </label><label id='label_login'>$login</label>   ";
    if (!$authorized)
    {
        echo
        '[<a id="a_registration" href = "http://localhost/cm-accounting/index/registrator"> регистрация </a>]<br><br>';
        echo
        '
            <div id ="div_authorization">
                <form id="form_authorization" method="post" action="http://localhost/cm-accounting/index/registrator/enter">
                    <label>логин</label>
                    <input type="text" name="login">
                    <label>пароль</label>
                    <input type="password" name="password">
                    <input type="submit" value="вход">
                </form>
            </div>
        ';
    } else echo
           '[<a id = "a_escape" id="a_registration" href = "http://localhost/cm-accounting/index/registrator/escape"> выход </a>]<br><br>';
    ?>
    </td></tr>
    <tr>
    <td width="150" height="1"></td>
    <td width="650" rowspan="7">
    <?php
        include_once 'list.php';
        if ($page == 'main')
        {
            echo '

                <label id="label_hello"> Добро пожаловать на сайт Chaos\'a & Mexx\'a <label>

                ';
        } else
        if (!$authorized)
        {
            echo '

                <label> Чтобы зайти на страницу - авторизуйтесь, пожалуйста. <label>

                ';
        } else
        {
            $del_address;
            $sort_addres;
            $form;
            switch ($page)
            {
                case 'incomes':
                    $del_address = 'http://localhost/cm-accounting/index/pages/delete_income/';
                    $sort_address = 'http://localhost/cm-accounting/index/pages/incomes';
                    $form = "
                        <tr>
                        <form action='http://localhost/cm-accounting/index/pages/insert_income' method='post'>
                                <td><input type='text' value='дата' name='date'></td>
                                <td><input type='text' value='Название' name='name'></td>
                                <td>".hlist($categories,'category')."</td>
                                <td><input type='text' value='Сумма' name='summary'></td>
                                <td><input type='text' value='Информация' name='information'></td>
                                <td><input type='submit' style='color: green;' value='+'></td>
                            </form>
                        </tr>
                    ";
                break;
                case 'outcomes':
                    $del_address = 'http://localhost/cm-accounting/index/pages/delete_outcome/';
                    $sort_address = 'http://localhost/cm-accounting/index/pages/outcomes';
                    $form = "
                        <tr>
                        <form action='http://localhost/cm-accounting/index/pages/insert_outcome' method='post'>
                                <td><input type='text' value='дата' name='date'></td>
                                <td><input type='text' value='Название' name='name'></td>
                                <td>".hlist($categories,'category')."</td>
                                <td><input type='text' value='Сумма' name='summary'></td>
                                <td><input type='text' value='Информация' name='information'></td>
                                <td><input type='submit' style='color: green;' value='+'></td>
                            </form>
                        </tr>                        
                        ";
                break;
                case 'periodic_incomes':
                    $del_address = 'http://localhost/cm-accounting/index/pages/delete_periodic_income/';
                    $sort_address = 'http://localhost/cm-accounting/index/pages/periodic_incomes';
                    $form = "
                        <tr>
                        <form action='http://localhost/cm-accounting/index/pages/insert_periodic_income' method='post'>
                                <td><input type='text' value='Дата' name='date'></td>
                                <td><input type='text' value='Название' name='name'></td>
                                <td><input type='text' value='Сумма' name='summary'></td>
                                <td><input type='text' value='Период' name='period'></td>
                                <td><input type='text' value='Срок' name='term'></td>
                                <td><input type='submit' style='color: green;' value='+'></td>
                            </form>
                        </tr>                        
                     ";
                break;
                case 'periodic_outcomes':
                    $del_address = 'http://localhost/cm-accounting/index/pages/delete_periodic_outcome/';
                    $sort_address = 'http://localhost/cm-accounting/index/pages/periodic_outcomes';
                    $form = "
                        <tr>
                        <form action='http://localhost/cm-accounting/index/pages/insert_periodic_outcome' method='post'>
                                <td><input type='text' value='Дата' name='date'></td>
                                <td><input type='text' value='Название' name='name'></td>
                                <td><input type='text' value='Сумма' name='summary'></td>
                                <td><input type='text' value='Период' name='period'></td>
                                <td><input type='text' value='Срок' name='term'></td>
                                <td><input type='submit' style='color: green;' value='+'></td>
                            </form>
                        </tr>
                     ";
                break;
                case 'reports':
                    $sort_address = 'http://localhost/cm-accounting/index/pages/reports';
                break;    
            }
                echo "
                 <form action='$sort_address' method='post'>
                    <input type='text' value='$date1' name='date1'>
                    <input type='text' value='$date2' name='date2'>
                    <input type='submit' style='color: green;' value='Фильтровать'>
                 </form>
               ";
                if ($page != 'reports')
                {
                    echo '<table border="1" id="table_data">';
                    if (count($array_data) > 0)
                    {
                        echo '<tr>';
                        foreach($array_data[0] as $caption => $value)
                        {
                            if ($caption != 'id') echo "<td>$caption</td>";
                        }
                        echo '</tr>';
                        foreach($array_data as $array)
                        {
                            echo '<tr>';
                            $id;
                            foreach ($array as $caption => $value)
                            {
                                if ($caption != 'id') echo "<td> $value </td>";
                                else $id = $value;
                            }
                            echo "<td><a style='text-decoration: none;color: red' href = $del_address$id> x </a></td>";
                            echo '</tr>';
                        }
                    }
                    echo $form;
                    echo '</table>';
                } else
                {
                    echo '




                    ';
                }
            
        }
    ?>

    </td></tr>
    <tr><td height="20"><a  id="a_incomes" href="http://localhost/cm-accounting/index/pages/incomes"> Доходы </a></td></tr>
    <tr><td height="20"><a  id="a_outcomes" href="http://localhost/cm-accounting/index/pages/outcomes"> Расходы </a></td></tr>
    <tr><td height="20"><a  id="a_periodic_incomes" href="http://localhost/cm-accounting/index/pages/periodic_incomes"> Периодические доходы </a></td></tr>
    <tr><td height="20"><a  id="a_periodic_outcomes" href="http://localhost/cm-accounting/index/pages/periodic_outcomes"> Периодические расходы </a></td></tr>
    <tr><td height="20"><a  id="a_reports" href="http://localhost/cm-accounting/index/pages/reports"> Отчеты </a></td></tr>
    <tr><td></td>
    </table>
    </div>
</body>