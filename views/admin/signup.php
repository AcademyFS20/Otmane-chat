<?php 
ob_start(); 
?>
   <body id="body-signup">
    <section id="text-login">
        <h2>Let's chat</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum et ligula vulputate vehicula. Aenean pharetra arcu bibendum tempus bibendum. Vestibulum lacinia dui quis gravida ultricies. Sed et nulla in magna cursus finibus ac eu erat. Donec faucibus dignissim libero ut placerat. Duis vestibulum eget dolor varius sollicitudin.</p>
    </section>
    <section id="signup">
        <img src="./public/assets/futur.png" alt="image futur">
        <h2 class="title2">SIGN UP</h2>
        <form class="form" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Enter your first name" name="fname">
            </div>
            <?php 
            // if(isset($_data['status']))
            // {
            //     echo '<p style="color:red;">'.$data['error'].'</p>';
            // }
            // if($data['status'])
            // {
            //     echo '<p style="color:red;text-align:center;font-size:2rem;">'.$data['errorFname'].'</p>';
            // }  
            ?>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Enter your last name" name="lname">
                
            </div>
            <?php
            // if($data['status'])
            // {
            //  echo '<p style="color:red;text-align:center;font-size:2rem;">'.$data['errorLname'].'</p>';
            // }
            ?>
            <div class="form-group">
                <input class="form-control" type="email" placeholder="Enter your email" name="email">
            </div>
            <?php
            // if($data['status'])
            // { 
            // echo '<p style="color:red;text-align:center;font-size:2rem;">'.$data['errorEmail'].'</p>';
            // } 
            ?>
            <div class="form-group">
                <input class="form-control" type="password" placeholder="Enter your password" name="pass">
            </div>
            <?php
            // if($data['status'])
            // { 
            // echo '<p style="color:red;text-align:center;font-size:2rem;">'.$data['errorPass'].'</p>';
            // } 
            ?>
            <!-- <div class="form-group">
                <input class="form-control" type="file" value="Choose your avatar">
            </div> -->
            <div class="custom-file form-group">
                <input type="file" id="img" name="image" class="custom-file-input">
                <label class="custom-file-label" for="exampleInputFile" data-browse="choose your avatar"><i class="fas fa-cloud-download-alt" style="color:green;margin-left:100px;"></i></label>
            </div>
            <div class="form-group">
                <input type="submit" name="signup" value="CREATE ACCOUNT">
            </div>
        </form>
        <!-- <?php echo $data['email']; ?> -->
        <a href="<?php echo \Provider\Request::Route("login"); ?>"><i class="fas fa-user"></i>Already have an account?</a>
    </section>
<?php
 $content=ob_get_clean();
require dirname(__DIR__).DIRECTORY_SEPARATOR.'templates\template.php';