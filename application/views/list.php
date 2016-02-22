<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Artciles</title>
<base href="<?php echo base_url(); ?>"></base>
<script src="<?php echo base_url(); ?>assets/js/jquery.min(1.11.1).js"></script>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans" />
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
<link href="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
<script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css"></link>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/newStyle.css"></link>
<script src="https://www.legistify.com/assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<style>
.view_more{
    color: #999;margin:0 5px;
    cursor: pointer;
}
.view_more:hover{
    color: #333;
    text-decoration: underline;
}
.ask_que{
    float:right;margin:10px 0;
}
@media screen and (max-width:992px){
    .ask_que{
        float: left;
    }
}
.fil_select{
    clear: both;
    margin: 15px 0;
}
.fil_select>.js-example-basic-multiple,.fil_select>.js-example-basic-multiple + .select2{
    display:inline-block;
    width: 400px !important;
    margin: 10px 20px 10px 0;
    min-width: 40%;
    max-width: 90%;
}
.fil_select>.js-example-basic-hide-search{
    padding: 10px;
}
.fil_select>.js-example-basic-hide-search + .select2{
    display: inline-block;
    width: 180px !important;
    margin-right: 10px 20px 10px 0;
    max-width: 90%;
}
.fil_select .select2-selection {
    min-height: 32px;
    padding-bottom: 5px;
}
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
		<div class="col-md-12">
			<div class="filter_cont">
				<div class="fil_head">
					<h1 style="float:left;margin-top:20px;">Browse Articles</h1>
                    
				</div>
				<form class="filter_form">
					<div class="fil_select">
							<select name="tag" class="js-example-basic-multiple" multiple="multiple">
		                      <option value="anp">Alabama</option>
		                      <option value="agr">Wyoming</option>
		                      <option value="WY">Wyoming</option>
		                      <option value="WY">Wyoming</option>
		                      <option value="WY">Wyoming</option>
		                      <option value="WY">Wyoming</option>
		                      <option value="WY">Wyoming</option>
		                      <option value="WY">Wyoming</option>
		                      <option value="WY">Wyoming</option>
		                    </select>
		                    <select name="sort" class="js-example-basic-hide-search">
		                      <option value="views">Views</option>
		                      <option value="latest">Latest</option>
		                      <option value="latest">Upvotes</option>
		                    </select>
		                    <div class="btn btn-dark ask_que" data-toggle="modal" data-target="#post_blog">Post A blog</div>
					</div>
				</form>
			</div>
		</div>


		<div class="col-md-12 rsh_results_cont">
            <?php
    $id=0;
   foreach($article_list  as $articles ){ 
                        $ida=$articles['id'];?>
			<div class="rsh_result">
				<div class="rsh_result_head">
					<div class="result_tags small_light">
						<i class="fa fa-tag"></i><?php    foreach($tag_list as $tags){
                            
                                foreach($tags as $name ){
                                        if($name['article_id']==$ida){                                            
                                         echo $name['name'].",";
                                        }      
                               }
            }      ?>                      
					</div>
					<div class="result_ques">
						<a href="Articles/view_detail/<?php echo $ida;?>"><?php echo $articles['title'];?></a>
					</div>
					<div class="result_info_strip small_light" >
						 <i class="fa fa-calendar"></i><?php echo date("d M Y",strtotime($articles['datetime'])); ?> &nbsp;|&nbsp; <i class="fa fa-eye"></i>Views: <?php echo $articles['views'];?>
					</div>
				</div>
				<div class="rsh_result_body">
					<div class="credibility_facts">
						<div class="cf_img">
							<img src=<?php echo $articles['pic_link'];?>>
						</div>
						<div class="cf_facts">
							<div class="cf_facts_name"><?php echo $articles['fname'].' '.$articles['lname'];?></div>
							<div class="cf_facts_descr small_light ellipsis"><?php echo $articles['content'];?></div>
						</div>
					</div>
					
				</div>
			</div>
			<?php }?>
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
<div class="modal fade bs-example-modal-sm" id="post_blog" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                      <h3 class="modal-title" id="myModalLabel" align="center">Write a Blog</h3>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-xs-12">
                              <div class="gray_back">
                                  <form id="form_questions">
                                      <div class="form-group">
                                          <div class="col-md-2">
                                            <label for="name" class="control-label">Title</label>
                                          </div>
                                          <div class="col-md-10">
                                            <input type="text" name="title" class="form-control" required="">
                                            <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-md-2">
                                            <label for="comments" class="control-label">Description</label>
                                          </div>
                                          <div class="col-md-10">
                                            <textarea name="description" class="form-control" rows="5"></textarea>
                                            <span class="help-block"></span>
                                          </div>
                                      </div>
                                       
                                      <div class="col-md-5 col-md-offset-5"> 
                                       <button type="submit" class="btn btn-dark" onclick="post_ques()">Post Blog</button>
                                      </div> 

                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
<script>
function filter_ques(){
    var tags = $('.filter_form select[name="tag"]').val()==null?"":$('.filter_form select[name="tag"]').val().join();
    var sort = $('.filter_form select[name="sort"]').val();
    $.ajax({
        url: './articles/view_ajax',
        method: 'POST',
        data:{"tag": tags,"sort":sort},
        success: function(data){
            console.log(data);
            /*var ques = data.questions;
            var ele = "";
            for(var i=0;i<ques.length;i++){
                 ele += '<div class="rsh_result"> <div class="rsh_result_head"> <div class="result_tags small_light"> <i class="fa fa-tag"></i>';
                 if(ques[i].tags.length != 0){
                    ele+=ques[i].tags[0].name;
                 }
                for(var x=1;x<ques[i].tags.length;x++){
                    ele+=','+ques[i].tags[x].name;
                }
                ele +='</div> <a href="./answer/'+ques[i].id+'" style="text-decorations:none; color:inherit;"><div class="result_ques">'+ques[i].title+'</div></a> <div class="result_info_strip small_light"> By:<span style="color:#333;">'+ques[i].username+'</span> &nbsp;|&nbsp; <i class="fa fa-calendar"></i>'+ques[i].datetime+'</div> </div>';
                 if(ques[i].answer.length != 0){
                    ele +='<div class="rsh_result_body"> <div class="credibility_facts"> <div class="cf_img"> <img src="./../assets/img/people.png"> </div> <div class="cf_facts"> <div class="cf_facts_name">'+ques[i].answer[0].username+'</div> <div class="cf_facts_descr small_light ellipsis">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, deserunt!</div> </div> </div> <div class="result_ans"> '+ques[i].answer[0].answer+'<span class="view_more">View More</span> </div> </div>';
                 }
                 ele += '</div>';
            }

            ele += '</div>';
            $('.rsh_results_cont').html(ele);*/
        }
    });
}
</script>
</body>
</html>
