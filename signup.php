<?php
require "db.php";

$data = $_POST;
if( isset($data['do_signup']) )
{
    //здесь регистрируем

    $errors = array();
    if( $data['login'] == '')
    {
        $errors[] = 'Введите ФИО!';
    }

    if( trim($data['email']) == '')
    {
        $errors[] = 'Введите e-mail!';
    }

    if( $data['password'] == '')
    {
        $errors[] = 'Введите пароль!';
    }

    if( $data['password_2'] != $data['password'] )
    {
        $errors[] = 'Повторный пароль введён не верно!';
    }

    if( trim($data['passport']) == '')
    {
        $errors[] = 'Введите паспортные данные!';
    }

    if( trim($data['passport_2']) == '')
    {
        $errors[] = 'Введите паспортные данные!';
    }

    if( R::count('users', "email = ?", array($data['email'])) > 0 )
    {
        $errors[] = 'Пользователь с таким Email уже зарегистрирован!';
    }


    if( empty($errors) )
    {
        // всё хорошо, регистрируем
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $user->passport = $data['passport'];
        $user->passport_2 = $data['passport_2'];
        R::store($user);
        echo '<div style="color: green;">Регистрация прошла успешно!<br/>Перейти на <a href="/">главную</a></div><hr>';

    } else
    {
        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
    }

}


?>

<link rel="stylesheet" href="Ssignup.css">
<body>
<form action="/signup.php" method="POST">
    <div class="form1">
        <h1>Регистрация</h1>
        <div class="input-form">
            <input type="text" name="login" placeholder="ФИО" value="<?php echo @$data['login']; ?>">
        </div>

        <div class="input-form">
            <input type="email" name="email" placeholder="E-mail" value="<?php echo @$data['email']; ?>"> 
        </div>
        
        <div class="input-form">

            <p><?php
            $chars="qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM!@#$%^&*()-";
            $max=15;
            $size=StrLen($chars) -1;
            $password=null;
                while($max--)
                $password.=$chars[rand(0,$size)];
            echo 'Сгенирированный пароль: '.$password.""?></p>
        </div>

        <div class="input-form">
            <input type="password" name="password" placeholder="Пароль" value="<?php echo @$data['password']; ?>">
        </div>

        <div class="input-form">
            <input type="password" name="password_2" placeholder="Пароль ещё раз" value="<?php echo @$data['password_2']; ?>">
        </div>

        <div class="input-form">
            <input type="passport" name="passport" placeholder="Серия паспорта" value="<?php echo @$data['passport']; ?>">
        </div>

        <div class="input-form">
            <input type="passport" name="passport_2" placeholder="Номер паспорта" value="<?php echo @$data['passport_2']; ?>">
        </div>

        <div class="input-form">
            <input type="submit" name="do_signup" value="Зарегистрироваться">
        </div>
    </div>
</form>
</body>





