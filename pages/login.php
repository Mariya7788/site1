<?php
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header('Location: index.php');
        exit();
    } else {
        $error = "Неверное имя пользователя или пароль";
    }
}
?>

<div class="login-body">
    <div class="login-main">
        <h1>Вход</h1>
        <?php if(isset($error)): ?>
            <small style="color: red; text-align: center;"><?php echo $error; ?></small>
        <?php endif; ?>
        
        <form method="POST">
            <p>Электронная почта</p>
            <input type="email" name="email" required>
            
            <p>Пароль</p>
            <input type="password" name="password" required>
            
            <button type="submit" name="login">Войти</button>
            
            <p style="font-size: 15px">
                Еще нет аккаунта? <a href="index.php?page=register">Зарегистрироваться</a>
            </p>
        </form>
    </div>
</div>