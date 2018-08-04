<?php

/* @var $this yii\web\View */

$this->title = 'Welcome';
?>
<style> 
div {
    -webkit-user-select: none; /* Safari 3.1+ */
    -moz-user-select: none; /* Firefox 2+ */
    -ms-user-select: none; /* IE 10+ */
    user-select: none; /* Standard syntax */
}

</style>


<!-- <style>

.btn {
	background-image: linear-gradient(to right, #006175 0%, #00a950 100%);
	border-radius: 40px;
  box-sizing: border-box;
	color: #cc0000;
	display: block;
	font: 1.125rem 'Oswald', Arial, sans-serif; /*18*/
	height: 50px;
	letter-spacing: 1px;
	margin: 0 auto;
	padding: 4px;
	/* position: absolute; */
  text-decoration: none;
	width: 100px;
	z-index: 2;
}

.btn:hover {
	color: #fff;
}

.btn span {
	align-items: center;
	background: #e7e8e9;
	border-radius: 40px;
	display: flex;
	justify-content: center;
	height: 100%;
	transition: background .5s ease;
	width: 100%;
}

.btn:hover span {
	background: transparent;
}

</style> -->

<style>
    .footer {
           position: fixed;
           left: 0;
           bottom: 0;
           height: 40px;
           width: 100%;
           background-color: #cc0000;
           color: white;
           text-align: center;
        }   

        p {
            padding: 10px;
        }

</style>

<div class="site-index">
    <div class="body-content">
        <?php
        if(isset(Yii::$app->user->identity)){
            print_r(Yii::$app->user->identity);

            echo Yii::$app->user->identity->user_level;
        
            print_r(Yii::$app->Permission->getMenus());
        }
        ?>
        <!-- <a class="btn" href="#">
            <span>Signup</span>
        </a>
        <a class="btn" href="#">
            <span>Login</span>
        </a> -->
        <br/><br/>
        <center><div id="intro">
            <div class="intro-body">
                <div class="container-fluid">
                    <img src="images/logo.jpeg" height = "200px" width = "200px" />
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                        <h1 style="font-size:70px;"><span class="heading"><font face="algerian" color="#4CAF50">Welcome To J.Kumar, RMC</font></span></h1>
                        </div>
                    </div>
                </div>
            </div></center>
        </div>

        <!-- <footer>
            Powered by ON MAP SOLUTIONS, PUNE
        </footer> -->

        <div class="footer">
            <p>Powered by ON MAP SOLUTIONS, PUNE</p>
        </div>        
        

    </div>
</div>


