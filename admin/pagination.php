<!--Pagination-->
												<table align="center"><tr><td>
													<ul class="pagination pagination-centered">	
													<?php 
													$prev_page = $page - 1;if($prev_page >= 1){echo("<li><a href=?limit=$limit&amp;page=$prev_page&amp;search=$search&amp;type=$type&amp;item=$item&amp;start=$start&amp;end=$end><b>Prev </b></a></li>");}
													$a = $page ;if($a <= $total){ echo("<li class='active'><a href=?limit=$limit&amp;page=$a&amp;type=$type&amp;search=$search&amp;item=$item&amp;start=$start&amp;end=$end><b>$a</b></a> </li> ");}			
													$b = $page + 1;if($b <= $total){ echo("<li><a href=?limit=$limit&amp;page=$b&amp;type=$type&amp;search=$search&amp;item=$item&amp;start=$start&amp;end=$end><b>$b</b></a> </li> ");}			
													$c = $page + 2;if($c <= $total){ echo("<li><a href=?limit=$limit&amp;page=$c&amp;type=$type&amp;search=$search&amp;item=$item&amp;start=$start&amp;end=$end><b>$c</b></a> </li> ");}	
													$d = $page + 3;if($d <= $total){ echo("<li><a href=?limit=$limit&amp;page=$d&amp;type=$type&amp;search=$search&amp;item=$item&amp;start=$start&amp;end=$end><b>$d</b></a> </li> ");}
													$d = $page + 4;if($d <= $total){ echo("<li><a href=?limit=$limit&amp;page=$d&amp;type=$type&amp;search=$search&amp;item=$item&amp;start=$start&amp;end=$end><b>$d</b></a> </li> ");}
													$e = $page + 5;if($e <= $total){ echo("<li><a href=?limit=$limit&amp;page=$e&amp;type=$type&amp;search=$search&amp;item=$item&amp;start=$start&amp;end=$end><b>$e</b></a> </li>");}			
													$f = $page + 6;if($f <= $total){ echo("<li><a href=?limit=$limit&amp;page=$f&amp;type=$type&amp;search=$search&amp;item=$item&amp;start=$start&amp;end=$end><b>$f</b></a> </li> ");}			
													$g = $page + 7;if($g <= $total){ echo("<li><a href=?limit=$limit&amp;page=$g&amp;type=$type&amp;search=$search&amp;item=$item&amp;start=$start&amp;end=$end><b>$g</b></a> </li> ");}
													$h = $page + 8;if($h <= $total){ echo("<li><a href=?limit=$limit&amp;page=$h&amp;type=$type&amp;search=$search&amp;item=$item&amp;start=$start&amp;end=$end><b>$h</b></a> </li> ");}			
													$i = $page + 9;if($i <= $total){ echo("<li><a href=?limit=$limit&amp;page=$i&amp;type=$type&amp;search=$search&amp;item=$item&amp;start=$start&amp;end=$end><b>$i</b></a> </li> ");}			
													$j = $page + 10;if($j <= $total){ echo("<li><a href=?limit=$limit&amp;page=$j&amp;type=$type&amp;search=$search&amp;item=$item&amp;start=$start&amp;end=$end><b>$j</b></a> </li>");}
													$next_page = $page + 1;if($next_page <= $total){ echo("<li><a href=?limit=$limit&amp;page=$next_page&amp;search=$search&amp;type=$type&amp;item=$item&amp;start=$start&amp;end=$end><b>Next</b></a></li>");}
													?>
													
													</ul>
													<br/><br/>
															
													<form method="get" action="" align="center">
													<?php if($count==0){echo "<button class='btn btn-danger'>No Record Found</button>";} ?>
													<button class="btn btn-success">Total Pages </button>
													<button class="btn btn-primary"><?php echo $total;?></button>
													<button class="btn btn-danger"> Showing </button> <input type="text" style="height:30px; border: 2px solid rgba(187, 0, 0, 0.66); border-radius: 5px;"  name="page" value="<?php echo $page;?>" size="4" style="margin-left:0px;margin-right:0px;"/>
													<input type="hidden" name="limit" value="<?php echo $limit;?>" />
													<input type="hidden" name="type" value="<?php echo $type;?>" />
													<input type="hidden" name="item" value="<?php echo $item;?>" />
													<input type="hidden" name="search" value="<?php echo $search;?>" />
													<input type="hidden" name="start" value="<?php echo $start;?>" />
													<input type="hidden" name="end" value="<?php echo $end;?>" />			
													<button class="btn btn-success" type="submit"  value="Submit">Submit</button>
													</form> 
													
													</td></tr></table>
											<!--/.Pagination-->	