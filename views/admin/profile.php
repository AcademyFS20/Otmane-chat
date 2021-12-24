<?php 
ob_start(); 
?>
<body id='dashboard'>
    <header>
        <div class="first">Profile</div>
        <div class="second"></div>
    </header>
    <main>
        <div id="profile">
            <img src="image.png" class="rounded-circle">
            <p>User name</p>
            <a href="#">Change Name</a>
            <a href="#">Change Password</a>
            <p>110 User Online</p>
        </div>
        <div id="chat">
            <div class="friend">
                <div class="message">
                    <div class="friend-line">
                        <div class="img-message">
                            <img src="image.png" class="rounded-circle">
                            <div class="circle-green"></div>
                        </div>
                        <p>Tijani Abdelatif</p>
                        <p>1 day ago</p>
                    </div>
                    <div>
                        <p class="message-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum et ligula vulputate vehicula. Aenean pharetra arcu bibendum tempus bibendum. Vestibulum lacinia dui quis gravida ultricies. Sed et nulla in magna cursus finibus ac eu erat. Donec faucibus dignissim libero ut placerat. Duis vestibulum eget dolor varius sollicitudin.</p>
                    </div>
                </div>
                <div class="message">
                    <div class="friend-line">
                        <div class="img-message">
                            <img src="image.png" class="rounded-circle">
                            <div class="circle-red"></div>
                        </div>
                        <p>Tijani Abdelatif</p>
                        <p>1 day ago</p>
                    </div>
                    <div>
                        <p class="message-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum et ligula vulputate vehicula. Aenean pharetra arcu bibendum tempus bibendum. Vestibulum lacinia dui quis gravida ultricies. Sed et nulla in magna cursus finibus ac eu erat. Donec faucibus dignissim libero ut placerat. Duis vestibulum eget dolor varius sollicitudin.</p>
                    </div>
                </div>
                <div class="message">
                    <div class="friend-line">
                        <div class="img-message">
                            <img src="image.png" class="rounded-circle">
                            <div></div>
                        </div>
                        <p>Tijani Abdelatif</p>
                        <p>1 day ago</p>
                    </div>
                    <div>
                        <p class="message-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum et ligula vulputate vehicula. Aenean pharetra arcu bibendum tempus bibendum. Vestibulum lacinia dui quis gravida ultricies. Sed et nulla in magna cursus finibus ac eu erat. Donec faucibus dignissim libero ut placerat. Duis vestibulum eget dolor varius sollicitudin.</p>
                    </div>
                </div>
            </div>
            <div class="me">
                <div>
                    <p class="date-me">1 day ago</p>
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum et ligula vulputate vehicula. Aenean pharetra arcu bibendum tempus bibendum.</p>
                    </div>
                </div>
                <div>
                    <p class="date-me">1 day ago</p>
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum et ligula vulputate vehicula. Aenean pharetra arcu bibendum tempus bibendum.</p>
                    </div>
                </div>
                <div>
                    <p class="date-me">1 day ago</p>
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum et ligula vulputate vehicula. Aenean pharetra arcu bibendum tempus bibendum.</p>
                    </div>
                </div>
                <div>
                    <p class="date-me">1 day ago</p>
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum et ligula vulputate vehicula. Aenean pharetra arcu bibendum tempus bibendum.</p>
                    </div>
                </div>
                <div>
                    <p class="date-me">1 day ago</p>
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum et ligula vulputate vehicula. Aenean pharetra arcu bibendum tempus bibendum.</p>
                    </div>
                </div>
                <div>
                    <p class="date-me">1 day ago</p>
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum et ligula vulputate vehicula. Aenean pharetra arcu bibendum tempus bibendum.</p>
                    </div>
                </div>
                <div>
                    <p class="date-me">1 day ago</p>
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum et ligula vulputate vehicula. Aenean pharetra arcu bibendum tempus bibendum.</p>
                    </div>
                </div>
            </div>
            <!-- <hr> -->
            <div id="bottom-dashboard">
                <div id='send'>
                    <textarea placeholder="Your message"></textarea>
                </div>
                <div>
                    <input type="file">
                </div>
            </div>
        </div>
    </main>
    <?php
 $content=ob_get_clean();
require dirname(__DIR__).DIRECTORY_SEPARATOR.'templates\template.php';