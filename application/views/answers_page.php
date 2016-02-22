<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>New pages</title>
<script src="<?php echo base_url(); ?>/assets/js/jquery.min(1.11.1).js"></script>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans" />
<link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css"></link>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css"></link>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/newStyle.css"></link>
<script src="https://www.legistify.com/assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/main.js"></script>
<style>
.small_light2{
    color: #999;
    font-size:0.9em;
}
</style>
</head>
<body>
<header >
    <!-- Navigation -->
    <nav class="navbar navbar-custom " role="navigation" >
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
                        <i class="fa fa-tag"></i><?php if(!empty($question[0]->tags)) :echo $question[0]->tags[0]->name;endif;?><?php for($i=1;$i<sizeof($question[0]->tags);$i++): echo ','.$question[0]->tags[$i]->name;endfor;?>
                    </div>
                    <div class="result_ques">
                        <?php echo $question[0]->title ?>
                    </div>
                    <div style="margin:15px 0">
                    <?php echo $question[0]->description?>
                    </div>
                    <div class="result_info_strip small_light mar_bot_10" style="float:left">
                        <span class="inline_block_disp">By&nbsp; <?php echo $question[0]->username?> </span> 
                        &nbsp;|&nbsp; 
                        <span class="inline_block_disp"><i class="fa fa-calendar"></i><?php echo $question[0]->datetime?> </span>
                        &nbsp;|&nbsp; 
                        <span class="inline_block_disp"><a href='<?php echo base_url()?>forum/vote_que/<?php echo $question[0]->id?>'><i class="fa fa-arrow-up"></i></a>Upvotes: <?php echo $question[0]->upvotes?></span>
                        &nbsp;|&nbsp;
                        <span class="share inline_block_disp pointer"><i class="fa fa-share-alt"></i>Share</span>
                    </div>
                    <?php if($user_type== 'l'):?>
                        <button class="write_ans btn btn-dark mar_bot_10" style="float:right" data-toggle="modal" data-target="#write_ans">Write Answer</button>
                    <?php endif;?>
                </div>
            </div>
            <h2 style="clear:both;"><?php echo sizeof($answers)?> Answers</h2>
             <?php if(!empty($answers)):?>
            <div class="rsh_open_ans">

                <?php foreach($answers as $row):?>
                <div class="rsh_ans_body">
                    <div class="credibility_facts">
                        <div class="cf_img">
                            <img src="<?php echo $row->pic_link?>">
                        </div>
                        <div class="cf_facts">
                            <div class="cf_facts_name"><?php echo $row->username ?></div>
                            <div class="cf_facts_descr small_light ellipsis">
                            Lorem ipsum dolor sit amet.
                            </div>
                        </div>
                    </div>
                    <div class="result_ans">
                        <?php echo $row->answer?>
                    </div>
                    <div class="small_light rsh_ans_votes">
                        <a href = '<?php echo base_url()?>forum/vote_ans/<?php echo $row->id?>/1'><i class="fa fa-arrow-up"></i></a>Upvotes: <?php echo $row->upvotes?> &nbsp;|&nbsp;
                        <a href = '<?php echo base_url()?>forum/vote_ans/<?php echo $row->id?>/0' ><i class="fa fa-arrow-down"></i></a>Downvotes: <?php echo $row->downvotes;?>
                        |&nbsp;<span class="share pointer"><i class="fa fa-share-alt"></i>Share</span>
                    </div>
                </div>
                <div class="comments_open">View Comments</div>
                <div class="comments_body">
                    <div class="credibility_facts">
                        <div class="cf_img">
                            <img src="<?php echo base_url()?>assets/img/people.png">
                        </div>
                        <div class="cf_facts">
                            <form action='<?php echo base_url()?>forum/comment_a/<?php echo $row->id?>' method="post">
                                <input type="text" placeholder="Your comments" style="width:80%; padding: 10px;" name="comment"></input>
                                <input type="submit" class="btn btn-dark" style="height:44px;line-height:30px;vertical-align:top" value="Post"></input>
                            </form>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                    <?php foreach ($row->comments as $comment):?>
                    <div class="credibility_facts">
                        <div class="cf_img">
                            <img src="../../assets/img/people.png">
                        </div>
                        <div class="cf_facts">
                            <div class="cf_facts_name"><?php echo $comment->username?></div>
                            <div class="cf_facts_descr">
                            <?php echo $comment->comment?>
                            </div>
                            <div class="result_info_strip small_light">
                                <?php echo $comment->datetime?> &nbsp;|&nbsp; <a href="<?php echo base_url()?>forum/vote_comm/<?php echo $comment->id?>">Likes: <?php echo $comment->votes?></a>&nbsp;
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            <?php endforeach;?>
            </div>
            <?php endif;?>
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
<div class="modal fade bs-example-modal-sm" id="write_ans" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                      <h3 class="modal-title" id="myModalLabel" align="center">Write a Answer</h3>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-xs-12">
                              <div class="gray_back">
                                  <form method="POST" action="<?php echo base_url() ;?>forum/answer_post/<?php echo $question[0]->id; ?>">
                                      <div class="form-group">
                                          <div class="col-md-2">
                                            <label for="comments" class="control-label">Comments</label>
                                          </div>
                                          <div class="col-md-10">
                                            <textarea name="answer" class="form-control" rows="5"></textarea>
                                            <span class="help-block"></span>
                                          </div>
                                      </div>
                                       
                                      <div class="col-md-5 col-md-offset-5"> 
                                       <button type="submit" class="btn btn-dark">Write Answer</button>
                                      </div> 

                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>

</body>
</html>
