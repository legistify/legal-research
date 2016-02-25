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
		                    <div class="btn btn-dark ask_que" data-toggle="modal" data-target="#post_blog">Post Article</div>
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

<div class="modal fade bs-example-modal-sm" id="post_blog" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                      <h3 class="modal-title" id="myModalLabel" align="center">Write Article</h3>
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
                                       <button type="submit" class="btn btn-dark" onclick="post_ques()">Post Article</button>
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

