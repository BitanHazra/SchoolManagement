    
        <div class="top-nav">
            <div class="drop-container">
                <div class="user_con">
                    <?php if(!isset($_SESSION['username'])): ?>
                        <button id="nav_log_in_btn">Log in</button>
                    <?php endif;?>
                    <?php if(isset($_SESSION['username'])): ?>
                        <img src="#" class="user_img"><span class="user"><?php echo $_SESSION['username']; ?></span><span class="arrow"></span>
                    <?php endif; ?>
                </div>
                <?php if(isset($_SESSION['username'])): ?>
                    <div class="dropdown">
                        <a href="#" class="logout_btn">Log out</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="log_in">
            <div class="log_in_content">
                <div class="align_content">
                    <span class="close">&times;</span>
                    <label for="username">Enter username:</label>
                    <input type="text" name="username" class="username">
                    <label for="userpassword">Enter Password:</label>
                    <input type="text" name="userpassword" class="userpassword">
                    <div class="captcha"></div>
                    <button id="refreshCaptha">refresh</button>
                    <button onclick="login()" id="log_in_btn">Log in</button>
                </div>
            </div>
        </div>
        <div class="log_out">
            <div class="log_out_content">
                <div class="log_out_align_content">
                    <span class="log_out_close">&times;</span>
                    <p>Are You sure you want to Log Out?</p>
                    <button onclick="logout()" id="log_in_btn">Log Out</button>
                </div>
            </div>
        </div>
        <script>
            $('.logout_btn').on('click',function(){
                $('.log_out').css('display','flex');
            })
            function logout(){
                $.ajax({
                    url:'../side_navigation/loginDatabase.php',
                    type:'POST',
                    data:{'work':'logout'},
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                        $('.log_out').css('display','none');
                        window.location.href = "/school_Management/teachers/teachers.php";    
                    },
                    error:function(xpt,value,status){
                        console.log("error in"+value+"status"+status);
                    }
                })
            }
            function login(){
                var username = $('.username').val();
                var password = $('.userpassword').val();
                alert();
                $.ajax({
                    url:'../side_navigation/loginDatabase.php',
                    type:'POST',
                    data:{'username':username,'password':password,'work':'login'},
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                        $('.log_in').css('display','none');
                        window.location.href = "/school_Management/teachers/teachers.php";    
                    },
                    error:function(xpt,value,status){
                        console.log("error in"+value+"status"+status);
                    }
                })
            }
            
            $('#nav_log_in_btn').on('click',function(){
                $('.log_in').css('display','flex');
            })
            $('.close').on('click',function() {
                $('.log_in').css('display','none');
            })
            $('.log_out_close').on('click',function() {
                $('.log_out').css('display','none');
            })

            $('.drop-container').on('mouseenter',function(){
                $('.dropdown').css('display','flex');
                }).on('mouseleave',function(){
            $('.dropdown').css('display','none');
    });
        </script>
        
        
        <style>
            .log_out{
                width: 100%;
                height: 100%;
                display: none;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 10;
            }
            .log_in{
                width: 100%;
                height: 100%;
                display: none;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 10;
            }
            #nav_log_in_btn{
                width: 100px;
                height: 40px;
                border: none;
                font-weight: 500;
                font-size: large;
                color: white;
                background: #855cb4;
            }
            #nav_log_in_btn:hover{
                cursor: pointer;
            }
            .log_out_content{
                width: 320px;
                height: 150px;
                background: white;
                box-shadow: 0px 2px 15px rgb(155, 148, 148);
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                border-radius: 5px;
                position: relative;
            }
            .log_in_content{
                width: 420px;
                height: 250px;
                background: white;
                box-shadow: 0px 2px 15px rgb(155, 148, 148);
                display: flex;
                flex-direction: column;
                justify-content: center;
                border-radius: 5px;
                position: relative;
                align-items: center;
            }
            .log_out_align_content{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            
            .align_content{
                width: 200px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                height: 200px;
            }
            .username,.userpassword{
                padding: 5px 5px;
                border: 1px solid blueviolet;
                margin-bottom: 15px;
            }
            #log_out_btn,#log_in_btn,#refreshCaptha{
                padding: 5px 10px;
                width: 90px;
            }
            .close,.log_out_close{
                position: absolute;
                right: 10px;
                top: 0;
                cursor: pointer;
                font-weight: 600;
                font-size: x-large;
            }
            
        </style>