<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=320, height=device-height, target-densitydpi=medium-dpi" /> -->

    <meta tag="description" content = "An open platform for everyone to discuss and enquire about all the law related queries. Be it business related or personal you get quick, useful and reliable advice in the form of answers only from lawyers and law students.A wonderful and unique platform for you to find your future lawyer/legal consultant and get your work done up and fast.
It also serves a purpose for lawyers to connect with their future clients and get noticed for their work and achievements by their contemporaries.
We also aim at providing the big exposure that students currently pursuing law deserve and we give them a platform to share their wisdom and learn from others and get noticed in the legal arena even before actually stepping into it.">
    <meta name="keywords" content="
        legistify,
        legistify legal docs,
        legistify legal documents, 
        create legal docs online,
        create legal documents online,
        make legal agreements online,
        make legal docs,
        make legal documents,
        forge legal agreements online,
        forge legal agreements,
        online legal agreements template,
        online legal documents,
        rental agreement online,
        make rental agreement online,
        make employment bond online,
        create employment bonds,
        raees,
        bajrangi bhaijan,
        rath yatra,
        myntra sale,
        wwe battleground,
        jules bianchi,
        golds cup,
        cricket,
        live cricket score,
        sunny leone,
        beer,
        coffee,
        wine,
        facebook,
        batman vs superman,
        big brother
        law,
        getlegal,
        getlegal india,
        get legal,
        get legal india,
        get legal in india,
        lawyers,
        law students,
        indian law,
        online lawyers,
        law schools,
        indian lawyers,
        indian law students,
        indian lawyers online,
        online legal advice,
        online free legal advice,
        online legal consultation,
        online legal help,
        free online legal consultation,
        free legal help,
        online legal facilitation,
        legal aid online,
        free legal aid,
        legal questions,
        legal answers,
        legal queries,
        legal qna,
        legal q&a,
        legal discussions,
        getlegal online,
        laws,
        laws in india,
        legal blogs,
        getlegal login,
        getlegal signup,
        getlegal solutions,
        bonds,
        find lawyers online,
        vakil search,
        legally india,
        barnbench,
        livelaw,
        easylaw,
        rocket lawyer,
        shake,
        vakilno1,
        legal startups in india,
        legal startups,
        startup laws,
        company incorporation,
        kaanoon,
        supreme court of india news">
        
    <base href="<?php echo base_url(); ?>"></base>

    <title><?php echo $title; ?> | Legistify</title>
	<link rel="icon" href="assets/img/favicon.ico" type="image/ico" sizes="16x16">

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- icons CSS -->



	
	
    <!-- <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css"> -->
    <!-- <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans" />
  
    

    <link rel="stylesheet" type="text/css" href="assets/css/legal_research/style.css"></link>
    
    <link rel="stylesheet" type="text/css" href="assets/css/legal_research/newStyle.css"></link>
     

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
      
    <script src="assets/js/jquery.min(1.11.1).js"></script> 
    <script src="assets/js/main.js"></script>

    <!-- google analytics code -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-65297817-1', 'auto');
      ga('send', 'pageview');

    </script>

    <!--  -->

