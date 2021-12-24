<?php 
ob_start(); 
?>
    <body id="body-login">
    <section id="text-login">
        <h2>Let's chat</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum et ligula vulputate vehicula. Aenean pharetra arcu bibendum tempus bibendum. Vestibulum lacinia dui quis gravida ultricies. Sed et nulla in magna cursus finibus ac eu erat. Donec faucibus dignissim libero ut placerat. Duis vestibulum eget dolor varius sollicitudin.</p>
    </section>
    <section id="login">
        <img src="./public/assets/futur.png" alt="image futur">
        <h2 class="title2">Login</h2>
        <form class="form" method="POST" action="">
            <div class="form-group">
                <input class="form-control" type="email" placeholder="Enter your email" name="emailLogin">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" placeholder="Enter your password" name="passLogin">
            </div>
            <div class="form-group">
                <input type="submit" name="login" value="LOGIN">
            </div>
        </form>
        <a href="<?php echo \Provider\Request::Route("signup"); ?>"><i class="fas fa-user"></i>Create an account?</a>
    </section>
    
<?php
$content=ob_get_clean();
require dirname(__DIR__).DIRECTORY_SEPARATOR.'templates/template.php';