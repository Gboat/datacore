<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?>
<?php if(!empty($topic_list)) { ?>
	<div class="" id="weibo_list_wp">
<?php if(is_array($topic_list)) { foreach($topic_list as $key => $topic) { ?>
<div class="" id="weibo_itmes_<?php echo $topic['tid']; ?>">
		<div class="weibo" data-tid="<?php echo $topic['tid']; ?>" 
<?php if(MEMBER_ID < 1) { ?>
data-login="0"
<?php } else { ?>data-login="1"
<?php } ?>
 data-uid="<?php echo $topic['uid']; ?>" data-huifu="">
			<div class="wb_l">
				<div>
					<img class="author" src="<?php echo $topic['face']; ?>" onclick="goToUserInfo(<?php echo $topic['uid']; ?>);"/>
				</div>
			</div>
			<div class="wb_r">
				<div class="user_info">
					<span class="fl p_u"><?php echo $topic['nickname']; ?></span>
					<span class="fr p_t">
<?php if($topic['image_list']) { ?>
<img src="./images/pic.png"/>
<?php } ?>
<span><?php echo $topic['dateline']; ?></span></span>
				</div>
				
				<!--微博正文内容 Begin-->
				<div class="wb_c_wp">
					<div class="wb_c">
						<?php echo $topic['content']; ?>
					</div>
<?php if($topic['image_list']) { ?>
					<div class="share">
<?php if(is_array($topic['image_list'])) { foreach($topic['image_list'] as $image) { ?>
							<img class="author" src="<?php echo $image['image_small']; ?>" style="width:100px; height:100px;" />
							<br />
						
<?php } } ?>
</div>
					
<?php } ?>
<!--父级模块 Begin-->    
<?php if($topic['roottid'] > 0) { ?>
<?php $parent=$parent_list[$topic['roottid']]; ?>
<div class="tips_ico"></div>
						<div class="wbf">
                        
<?php if(!empty($parent)) { ?>
                                <div><a href=""><?php echo $parent['nickname']; ?></a> : <?php echo $parent['content']; ?></div>
                                
<?php if($parent['image_list']) { ?>
                                    <div class="share">
                                        
<?php if(is_array($parent['image_list'])) { foreach($parent['image_list'] as $image) { ?>
                                            <img class="author" src="<?php echo $image['image_small']; ?>" style="width:100px; height:100px;" />
                                            <br />
                                        
<?php } } ?>
                                    </div>
                                
<?php } ?>
                        
<?php } else { ?>                            	原始微博已删除
                            
<?php } ?>
</div>
					
<?php } ?>
<!--父级模块 End-->
					
					<div class="from">
						<span class="fl"><?php echo $topic['from_string']; ?></span>
						<span class="fr num">
<?php if($topic['forwards'] > 0) { ?>
								<span class="forward_num">
									<img src="./images/redirect_icon.png" /><span><?php echo $topic['forwards']; ?></span>
								</span>
							
<?php } ?>
 
<?php if($topic['replys'] > 0) { ?>
								<span class="comment_num">
									<img src="./images/comment_icon.png" /><span><?php echo $topic['replys']; ?></span>
								</span>
							
<?php } ?>
</span>
				   </div>
				</div>
				<!--微博正文内容 End-->
				
			</div>
		</div>
		<div class="wb_line"></div>
		</div>
<?php } } ?>
</div>
<?php if($list_count == Mobile::config('perpage_mblog')) { ?>
    
<?php if($this->Module == 'topic') { ?>
        
<?php if($this->Code=='tag') { ?>
            	<div class="wb_more" onclick='getMoreMBlogList({"max_tid":<?php echo $max_tid; ?>, "next_page":<?php echo $next_page; ?>, "code":"tag", "tag_key":"<?php echo $tag_key; ?>"});return false;' id="btn_more">更多...</div>
            
<?php } else { ?><div class="wb_more" onclick='getMoreMBlogList({"max_tid":<?php echo $max_tid; ?>, "next_page":<?php echo $next_page; ?>, "code":"<?php echo $this->Code; ?>", "uid":"<?php echo $param_uid; ?>"});return false;' id="btn_more">更多...</div>
        	
<?php } ?>
<?php } elseif($this->Module == 'search') { ?>       		<div class="wb_more" onclick='getMoreMBlogList({"max_tid":<?php echo $max_tid; ?>, "next_page":<?php echo $next_page; ?>, mod:"search", "code":"<?php echo $this->Code; ?>", q:"<?php echo $keyword; ?>"});return false;' id="btn_more">更多...</div>
        
<?php } ?>
<?php } ?>
<div style="margin-bottom:80px;"></div>
	<script language="javascript">
		$(document).ready(function(){
			setMBlogListEvent();
		});
	</script>
<?php } ?>