</head>
<!--Login  Modal  -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" id="login-overlay" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog loginForm" >
    <div class="modal-content ">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Login to Legistify</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-sm-6">
                      <div class="well" >
                          <form id="loginForm" novalidate>
                              <div class="form-group">
                                  <label for="username" class="control-label">Username/Email</label>
                                  <input type="text" class="form-control"  name="username1" title="Please enter you username" placeholder="example@gmail.com">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password1"  title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                              <button id="loginbtn" class="btn btn-dark " style="width:100%">Login</button>
                              <div id="loginErrorMsg" style="display:none"><span style="color:red">Wrong username or password</span></div>
                              <div align="right" style="margin-top:2px"><a style="color:black;cursor:pointer;font-size:12px" id="forgetpassword">Forgot Password?</a></div>
                              <div align="center" style="margin-top:5px"><b>OR</b></div>
                              <a href="" class="btn btn-social-dark azm-facebook" ><i class="fa fa-facebook"></i> &nbsp;&nbsp;Log in with Facebook</a>
                              <!-- <div align="center" style="margin-top:5px"><b>OR</b></div> -->
                              <a href="" class="btn btn-social-dark azm-google-plus"><i class="fa fa-google-plus"></i>&nbsp;&nbsp; Sign in with Google+</a>
                          </form>
                      </div>                      
                  </div>
                  <div class="col-sm-6" id="modal1">
                      <p class="lead">Register now for <span class="text-success">FREE</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check "></span> Affordable & Quick Legal Docs.</li>
                          <li><span class="fa fa-check "></span> Free Legal Resources.</li>
                          <li><span class="fa fa-check "></span> Exhaustive Lawyer Listings.</li>
                          <li><span class="fa fa-check "></span> One Stop Legal Solution.</li>
                          <li><a href="<?php echo site_url('About'); ?>"><u>Read more</u></a></li>
                      </ul>
                      <p><a class="btn btn-dark openSignUp" >Yes please, register now</a></p>
                  </div>
                  <div class="col-sm-6" id="modal2" style="display:none">
                          <form id="forgetForm">
                              <div class="form-group" >
                                  <p>Please enter email-id to reset password</p>
                                  <label for="username" class="control-label">Email-Id</label>
                                  <input type="text" class="form-control"  name="emailid" placeholder="example@gmail.com">
                              </div>
                              <p><a class="btn btn-dark " id="submitForgetPassword">Submit</a></p>
                          </form>
                          <p><a class="btn btn-dark openSignUp" >Register a new account</a></p>

                  </div>

              </div>
          </div>
      </div>
  </div>
<!-- </div>     -->

<!-- Login modal over -->
<!--Sign Up Modal  -->
<!-- <div class="modal fade bs-example-modal-sm" tabindex="-1" id="signup-overlay" role="dialog" aria-labelledby="mySmallModalLabel"> -->
  <div class="modal-dialog modal-lg signupForm" style="display:none">
    <div class="modal-content ">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			   <a role="button" href="" class="btn btn-dark" aria-label="Left Align">
				<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
			  </a>&nbsp;&nbsp;<b>Sign Up here</b>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="well">
                          <form id="formsignup" method="POST" enctype="multipart/form-data" >
                              <div class="form-group">
                                  <label for="firstname" class="control-label">First Name</label>
                                  <input type="text" class="form-control"  name="fname"  title="Please enter you name" placeholder="Ravi" required>
                                  <span class="help-block" style="display:none" id="fnameerror"><span style="color:red">This field is mandatory!</span></span>
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="lastname" class="control-label">Last Name</label>
                                  <input type="text" class="form-control"  name="lname" title="Please enter you last name" placeholder="Kumar" required>
                                  <span class="help-block" style="display:none" id="lnameerror"><span style="color:red">This field is mandatory!</span></span>
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="username" class="control-label">Username</label>
                                  <input type="text" class="form-control"  name="username" title="Please enter you username" placeholder="kumarravi" required>
                                  <span class="help-block" style="display:none;" id="uerror"><span style="color:red">Username not available</span></span>
                              </div>
                              <div class="form-group">
                                  <label for="username" class="control-label">Email</label>
                                  <input type="email" class="form-control"  name="email" title="Please enter you email" placeholder="ravikumar007@gmail.com" required>
                                  <span class="help-block" style="display:none" id="eerror"><span style="color:red">You are already registered.</span></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control"  name="password" title="Please enter your password" required>
                                  <span class="help-block" style="display:none" id="passworderror"><span style="color:red">Password can not be less than 6 characters.</span></span>
                                  <span class="help-block"></span>
                              </div>

<!--                               <div class="form-group">
                                  <label for="pic" class="control-label">Upload Image(Max 2mb,Recommended dimensions 150*150)</label>
                                  <input type="file" class="form-control"  name="pic" required>
                                  <span class="help-block" style="display:none"><span style="color:red">Error in uploading. Please Try Again</span></span>
                                  <span class="help-block"></span>
                              </div> -->

                            <div class="radio" style="text-align:left">
                              <label style="font-weight:bold;padding-left:0px">I am a &nbsp;</label>
                              <label><input type="radio" name="optradio" value="u" required>User</label>
                              <label><input type="radio" name="optradio" value="s">Law Student</label>
                              <span class="help-block" style="display:none" id="iamerror"><span style="color:red">This field is mandatory!</span></span>

                            </div>

                              
                              <button type="submit"  id="signupbtn" class="btn btn-dark ">Sign Up</button>

                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>  
