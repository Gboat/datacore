<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?>
<?php if($code == 'hot_weiqun') { ?>
<script type="text/javascript" src="templates/default/js/qun.js?v=build+20120428"></script>
<?php } ?>

<?php if($code == 'favorite_tag') { ?>
	<!---我关注的话题-->
	<li id="add_ajax_favorite_tags">
<?php if(is_array($my_favorite_tags)) { foreach($my_favorite_tags as $val) { ?>
		<span id="favorite_<?php echo $val['tag']; ?>">
		 <a href="index.php?mod=tag&code=<?php echo $val['tag']; ?>" target="_blank"><?php echo $val['tag']; ?></a>
		</span>
		
<?php } } ?>
</li>
<?php if($uid == MEMBER_ID) { ?>
	<span class="thread_add"> <a href="javascript:void(0);" onclick="getElementById('add_favorite_tags').style.display=(getElementById('add_favorite_tags').style.display=='none')?'':'none'">加关注话题</a> </span>
	<div id="add_favorite_tags" style="display:none;"> <span>请添加想关注的话题
	  <p>
		<input type="text" name="tag_name" id="tag_name" class="sc_r_t_a"/>
		<input name="button" type="button" onclick="favoriteTag('tag_name','input_add')" value="保存" class="c_b1" />
	  </p>
	  </span> 
	  </div>
	  
<?php } ?>
<!---我关注的话题--><?php } elseif($code == 'user_tag') { ?><!---属于我/TA的标签-->
	<ul class="FTL SC_biaoqian_box">
	  <li>
<?php if($myuser_tag) { ?>
<?php if(is_array($myuser_tag)) { foreach($myuser_tag as $val) { ?>
		<span class="sc_bq"><a href="index.php?mod=search&code=usertag&usertag=<?php echo $val['tag_name']; ?>"><?php echo $val['tag_name']; ?></a></span>
		
<?php } } ?>
  </li>
	  
<?php } else { ?>  设置自己的标签，<a href="index.php?mod=user_tag" target="_blank">点此添加</a>
	  
<?php } ?>
</ul><?php } elseif($code == 'to_user_tag') { ?><ul class="FTL SC_biaoqian_box">
	  <li>
<?php if($to_user_tag) { ?>
<?php if(is_array($to_user_tag)) { foreach($to_user_tag as $val) { ?>
		<span class="sc_bq"><a href="index.php?mod=search&code=usertag&usertag=<?php echo $val['tag_name']; ?>"><?php echo $val['tag_name']; ?></a></span>
		
<?php } } ?>
  </li>
	  
<?php } else { ?>  设置自己的标签，<a href="index.php?mod=user_tag" target="_blank">点此添加</a>
	  
<?php } ?>
</ul><?php } elseif($code == 'refresh') { ?>
<?php if(false!=($may_interest_user=Load::model('data_block')->may_interest_user())) { ?>
	<!-- 可能感兴趣的人 -->
	<div id="interestUid">
	  <ul class="followList" style="overflow:hidden">
<?php if(is_array($may_interest_user)) { foreach($may_interest_user as $val) { ?>
		<li class="pane" id="follow_user_<?php echo $val['uid']; ?>">
		  <div class="fBox_l"><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_right_user',<?php echo $val['uid']; ?>);" onmouseout="clear_user_choose();"/> </div>
		  <div class="fBox_R "> <span class="name"><a href="index.php?mod=<?php echo $val['username']; ?>"><?php echo $val['nickname']; ?></a><?php echo $val['validate_html']; ?></span> 
		  <span id="follow_<?php echo $val['uid']; ?>"> <?php echo $val['follow_html']; ?> </span> 
		  
<?php if($val['refresh_type'] == 'follow') { ?>
		  <span class="ff_1">我 关注的<?php echo $val['count']; ?>人关注<?php echo $val['gender_ta']; ?></span>
		  <?php } elseif($val['refresh_type'] == 'tag') { ?>  <span class="ff_1">我和<?php echo $val['gender_ta']; ?>有<?php echo $val['count']; ?>个共同话题</span>
		  <?php } elseif($val['refresh_type'] == 'user_tag') { ?>  <span class="ff_1">我和<?php echo $val['gender_ta']; ?>有<?php echo $val['count']; ?>个共同标签</span>
		  <?php } elseif($val['refresh_type'] == 'city') { ?>  <span class="ff_1"><?php echo $val['gender_ta']; ?>和我同在一个城市</span>
		  
<?php } ?>
  </div>
 		<div id="user_<?php echo $val['uid']; ?>_right_user" class="layS"></div>
		</li>
		
		<div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
		<div id="Pmsend_to_user_area"></div>
		<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
		<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></div>
		
<?php } } ?>
  </ul>
	 <p class="r_replace"><a href="javascript:viod(0);" onclick="right_show_ajax('<?php echo MEMBER_ID; ?>','refresh','refresh'); return false;">换一换</a></p>
	</div>
	<!-- 可能感兴趣的人 -->
	
<?php } ?>
<?php } elseif($code == 'hot_tag') { ?><!--热门推荐话题-->
<?php if(is_array($hot_tag_recommend['list'])) { foreach($hot_tag_recommend['list'] as $val) { ?>
	<li> 
	  <a href="index.php?mod=tag&code=<?php echo $val['name']; ?>" target="_blank"><?php echo $val['name']; ?>(<?php echo $val['topic_count']; ?>)</a>
	  
<?php if($val['desc']) { ?>
	  	<div class="rught_tj_box"><span><?php echo $val['desc']; ?></span></div>
	  
<?php } ?>
 
	 </li>
	
<?php } } ?>
<!--热门推荐话题--><?php } elseif($code == 'to_user_info') { ?><!--关于他的信息-->
<?php if($member['aboutme']) { ?>
	<li>&nbsp;<?php echo $member['aboutme']; ?></li>
<?php } else { ?><li>这家伙很懒，什么也没有留下。</li>
	
<?php } ?>
<!--关于他的信息--><?php } elseif($code == 'to_user_event') { ?><!--他参与的活动-->
<?php if($to_user_event) { ?>
<?php if(is_array($to_user_event)) { foreach($to_user_event as $val) { ?>
	<li><a href="index.php?mod=event&code=detail&id=<?php echo $val['id']; ?>" title="点此查看活动详情" target="_blank"><?php echo $val['title']; ?></a></li>
	
<?php } } ?>
<?php } ?>
<!--他参与的活动-->
	
<?php } ?>
<?php if($code == 'recommend_user') { ?>
		<!--人气用户推荐-->
<?php if(is_array($recommend_user_list)) { foreach($recommend_user_list as $val) { ?>
		<li> 
		<a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" class="manface" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>)" onmouseout="clear_user_choose()"/></a> 
		<b><a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><?php echo $val['nickname']; ?></a></b> <!--
设置分组 设置备注  点击关注触发分组 私信  @谁  拉黑  头像悬浮  操作框
-->
<div id="user_<?php echo $val['uid']; ?>_user"></div>
<div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
<div id="get_remark_<?php echo $val['uid']; ?>" ></div>
<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></div>
<div id="Pmsend_to_user_area"></div> 
		</li>
		
<?php } } ?>
<!--人气用户推荐-->
	
<?php } ?>

