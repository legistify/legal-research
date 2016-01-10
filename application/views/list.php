<!DOCTYPE html>
<h1> Topic List </h1>
<?php
   foreach($topic_list  as $name ){
					foreach($name as $key=>$para){
						    if($key=='name')
							{
								echo "<a href= 'Articles/view/$para'>".$para."</a>";
							
						}
							echo"<p>";
					}
				}
   ?>