<!-- Sign Up modal over -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<header>
  <nav class="navbar navbar-custom" role="navigation">
    <div class="container">

      <div class="navbar-header">
        <?php if($this->session->userdata('username')) { ?>
          <div class="btn-group forlawyers" id="oncollapse1" style="float:right">
            <button aria-expanded="false" aria-haspopup="true" class= "btn btn-default dropdown-toggle p_btn" data-toggle="dropdown" style= "font-size:16px">
               <!-- Image link <?php echo $this->session->userdata('pic') ?>   -->
               <span aria-hidden="true" class="glyphicon glyphicon-user"></span> 
            </button>
            <div class="my_list">
              <ul class="dropdown-menu box1" style="border-radius:0;left:auto;right:0">
                <?php 
                  echo '<li class="menu_name" style="color:black;">'.$this->session->userdata('name').'</li>'
                ?>
                <li class="divider" role="separator"> </li>
                <li> <a href="profile" id="pro">My Account</a> </li>
                <li> <a href="price" id="plan">Membership Plans</a> </li>
                <li class="divider" role="separator"> </li>
                <?php 
                  if(($this->session->userdata('login_type')) == 'email')
                  echo'<li><a  id="default_name" href="user/changepassword">Change Password</a></li>';
                ?>
                <li> <a href="user/logout" id="log">Logout</a> </li>
              </ul>
            </div>
          </div>
        <?php } ?>
        <button class="navbar-toggle" data-target=".navbar-main-collapse" data-toggle="collapse" type="button">
          <i class="fa fa-bars"></i>
        </button> 
        <a class="navbar-brand page-scroll" href="Legal/index">
        <a class="light" href="#"> <img height="35" src="assets/img/logo.png" width="35"> </a>
        &nbsp;&nbsp; 
        <a class="light" href="#" style="color:white;">legistify</a>
      </div><!-- nav-bar header END -->

      <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
        
        <ul class="nav navbar-nav">
          <li class="hidden">- <a href="#page-top"></a> - </li>
          <?php if(!($this->session->userdata('username'))) { ?>
            <li> <a class="page-scroll" href="about">ABOUT</a> </li>
            <li> <a class="page-scroll" href="docs">DOCUMENTS</a> </li>
            <li> <a class="page-scroll" data-target="#myModal" data-toggle="modal" href="#myModal">RESEARCH</a> </li>
            <li> <a class="page-scroll" data-target="#login-overlay" data-toggle="modal" href="#login-overlay">LOGIN</a> </li>
            <li><button class="btn btn-default forlawyers" onclick= "location.href='lawyers'" style="margin-top:5px; margin-left:18px">For lawyers</button></li>
          <?php }
          else {
          ?>
            <li> <a class="page-scroll" href="docs">DOCUMENTS</a> </li>
            <li> <a class="page-scroll" data-target="#myModal" data-toggle="modal" href= "#myModal">RESEARCH</a> </li>
            <li> <a class="page-scroll" href="lawyerDir">LAWYERS</a> </li>
            <li> 
              <div align="center" class="btn-group forlawyers" id="oncollapse2"> 
                <button aria-expanded="false" aria-haspopup="true" class= "btn btn-default dropdown-toggle p_btn" data-toggle="dropdown" style= "font-size:16px">
                   <!-- Image link <?php echo $this->session->userdata('pic') ?>   -->
                  <span aria-hidden="true" class= "glyphicon glyphicon-user"></span>
                </button>
                <div class="my_list">
                  <ul class="dropdown-menu box1" style="border-radius:0">
                    <?php 
                      echo '<li class="menu_name">'.$this->session->userdata('name').'</li>'
                    ?>
                    <li class="divider" role="separator"> </li>
                    <li> <a href="profile" id="pro">My Account</a> </li>
                    <li> <a href="price" id="plan">Membership Plans</a> </li>
                    <li class="divider" role="separator"> </li>
                    <?php if(($this->session->userdata('login_type')) == 'email')
                      echo'<li><a id="default_name" href="user/changepassword">Change Password</a></li>';
                    ?>
                    <li> <a href="user/logout" id="log">Logout</a> </li>
                  </ul>
                </div>
              </div>
            </li>
          <?php } ?>
        </ul>
        
      </div>

    </div>
  </nav>
</header>

