<!DOCTYPE html>
<html lang="en">
<head>
<base href="<?php echo base_url(); ?>"></base>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>New pages</title>
<script src="./js/jquery.min(1.11.1).js"></script>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans" />
<link href="./css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="./css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="./css/style.css"></link>
<link rel="stylesheet" type="text/css" href="./css/newStyle.css"></link>
<script src="./js/main.js"></script>
<style>
</style>
</head>
<body>
<header >
    <!-- Navigation -->
    <nav class="navbar navbar-custom  " role="navigation" >
        <div class="container ">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="Legal/index">
                    <a class="light" href="#"><img src="assets/img/logo.png" height=35 width=35></a>&nbsp;&nbsp;
                    <a class="light" href="#" style="color:white;">legistify</a>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li class="hidden">     
                        <a href="#page-top"></a>       
                    </li>
                    <li>
                        <a class="page-scroll" href="docs">DOCUMENTS</a>
                    </li>
                    <li>
                        <a class="page-scroll"  href="#myModal" data-toggle="modal" data-target="#myModal">RESEARCH</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="lawyerDir">LAWYERS</a>
                    </li>       
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>
</header>
<!-- Header END================================================ -->

<div class="content container">
    <div class="row">
        <div class="col-md-12" style="margin-top:40px">
            <div class="rsh_result_open">
                <div class="rsh_result_head">
                    <div class="result_tags small_light">
                        <i class="fa fa-tag"></i> <?php foreach($tags  as $tag ){echo $tag['name'].',';}?>
                    <div class="result_ques">
                        <?php echo $articles['title'];?>
                    </div>
                    <div class="result_info_strip small_light">
                        <i class="fa fa-calendar"></i><?php echo date("d M Y",strtotime($articles['datetime'])); ?> &nbsp;|&nbsp; <i class="fa fa-eye"></i>Views: <?php echo $articles['views'];?> &nbsp;|&nbsp;  <a href= "<?php echo base_url(); ?>Articles/upvote_article/<?php echo $articles['id'];?>"> <i class="fa fa-arrow-up"></i>Upvotes:</a> <?php echo $articles['Upvotes'];?> 
                    </div>
                </div>
            </div>
            <div class="rsh_open_descr">
                <div class="rsh_result_body">
                    <div class="credibility_facts">
                        <div class="cf_img">
                            <img src=<?php echo $articles['pic_link'];?>>
                        </div>
                        <div class="cf_facts">
                            <div class="cf_facts_name"><?php echo $articles['username'];?></div>
                            <div class="cf_facts_descr small_light ellipsis">
                            <?php echo $articles['acc_type'];?>
                            </div>
                        </div>
                    </div>
                    <div class="result_ans">
                        <?php echo $articles['content'];?>
                    </div>
                </div>
                <div class="result_info_strip" style="margin: 25px 0;">
                     <a href= "<?php echo base_url(); ?>Articles/upvote_article/<?php echo $articles['id'];?>"> <i class="fa fa-arrow-up"></i>Upvote</a> <?php echo $articles['Upvotes'];?></a> &nbsp;|&nbsp;<a href= "<?php echo base_url(); ?>Articles/downvote_article/<?php echo $articles['id'];?>"> <i class="fa fa-arrow-down"></i>Downvote</a>  <?php echo $articles['Downvotes'];?><i class="fa fa-arrow-up"></i>Share
                </div>
            </div>

            <div style="margin:15px 0">
                <a href="Articles/view_detail/<?php echo $articles['id'] - 1;?>"><button class="btn btn-dark">Prev</button></a>
                <a href="Articles/view_detail/<?php echo $articles['id'] + 1;?>"><button class="btn btn-dark" style="float:right">Next</button>  </a>
            </div>
            <div style="margin-top:50px;">
                <h2>Comments:</h2><hr style="border-color:#aaa">
            </div>
            <div class="comments_body">
                <div class="credibility_facts">
                    <div class="cf_img">
                        <img src="./img/people.png">
                    </div>
                    <div class="cf_facts">
                        <?php 
                               echo form_open('Articles/post_comment/'.$articles['id'])?>
                        <input type="text" placeholder="Your comments" name="content" style="width:80%; padding: 10px;"></input>
                        <button class="btn btn-dark" type="submit" style="height:44px;line-height:30px">Post</button>
                    </div>
                    <div style="clear:both"></div>
                </div>
               <?php foreach($comment_list  as $comments ){
                   foreach($comments  as $name ){

                                      
                                     $id=$name['id']; ?>
                <div class="credibility_facts">
                    <div class="cf_img">
                        <img src=<?php echo $name['pic_link'];?>>
                    </div>
                    <div class="cf_facts">
                        <div class="cf_facts_name"><?php echo $name['fname'].$name['lname'];?>
</div>
                        <div class="cf_facts_descr">
                        <?php echo $name['comment'];?>
                        </div>
                        <div class="result_info_strip small_light">
                            <?php echo date("g:iA  d M Y",strtotime($name['datetime'])); ?> &nbsp;|&nbsp; <a href= 'Articles/upvote_comment/<?php echo $name['id'];?>'>Likes: <?php echo $name['Upvotes'];?></a> &nbsp;|&nbsp; Reply
                        </div>
                    </div>
                </div>
                <?php foreach($reply_list  as $reply ){
                   foreach($reply  as $name ){

                                      
                                    if( $id==$name['comment_id'] ){?>
                <div class="credibility_facts">
                    <div class="cf_img">
                      <img src=<?php echo $name['pic_link'];?>>
                    </div>
                    <div class="cf_facts">
                        <div class="cf_facts_name"><?php echo $name['fname'].$name['lname'];?></div>
                        <div class="cf_facts_descr">
                       <?php echo $name['comment'];?>
                        </div>
                        <div class="result_info_strip small_light">
                            <?php echo date("g:iA  d M Y",strtotime($name['datetime'])); ?>
                        </div>
                    </div>
                </div>
               <?php } }}} }?>
            </div>
        </div>
    </div>
