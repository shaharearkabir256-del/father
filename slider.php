<section class="rev_slider_wrapper slider">
            <div id="slider" class="rev_slider"  data-version="5.0">
                <ul>
				<?php
			$query=$mysqli->query("SELECT * FROM `slide` where `chk`='1' ORDER BY `serial` asc");
			while($slide=mysqli_fetch_object($query)){
					?>
                    <li data-transition="random" data-slotamount="default"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" >
                        <img src="<?php echo $cog->url; ?>slide/<?php echo $slide->image; ?>"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                        <div class="tp-caption tp-resizeme banner-caption-h5" 
                             data-x="left" 
                             data-hoffset="['355','265','165','135','40']" 
                             data-y="top" 
                             data-voffset="['160','160','130','130','160']"

                             data-transform_idle="o:1;"						 
                             data-transform_in="y:-30px;rX:70deg;opacity:0;s:2000;e:Power4.easeInOut;" 
                             data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                             data-start="1000" 
                             data-splitin="none" 
                             data-splitout="none" 
                             data-responsive_offset="on">
                            <?php echo $slide->toptitle; ?> <span><?php if($slide->toptitle!=''){echo ' / '.$slide->date;}else{} ?> </span>
                        </div>
                        <div class="tp-caption tp-resizeme banner-caption-h1"
                             data-x="left" 
                             data-hoffset="['340','250','150','120','25']" 
                             data-y="top" 
                             data-voffset="['200','200','170','170','200']" 

                             data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                             data-start="1300" 
                             data-splitin="chars" 
                             data-splitout="none" 
                             data-responsive_offset="on">
                            <?php echo $slide->title; ?>
                        </div>
                        <div class="tp-caption tp-resizeme banner-caption-h1"
                             data-x="left" 
                             data-hoffset="['340','250','150','120','25']" 
                             data-y="top" 
                             data-voffset="['260','260','230','230','260']" 

                             data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                             data-start="1300" 
                             data-splitin="chars" 
                             data-splitout="none" 
                             data-responsive_offset="on">
                            <?php echo $slide->title2; ?>
                        </div>
                        <div class="tp-caption tp-resizeme banner-caption-p" 
                             data-x="left" 
                             data-hoffset="['355','265','165','135','40']" 
                             data-y="top" 
                             data-voffset="['350','350','320','320','350']" 

                             data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-style_hover="cursor:default;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeInOut;" 
                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                             data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                             data-start="2000" 
                             data-splitin="none" 
                             data-splitout="none" 
                             data-responsive_offset="on">
                           <?php echo $slide->info; ?>
                        </div>
                    </li>
					<?php } ?>
                </ul>
            </div>
        </section>