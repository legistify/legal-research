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
                        <span class="inline_block_disp">
                            <i class="fa fa-calendar"></i><?php echo date("d M Y",strtotime($articles['datetime'])); ?> 
                        </span>
                        &nbsp;|&nbsp; 
                        <span class="inline_block_disp">
                            <i class="fa fa-eye"></i>Views: <?php echo $articles['views'];?> 
                        </span>
                        &nbsp;|&nbsp;
                        <span class="inline_block_disp upvote_it pointer <?php   if ('articles/articlevotechk/'.$articles['id']==1) :echo 'color-blue'; endif;?>" data-id="<?php echo $articles['id'];?>"> 
                            <i class="fa fa-arrow-up"></i>Upvote: <?php echo $articles['Upvotes'];?>
                        </span>
                        &nbsp;|&nbsp;
                        <span class="share pointer inline_block_disp"><i class="fa fa-share-alt"></i>Share</span>
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
                     <span class="upvote_it pointer <?php   if ('articles/articlevotechk/'.$articles['id']==1) :echo 'color-blue'; endif;?>" data-id="<?php echo $articles['id'];?>"> <i class="fa fa-arrow-up"></i>Upvote: <?php echo $articles['Upvotes'];?></span> &nbsp;|&nbsp;<span class="downvote_it pointer" data-id="<?php echo $articles['id'];?>"> <i class="fa fa-arrow-down"></i>Downvote</span>  <?php echo $articles['Downvotes'];?>&nbsp;|&nbsp;<span class="share pointer inline_block_disp"><i class="fa fa-share-alt"></i>Share</span>
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
</div>
