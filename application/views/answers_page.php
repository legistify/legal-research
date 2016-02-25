<style>
.small_light2{
    color: #999;
    font-size:0.9em;
}
</style>
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
                        <span class="inline_block_disp"><a href = '<?php echo base_url()?>forum/vote_ans/<?php echo $row->id?>/1'><i class="fa fa-arrow-up"></i></a>Upvotes: <?php echo $row->upvotes?> 
                        </span>
                        &nbsp;|&nbsp;
                        <span class="inline_block_disp">
                        <a href = '<?php echo base_url()?>forum/vote_ans/<?php echo $row->id?>/0' ><i class="fa fa-arrow-down"></i></a>Downvotes: <?php echo $row->downvotes;?>
                        </span>
                        &nbsp;|&nbsp;
                        <span class="share pointer inline_block_disp"><i class="fa fa-share-alt"></i>Share</span>
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