<?php if($new_vip_user_list) { ?>
		<!--最新认证用户-->
<?php if(is_array($new_vip_user_list)) { foreach($new_vip_user_list as $val) { ?>
			<li> 
			<a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank">
			<img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" class="manface" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>)" onmouseout="clear_user_choose()"/>
			</a> 
			<b><a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><?php echo $val['nickname']; ?></a></b> <!--
设置分组 设置备注  点击关注触发分组 私信  @谁  拉黑  头像悬浮  操作框
-->
<div id="user_<?php echo $val['uid']; ?>_user"></div>
<div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
<div id="get_remark_<?php echo $val['uid']; ?>" ></div>
<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></div>
<div id="Pmsend_to_user_area"></div> 
			</li>
			
<?php } } ?>
<!--最新认证用户-->
	
<?php } ?>

<?php if($code == 'user_follow') { ?>
	<!--TA关注的人-->
<?php if(is_array($user_follow_list)) { foreach($user_follow_list as $val) { ?>
		<li> 
		<img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" class="manface" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>)" onmouseout="clear_user_choose()"/> 
		<b><?php echo $val['nickname']; ?></b>
		<b><?php echo $val['follow_html']; ?></b> 
		</li><!--
设置分组 设置备注  点击关注触发分组 私信  @谁  拉黑  头像悬浮  操作框
-->
<div id="user_<?php echo $val['uid']; ?>_user"></div>
<div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
<div id="get_remark_<?php echo $val['uid']; ?>" ></div>
<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></div>
<div id="Pmsend_to_user_area"></div>
		
<?php } } ?>
<p class="m_m2"><a href="index.php?mod=<?php echo $member['username']; ?>&code=follow">更多&gt;&gt;</a></p>
	<!--TA关注的人-->
	
<?php } ?>

