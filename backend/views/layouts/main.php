<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php 

?>
<div class="page-container">	
    <div class="left-content">
	    <div class="mother-grid-inner">
            <!--header start here-->
                <div class="header-main">
					<div class="header-left" style="width:35%">
							<div class="logo-name">
								<a href="<?php echo Url::toRoute('site/index'); ?>"> 
									<!--<h1>J.Kumar RMC</h1> -->
									<img id="logo" src="images/logo.jpg" alt="Logo" style="width:100px"/> 
								</a> 								
							</div>
					 </div>
					 <div class="col-md-3" >
						<center><img id="logo" src="images/eagle.jpeg" alt="Logo" style="width:150px; height:150px; " /></center>							
					</div>
						 <div class="header-right" style="width:35%">
						

							<div class="profile_details">		
								<ul>
                                    <li>
                                    <?php
                                        echo  Html::beginForm(['/site/logout'], 'post')
                                        . Html::submitButton(
                                            'Logout (' . Yii::$app->user->identity->username . ')',
                                            ['class' => 'btn btn-link logout']
                                        )
                                        . Html::endForm();
                                    ?>
                                    </li>
									<!-- <li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="images/p1.png" alt=""> </span> 
												<div class="user-name">
													<p>Malorum</p>
													<span>Administrator</span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
											<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li> 
											<li> <a href="#"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li> -->
								</ul>
							</div>
							<div class="clearfix"> </div>				
						</div>
				     <div class="clearfix"> </div>	
				</div>
			<!--heder end here-->
            <div class="inner-block" style="margin-top: 100px;">
			<?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>							
            <?= $content ?>
            </div>
                <!--copy rights start here-->
                <div class="copyrights">
                    <p>J.Kumar RMC,Pune</p>
                </div>	
                <!--COPY rights end here-->
        </div>
    </div>
	
    <!--slider menu-->
    <div class="sidebar-menu">
		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
			      <!--<img id="logo" src="" alt="Logo"/>--> 
			  </a> </div>		  
		    <div class="menu">
				<center><h3 style="color:white;">J.Kumar RMC, Pune</h3> </center>
		      <ul id="menu" >
				  <?php
					 $menuList = Yii::$app->Permission->getMenus();
					 foreach ($menuList as $key => $value) {
						 echo  $value;
					 }  
				//   print_r(Yii::$app->Permission->getMenus());				 
				 ?>
		        <!-- <li id="" ><a href="index.html"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
		        <li><a href="#"><i class="fa fa-cogs"></i><span>Components</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul>
		            <li><a href="grids.html">Grids</a></li>
		            <li><a href="portlet.html">Portlets</a></li>		            
		          </ul>
		        </li>
		        <li id="menu-comunicacao" ><a href="#"><i class="fa fa-book nav_icon"></i><span>Element</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul id="menu-comunicacao-sub" >
		            <li id="menu-mensagens" style="width: 120px" ><a href="buttons.html">Buttons</a>		              
		            </li>
		            <li id="menu-arquivos" ><a href="typography.html">Typography</a></li>
		            <li id="menu-arquivos" ><a href="icons.html">Icons</a></li>
		          </ul>
		        </li>
		          <li><a href="maps.html"><i class="fa fa-map-marker"></i><span>Maps</span></a></li>
		        <li id="menu-academico" ><a href="#"><i class="fa fa-file-text"></i><span>Pages</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul id="menu-academico-sub" >
		          	 <li id="menu-academico-boletim" ><a href="login.html">Login</a></li>
		            <li id="menu-academico-avaliacoes" ><a href="signup.html">Sign Up</a></li>		           
		          </ul>
		        </li>
		        
		        <li><a href="charts.html"><i class="fa fa-bar-chart"></i><span>Charts</span></a></li>
		        <li><a href="#"><i class="fa fa-envelope"></i><span>Mailbox</span><span class="fa fa-angle-right" style="float: right"></span></a>
		        	 <ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="inbox.html">Inbox</a></li>
			            <li id="menu-academico-boletim" ><a href="inbox-details.html">Compose email</a></li>
		             </ul>
		        </li>
		         <li><a href="#"><i class="fa fa-cog"></i><span>System</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	 <ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="404.html">404</a></li>
			            <li id="menu-academico-boletim" ><a href="blank.html">Blank</a></li>
		             </ul>
		         </li>
		         <li><a href="#"><i class="fa fa-shopping-cart"></i><span>E-Commerce</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="product.html">Product</a></li>
			            <li id="menu-academico-boletim" ><a href="price.html">Price</a></li>
		             </ul>
		         </li> -->
		      </ul>
		    </div>
	 </div>
	<div class="clearfix"> </div>
</div>  
<!-- script-for sticky-nav -->
<script>

		// $(document).ready(function() {
		// 	 var navoffeset=$(".header-main").offset().top;
		// 	 $(window).scroll(function(){
		// 		var scrollpos=$(window).scrollTop(); 
		// 		if(scrollpos >=navoffeset){
		// 			$(".header-main").addClass("fixed");
		// 		}else{
		// 			$(".header-main").removeClass("fixed");
		// 		}
		// 	 });
			 
		// });
</script>
<!-- /script-for sticky-nav -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
