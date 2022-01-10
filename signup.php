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
        echo '<div style="color: green;">Регистрация прошла успешно!</div><hr>';

    } else
    {
        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
    }

}


?>

<form action="/signup.php" method="POST">
    <p>
        <p><strong>Ваше ФИО</strong>:</p>
        <input type="text" name="login" value="<?php echo @$data['login']; ?>">
    </p>

    <p>
        <p><strong>Ваш e-mail</strong>:</p>
        <input type="email" name="email" value="<?php echo @$data['email']; ?>"> 
    </p>

    <p>
        <p><strong>Ваш пароль</strong>:  
        <p><?php
        $chars="qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM!@#$%^&*()-";
        $max=15;
        $size=StrLen($chars) -1;
        $password=null;
            while($max--)
            $password.=$chars[rand(0,$size)];
        echo "Сгенирированный пароль: ".$password.""
    ?></p>
    </p> 
        <input type="password" name="password" value="<?php echo @$data['password']; ?>">
    </p>

    <p>
        <p><strong>Пароль ещё раз</strong>:</p>
        <input type="password" name="password_2" value="<?php echo @$data['password_2']; ?>">
    </p>

    <p>
        <p><strong>Серия вашего паспорта</strong>:</p>
        <input type="passport" name="passport" value="<?php echo @$data['passport']; ?>">
    </p>

    <p>
        <p><strong>Номер вашего паспорта</strong>:</p>
        <input type="passport" name="passport_2" value="<?php echo @$data['passport_2']; ?>">
    </p>


    <p>
        <button type="submit" name="do_signup">Зарегистрироваться</button>
    </p>
</form>