<?php if($code == 'qun_category') { ?>
	<!-- 微群分类 Begin -->
		<div id="cat_content_wp">
<?php if(is_array($top_cat_ary)) { foreach($top_cat_ary as $key => $top_cat) { ?>
<div class="cat_block">
			  <div class="cat_block_h">
			    <a href="index.php?mod=qun&code=category&cat_id=<?php echo $top_cat['cat_id']; ?>"><?php echo $top_cat['cat_name']; ?></a>
			    <span>(<?php echo $top_cat['qun_num']; ?>)</span>
			  </div>
			</div>
<?php } } ?>
<div style="clear:both"></div>
		</div>		
	<!--微群分类 End-->
		
<?php } ?>

<?php if($code == 'my_follow_qun') { ?>
	<!--我关注的微群 Begin-->
	<div id="interestUid">
	  
<?php if($follow_qun_list) { ?>
	  <ul class="followList" style="overflow:hidden">
<?php if(is_array($follow_qun_list)) { foreach($follow_qun_list as $val) { ?>
		<li class="pane" id="follow_user_<?php echo $val['uid']; ?>">
		 
		  <div class="fBox_R "> 
		    <p><span class="name"><a href="index.php?mod=qun&qid=<?php echo $val['qid']; ?>"><?php echo $val['name']; ?></a></span> </p>
			<p><?php echo $val['member_num']; ?>人&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $val['thread_num']; ?>条微博</p>
		  </div>
		</li>
		
<?php } } ?>
  </ul>
	  
<?php } ?>
</div>
	<!--我关注的微群 End-->
	
<?php } ?>
<?php if($code == 'hot_weiqun') { ?>
	<!--热门微群-->
	<div id="interestUid">
	  
<?php if($hot_qun) { ?>
	  <ul class="followList" style="overflow:hidden">
<?php if(is_array($hot_qun)) { foreach($hot_qun as $val) { ?>
		<li class="pane" id="follow_user_<?php echo $val['uid']; ?>">
		  <div class="fBox_l"><img onerror="javascript:faceError(this);" src="<?php echo $val['icon']; ?>"/> </div>
		  <div class="fBox_R "> <p><span class="name"><a href="index.php?mod=qun&qid=<?php echo $val['qid']; ?>"><?php echo $val['name']; ?></a></span> </p>
		  <p><?php echo $val['member_num']; ?>人&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $val['member_num']; ?>条微博</p>
		  <span> <a href="javascript:;" onclick="joinQun(<?php echo $val['qid']; ?>)">加入群</a></span> 
		  </div>
		</li>
		
<?php } } ?>
  </ul>
	  
<?php } ?>
</div>
	<!--热门微群-->
	
<?php } ?>
<?php if($code == 'city_qun') { ?>
	<!--同城微群-->
	<div>
		<ul>
<?php if(is_array($city_qun)) { foreach($city_qun as $val) { ?>
		  <li>
			<p><a href="#"><?php echo $val['name']; ?></a><span title="成员">(<?php echo $val['member_num']; ?>)</span></p>
		  </li>
		
<?php } } ?>
  
		</ul>
	  </div>
	<!--同城微群-->
	  
<?php } ?>

<?php if($code == 'hot_follow_tag') { ?>
	<!--最受关注话题-->
	<div>
		<ul>
<?php if(is_array($tag_guanzu)) { foreach($tag_guanzu as $val) { ?>
		  <li style="width:100%;">
			<a href="index.php?mod=tag&code=<?php echo $val['name']; ?>"><?php echo $val['name']; ?></a>
			<span><a href="javascript:viod(0);" onclick="favoriteTag('<?php echo $val['name']; ?>'); return false;" title="加关注">+</a></span>
		  </li>
		
<?php } } ?>
  
		</ul>
	  </div>
	<!--最受关注话题-->
	
<?php } ?>