</div>

<!-- Footer ===================================================-->
<footer >
    <div class="myfooter">
    <div class="footer-section container content-section text-left" >
        <div class="footer_align row" style="padding-left:0px;margin-top:-50px">
            <div class="footer_content" >
                <h2 style="margin-bottom:0px">legistify</h2>
                <ul style="list-style-type:none; text-decoration: none;display:inline">
                    <li> B-37, Ground floor, Polyplex Tower-A, Sector-1, Noida.</li>
                    <li><b>Email:</b> contact@legistify.com</li>
                    <li><br/></li>
                </ul>
                <button onclick="window.open('https://www.facebook.com/legistify/')" class="btn btn-social azm-facebook" ><i class="fa fa-facebook"></i></button>
                <button onclick="window.open('https://plus.google.com/+getlegalIn/posts')" class="btn btn-social azm-google-plus"><i class="fa fa-google-plus"></i></button>
                <button onclick="window.open('https://twitter.com/legistify')" class="btn btn-social azm-twitter"><i class="fa fa-twitter"></i></button>
                <button onclick="window.open('https://www.linkedin.com/company/get-legal')" class="btn btn-social azm-linkedin"><i class="fa fa-linkedin"></i></button>
                <button onclick="window.open('http://www.slideshare.net/getlegalindia')" class="btn btn-social azm-slideshare"><i class="fa fa-slideshare"></i></button>
            </div>

            <!--  -->
            <div style="display:block;clear:both;">
                <div class="footer_link_cont">
                    <h4>Quick Links</h4>
                    <div class="links_collapse">
                        <ul>
                            <li><a href="about">About</a></li>
                            <li><a href="careers">Careers</a></li>
                            <li><a href="contact">Contact Us</a></li>
                            <li><a  href="docs">Documents</a></li>
                            <li><a href="price" target="_blank">Membership Plans</a></li>
                            <li><a  href="#myModal" data-toggle="modal" data-target="#myModal">Research</a></li>
                            <li><a  href="price/#FAQ">FAQs</a></li>
                            <li><a  href="site">Site Map</a></li>
                        </ul>
                    </div>
                    <div class="show_foot_links">Show More</div>
                </div>

                <div class="footer_link_cont">
                    <h4>Most Popular</h4>
                    <div class="links_collapse">
                      <ul>
                        <li><a href="docs/overview/exclusive-agency">Agency Agreement</a></li>
                        <li><a href="docs/overview/technical-know">Technical know how Agreement</a></li>
                        <li><a href="docs/overview/assignment-copyright">Copyright Assignment</a></li>
                        <li><a href="docs/overview/manufacturing">Manufacturing Agreement</a></li>
                        <li><a href="docs/overview/nda">Non-Disclosure</a></li>
                        <li><a href="docs/overview/lease-deed">Lease</a></li>
                        <li><a href="docs/overview/sale-deed-individual-property">Sale Deed</a></li>
                        <li><a href="docs/overview/sole-arbitration">Arbitration Agreement</a></li>
                        <li><a href="docs/overview/licence">License Agreement</a></li>
                        <li><a href="docs/overview/graphic-designer">Graphic  Designer Agreement</a></li>
                        <li><a href="docs/overview/merchant">Merchant Agreement</a></li>
                      </ul>                      
                    </div>
                    <div class="show_foot_links">Show More</div>
                 </div>
                <div class="footer_link_cont">
                    <h4>Legal Resources</h4>
                    <div class="links_collapse">
                      <ul>
                        <li><a data-toggle="modal" data-target="#myModal" style="cursor:pointer">Q&A</a></li>
                        <li><a data-toggle="modal" data-target="#myModal" style="cursor:pointer">Blogs</a></li>
                        <li><a href="glossary" style="cursor:pointer">Glossary</a></li>
                        <li><a data-toggle="modal" data-target="#myModal" style="cursor:pointer">Bare Acts</a></li>

                      </ul>                      
                    </div>
                    <div class="show_foot_links">Show More</div>
                </div>
            </div>
            <!-- ****** -->

        </div>  
    </div>
    <HR WIDTH="100%" style="border-color:#F2F2F2" >
    <div class="footer-section container text-left" >   
        <div style="margin-bottom: 15px;font-size:15px">
            <div class="inline_mar-right">
                <a href="terms">Terms And Conditions</a>
            </div>
            <div class="inline_mar-right">
                <a href="disclaimer">Legal Disclaimer</a>
            </div>
            <div class="inline_mar-right" style="float:right">© Legistify 2015</div> 
        </div>

    </div>
    </div>
</footer>
</body>
</html>