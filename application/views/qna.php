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
.select_full_width .select2{
	min-width: 100% !important;
	max-width: 100% !important;
}
.fil_select .select2-selection{
	border-color: #ccc;
}
.fil_select .js-example-basic-multiple,.fil_select .js-example-basic-multiple + .select2{
    display:inline-block;
    width: 400px !important;
    margin: 10px 20px 10px 0;
    min-width: 40%;
    max-width: 90%;
}
.fil_select .js-example-basic-hide-search{
    padding: 10px;
}
.fil_select .js-example-basic-hide-search + .select2{
    display: inline-block;
    width: 180px !important;
    margin-right: 10px 20px 10px 0;
    max-width: 90%;
}
.fil_select .select2-selection {
    height: 34px;
}
</style>
<div class="content container">
	<div class="row">
		<div class="col-md-12">
			<div class="filter_cont">
				<div class="fil_head">
					<h1 style="float:left;margin-top:20px;">Browse Questions</h1>
				</div>
        <form class="filter_form">
          <div class="fil_select">
            <div class="filter" style="display:inline-block;max-width:100%">
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
                <option value="latest">Latest</option>
                <option value="Upvotes">Upvotes</option>
              </select>
            </div>
            <div class="btn btn-dark ask_que" data-toggle="modal" data-target="#ask_ques">Ask a question</div>
          </div>
        </form>
			</div>
		</div>
		<div class="col-md-12 rsh_results_cont">
            <?php
            foreach ($questions as $row):?>
			<div class="rsh_result">
				<div class="rsh_result_head">
					<div class="result_tags small_light">
						<i class="fa fa-tag"></i><?php if(!empty($row->tags)) :echo $row->tags[0]->name;endif;?><?php for($i=1;$i<sizeof($row->tags);$i++): echo ','.$row->tags[$i]->name;endfor;?>
					</div>
					<a href="<?php echo base_url()?>forum/answer/<?php echo $row->id?>" style="text-decorations:none; color:inherit;"><div class="result_ques">
                        <?php echo $row->title;?>
					</div></a>
					<div class="result_info_strip small_light" >
						By:<span style="color:#333;"><?php echo $row->username?> </span> &nbsp;|&nbsp; <i class="fa fa-calendar"></i><?php echo $row->datetime?> &nbsp;
					</div>
				</div>
                    <?php if(!empty($row->answer)):?>
				<div class="rsh_result_body">
					<div class="credibility_facts">
						<div class="cf_img">
                            <?php if($row->answer[0]->pic_link!=''):?>
							<img src=<?php echo $row->answer[0]->pic_link?>>
                            <?php else:?>
                            <img src="<?php echo base_url()?>assets/img/people.png">
                            <?php endif;?>
						</div>
						<div class="cf_facts">
							<div class="cf_facts_name"><?php echo $row->answer[0]->username?></div>
							<div class="cf_facts_descr small_light ellipsis">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, deserunt!</div>
						</div>
					</div>
					<div class="result_ans">
						<?php echo substr($row->answer[0]->answer,0,150); ?><span class="view_more" data-id="1">View More</span>
					</div>
				</div>
                <?php endif;?>
			</div>
        <?php endforeach; ?>
		</div>
	</div>
</div>

<div class="modal fade bs-example-modal-sm" id="ask_ques" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                      <h3 class="modal-title" id="myModalLabel" align="center">Ask Question</h3>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-xs-12">
                              <div class="gray_back">
                                  <form id="form_questions">
                                      <div class="form-group">
                                          <div class="col-md-2">
                                            <label for="name" class="control-label">Question</label>
                                          </div>
                                          <div class="col-md-10">
                                            <input type="text" name="title" class="form-control" required="">
                                            <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-md-2">
                                            <label for="name" class="control-label">Select Tags</label>
                                          </div>
                                          <div class="col-md-10">
                                          	<div class="fil_select select_full_width" style="margin:0;margin-top:-10px">
                                            <select name ="tag" class="js-example-basic-multiple" multiple="multiple">
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
                                            </div>
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
                                        <div class="btn btn-dark" onclick="post_ques()">Post Question</button>
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
// filter_ques();
function filter_ques(){
    var tags = $('.filter_form select[name="tag"]').val()==null?"":$('.filter_form select[name="tag"]').val().join();
    var sort = $('.filter_form select[name="sort"]').val();
    $.ajax({
        url: '<?php echo base_url()?>forum/questions/',
        method: 'POST',
        data:{"tag": tags,"sort":sort},
        success: function(data){
            console.log(data);
            var ques = data.questions;
            var ele = "";
            for(var i=0;i<ques.length;i++){
                 ele += '<div class="rsh_result"> <div class="rsh_result_head"> <div class="result_tags small_light"> <i class="fa fa-tag"></i>';
                 if(ques[i].tags.length != 0){
                    ele+=ques[i].tags[0].name;
                 }
                for(var x=1;x<ques[i].tags.length;x++){
                    ele+=','+ques[i].tags[x].name;
                }
                ele +='</div> <a href="<?php echo base_url()?>forum/answer/'+ques[i].id+'" style="text-decorations:none; color:inherit;"><div class="result_ques">'+ques[i].title+'</div></a> <div class="result_info_strip small_light"> By &nbsp;<span style="color:#333;">'+ques[i].username+'</span> &nbsp;|&nbsp; <i class="fa fa-calendar"></i>'+ques[i].datetime+'</div> </div>';
                 if(ques[i].answer.length != 0){
                    ele +='<div class="rsh_result_body"> <div class="credibility_facts"> <div class="cf_img"> <img src="<?php echo base_url()?>assets/img/people.png"> </div> <div class="cf_facts"> <div class="cf_facts_name">'+ques[i].answer[0].username+'</div> <div class="cf_facts_descr small_light ellipsis">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, deserunt!</div> </div> </div> <div class="result_ans"> '+ques[i].answer[0].answer+'<span class="view_more">View More</span> </div> </div>';
                 }
                 ele += '</div>';
            }

            ele += '</div>';
            $('.rsh_results_cont').html(ele);
        }
    });
}

var sel_to;
$('.filter select[name="tag"]').change(function(){
  if(sel_to != null){
    clearTimeout(sel_to);
  }
  sel_to = setTimeout(function() {
    filter_ques();
  }, 2000);
});
$('.filter select[name="sort"]').change(function(){
  filter_ques();
});
$('.view_more').click(function(){
	var update_ans = $(this).parent();
	var id = $(this).data('id');
	$.ajax({
        url: '<?php echo base_url()?>PUT THE LINK'+id,
        method: 'POST',
        success: function(data){
        	update_ans.html(data);
        }
    });
});
function post_ques(){
    var tags = $('#form_questions select[name="tag"]').val()==null?"":$('#form_questions select[name="tag"]').val().join();
    var title = $('#form_questions input[type="text"]').val();
    var desc = $('#form_questions textarea[name="description"]').val();
    $('#ask_ques').modal('hide');
    $.ajax({
        url: '<?php echo base_url()?>forum/post/',
        method: 'POST',
        data:{"tag": tags,"title":title,"description":desc},
        success: function(data){
        	filter_ques();
        }
    });
}
</script>