<?php if(in_array($code,array('common_interest','at_me_user'))) { ?>
	<div id="interestUid">
	  
<?php if($user_list) { ?>
	  <ul class="followList" style="overflow:hidden">
<?php if(is_array($user_list)) { foreach($user_list as $val) { ?>
		<li class="pane" id="follow_user_<?php echo $val['uid']; ?>">
		  <div class="fBox_l"><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_right_user',<?php echo $val['uid']; ?>);" onmouseout="clear_user_choose();"/> </div>
		  <div class="fBox_R ">
			<span class="name"><a href="index.php?mod=<?php echo $val['username']; ?>"><?php echo $val['nickname']; ?></a></span> 
		    <span id="follow_<?php echo $val['uid']; ?>"> 	<?php echo $val['follow_html']; ?> </span> 
		    <span class="ff_1">
		      
<?php if($val['at_count']) { ?>
@我<?php echo $val['at_count']; ?>次
		      <?php } elseif($val['common_count']) { ?>有<?php echo $val['common_count']; ?>个共同话题
		      <?php } elseif($val['c_count']) { ?>评论了<?php echo $val['c_count']; ?>次
		      <?php } elseif($val['mc_count']) { ?>评论了<?php echo $val['mc_count']; ?>次
		      <?php } elseif($val['m_count']) { ?>分享音乐<?php echo $val['m_count']; ?>次
		      
<?php } ?>
    </span>
		  </div>
 		<div id="user_<?php echo $val['uid']; ?>_right_user" class="layS"></div>
		</li>
		
		<div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
		<div id="Pmsend_to_user_area"></div>
		<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
		<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></div>
		
<?php } } ?>
  </ul>
	  
<?php } ?>
</div>
	
<?php } ?>
<?php if('photo' == $code) { ?>
	<div class="photo_right">
<?php if($photo_list['list']) { ?>
    <ul class="photo_right_ul">
<?php if(is_array($photo_list['list'])) { foreach($photo_list['list'] as $val) { ?>
	    <li class="photo_right_li">
	      <div><a href="index.php?mod=topic&code=<?php echo $val['0']['tid']; ?>" target="_blank" title="<?php echo $val['0']['nickname']; ?>"><img src="<?php echo $val['0']['photo']; ?>"></a></div>
	    </li>

	
<?php } } ?>
    </ul>
<?php } else { ?>  <ul class="photo_right_ul">
	    <li>暂无相关内容</li>
	    <li style="float:right"><a href="index.php?mod=topic&code=photo">点击查看更多</a></li>
	  </ul>
	
<?php } ?>
</div>
	
<?php } ?>
<?php if('video_list' == $code) { ?>
	  
<?php if($video_list) { ?>
        
<?php if(is_array($video_list)) { foreach($video_list as $val) { ?>
        <li>
          <div class="feedUservideo">
            <a id="a<?php echo $val['id']; ?>" onClick="javascript:showFlash('<?php echo $val['video_hosts']; ?>', '<?php echo $val['video_link']; ?>', this, '<?php echo $val['id']; ?>','<?php echo $val['video_url']; ?>',1);" >
            <div id="play_<?php echo $val['id']; ?>" class="vP"><img src="images/feedvideoplay.gif"  /></div>
            
<?php if($val['video_img']) { ?>
            <img src="<?php echo $val['video_img']; ?>" style="border:none" />
            
<?php } else { ?>            <img src="images/feedvideoplay.gif"  />
            
<?php } ?>
            </a>
          </div>
        </li>
        <li style="float:left"><a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><?php echo $val['nickname']; ?></a></li>
        <li style="float:right"><a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>" target="_blank">查看原文</a></li>
        <div class="mBlog_linedot"></div>
        <script type="text/javascript">
			$(document).ready(function(){
				$('#a<?php echo $val['id']; ?>').click();
			});				
		</script>
        
<?php } } ?>
    
<?php } else { ?><li>暂无相关内容</li>
<?php } ?>
<?php } ?>