<?php
if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $password]);
        header('Location: index.php?page=login');
        exit();
    } catch(PDOException $e) {
        $error = "Ошибка при регистрации. Возможно, email уже существует.";
    }
}
?>

<div class="register-body">
    <div class="register-main">
        <h1>Регистрация</h1>
        <?php if(isset($error)): ?>
            <p class="errP"><?php echo $error; ?></p>
        <?php endif; ?>
        
        <form method="POST">
            <p>Имя</p>
            <input type="text" name="name" required>
            
            <p>Электронная почта</p>
            <input type="email" name="email" required>
            
            <p>Пароль</p>
            <input type="password" name="password" required minlength="5">
            
            <button type="submit" name="register">Регистрация</button>
        </form>
    </div>
</div>