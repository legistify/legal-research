<h1>Articles</h1>

<?php
    $id=0;
   foreach($articles  as $name ){ 
   	  			        $ida=$name['id'];?>
   	  			   <?php echo 'Article ID:'.$name['id']."<br>";?>

   	  			   <?php echo 'Topic:'.$name['name']."<br>"; ?>


   	  			   <?php echo 'Title:'.$name['title']."<br>";?>


   	  			   <?php echo 'Content:'.$name['content']."<br>";?>


   	  			   <?php echo 'UpVotes:'.$name['Upvotes']."<a href= '../upvote_article/$ida'>"."Upvote"."</a>"."<br>"; // need ajax call?>


   	  			   <?php echo 'DownVotes:'.$name['Downvotes']."<a href= '../downvote_article/$ida'>"."Downvote"."</a>"."<br>"; // need ajax call?>


   	  			   <?php echo 'By:'.$name['username']."<br>";?>
						     
							
						
							

						<?php	foreach($comment_list as $comments){
							
								foreach($comments  as $name ){
									    if($name['article_id']==$ida){
                                     $id=$name['id']; ?>
											<?php	echo "/////////////////////////////////////////commentspearator/////////////////////////////////////////////////////<br>";?>
   	  			    			<?php				echo 'Time:'.$name['datetime']."<br>";?>
   	  			    			<?php				echo 'Comment:'.$name['comment']."<br>";?>
   	  			    			<?php				echo 'UpVotes:'.$name['Upvotes']."<a href= '../upvote_comment/$id'>"."Upvote"."</a>"."<br>"; // need ajax call?>
   	  			           <?php                     echo 'DownVotes:'.$name['Downvotes']."<a href= '../downvote_comment/$id'>"."Downvote"."</a>"."<br>"; // need ajax call?>
   	  			    			<?php			echo 'By:'.$name['fname'].$name['lname']."<br>";?>


   	  			    						<?php	if ($userid==$name['user_id']){

   	  			    								//show edit and delete option
   	  			    							}


										} ?>

										
									<?php	echo"<p>"; ?>
		<?php		}
			}                            

                                         // Write here code for text area and submit for comments. Submit should call  Articles/post_comment/$id text area name should be content_$id
					
?>

							<?php echo "----------------------------------article seperator---------------------------------------";?>
						<?php	echo"<p>";
				}
   ?>