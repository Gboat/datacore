<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?><div class="mainL">
    <style type="text/css">ul.mycon li{ width:65px;}</style>
<script type="text/javascript" src="templates/default/js/publishbox.js?v=build+20120428"></script>
<div id="zz_main_publish">
<div id="tigBox_2" class="tigBox_2">点<a href="javascript:" onClick="thread_insert()" style="cursor:pointer">#插入自定义话题#</a>给微博添加话题，方便关注</div>
<div class="issueBox">
<div class="fbqCount">
<div class="fLeft">
<?php if($this->Get['mod'] == 'member') { ?>
<?php $content = '#新人报到# 我是'.$this->Config['site_name'].'新加入的成员@'.MEMBER_NICKNAME.' ，欢迎大家来关注我！'; ?>
所有关注我的人将看到我分享的信息<?php } elseif($defaust_value) { ?><?php echo $defaust_value; ?>
<?php } else { ?><span>
<?php if($member['fans_count']>0) { ?>
<?php echo $member['fans_count']; ?>
<?php } else { ?>0
<?php } ?>
 </span>人在关注我，
<A href="index.php?mod=profile&code=invite" style="cursor:pointer">邀请</A>更多人
<?php } ?>
</div>
<ul class="mycon">
<?php if($this->Config['topic_input_length']>0) { ?>
<li>还可以输入</li><li style="width:auto"><span id="wordCheck<?php echo $h_key; ?>" style='font-family:Georgia;font-size:24px;'><?php echo $this->Config['topic_input_length']; ?></span></li><li style="width:14px;">字</li>
<?php } ?>
</ul>
</div>
<div class="box_1" style="display:block">
<?php $i_already_value = $content ? $content : $this->Config['today_topic'];$this->totid = $this->totid ? $this->totid : 0; ?>
<script type="text/javascript">
var __I_ALREADY_VALUE__ = '<?php echo $i_already_value; ?>';
var __ALERT__='<?php echo $this->Config['verify_alert']; ?>';
</script>
<textarea name="content" id="i_already<?php echo $h_key; ?>"  onkeyup="javascript:checkWord('<?php echo $this->Config['topic_input_length']; ?>',event,'wordCheck<?php echo $h_key; ?>')" onkeydown="ctrlEnter(event, 'publishSubmit<?php echo $h_key; ?>')"><?php echo $i_already_value; ?></textarea>
<?php $_get_type=str_safe($this->Get['type']); ?>
<input name="topic_type" type="hidden" id="topic_type<?php echo $h_key; ?>" value="<?php echo $_get_type; ?>" />
<input name="totid" type="hidden" id="totid<?php echo $h_key; ?>" value="<?php echo $this->totid; ?>" />
<input name="touid" type="hidden" id="touid<?php echo $h_key; ?>" value="<?php echo $this->touid; ?>" />
<!--应用 Begin-->
<input name="item" type="hidden" id="mapp_item<?php echo $h_key; ?>" value="<?php echo $this->item; ?>" />
<input name="item_id" type="hidden" id="mapp_item_id<?php echo $h_key; ?>" value="<?php echo $this->item_id; ?>" />
<input name="xiami_id" type="hidden" id="xiami_id" value="" />
<!--应用 End-->

</div>
<?php if(!($type == 'design' || $type == 'btn_wyfx')) { ?>
<div class="box_3">
	<script type="text/javascript">
	 $(document).ready(function() {	 	
		
	 //表情
	 $(".menu_bqb_c").click(function(){
	 $("#showface<?php echo $h_key; ?>").show();
	 $(".menu_tqb").hide();
	 $(".menu_fjb").hide();
	 $(".menu_spb").hide();
	 $('.menu_htb').hide();
	 $('.menu_vsb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_hdb").hide();
	 $(".menu_cwb").hide();
	 $(".menu_hts").hide();
	 $(".menu_music").hide();
	 });
	 $('#showface<?php echo $h_key; ?>').click(function(){return false;});
	 //图片 
	 $(".menu_tqb_c").click(function(){
	 $(".menu_tqb").show();
	 $(".menu_fjb").hide();
	 $(".menu_spb").hide();
	 $('#showface<?php echo $h_key; ?>').hide();
	 $('.menu_htb').hide();
	 $('.menu_vsb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_hdb").hide();
	 $(".menu_cwb").hide();
	 $(".menu_hts").hide();
	 $(".menu_music").hide();
	 });
	 $('#pubImg').click(function(){
	 $("#publisher_file").style.posLeft=event.x-offsetWidth/2;$("#publisher_file").style.posTop=event.y-offsetHeight/2;});
	 $(".menu_tqb_c1").click(function(){$(".menu_tqb").hide();});
	 $("#publishSubmit").click(function(){$(".menu_tqb").hide();});
	 //附件 
	 $(".menu_fjb_c").click(function(){
	 $(".menu_fjb").show();
	 $(".menu_tqb").hide();
	 $(".menu_spb").hide();
	 $('#showface<?php echo $h_key; ?>').hide();
	 $('.menu_htb').hide();
	 $('.menu_vsb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_hdb").hide();
	 $(".menu_cwb").hide();
	 $(".menu_hts").hide();
	 $(".menu_music").hide();
	 });
	 $('#pubAttach').click(function(){
	 $("#publisher_file_attach").style.posLeft=event.x-offsetWidth/2;$("#publisher_file_attach").style.posTop=event.y-offsetHeight/2;});
	 $(".menu_fjb_c1").click(function(){$(".menu_fjb").hide();});
	 $("#publishSubmit").click(function(){$(".menu_fjb").hide();});
	 //视频
	 $(".menu_spb_c").click(function(){
	 $(".menu_spb").show();
	 $(".menu_tqb").hide();
	 $(".menu_fjb").hide();
	 $('#showface<?php echo $h_key; ?>').hide();
	 $('.menu_htb').hide();
	 $('.menu_vsb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_hdb").hide();
	 $(".menu_cwb").hide();
	 $(".menu_hts").hide();
	 $(".menu_music").hide();
	 });
	 $(".menu_spb_c1").click(function(){$(".menu_spb").hide();});

	 //音乐
	 $(".menu_m_c").click(function(){
		 $(".menu_music").show();
		 $(".menu_wqb").hide();
		 $(".menu_tqb").hide();
		 $(".menu_spb").hide();
		 $('#showface').hide();
		 $('.menu_htb').hide();
		 $(".menu_vsb").hide();
		 $(".menu_hdb").hide();
		 $(".menu_cwb").hide();
		 $(".menu_hts").hide();
		 $(".menu_fjb").hide();
	 });
	 $(".menu_music_c1").click(function(){$(".menu_music").hide();});
	 //话题
	 $(".menu_htb_c").click(function(){
	 $(".menu_htb").show();
	 $(".menu_spb").hide();
	 $(".menu_tqb").hide();
	 $(".menu_fjb").hide();
	 $('#showface<?php echo $h_key; ?>').hide();
	 $('.menu_vsb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_hdb").hide();
	 $(".menu_cwb").hide();
	 $(".menu_hts").hide();
	 $(".menu_music").hide();
	 });
	 $('.menu_htb').click(function(){return false;});
	 //签到
	 $(".menu_hts_c").click(function(){
	 $(".menu_hts").show();
	 $(".menu_htb").hide();
	 $(".menu_spb").hide();
	 $(".menu_tqb").hide();
	 $(".menu_fjb").hide();
	 $('#showface<?php echo $h_key; ?>').hide();
	 $('.menu_vsb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_hdb").hide();
	 $(".menu_cwb").hide();
	 $(".menu_music").hide();
	 });
	 $(".menu_hts_c1").click(function(){$(".menu_hts").hide();});
	 //投票
	 $(".menu_vsb_c").click(function(){
	 getVoteAvtivityFromIndex('vote_publish', 'con_vote_content_1');
	 $(".menu_vsb").show();
	 $(".menu_tqb").hide();
	 $(".menu_fjb").hide();
	 $(".menu_spb").hide();
	 $('#showface<?php echo $h_key; ?>').hide();
	 $('.menu_htb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_hdb").hide();
	 $(".menu_cwb").hide();
	 $(".menu_hts").hide();
	 $(".menu_music").hide();
	 });
	 $(".menu_vsb_c1").click(function(){$(".menu_vsb").hide();});
	 //活动
	 $(".menu_hdb_c").click(function(){
	 getEventPost();
	 $(".menu_hdb").show();
	 $(".menu_vsb").hide();
	 $(".menu_tqb").hide();
	 $(".menu_fjb").hide();
	 $(".menu_spb").hide();
	 $('#showface<?php echo $h_key; ?>').hide();
	 $('.menu_htb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_cwb").hide();
	 $(".menu_hts").hide();
	 $(".menu_music").hide();
	 });
	 $(".menu_hdb_c1").click(function(){$(".menu_hdb").hide();});
	 
	 //微群
	 $(".menu_wqb_c").click(function(){
		 getMyQun();
		 $(".menu_wqb").show();
		 $(".menu_tqb").hide();
		 $(".menu_fjb").hide();
		 $(".menu_spb").hide();
		 $('#showface<?php echo $h_key; ?>').hide();
		 $('.menu_htb').hide();
		 $(".menu_vsb").hide();
		 $(".menu_hdb").hide();
		 $(".menu_cwb").hide();
		 $(".menu_hts").hide();
		 $(".menu_music").hide();
	 });
	 $(".menu_wqb_c1").click(function(){$(".menu_wqb").hide();});
	 
	 //长文本
	 $(".menu_cwb_c").click(function(){
		 initKindEditor();
		 /*
		 get_longtext_info();
		 $(".menu_cwb").show();
		 $(".menu_tqb").hide();
		 $(".menu_spb").hide();
		 $('#showface').hide();
		 $('.menu_htb').hide();
		 $(".menu_vsb").hide();
		 $(".menu_hdb").hide();
		 $(".menu_wqb").hide();
		 $(".menu_hts").hide();
		 $(".menu_music").hide();
		 //*/
	 });
	 $(".menu_cwb_c1").click(function(){$(".menu_cwb").hide();});
	 /*
	 //分类
	 $(".menu_xb_c").click(function(){
	 getClassPost();
	 $(".menu_xb").show();
	 $(".menu_wqb").hide();
	 $(".menu_tqb").hide();
	 $(".menu_spb").hide();
	 $('#showface').hide();
	 $('.menu_htb').hide();
	 $(".menu_vsb").hide();
	 $(".menu_hts").hide();
	 $(".menu_music").hide();
	 });
	 $(".menu_xb_c1").click(function(){$(".menu_xb").hide();});
	 */
	 
	 //同步
	 $(".box_4_open_span").click(function(){
		 $(".box_4_open_Box").show();
		 $(".menu_wqb").hide();
		 $(".menu_tqb").hide();
		 $(".menu_spb").hide();
		 $('#showface').hide();
		 $('.menu_htb').hide();
		 $(".menu_vsb").hide();
		 $(".menu_hdb").hide();
		 $(".menu_cwb").hide();
		 $(".menu_hts").hide();
		 $(".menu_fjb").hide();
	 });
	 $(".box_4_open_span_c1").click(function(){$(".box_4_open_Box").hide();});
	 //$(".box_4_open_Box").mouseout(function(){$(".box_4_open_Box").hide();});
});

//-----------------------------------
function setTab(name,cursel,n){
	for(i=1;i<=n;i++){
	var menu=document.getElementById(name+i);
	var con=document.getElementById("con_"+name+"_"+i);
	menu.className=i==cursel?"vhover":"";
	con.style.display=i==cursel?"block":"none";
}
}

function setTab1(name,cursel,n){
	for(i=1;i<=n;i++){
	var menu=document.getElementById(name+i);
	var con=document.getElementById("con_"+name+"_"+i);
	menu.className=i==cursel?"vhover":"";
	con.style.display=i==cursel?"block":"none";
}
}

function setTab2(name,cursel,n){
	for(i=1;i<=n;i++){
	var menu2=document.getElementById(name+i);
	var con2=document.getElementById("con2_"+name+"_"+i);
	menu2.className=i==cursel?"vhover2":"";
	con2.style.display=i==cursel?"block":"none";
}
}


</script>
<?php if($this->Config['sign']['sign_enable']) { ?>
	<div class="menu" >
	  <div class="menu_ht menu_qd" id="sign_<?php echo MEMBER_ID; ?>"><span onclick="getSignTag(<?php echo MEMBER_ID; ?>);return false;" class="menu_hts_c">签到</span>
	    <div class="menu_hts">
	      <div id="sign_tag_<?php echo MEMBER_ID; ?>"></div>
	    </div>
	  </div>
	</div>
	
<?php } ?>
<div class="menu">
	<div class="menu_bq" id="editface" ><b class="menu_bqb_c"><a href="javascript:void(0);" onclick="topic_face('showface<?php echo $h_key; ?>','i_already<?php echo $h_key; ?>','topic_face');return false;">表情</a></b>
	<div id="showface<?php echo $h_key; ?>" class="showface"></div>
	</div></div>


	<!-- 图片区块 开始 -->
	<!-- JS引用 开始 -->	   
<?php $image_uploadify_topic = array(); ?>

<?php $image_uploadify_from = 'topic_publish'; ?>

<?php $image_uploadify_only_js = 1; ?>
<?php $image_uploadify_id=$content_textarea_id.$image_uploadify_type.($image_uploadify_topic['tid']>0?"_".$image_uploadify_topic['tid']:""); ?>

<?php $image_uploadify_image_small_size=$image_uploadify_image_small_size?$image_uploadify_image_small_size:45; ?>

<?php $content_textarea_id=$content_textarea_id?$content_textarea_id:'i_already'.$h_key; ?>

<?php $content_textarea_empty_val=isset($content_textarea_empty_val)?$content_textarea_empty_val:'分享图片'; ?>

<?php $image_uploadify_queue_size_limit=max(0, (int) $this->Config['image_uploadify_queue_size_limit']);if($image_uploadify_queue_size_limit<1)$image_uploadify_queue_size_limit=3; ?>

<?php $img_item=isset($this->item)?$this->item:''; ?>

<?php $img_itemid=isset($this->item_id)?$this->item_id:0; ?>
<!-- <success></success> -->
		
		<!-- <script type="text/javascript" src="images/uploadify/jquery.uploadify.v2.1.4.min.js?v=build+20120428"></script> -->
		<script type="text/javascript">
		
		var __IMAGE_IDS__ = {};
		
		$(document).ready(function(){
			
			$('#publisher_file<?php echo $image_uploadify_id; ?>').uploadify({
				'uploader'  : '<?php echo $this->Config['site_url']; ?>/images/uploadify/uploadify.swf?id=<?php echo $image_uploadify_id; ?>&random=' + Math.random(),
			    'script'    : '<?php echo urlencode($this->Config['site_url'] . "/ajax.php?mod=uploadify&code=image&iitem=$img_item&iitemid=$img_itemid"); ?>',
			    'cancelImg' : '<?php echo $this->Config['site_url']; ?>/images/uploadify/cancel.png',
			    'buttonImg'	: '<?php echo $this->Config['site_url']; ?>/images/uploadify/addatt.gif',
			    'width'		: 111,
			    'height'	: 17,
			    'multi'		: true,
			    'auto'      : true,
			    'sizeLimit' : '2097152',
			    'fileExt'	: '*.jpg;*.png;*.gif;*.jpeg',
			    'fileDesc'	: '请选择图片文件(*.jpg;*.png;*.gif;*.jpeg)',
			    'queueID'	: 'uploadifyQueueDiv<?php echo $image_uploadify_id; ?>',
			    'wmode'		: 'transparent',
			    'fileDataName'	 : 'topic',
			    'queueSizeLimit' : <?php echo $image_uploadify_queue_size_limit; ?>,
			    'simUploadLimit' : 1,
			    'scriptData'	 : {
			    
<?php if($image_uploadify_topic_uid) { ?>
			    	'topic_uid'  : '<?php echo $image_uploadify_topic_uid; ?>',
			    	
<?php } ?>
    	'cookie_auth': '<?php echo urlencode(jsg_getcookie("auth")); ?>'
			    },
			    'onSelect'		 : function(event, ID, fileObj) {
			    },
			    'onSelectOnce'	 : function (event, data) {
			    	imageUploadifySelectOnce<?php echo $image_uploadify_id; ?>();			    	
			    },
			    'onProgress'     : function(event, ID, fileObj, data) {
			        return false;
			    },
			    'onComplete'	 : function(event, ID, fileObj, response, data) {
			    	eval('var r = ' + response + ';');
					if (r.done) {					
						var rv = r.retval;
						if ( rv.id > 0 && rv.src.length > 0 ) {
							imageUploadifyComplete<?php echo $image_uploadify_id; ?>(rv.id, rv.src, fileObj.name);
						}
					}
			    },
			    'onError'        : function (event, ID, fileObj, errorObj) {
			        alert(errorObj.type + ' Error: ' + errorObj.info);
			    },
			    'onAllComplete'	 : function(event, data) {
			    	imageUploadifyAllComplete<?php echo $image_uploadify_id; ?>();
			    }
			});
			
			
			$("#viewImgDiv<?php echo $image_uploadify_id; ?> img").each(function() {
			    if($(this).width() > $(this).parent().width()) {
			    	$(this).width("100%");
				}
			});
			
				
		});
		
		
		//删除一张图片
		function imageUploadifyDelete<?php echo $image_uploadify_id; ?>(idval)
		{
			var idval = ('undefined'==typeof(idval) ? 0 : idval);
			if(idval > 0) 
			{
				$.post
				(
					'ajax.php?mod=uploadify&code=delete_image',
					{
						'id' : idval
					},
					function (r) 
					{				
						if(r.done)
						{
							$('#uploadImgSpan_' + idval).remove();
							
							if( ($.trim(($('#viewImgDiv<?php echo $image_uploadify_id; ?>').html()))).length < 1 )
							{
								$('#viewImgDiv<?php echo $image_uploadify_id; ?>').css('display', 'none');
								$('#insertImgDiv<?php echo $image_uploadify_id; ?>').css('display', 'block');
							}
							
							if( 'undefined' != typeof(__IMAGE_IDS__[idval]) )
							{
								__IMAGE_IDS__[idval] = 0;
							}
						}
						else
						{
							if(r.msg)
							{
								MessageBox('warning', r.msg);
							}
						}
					},
					'json'
				);
			}
		}
		
		function imageUploadifySelectOnce<?php echo $image_uploadify_id; ?>()
		{
			$('#uploading<?php echo $image_uploadify_id; ?>').html("<img src='images/loading.gif'/>&nbsp;上传中，请稍候……");
		}
		
		function imageUploadifyComplete<?php echo $image_uploadify_id; ?>(idval, srcval, nameval)
		{
			var imageIdsCount = 0;
	    	$.each( __IMAGE_IDS__, function( k, v ) { if( v > 0 ) { imageIdsCount += 1; } } );
	    	if( imageIdsCount >= <?php echo $image_uploadify_queue_size_limit; ?> )
	    	{
	    		MessageBox('warning', '本次图片数量超过限制了');
	    		return false;
	    	}
			
			var idval = ('undefined' == typeof(idval) ? 0 : idval);
			var srcval = ('undefined' == typeof(srcval) ? 0 : srcval);
			var nameval = ('undefined' == typeof(nameval) ? '' : nameval);
<?php if('topic_publish'==$image_uploadify_from) { ?>
				$('#viewImgDiv<?php echo $image_uploadify_id; ?>').prepend('<li id="uploadImgSpan_' + idval + '" class="menu_ps vv_2"><img src="' + srcval + '"/> <p><i>' + nameval + ' <a title="删除图片" onclick="imageUploadifyDelete<?php echo $image_uploadify_id; ?>(' + idval + ');return false;" href="javascript:;">删除</a></i></p></li>');<?php } elseif('topic_longtext_info_ajax'==$image_uploadify_from) { ?>$('#viewImgDiv<?php echo $image_uploadify_id; ?>').append('<span id="uploadImgSpan_' + idval + '"><img src="' + srcval + '" width="<?php echo $image_uploadify_image_small_size; ?>" alt="点击图片插入到文中" onclick="longtext_info_img_insert(\'' + srcval + '\');" /><a href="javascript:void(0);" onclick="imageUploadifyDelete<?php echo $image_uploadify_id; ?>(' + idval + '); return false;" title="删除图片">×</a></span>');
<?php } else { ?>$('#viewImgDiv<?php echo $image_uploadify_id; ?>').append('<span id="uploadImgSpan_' + idval + '"><img src="' + srcval + '" width="<?php echo $image_uploadify_image_small_size; ?>" /><a href="javascript:void(0);" onclick="imageUploadifyDelete<?php echo $image_uploadify_id; ?>(' + idval + '); return false;" title="删除图片">×</a></span>');
			
<?php } ?>
$('#normalUploadFile<?php echo $image_uploadify_id; ?>').val('');
			
			__IMAGE_IDS__[idval] = idval;
		}
		
		function imageUploadifyAllComplete<?php echo $image_uploadify_id; ?>()
		{
			$('#uploading<?php echo $image_uploadify_id; ?>').html('');			    	
	    	$('#viewImgDiv<?php echo $image_uploadify_id; ?>').css('display', 'block');
	    	//$('#insertImgDiv<?php echo $image_uploadify_id; ?>').css('display', 'none');
	    	if( $.trim(($('#<?php echo $content_textarea_id; ?>').val())).length < 1 ) {
	    		$('#<?php echo $content_textarea_id; ?>').val('<?php echo $content_textarea_empty_val; ?>');	
	    	}
	    	$('#<?php echo $content_textarea_id; ?>').focus();
		}
		
		function normalUploadFormSubmit<?php echo $image_uploadify_id; ?>()
		{
			var fileVal = $('#normalUploadFile<?php echo $image_uploadify_id; ?>').val();
			
			if(($.trim(fileVal)).length < 1)
			{
				MessageBox('warning', '请选择一个正确的图片文件');
				return false;
			}
			else
			{
				if(!(/\.(jpg|png|gif|jpeg)$/i.test(fileVal)))
				{
					MessageBox('warning', '请选择一个正确的图片文件');
					return false;
				}
				else
				{
					imageUploadifySelectOnce<?php echo $image_uploadify_id; ?>();
					
					return true;
				}
			}
		}
		
		function imageUploadifyModuleSwitch<?php echo $image_uploadify_id; ?>()
		{
			if('none' == $('#normalUploadDiv<?php echo $image_uploadify_id; ?>').css('display'))
			{
				$('#uploadDescModuleSpan<?php echo $image_uploadify_id; ?>').html('快速');
				
				$('#swfUploadDiv<?php echo $image_uploadify_id; ?>').css('display', 'none');
				$('#normalUploadDiv<?php echo $image_uploadify_id; ?>').css('display', 'block');
			}
			else
			{
				$('#uploadDescModuleSpan<?php echo $image_uploadify_id; ?>').html('普通');
				
				$('#normalUploadDiv<?php echo $image_uploadify_id; ?>').css('display', 'none');
				$('#swfUploadDiv<?php echo $image_uploadify_id; ?>').css('display', 'block');
			}
		}
		
		</script>
<?php if(!$image_uploadify_only_js) { ?>
        <div id="insertImgDiv<?php echo $image_uploadify_id; ?>" class="insertImgDiv">
        <i class="insertImgDiv_up_<?php echo $image_uploadify_id; ?> insertImgDiv_up" onclick="$(this).parent().hide()"><img src="templates/default/images/imgdel.gif" title="关闭" /></i>
		    <div id="swfUploadDiv<?php echo $image_uploadify_id; ?>"><input type="file" id="publisher_file<?php echo $image_uploadify_id; ?>" name="publisher_file<?php echo $image_uploadify_id; ?>" style="display:none;" />（按ctrl键可一次选多图上传）</div>
		    <iframe id="imageUploadifyIframe<?php echo $image_uploadify_id; ?>" name="imageUploadifyIframe<?php echo $image_uploadify_id; ?>" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank" style="display:none;"></iframe>
		    <div id="normalUploadDiv<?php echo $image_uploadify_id; ?>" style="display:none;">
				<form id="normalUploadForm<?php echo $image_uploadify_id; ?>" method="post"  action="ajax.php?mod=uploadify&code=image&type=normal&iitem=<?php echo $img_item; ?>&iitemid=<?php echo $img_itemid; ?>" enctype="multipart/form-data" target="imageUploadifyIframe<?php echo $image_uploadify_id; ?>" onsubmit="return normalUploadFormSubmit<?php echo $image_uploadify_id; ?>()">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
		    		<input type="hidden" name="image_uploadify_id" value="<?php echo $image_uploadify_id; ?>" />
		    		<input type="file" id="normalUploadFile<?php echo $image_uploadify_id; ?>" name="topic" />
		    		<input type="submit" value="上传" class="tul" />
		    	</form>
		    </div>
			<span id="uploading<?php echo $image_uploadify_id; ?>"></span>
			<div id="uploadDescDiv<?php echo $image_uploadify_id; ?>">
				<span class="fontRed">*</span> 如果您不能上传图片，可以<a href="javascript:;" onclick="imageUploadifyModuleSwitch<?php echo $image_uploadify_id; ?>();">点击这里</a>尝试<span id="uploadDescModuleSpan<?php echo $image_uploadify_id; ?>">普通</span>模式上传
<?php if('topic_longtext_info_ajax'==$image_uploadify_from) { ?>
				<br /><span class="fontRed">*</span> 图片上传成功后，可以点击图片将图片插入到您想要的位置
				
<?php } ?>
<!-- 
				<br />*可上传JPG、JPEG、GIF、PNG图片格式（小于2M）
				<br />*可直接将网上图片URL地址复制到发布框来发布
				-->
			</div>
	    </div>
		<div id="uploadifyQueueDiv<?php echo $image_uploadify_id; ?>" style="display:none;"></div>
        <div id="viewImgDiv<?php echo $image_uploadify_id; ?>" class="viewImgDiv">
        
<?php if((!$image_uploadify_new || $image_uploadify_modify) && $image_uploadify_topic['imageid']) { ?>
        	
        
<?php if(is_array($image_uploadify_topic['image_list'])) { foreach($image_uploadify_topic['image_list'] as $ik => $iv) { ?>
        	<script type="text/javascript"> __IMAGE_IDS__[<?php echo $ik; ?>] = <?php echo $ik; ?>; </script>
        	<span id="uploadImgSpan_<?php echo $ik; ?>">
	        	<img src="<?php echo $iv['image_small']; ?>" width="<?php echo $image_uploadify_image_small_size; ?>" />
	        	<a href="javascript:void(0);" onclick="imageUploadifyDelete<?php echo $image_uploadify_id; ?>('<?php echo $ik; ?>'); return false;" title="删除图片">×</a>
        	</span>
        
<?php } } ?>
        	
<?php } ?>
        </div>
        
<?php } ?>
	<!-- JS引用 结束 -->
	<div class="menu">
	<div class="menu_tq" ><b class="menu_tqb_c">图片</b>
	<div class="menu_tqb">
	    <div class="menu_pi insertImgDiv" id="insertImgDiv">
		    <div id="swfUploadDiv"><input type="file" id="publisher_file" name="publisher_file" style="display:none;" />（按ctrl键可一次选多图上传）</div>
		    <iframe id="imageUploadifyIframe" name="imageUploadifyIframe" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank" style="display:none;"></iframe>
		    <div id="normalUploadDiv" style="display:none;">
				<form id="normalUploadForm" method="post"  action="ajax.php?mod=uploadify&code=image&type=normal&iitem=<?php echo $img_item; ?>&iitemid=<?php echo $img_itemid; ?>" enctype="multipart/form-data" target="imageUploadifyIframe" onsubmit="return normalUploadFormSubmit()">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
		    		<input type="file" id="normalUploadFile" name="topic" />
		    		<input type="submit" value="上传" class="tul" />
		    	</form>
		    </div>
		    <i class="menu_tqb_c1"><img src="templates/default/images/imgdel.gif" title="关闭" /></i>
			<em>
				1、如您不能上传图片，请<a href="javascript:;" onclick="imageUploadifyModuleSwitch();">点击这里</a>用<span id="uploadDescModuleSpan">普通</span>模式上传 ；<br />
				2、网上图片URL地址可直接复制到上面发布框来发布。
			</em>
			<span id="uploading"></span>
			
			<div class="viewImgDiv" id="viewImgDiv"></div>
		</div>
		<div id="uploadifyQueueDiv" style="display:none;"></div>		
	</div>
	</div>
	</div>
	<!-- 图片区块 结束 -->
	<!-- 文件区块 开始 -->
	<!-- JS引用 开始 -->
<?php if(($this->Config['attach_enable'] && $this->Module!='qun') || ($this->Config['qun_attach_enable'] && $this->Module=='qun')) $allow_attach = 1; else $allow_attach = 0  ?>

<?php $attach_uploadify_topic = array(); ?>

<?php $attach_uploadify_from = 'topic_publish'; ?>

<?php $attach_uploadify_only_js = 1; ?>

<?php $attach_num = min(max(1,(int)$this->Config['attach_files_limit']),5); ?>

<?php $attach_size = min(max(1,(int)$this->Config['attach_size_limit']),5120); ?>

<?php $attach_size = $attach_size >= 1024 ? round(($attach_size/1024),1).'M' : $attach_size.'KB'; ?>
<?php if($allow_attach) { ?>
<?php $attach_uploadify_id=$topic_textarea_id.$attach_uploadify_type.($attach_uploadify_topic['tid']>0?"_".$attach_uploadify_topic['tid']:""); ?>

<?php $attach_img_siz=$attach_img_siz?$attach_img_siz:32; ?>

<?php $attach_fz_siz=min(max(1,(int)$this->Config['attach_size_limit']),5120)*1024; ?>

<?php $topic_textarea_id=$topic_textarea_id?$topic_textarea_id:'i_already'.$h_key; ?>

<?php $topic_textarea_empty_val=isset($topic_textarea_empty_val)?$topic_textarea_empty_val:'分享文件'; ?>

<?php $attach_uploadify_queue_size_limit=min(max(1,(int)$this->Config['attach_files_limit']),5); ?>

<?php $attach_item=isset($this->item)?$this->item:''; ?>

<?php $attach_itemid=isset($this->item_id)?$this->item_id:0; ?>
<!-- <success></success> -->

		<script type="text/javascript">
		
		var __ATTACH_IDS__ = {};
		
		$(document).ready(function(){			
			var upfilename = '';
			$('#publisher_file_attach<?php echo $attach_uploadify_id; ?>').uploadify({
				'uploader'  : '<?php echo $this->Config['site_url']; ?>/images/uploadify/uploadify.swf?id=<?php echo $attach_uploadify_id; ?>&random=' + Math.random(),
			    'script'    : '<?php echo urlencode($this->Config['site_url'] . "/ajax.php?mod=uploadattach&code=attach&aitem=$attach_item&aitemid=$attach_itemid"); ?>',
			    'cancelImg' : '<?php echo $this->Config['site_url']; ?>/images/uploadify/cancel.png',
			    'buttonImg'	: '<?php echo $this->Config['site_url']; ?>/images/uploadify/addatta.gif',
			    'width'		: 111,
			    'height'	: 17,
			    'multi'		: true,
			    'auto'      : true,
			    'sizeLimit' : <?php echo $attach_fz_siz; ?>,
			    'fileExt'	: '*.rar;*.zip;*.txt;*.doc;*.xls;*.pdf;*.ppt',
			    'fileDesc'	: '*.rar;*.zip;*.txt;*.doc;*.xls;*.pdf;*.ppt',
			    'queueID'	: 'uploadifyQueueDivAttach<?php echo $attach_uploadify_id; ?>',
			    'wmode'		: 'transparent',
			    'fileDataName'	 : 'topic',
			    'queueSizeLimit' : <?php echo $attach_uploadify_queue_size_limit; ?>,
			    'simUploadLimit' : 1,
			    'scriptData'	 : {
			    
<?php if($attach_uploadify_topic_uid) { ?>
			    	'topic_uid'  : '<?php echo $attach_uploadify_topic_uid; ?>',
			    	
<?php } ?>
    	'cookie_auth': '<?php echo urlencode(jsg_getcookie("auth")); ?>'
			    },
			    'onSelect'		 : function(event, ID, fileObj) {
			    },
			    'onSelectOnce'	 : function (event, data) {
			    	attachUploadifySelectOnce<?php echo $attach_uploadify_id; ?>();			    	
			    },
			    'onProgress'     : function(event, ID, fileObj, data) {
			        return false;
			    },
			    'onComplete'	 : function(event, ID, fileObj, response, data) {
			    	eval('var r = ' + response + ';');
					if (r.done) {					
						var rv = r.retval;
						if ( rv.id > 0 && rv.src.length > 0 ) {
							attachUploadifyComplete<?php echo $attach_uploadify_id; ?>(rv.id, rv.src, fileObj.name);
							upfilename = fileObj.name;
						}
					}
					else
					{
						if(r.msg)
						{
							if(r.msg=='forbidden'){
							MessageBox('warning','您没有上传文件的权限，无法继续操作！');
							}else{
							MessageBox('warning', '上传失败，文件过大或过多或格式错误！');
							}
						}
					}
			    },
			    'onError'        : function (event, ID, fileObj, errorObj) {
			        alert(errorObj.type + ' Error: ' + errorObj.info);
			    },
			    'onAllComplete'	 : function(event, data) {
			    	attachUploadifyAllComplete<?php echo $attach_uploadify_id; ?>(upfilename);
			    }
			});
			
			
			$("#viewAttachDiv<?php echo $attach_uploadify_id; ?> img").each(function() {
			    if($(this).width() > $(this).parent().width()) {
			    	$(this).width("100%");
				}
			});
			
				
		});
		
		
		//删除一个文件
		function attachUploadifyDelete<?php echo $attach_uploadify_id; ?>(idval)
		{
			var idval = ('undefined'==typeof(idval) ? 0 : idval);
			if(idval > 0) 
			{
				$.post
				(
					'ajax.php?mod=uploadattach&code=delete_attach',
					{
						'id' : idval
					},
					function (r) 
					{				
						if(r.done)
						{
							$('#uploadAttachSpan_' + idval).remove();
							
							if( ($.trim(($('#viewAttachDiv<?php echo $attach_uploadify_id; ?>').html()))).length < 1 )
							{
								$('#viewAttachDiv<?php echo $attach_uploadify_id; ?>').css('display', 'none');
								$('#insertAttachDiv<?php echo $attach_uploadify_id; ?>').css('display', 'block');
							}
							
							if( 'undefined' != typeof(__ATTACH_IDS__[idval]) )
							{
								__ATTACH_IDS__[idval] = 0;
							}
						}
						else
						{
							if(r.msg)
							{
								MessageBox('warning', r.msg);
							}
						}
					},
					'json'
				);
			}
		}
		
		function attachUploadifySelectOnce<?php echo $attach_uploadify_id; ?>()
		{
			$('#uploadingAttach<?php echo $attach_uploadify_id; ?>').html("<img src='images/loading.gif'/>&nbsp;上传中，请稍候……");
		}
		
		function attachUploadifyComplete<?php echo $attach_uploadify_id; ?>(idval, srcval, nameval)
		{
			var attachIdsCount = 0;
	    	$.each( __ATTACH_IDS__, function( k, v ) { if( v > 0 ) { attachIdsCount += 1; } } );
	    	if( attachIdsCount >= <?php echo $attach_uploadify_queue_size_limit; ?> )
	    	{
	    		MessageBox('warning', '本次文件数量超过限制了');
	    		return false;
	    	}
			
			var idval = ('undefined' == typeof(idval) ? 0 : idval);
			var srcval = ('undefined' == typeof(srcval) ? 0 : srcval);
			var nameval = ('undefined' == typeof(nameval) ? '' : nameval);
<?php if('topic_publish'==$attach_uploadify_from) { ?>
				$('#viewAttachDiv<?php echo $attach_uploadify_id; ?>').prepend('<li id="uploadAttachSpan_' + idval + '" class="menu_ps vv_2"><img src="' + srcval + '" class="uploadAttachSpan_img_type"/> <p class="uploadAttachSpan_doc_type"><i>' + nameval + '</i>（<a title="删除文件" onclick="attachUploadifyDelete<?php echo $attach_uploadify_id; ?>(' + idval + ');return false;" href="javascript:;">删</a>）需<input title="填写用户下载该附件所需贡献给你的积分" size="1" type="text" onblur="set_attach_score(this.value,' + idval + ');return false;">积分 </p></li>');<?php } elseif('topic_longtext_info_ajax'==$attach_uploadify_from) { ?>$('#viewAttachDiv<?php echo $attach_uploadify_id; ?>').append('<span id="uploadAttachSpan_' + idval + '"><img src="' + srcval + '" width="<?php echo $attach_img_siz; ?>" alt="点击文件插入到文中" onclick="longtext_info_img_insert(\'' + srcval + '\');" />（<a href="javascript:void(0);" onclick="attachUploadifyDelete<?php echo $attach_uploadify_id; ?>(' + idval + '); return false;" title="删除文件">删</a>）需<input title="填写用户下载该附件所需贡献给你的积分" size="1" type="text" onblur="set_attach_score(this.value,' + idval + ');return false;">积分</span>');
<?php } else { ?>$('#viewAttachDiv<?php echo $attach_uploadify_id; ?>').append('<span id="uploadAttachSpan_' + idval + '"><img src="' + srcval + '" width="<?php echo $attach_img_siz; ?>" />（<a href="javascript:void(0);" onclick="attachUploadifyDelete<?php echo $attach_uploadify_id; ?>(' + idval + '); return false;" title="删除文件">删</a>）需<input title="填写用户下载该附件所需贡献给你的积分" size="1" type="text" onblur="set_attach_score(this.value,' + idval + ');return false;">积分</span>');
			
<?php } ?>
$('#normalAttachUploadFile<?php echo $attach_uploadify_id; ?>').val('');
			
			__ATTACH_IDS__[idval] = idval;
		}
		
		function attachUploadifyAllComplete<?php echo $attach_uploadify_id; ?>(nameval)
		{
			var nameval = ('undefined' == typeof(nameval) ? '' : nameval);
			$('#uploadingAttach<?php echo $attach_uploadify_id; ?>').html('');			    	
	    	$('#viewAttachDiv<?php echo $attach_uploadify_id; ?>').css('display', 'block');
	    	//$('#insertAttachDiv<?php echo $attach_uploadify_id; ?>').css('display', 'none');
	    	if( $.trim(($('#<?php echo $topic_textarea_id; ?>').val())).length < 1 ) {
	    		$('#<?php echo $topic_textarea_id; ?>').val('<?php echo $topic_textarea_empty_val; ?>' + ':' + nameval);	
	    	}
	    	$('#<?php echo $topic_textarea_id; ?>').focus();
		}
		
		function normalAttachUploadFormSubmit<?php echo $attach_uploadify_id; ?>()
		{
			var fileVal = $('#normalAttachUploadFile<?php echo $attach_uploadify_id; ?>').val();
			
			if(($.trim(fileVal)).length < 1)
			{
				MessageBox('warning', '请上传正确格式的附件文件');
				return false;
			}
			else
			{
				if(!(/\.(zip|rar|txt|doc|xls|pdf)$/i.test(fileVal)))
				{
					MessageBox('warning', '请选择一个正确格式的附件文件');
					return false;
				}
				else
				{
					attachUploadifySelectOnce<?php echo $attach_uploadify_id; ?>();
					return true;
				}
			}
		}
		
		function attachUploadifyModuleSwitch<?php echo $attach_uploadify_id; ?>()
		{
			if('none' == $('#normalAttachUploadDiv<?php echo $attach_uploadify_id; ?>').css('display'))
			{
				$('#uploadDescModuleSpanAttach<?php echo $attach_uploadify_id; ?>').html('快速');
				$('#swfUploadDivAttach<?php echo $attach_uploadify_id; ?>').css('display', 'none');
				$('#normalAttachUploadDiv<?php echo $attach_uploadify_id; ?>').css('display', 'block');
			}
			else
			{
				$('#uploadDescModuleSpanAttach<?php echo $attach_uploadify_id; ?>').html('普通');
				$('#normalAttachUploadDiv<?php echo $attach_uploadify_id; ?>').css('display', 'none');
				$('#swfUploadDivAttach<?php echo $attach_uploadify_id; ?>').css('display', 'block');
			}
		}
		
		</script>
	   
<?php if(!$attach_uploadify_only_js) { ?>
       <div id="insertAttachDiv<?php echo $attach_uploadify_id; ?>" class="insertAttachDiv">
       <i class="insertAttachDiv_up" onclick="$(this).parent().hide()"><img src="templates/default/images/imgdel.gif" title="关闭" /></i>
       <div id="swfUploadDivAttach<?php echo $attach_uploadify_id; ?>"><input type="file" id="publisher_file_attach<?php echo $attach_uploadify_id; ?>" name="publisher_file<?php echo $attach_uploadify_id; ?>" style="display:none;" />（按ctrl键可一次选多个文件）</div>
	   <iframe id="attachUploadifyIframe<?php echo $attach_uploadify_id; ?>" name="attachUploadifyIframe<?php echo $attach_uploadify_id; ?>" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank" style="display:none;"></iframe>
	   <div id="normalAttachUploadDiv<?php echo $attach_uploadify_id; ?>" style="display:none;">
	   <form id="normalAttachUploadForm<?php echo $attach_uploadify_id; ?>" method="post"  action="ajax.php?mod=uploadattach&code=attach&type=normal&aitem=<?php echo $attach_item; ?>&aitemid=<?php echo $attach_itemid; ?>" enctype="multipart/form-data" target="attachUploadifyIframe<?php echo $attach_uploadify_id; ?>" onsubmit="return normalAttachUploadFormSubmit<?php echo $attach_uploadify_id; ?>()">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
		<input type="hidden" name="attach_uploadify_id" value="<?php echo $attach_uploadify_id; ?>" />
		<input type="file" id="normalAttachUploadFile<?php echo $attach_uploadify_id; ?>" name="topic" />
		<input type="submit" value="上传" class="tul" />
		</form>
		</div>
		<span id="uploadingAttach<?php echo $attach_uploadify_id; ?>"></span>
		<div id="uploadDescDivAttach<?php echo $attach_uploadify_id; ?>">
		<span class="fontRed">*</span> 如果您不能上传文件，可以<a href="javascript:;" onclick="attachUploadifyModuleSwitch<?php echo $attach_uploadify_id; ?>();">点击这里</a>尝试<span id="uploadDescModuleSpanAttach<?php echo $attach_uploadify_id; ?>">普通</span>模式上传
<?php if('topic_longtext_info_ajax'==$attach_uploadify_from) { ?>
		<br /><span class="fontRed">*</span> 文件上传成功后，可以点击文件将文件插入到您想要的位置
		
<?php } ?>
</div>
	    </div>
		<div id="uploadifyQueueDivAttach<?php echo $attach_uploadify_id; ?>" style="display:none;"></div>
        <div id="viewAttachDiv<?php echo $attach_uploadify_id; ?>" class="viewAttachDiv">
        
<?php if((!$attach_uploadify_new || $attach_uploadify_modify) && $attach_uploadify_topic['attachid']) { ?>
        	
        
<?php if(is_array($attach_uploadify_topic['attach_list'])) { foreach($attach_uploadify_topic['attach_list'] as $ik => $iv) { ?>
        <script type="text/javascript"> __ATTACH_IDS__[<?php echo $ik; ?>] = <?php echo $ik; ?>; </script>
        <span id="uploadAttachSpan_<?php echo $ik; ?>">
	    <img src="<?php echo $iv['attach_img']; ?>" width="<?php echo $attach_img_siz; ?>" />（<a href="javascript:void(0);" onclick="attachUploadifyDelete<?php echo $attach_uploadify_id; ?>('<?php echo $ik; ?>'); return false;" title="删除文件">删</a>）需<input title="填写用户下载该附件所需贡献给你的积分" size="1" type="text" value="<?php echo $iv['attach_score']; ?>" onblur="set_attach_score(this.value,<?php echo $iv['id']; ?>);return false;">积分
	    </span>
        
<?php } } ?>
        
<?php } ?>
        </div>
        
<?php } ?>
	
<?php } ?>
<!-- JS引用 结束 -->

	<div class="menu">
	<div class="menu_sp"><b class="menu_spb_c">视频</b>
	<div class="menu_spb" id="upload_ajax_video">
	<div class="menu_tb"><span style="float:left; padding-left:5px;">支持如下视频的站内播放</span><div class="menu_spb_c1"></div></div>
	<p class="menu_p"><a href="http://video.sina.com.cn/" rel="nofollow" target="_blank">新浪</a>、<a href="http://www.youku.com/" rel="nofollow" target="_blank">优酷</a>、<a href="http://v.blog.sohu.com/" rel="nofollow" target="_blank">搜狐</a>、<a href="http://www.ku6.com/" rel="nofollow" target="_blank">酷6</a>、<a href="http://www.tudou.com/" rel="nofollow" target="_blank">土豆</a><br>请复制视频播放页网站地址即可</p>
	  <div id="upload_video_list" class="menu_p" style="display:none;">
		<span id="return_ajax_video_title"></span>
		<span><img id="video_img" width="130" /></span>
		<p>
		<input id="videoid" type="hidden" name="video_id" />
		<span><a href="" onclick="DelVideo('videoid','video_ajax'); return false;" title="删除视频">删除视频</a></span>
		</p>
	  </div>
	  <div id="add_video" class="menu_p" style=" margin-bottom:6px; padding-top:0">
	  <iframe id="upload_video_frame" name="upload_video_frame" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe>
	   <form action="ajax.php?mod=topic&code=dovideo" method="post"  enctype="multipart/form-data" name="upload_video" id="upload_video" target="upload_video_frame">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
		<input name="url" type="text" id="url" class="sc_r_t_a" style=" width:220px; display:inline;"/>
		<input type="submit" name="Submit" value="提交" class="c_b1" />
	   </form>
	  </div>
	</div></div>
	</div>

	<div class="menu">
      <div class="menu_m">
        <b class="menu_m_c">音乐</b>
        <div class="menu_music">
		  <div class="menu_tb">
		    <span style="float:left; padding-left:10px;">请在下面输入歌曲名或歌手名字搜索</span>
		    <sub class="menu_music_c1"></sub>
	      </div>
	      <div id="add_music" class="menu_m_s" style=" margin-bottom:6px; padding:15px 10px 0; float:left;">
	      <form action="javascript:void(0);" method="post"  enctype="multipart/form-data" name="upload_music" id="upload_music">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
	          <input name="url" type="text" id="music_name" class="sc_r_t_a" style=" width:220px;">
	          <input type="submit" name="Submit" value="搜索" class="c_b1" onclick="music_serach();">
	      </form>
	      </div>
	      <p class="menu_p" style="padding:0 10px;">音乐后缀的url请直接粘贴到上面的发布框中</p>
	      <div id="music_list" class="menu_m_l"></div>
	    </div>
	  </div>
    </div>
<?php if($allow_attach) { ?>
	<div class="menu">
	<div class="menu_fj" ><b class="menu_fjb_c">附件</b>
	<div class="menu_fjb">
	    <div class="menu_pi insertImgDiv" id="insertAttachDiv">
		    <div id="swfUploadDivAttach"><input type="file" id="publisher_file_attach" name="publisher_file" style="display:none;" />（按ctrl键可一次选多个文件）</div>
		    <iframe id="attachUploadifyIframe" name="attachUploadifyIframe" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank" style="display:none;"></iframe>
		    <div id="normalAttachUploadDiv" style="display:none;">
				<form id="normalAttachUploadForm" method="post"  action="ajax.php?mod=uploadattach&code=attach&type=normal&aitem=<?php echo $attach_item; ?>&aitemid=<?php echo $attach_itemid; ?>" enctype="multipart/form-data" target="attachUploadifyIframe" onsubmit="return normalAttachUploadFormSubmit()">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
		    		<input type="file" id="normalAttachUploadFile" name="topic" />
		    		<input type="submit" value="上传" class="tul" />
		    	</form>
		    </div>
		    <i class="menu_fjb_c1"><img src="templates/default/images/imgdel.gif" title="关闭" /></i>
			<em>
				1、如您不能上传文件，请<a href="javascript:;" onclick="attachUploadifyModuleSwitch();">点击这里</a>用<span id="uploadDescModuleSpanAttach">普通</span>模式上传.<br />
				2、一次最多可上传<?php echo $attach_num; ?>个文件，单个文件大小不超过<?php echo $attach_size; ?>。
			</em>
			<span id="uploadingAttach"></span>
			<div class="viewImgDiv" id="viewAttachDiv"></div>
		</div>
		<div id="uploadifyQueueDivAttach" style="display:none;"></div>		
	</div>
	</div>
	</div>
	
<?php } ?>
<!-- 文件区块 结束 -->
	
	<div class="menu" >
	<div class="menu_ht" id="button_<?php echo MEMBER_ID; ?>"><span onclick="get_tag_choose(<?php echo MEMBER_ID; ?>,'my_tag','<?php echo $h_key; ?>');return false;" class="menu_htb_c">话题</span>
	<div class="menu_htb"><div id="<?php echo $h_key; ?>tag_<?php echo MEMBER_ID; ?>"></div></div>
	</div>
	</div>
<?php if($this->Config['vote_open'] && !$set_vote_closed && !($this->Get['mod'] == 'talk' || $this->Get['mod'] == 'live' || $type == 'answer' || $type == 'ask')) { ?>
	<div class="menu">
	<div class="menu_vs"><b class="menu_vsb_c">投票</b>
	<div class="menu_vsb">
	<div class="menu_vsbox">
	<p class="stitle">
	<b id="vote_content1" class="vhover" onclick="setTab('vote_content',1,3)">创建新的投票</b>
	<b id="vote_content2" onclick="setTab('vote_content',2,3);getMyVoteList(1);">我发起的</b>
	<b id="vote_content3" onclick="setTab('vote_content',3,3);getMyJoinList(1);">我参与的</b>
	<sub class="menu_vsb_c1"></sub>
	</p>
	
	<div class="vcontent" id="con_vote_content_1">
	<p>正在加载...</p>
	</div>
	<div class="vcontent vote_conLi" id="con_vote_content_2" style="display:none;">
	<p>正在加载...</p>
	</div>
	<div class="vcontent vote_conLi" id="con_vote_content_3" style="display:none;">
	<p>正在加载...</p>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
<?php } ?>

<?php if($this->Config['event_open'] == 1 && !$set_event_closed && !($this->Get['mod'] == 'talk' || $this->Get['mod'] == 'live' || $type == 'answer' || $type == 'ask')) { ?>
	<div class="menu">
	<div class="menu_hd"><b class="menu_hdb_c">活动</b>
	<div class="menu_hdb">
	<div class="menu_hdbox">
	<p class="stitle">
	<b id="event_content1" class="vhover" onclick="setTab1('event_content',1,3)">发起新的活动</b>
	<b id="event_content2" onclick="setTab1('event_content',2,3);getMyEventList(1);">我发起的</b>
	<b id="event_content3" onclick="setTab1('event_content',3,3);getJoinEventList(1);">我参与的</b>
	<sub class="menu_hdb_c1"></sub>
	</p>
	
	<div class="vcontent" id="con_event_content_1">
	<p>正在加载...</p>
	</div>
	<div class="vcontent vote_conLi" id="con_event_content_2" style="display:none;">
	<p>正在加载...</p>
	</div>
	<div class="vcontent vote_conLi" id="con_event_content_3" style="display:none;">
	<p>正在加载...</p>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
<?php } ?>

<?php if($this->Config['qun_setting']['qun_open'] && !$set_qun_closed && !($this->Get['mod'] == 'talk' || $this->Get['mod'] == 'live' || $type == 'answer' || $type == 'ask')) { ?>
	<div class="menu">
		<div class="menu_wq">
			<b class="menu_wqb_c">微群</b>
			<div class="menu_wqb">
				<div class="menu_wqbox" style="width:210px;">
					<div class="menu_tb" style="width:210px;">
						<span style="float:left; padding-left:5px;">选择你要发布到的群</span>
						<sub class="menu_wqb_c1"></sub>
					</div>
					<div class="wcontent" id="wcontent_wp"></div>
				</div>
			</div>
		</div>
	</div>
	
<?php } ?>
<?php echo $this->hookall_temp['global_publish_extra1']; ?>
<?php } else { ?><div class="box_3ajax">
<?php } ?>
</div>


<div class="box_4">
<?php if ($this->Get['mod'] == 'tag') $type = 'tagview' ;elseif ($this->Get['mod'] == 'member') $type = 'tohome';elseif ($this->Get['mod'] == 'vote') $type='vote';elseif ($this->Get['mod'] == 'live') $type='live';elseif ($this->Get['mod'] == 'talk') $type='talk';elseif ($this->Get['mod'] == 'event') $type='event'; else $type = $params['code']; ?>

<?php $type = $type ? $type : $this->Code; ?>
<input type="button" class="indexBtn" id="publishSubmit<?php echo $h_key; ?>" title="按Ctrl+Enter快捷发布"/>
	<!--这边的判断主要是为了在应用中使用微博发布框-->
<?php if(in_array($this->Get['mod'], array('qun','live','talk','event','vote')) || $this->Get['type'] == 'ask') { ?>
<?php $topic_type_value = $this->Get['type'] == 'ask' ? $this->Get['item'] : $this->Get['mod']; ?>
<div class="box_4_open" style="margin-right:0;">
        <b class="box_4_open_span"> <label><input id="chk_toweibo<?php echo $h_key; ?>" type="checkbox" checked="checked" onclick="selectAppTopicType(this.id, {toid:'topic_type<?php echo $h_key; ?>', defTopicType:'<?php echo $topic_type_value; ?>'})">同步发作微博</label></b>
        </div>
<?php } else { ?><div class="box_4_open" id="weibo_syn_wp">
        <b class="box_4_open_span">同步发到</b>
        <div class="box_4_open_Box">
        <sub class="box_4_open_span_c1"></sub>
<?php if($this->Config['sina_enable'] && sina_weibo_init()) { ?>
		<p>
<?php echo sina_weibo_syn(); ?>
</p>
		
<?php } ?>

<?php if($this->Config['qqwb_enable'] && qqwb_init()) { ?>
		<p>
<?php echo qqwb_syn(); ?>
</p>
		
<?php } ?>

<?php if($this->Config['kaixin_enable'] && kaixin_init()) { ?>
		<p>
<?php echo kaixin_syn_html(); ?>
</p>
		
<?php } ?>

<?php if($this->Config['renren_enable'] && renren_init()) { ?>
		<p>
<?php echo renren_syn_html(); ?>
</p>
		
<?php } ?>
</div>
        </div>
	
<?php } ?>
</div>

</div>
</div>
<script type="text/javascript">		
		$("#i_already<?php echo $h_key; ?>").bind('focus', function(){
		   $('#tigBox_2').css('visibility', 'visible');
		   var i=0;
		   setTimeout(function(){i+=1; $('#tigBox_2').css('visibility', 'hidden'); },5000);
		});
		
		$("#publishSubmit<?php echo $h_key; ?>").bind('click',function() {
			publishSubmit('i_already<?php echo $h_key; ?>','totid<?php echo $h_key; ?>','<?php echo $type; ?>','topic_type<?php echo $h_key; ?>','','',$('#mapp_item<?php echo $h_key; ?>').val(),$('#mapp_item_id<?php echo $h_key; ?>').val(),$('#xiami_id').val(),$('#touid<?php echo $h_key; ?>').val());
			return false;
		});
		$(document).ready(function(){
			initAiInput('i_already<?php echo $h_key; ?>');
			checkWord('<?php echo $this->Config['topic_input_length']; ?>','i_already<?php echo $h_key; ?>','wordCheck<?php echo $h_key; ?>');
		});
		/*
		$("#i_already").bind('keydown',function(event) {
			event = event || window.event;
			if (event.keyCode == 13 && event.ctrlKey) {
				$("#publishSubmit").click();
			};
		});*/
</script>
<div style="width:540px; margin:0 auto 8px; overflow:hidden">
<script language="Javascript">
function listTopic( s , lh ) {	
	var s = 'undefined' == typeof(s) ? 0 : s;
	var lh = 'undefined' == typeof(lh) ? 1 : lh;
	if(lh) {
		window.location.hash="#listTopicArea";
	}
    $("#listTopicMsgArea").html("<div><center><span class='loading'>内容正在加载中，请稍候……</span></center></div>");
	var myAjax = $.post(
		"ajax.php?mod=topic&code=list",
		{
<?php if(is_array($params)) { foreach($params as $k => $v) { ?>
<?php echo $k; ?>:"<?php echo $v; ?>",
<?php } } ?>
start:s
		},
		function (d) {
			$("#listTopicMsgArea").html('');
			$("#listTopicArea").html(d);			
		}
	); 
}
</script>
<?php if(in_array($this->Code,array('myhome','tag','qun','recd','other','bbs','cms')) || $this->Get['gid'] !='') { ?>
<!--幻灯广告-->
<?php if($this->Config['slide_enable'] && ($slide_config=ConfigHandler::get('slide')) && $slide_config['enable'] && $slide_config['list']) { ?>
	<script src="templates/default/js/kinslideshow.js?v=build+20120428" type="text/javascript"></script>
	<script type="text/javascript">
	$(function(){
		$("#KinSlideshow").KinSlideshow({
		moveStyle:"down",			//切换方向 可选值：【 left | right | up | down 】
		intervalTime:3,   			//设置间隔时间为5秒 【单位：秒】 [默认为5秒]
		moveSpeedTime:400 , 		//切换一张图片所需时间，【单位：毫秒】[默认为400毫秒]
		isHasTitleFont:false,		//是否显示标题文字 可选值：【 true | false 】
		isHasTitleBar:false,		//是否显示标题背景 可选值：【 true | false 】[默认为true]	
		isHasBtn:true,
		//标题文字样式，(isHasTitleFont = true 前提下启用)  
		//titleBar:{titleBar_height:30,titleBar_bgColor:"#08355c",titleBar_alpha:0.3},
		//titleFont:{TitleFont_size:12,TitleFont_color:"#FFFFFF",TitleFont_weight:"normal"},
		//按钮样式设置，(isHasBtn = true 前提下启用) 
		btn:{btn_bgColor:"#FFFFFF",btn_bgHoverColor:"#1072aa",btn_fontColor:"#000000",btn_fontHoverColor:"#FFFFFF",btn_borderColor:"#cccccc",btn_borderHoverColor:"#1188c0",btn_borderWidth:1}
		});
	})
	</script>
	<div id="KinSlideshow" style="overflow:hidden; height:80px;">
<?php if(is_array($slide_config['list'])) { foreach($slide_config['list'] as $_v) { ?>
<?php if($_v['enable'] == 1) { ?>
        <li><a href="<?php echo $_v['href']; ?>" target="_blank"><img src="<?php echo $_v['src']; ?>" alt="" width="540" height="80" /></a></li>
	
<?php } ?>
<?php } } ?>
    </div>
<?php } ?>
<!--幻灯广告-->
<?php } ?>
</div>

 <div class="listBox">
	 
<?php if(in_array($this->Code,array('myhome','tag','qun','recd','other','bbs','cms')) || $this->Get['gid'] !='') { ?>
	<div class="TopicMan s_fixed">
		<div class="nfTagB">
			<ul> 
				<!--我关注的人 Begin--> 
<?php if($this->Code == 'myhome') $myhome= "current"; ?>
<li class="<?php echo $myhome; ?>">
					<span id="follow_menu_wp">
						<a href="index.php?mod=topic&code=myhome" title="我和我关注人的微博">关注的人</a>
					</span>
				</li>
				<!--我关注的人 End--> 
<?php if($this->Config['qun_setting']['qun_open']) { ?>
				<!--我的微群 Begin-->
<?php if($this->Code == 'qun') $qun= "current"; ?>
<li class="<?php echo $qun; ?>">
					<span id="qun_menu_wp">
							<a href="index.php?mod=topic&code=qun" title="我加入微群的微博" class="wp_id">我的微群</a>
					</span>
				</li>
				<!--我的微群 End-->
				
<?php } ?>
<?php if($this->Code == 'tag') $tag= "current w90"; ?>
<li class="<?php echo $tag; ?>">
					<span><a href="index.php?mod=topic&code=tag" title="我关注话题相关的微博">关注的话题</a></span>
				</li>
<?php if($this->Code == 'recd') $recd= "current"; ?>
<li class="<?php echo $recd; ?>">
					<span><a href="index.php?mod=topic&code=recd" title="官方推荐的内容">官方推荐</a>
<?php if(!($this->Config['dzbbs_enable'] || ($this->Config['phpwind_enable'] && $this->Config['pwbbs_enable']) || $this->Config['dedecms_enable'])) { ?>
<em class="navNew"></em>
<?php } ?>
</span>
				</li>
<?php if(($this->Config['dedecms_enable'] == 1)) { ?>
<?php if($this->Code == 'cms') $cms= "current"; ?>
<li class="<?php echo $cms; ?>">
					<span><a href="index.php?mod=topic&code=cms" title="我收藏的资讯分类的内容">我的资讯</a>
<?php if(!($this->Config['dzbbs_enable'] || ($this->Config['phpwind_enable'] && $this->Config['pwbbs_enable']))) { ?>
<em class="navNew"></em>
<?php } ?>
</span>
				</li>
				
<?php } ?>
<?php if($this->Config['dzbbs_enable'] || ($this->Config['phpwind_enable'] && $this->Config['pwbbs_enable'])) { ?>
<?php if($this->Code == 'bbs') $bbs= "current"; ?>
<li class="<?php echo $bbs; ?>">
					<span><a href="index.php?mod=topic&code=bbs" title="我收藏的论坛版块的帖子">我的论坛</a><em class="navNew"></em></span>
				</li>
				
<?php } ?>
<script type="text/javascript">
				 $(document).ready(function(){
				 $("#follow_m_1").mouseover(function(){$("#follow_morelist").show();});
				 $("#follow_m_1").mouseout(function(){$("#follow_morelist").hide();});
				 $("#follow_m_2").mouseover(function(){$("#sel_morelist").show();});
				 $("#follow_m_2").mouseout(function(){$("#sel_morelist").hide();});
			     });
				</script>
				<?php echo $this->hookall_temp['global_index_extra1']; ?>
			</ul>
			<div class="clear"></div>
		</div>
		<div class="nfBox index_m">
		  <div class="left">
			  
<?php if($this->Code=='qun' || $this->Code=='tag') { ?>
			  	  <!--群和话题筛选 Begin-->
				  <a title="查看最近更新的微博" href="index.php?mod=topic&code=<?php echo $this->Code; ?>&view=new" class="<?php echo $active['new']; ?>">最新微博</a>
				  <a title="查看最新的评论" href="index.php?mod=topic&code=<?php echo $this->Code; ?>&view=new_reply" class="<?php echo $active['new_reply']; ?>">最新评论</a>
				  <a title="官方推荐" href="index.php?mod=topic&code=<?php echo $this->Code; ?>&view=recd" class="<?php echo $active['recd']; ?>">官方推荐</a>
				  <!--群和话题筛选 End-->
			  <?php } elseif($this->Code=='cms') { ?>  <a href="index.php?mod=topic&code=cms" class="<?php echo $active['all']; ?>">全部</a>
			  <?php } elseif($this->Code=='myhome') { ?>  	  <!--我关注的 Begin-->
				  <a href="index.php?mod=topic&code=myhome" title="" class="<?php echo $active['all']; ?>">全部</a>
				  
<?php if(!empty($grouplist2)) { ?>
					  
<?php if($grouplist2) { ?>
<?php if(is_array($grouplist2)) { foreach($grouplist2 as $group) { ?>
							<a title="<?php echo $group['group_name']; ?>" href="index.php?mod=topic&code=<?php echo $this->Code; ?>&gid=<?php echo $group['id']; ?>" class="<?php echo $active[$group['id']]; ?>"><?php echo $group['group_name']; ?></a>
						
<?php } } ?>
  
<?php } ?>
  
<?php if($group_count <= $cut_num) { ?>
					  			<a href="javascript:;" onclick="showFollowGroupAddDialog();" title="">添加分组</a>
					  
<?php } else { ?>  <span id="follow_m_1"><a href="index.php?mod=topic&code=myhome" >更多</a>
							  <ul class="index_ml" id="follow_morelist">
<?php $__no_del_group=true; ?>
<li>
<?php if(is_array($group_list)) { foreach($group_list as $group) { ?>
<dl class="ml_dl" id="del_group_ajax_<?php echo $group['id']; ?>">
<dd>
<?php if($touid) { ?>
<input id="select_<?php echo $val['uid']; ?>_<?php echo $group['id']; ?>" name="group" type="checkbox" onclick="groupState(<?php echo $group['id']; ?>,'<?php echo $touid; ?>',this);return false;"/>
<?php } ?>
<?php if($this->Code == 'follow') $urlcode = 'follow'; else $urlcode = 'myhome'; ?>
 
<a href="index.php?mod=topic&code=<?php echo $urlcode; ?>&gid=<?php echo $group['id']; ?>" title="成员人数：<?php echo $group['group_count']; ?>"><?php echo $group['group_name']; ?></a> 
</dd>
<dt>(<?php echo $group['group_count']; ?>)<a onclick="del_group('<?php echo $group['id']; ?>','<?php echo $touid; ?>');return false;" href="javascript:;" title="删除分组" style="float:none;">×</a></dt>
</dl>
<?php } } ?></li>
								<li class="B_linedot"></li>
								<li class="slA"><a href="javascript:void(0)" onclick="showFollowGroupAddDialog();">添加分组</a></li>
								<li class="slM"><a href="index.php?mod=<?php echo $member['username']; ?>&code=follow">管理分组</a></li>
							  </ul>
							  </span>
					  
<?php } ?>
 
				  
<?php } else { ?>  <a href="javascript:;" onclick="showFollowGroupAddDialog();" title="">添加分组</a>
				  
<?php } ?>
  <!--我关注的 End-->
			  <?php } elseif($this->Code=='recd') { ?>  	<a title="查看官方推荐" href="index.php?mod=topic&code=recd&view=all" class="<?php echo $active['all']; ?>">全部</a>
				<a title="查看最新的评论" href="index.php?mod=topic&code=recd&view=new_reply" class="<?php echo $active['new_reply']; ?>">最新评论</a>
			  <?php } elseif($this->Code=='bbs') { ?>
<?php if($this->Config['dzbbs_enable']) { ?>
				<a title="查看我收藏的版块帖子" href="index.php?mod=topic&code=bbs&view=favorites" class="<?php echo $active['favorites']; ?>">收藏的版块</a>
				
<?php } ?>
<a title="查看我收藏的帖子" href="index.php?mod=topic&code=bbs&view=favorite" class="<?php echo $active['favorite']; ?>">收藏的帖子</a>
				<a title="查看我发布的主题帖子" href="index.php?mod=topic&code=bbs&view=thread" class="<?php echo $active['thread']; ?>">我发布的</a>
				<a title="查看我回复的帖子" href="index.php?mod=topic&code=bbs&view=reply" class="<?php echo $active['reply']; ?>">我回复的</a>
				<a title="查看论坛所有版块帖子" href="index.php?mod=topic&code=bbs&view=all" class="<?php echo $active['all']; ?>">全部版块</a>
			  
<?php } ?>
  </div>
		  <?php echo $this->hookall_temp['global_index_extra2']; ?>
		  
<?php $filter_ary = array(
				'all' => array('name'=>'全部','tips' => '查看全部微博'),
				'pic' => array('name'=>'图片','tips' => '含图片'),
				'video' => array('name'=>'视频','tips' => '含视频'),
				'music' => array('name'=>'音乐','tips' => '含音乐'),
				'vote' => array('name'=>'投票','tips' => '含投票'),
				'event' => array('name'=>'活动','tips' => '含活动'),
			);
			 ?>

<?php if($this->Config['vote_open'] != 1)unset($filter_ary['vote']); ?>

<?php if($this->Config['event_open'] != 1)unset($filter_ary['event']); ?>

<?php if($this->Config['fenlei_open'] != 1)unset($filter_ary['fenlei']); ?>

<?php $_fkey = empty($this->Get['type']) ? 'all' : $this->Get['type']; ?>

<?php !isset($filter_ary[$_fkey]) && $_fkey = 'all'; ?>
<?php if($this->Code!='bbs' && $this->Code!='cms') { ?>
		  <div class="right">
		  	<div style="float:left">筛选：</div>
			  <span id="follow_m_2"><a href="<?php echo $type_url; ?>&type=<?php echo $_fkey; ?>" ><?php echo $filter_ary[$_fkey]['name']; ?></a>
			  <ul class="index_ml index_ml_2" id="sel_morelist">
			  
<?php if(is_array($filter_ary)) { foreach($filter_ary as $key => $f) { ?>
<?php if($key != $_fkey) { ?>
			  			<li><a title="<?php echo $f['tips']; ?>" href="<?php echo $type_url; ?>&type=<?php echo $key; ?>" ><?php echo $f['name']; ?></a></li>
					
<?php } ?>
<?php } } ?>
  </ul>
			  </span>
			<div class="clear"></div>
		  </div>
		  
<?php } ?>
  	  <div class="clear"></div>
		</div>		
	</div>
	
<?php } ?>
<?php if(MEMBER_ID == $member['uid']) $_my = '我'; else $_my = $member['nickname']; ?>
      
<?php if(in_array($this->Code,array('myfavorite','favoritemy'))) { ?>
	  <div class="listBoxNav">
      <ul class="nleftL2">
        
<?php if('myfavorite'==$this-> Code) { ?>
        <li class="current"><a href="index.php?mod=topic&code=myfavorite" class="cWhite">我的收藏</a></li>
        
<?php } else { ?>        <li><a href="index.php?mod=topic&code=myfavorite" >我的收藏</a></li>
        
<?php } ?>
        
<?php if('favoritemy'==$this-> Code) { ?>
        <li class="current"><a href="index.php?mod=topic&code=favoritemy" class="cWhite">收藏我的</a></li>
        
<?php } else { ?>        <li><a href="index.php?mod=topic&code=favoritemy">收藏我的</a></li>
        
<?php } ?>
      </ul>
	  <?php echo $this->hookall_temp['global_index_extra3']; ?>
	  </div>
      
<?php } ?>
  
<?php if(in_array($this->Code,array('mycomment','tocomment'))) { ?>
	  <div class="listBoxNav">
	   <ul class="nleftL2">
	   
<?php if('mycomment' == $this->Code) { ?>
        <li class="current"><a href="index.php?mod=topic&code=mycomment" class="cWhite">评论我的</a></li>
        
<?php } else { ?>        <li><a href="index.php?mod=topic&code=mycomment" >评论我的</a></li>
        
<?php } ?>
        
<?php if('tocomment'== $this->Code) { ?>
        <li class="current"><a href="index.php?mod=<?php echo $member['username']; ?>&type=my_reply" class="cWhite">我的评论</a></li>
        
<?php } else { ?>        <li><a href="index.php?mod=<?php echo $member['username']; ?>&type=my_reply">我的评论</a></li>
        
<?php } ?>
   </ul>
	   <?php echo $this->hookall_temp['global_index_extra4']; ?>
	   </div>
	   
<?php } ?>
  <div id="ajax_reminded"></div>
	
	 <div id="listTopicMsgArea"></div>
      <div id="listTopicArea">
	  	<!--微博列表 Begin--><div class="Listmain">
	<div class="mBlog_linedot"></div>
          
<?php if($topic_list) { ?>
		  
<?php if('favoritemy'==$this->Code) { ?>
			
				<!--收藏我的列表 Begin-->
<?php if(is_array($topic_list)) { foreach($topic_list as $val) { ?>
<?php $counts++; ?>
<script type="text/javascript">
						$(document).ready(function(){
							var objStr = "#topic_lists_<?php echo $val['tid']; ?>";
							$(objStr).mouseover(function(){$(objStr + " i").show();});
							$(objStr).mouseout(function(){$(objStr + " i").hide();});
						});
					</script>
					<div class="feedCell" id="topic_list_<?php echo $val['tid']; ?>"><div class="avatar">
	<a href="index.php?mod=<?php echo $favorite_members[$val['fuid']]['username']; ?>">
		<img onerror="javascript:faceError(this);" src="<?php echo $favorite_members[$val['fuid']]['face']; ?>" />
	</a>
</div>
<div class="Contant">
	<div id="topic_lists_<?php echo $val['tid']; ?>" style="_overflow:hidden;">
		<div class="oriTxt">
			<p>
				<a title="<?php echo $val['username']; ?>" href="index.php?mod=<?php echo $favorite_members[$val['fuid']]['username']; ?>">		 										<?php echo $favorite_members[$val['fuid']]['nickname']; ?>
				</a>
				<?php echo $favorite_members[$val['fuid']]['validate_html']; ?>：
				<span style="color:#666; font-size:12px;">收藏于<?php echo $val['favorite_time']; ?></span>
			</p>
			<span>
			<a href="index.php?mod=<?php echo $val['username']; ?>">
			  <?php echo $val['nickname']; ?>
			</a><?php echo $val['validate_html']; ?>:<?php echo $val['content']; ?>
			</span>
<?php if($val['attachid'] && $val['attach_list']) { ?>
<?php $val['attach_key']=$val['tid'].'_'.mt_rand(); ?>
<ul class="attachList" id="attach_area_<?php echo $val['attach_key']; ?>">
<?php if(is_array($val['attach_list'])) { foreach($val['attach_list'] as $iv) { ?>
	<li><img src="<?php echo $iv['attach_img']; ?>" class="attachList_img" />
	<div class="attachList_att">
	<p class="attachList_att_name"><b><?php echo $iv['attach_name']; ?></b>
	&nbsp;（<?php echo $iv['attach_size']; ?>）</p>
	<p class="attachList_att_doc"><a href="javascript:void(0);"
		onclick="downattach(<?php echo $iv['id']; ?>);">点此下载</a>（需<?php echo $iv['attach_score']; ?>积分，已下载<?php echo $iv['attach_down']; ?>次）</p>
	</div>
	</li>
	
<?php } } ?>
</ul>
<?php } ?>

<?php if($val['imageid'] && $val['image_list']) { ?>
<?php $val['image_key']=$val['tid'].'_'.mt_rand(); ?>
<ul class="imgList" id="image_area_<?php echo $val['image_key']; ?>">
<?php if(is_array($val['image_list'])) { foreach($val['image_list'] as $iv) { ?>
	<li><a href="<?php echo $iv['image_original']; ?>" class="artZoomAll"
		rel="<?php echo $iv['image_small']; ?>" rev="<?php echo $val['image_key']; ?>"><img
		src="<?php echo $iv['image_small']; ?>" /></a>
	<div class="artZoomBox" style="display: none;">
	<div class="tool"><a title="向右转" href="#" class="imgRight">向右转</a><a
		title="向左转" href="#" class="imgLeft">向左转</a><a title="查看原图"
		href="<?php echo $iv['image_original']; ?>" class="viewImg">查看原图</a></div>
	<a class="maxImgLinkAll" href="<?php echo $iv['image_original']; ?>"> <img
     src="<?php echo $iv['image_original']; ?>" class="maxImg"></a></div>
	</li>
	
<?php } } ?>
</ul>
<?php } ?>
<!--style="width:<?php echo $this->Config['thumbwidth']; ?>px; height:<?php echo $this->Config['thumbheight']; ?>px;"-->

<!--投票 Begin-->
<?php if($val['is_vote'] > 0) { ?>
<?php $val['vote_key']=$val['tid'].'_'.$val['random'] ?>
<ul class="imgList" id="vote_detail_<?php echo $val['vote_key']; ?>">
	<li><a href="javascript:;"
		onclick="getVoteDetailWidgets('<?php echo $val['vote_key']; ?>', <?php echo $val['is_vote']; ?>);"><img
		src='./images/vote_pic_01.gif' /></a></li>
</ul>
<div id="vote_area_<?php echo $val['vote_key']; ?>" style="display: none;">
<div class="blogTxt">
<div class="top"></div>
<div class="mid" id="vote_content_<?php echo $val['vote_key']; ?>"></div>
<div class="bottom"></div>
</div>
</div>
<?php } ?>
<!--投票 End-->
<?php if($val['videoid'] and $this->Config['video_status']) { ?>
<div class="feedUservideo"><a
	onClick="javascript:showFlash('<?php echo $val['VideoHosts']; ?>', '<?php echo $val['VideoLink']; ?>', this, '<?php echo $val['VideoID']; ?>','<?php echo $val['VideoUrl']; ?>');">
<div id="play_<?php echo $val['VideoID']; ?>" class="vP"><img
	src="images/feedvideoplay.gif" /></div>
<img src="<?php echo $val['VideoImg']; ?>" style="border: none" /> </a></div>
<?php } ?>

<?php if($val['musicid']) { ?>
<?php if($val['xiami_id']) { ?>
<div class="feedUserImg"><embed width="257" height="33"
	wmode="transparent" type="application/x-shockwave-flash"
	src="http://www.xiami.com/widget/0_<?php echo $val['xiami_id']; ?>/singlePlayer.swf"></embed></div>
<?php } else { ?><div class="feedUserImg">
<div id="play_<?php echo $val['MusicID']; ?>"></div>
<img src="images/music.gif" title="点击播放音乐"
	onClick="javascript:showFlash('music', '<?php echo $val['MusicUrl']; ?>', this, '<?php echo $val['MusicID']; ?>');"
	style="cursor: pointer; border: none;" /></div>
<?php } ?>
<?php } ?><script type="text/javascript"> var __TOPIC_VIEW__ = '<?php echo $topic_view; ?>'; </script>
<?php if(($tpid=$val['top_parent_id'])>0 && !in_array($this->Code, array('forward', 'reply'))) { ?>
<?php if(('mycomment'==$this->Code || $topic_view) && 'reply'==$val['type'] && $tpid!=($pid=$val['parent_id']) && $parent_list[$pid]) { ?>
<p class="feedP">回复{<a
	href="index.php?mod=<?php echo $parent_list[$pid]['username']; ?>"><?php echo $parent_list[$pid]['nickname']; ?>：</a><span><?php echo $parent_list[$pid]['content']; ?></span>}</p>
<?php } ?>

<?php if(!$topic_view) { ?>
<?php $pt=$parent_list[$tpid]; ?>
<div class="blogTxt">
<div class="top"></div>
<div class="mid">
<?php if($pt) { ?>
 <span> <a
	href="index.php?mod=<?php echo $pt['username']; ?>"
	onmouseover="get_user_choose(<?php echo $pt['uid']; ?>,'_reply_user',<?php echo $val['tid']; ?>);"
	onmouseout="clear_user_choose();"> <?php echo $pt['nickname']; ?> </a>
<?php echo $pt['validate_html']; ?> : <!--悬浮头像、弹出对话框--> <span
	id="user_<?php echo $val['tid']; ?>_reply_user"></span> <!--悬浮头像、弹出对话框--> </span> 
<?php $TPT_ = $TPT_ ? $TPT_ : 'TPT_'; ?>
<span id="topic_content_<?php echo $TPT_; ?><?php echo $pt['tid']; ?>_short"><?php echo $pt['content']; ?></span> <span
	id="topic_content_<?php echo $TPT_; ?><?php echo $pt['tid']; ?>_full"></span> 
<?php if($pt['longtextid'] > 0) { ?>
<span> <a href="javascript:;"
	onclick="view_longtext('<?php echo $pt['longtextid']; ?>', '<?php echo $pt['tid']; ?>', this, '<?php echo $TPT_; ?>', '<?php echo $val['tid']; ?>');return false;">查看全文</a>
</span> 
<?php } ?>
 
<?php if($pt['attachid'] && $pt['attach_list']) { ?>
<table class="attachst" style="width:440px;">
<?php if(is_array($pt['attach_list'])) { foreach($pt['attach_list'] as $iv) { ?>
	<tr>
		<td class="attachst_img"><img src="<?php echo $iv['attach_img']; ?>" /></td>
		<td class="attachst_att">
		<p class="attachList_att_name"><b><?php echo $iv['attach_name']; ?></b>&nbsp;（<?php echo $iv['attach_size']; ?>）</p>
		<p class="attachList_att_doc"><a href="javascript:void(0);"
		onclick="downattach(<?php echo $iv['id']; ?>);">点此下载</a>（需<?php echo $iv['attach_score']; ?>积分，已下载<?php echo $iv['attach_down']; ?>次）</p>

		</td>
	</tr>
	
<?php } } ?>
</table>
<?php } ?>
 
<?php if($pt['imageid'] && $pt['image_list']) { ?>
 
<?php $pt['image_key']=$pt['tid'].'_'.mt_rand(); ?>
<ul class="imgList" id="image_area_<?php echo $pt['image_key']; ?>">
<?php if(is_array($pt['image_list'])) { foreach($pt['image_list'] as $iv) { ?>
	<li><a href="<?php echo $iv['image_original']; ?>" class="artZoomAll"
		rel="<?php echo $iv['image_small']; ?>" rev="<?php echo $pt['image_key']; ?>"><img
		src="<?php echo $iv['image_small']; ?>" /></a>
	<div class="artZoomBox" style="display:none;">
	<div class="tool"><a title="向右转" href="#" class="imgRight">向右转</a><a
		title="向左转" href="#" class="imgLeft">向左转</a><a title="查看原图"
		href="<?php echo $iv['image_original']; ?>" class="viewImg">查看原图</a></div>
	<a class="maxImgLinkAll" href="<?php echo $iv['image_original']; ?>"> <img src="<?php echo $iv['image_original']; ?>" class="maxImg"></a></div>
	</li>
	
<?php } } ?>
</ul>
<?php } ?>
 <!--style="width:<?php echo $this->Config['thumbwidth']; ?>px; height:<?php echo $this->Config['thumbheight']; ?>px;"-->

<!--投票 Begin--> 
<?php if($pt['is_vote'] > 0) { ?>
 
<?php $__vote_key = $pt['tid'].'_'.$pt['random'] ?>
<ul class="imgList" id="vote_detail_<?php echo $__vote_key; ?>">
<li><a href="javascript:;" onclick="getVoteDetailWidgets('<?php echo $__vote_key; ?>', <?php echo $pt['is_vote']; ?>);"><img src='./images/vote_pic_01.gif' /></a></li>
</ul>
<div id="vote_area_<?php echo $__vote_key; ?>" style="display: none;">
<div class="vote_zf_box" id="vote_content_<?php echo $__vote_key; ?>"></div>
</div>
<?php } ?>
 <!--投票 End--> 
<?php if($pt['videoid'] and $this->Config['video_status']) { ?>
<div class="feedUservideo">
<a onClick="javascript:showFlash('<?php echo $pt['VideoHosts']; ?>', '<?php echo $pt['VideoLink']; ?>', this, '<?php echo $pt['VideoID']; ?>','<?php echo $pt['VideoUrl']; ?>');">
<div id="play_<?php echo $pt['VideoID']; ?>" class="vP"><img src="images/feedvideoplay.gif" /></div>
<img src="<?php echo $pt['VideoImg']; ?>" style="border: none" /> </a></div>
<?php } ?>
 
<?php if($pt['musicid']) { ?>
 
<?php if($pt['xiami_id']) { ?>
<div class="feedUserImg">
<embed width="257" height="33" wmode="transparent" type="application/x-shockwave-flash" src="http://www.xiami.com/widget/0_<?php echo $pt['xiami_id']; ?>/singlePlayer.swf"></embed></div>
<?php } else { ?><div class="feedUserImg">
<div id="play_<?php echo $pt['MusicID']; ?>"></div>
<img src="images/music.gif" title="点击播放音乐" onClick="javascript:showFlash('music', '<?php echo $pt['MusicUrl']; ?>', this, '<?php echo $pt['MusicID']; ?>');" style="cursor: pointer; border: none;" /></div>
<?php } ?>
 
<?php } ?>
<div style="width:400px; float:left; padding:5px 0; margin:0;">
<a href="index.php?mod=topic&code=<?php echo $tpid; ?>" target="_blank">原文评论(<?php echo $pt['replys']; ?>)</a>&nbsp;
<a onclick="get_forward_choose(<?php echo $tpid; ?>);return false;"href="index.php?mod=topic&code=<?php echo $tpid; ?>" target="_blank">转发原文(<?php echo $pt['forwards']; ?>)</a>&nbsp;
<?php echo $pt['from_html']; ?></div>
<?php } else { ?> 
<?php $val['reply_disable']=0; ?>
<p><span>原始微博已删除</span></p>
<?php } ?>
</div>
<div class="bottom"></div>
</div>
<?php } ?>
<?php } ?>
		</div>

		<div class="from">
			<span class="option"></span> 
			<span class="mycome"></span> 
		</div>
	</div>
	<div id="reply_area_<?php echo $val['tid']; ?>"></div>
	<!--编辑微博-->
	<div id="modify_topic_<?php echo $val['tid']; ?>"></div>
	<!--编辑微博-->
</div>
<div class="mBlog_linedot"></div>	
					</div>
				
<?php } } ?>
  		<!--收藏我的列表 End-->
		  
          
<?php } else { ?>  	<!--微博列表 Begin-->
<?php if($this->Code=='bbs' || $this->Code=='cms') { ?>
					<script type="text/javascript">
					function item_longtext(pidval){
					var full_id = 'c_' + pidval + '_full';
					var short_id = 'c_' + pidval + '_short';
					var link_id = 'linktext_' + pidval;
					if (document.getElementById(full_id).style.display == 'none'){
					document.getElementById(full_id).style.display = 'block';
					document.getElementById(short_id).style.display = 'none';
					document.getElementById(link_id).innerHTML = '收起全文';
					}else{
					document.getElementById(full_id).style.display = 'none';
					document.getElementById(short_id).style.display = 'block';
					document.getElementById(link_id).innerHTML = '查看全文';
					}
					}
					</script>
				
<?php } ?>
<?php if(is_array($topic_list)) { foreach($topic_list as $val) { ?>
<?php $counts++; ?>
<div class="feedCell" id="topic_list_<?php echo $val['tid']; ?>">
<?php if($this->Config['ad_enable']) { ?>
<?php if($counts == 3 && $this->Config['ad']['ad_list']['group_myhome']['middle_center']) { ?>
							<div class="L_AD"><?php echo $this->Config['ad']['ad_list']['group_myhome']['middle_center']; ?></div>
						
<?php } ?>

<?php if($counts == 10 && $this->Config['ad']['ad_list']['group_myhome']['middle_center1']) { ?>
							<div class="L_AD"><?php echo $this->Config['ad']['ad_list']['group_myhome']['middle_center1']; ?></div>
						
<?php } ?>
<?php } ?>
<?php if($this->Code=='bbs') { ?>
<?php if($val['uid']) { ?>
<div class="wb_l_face">
<div class="avatar">
<?php if($this->Code != '') { ?>
    
<?php if(MEMBER_ID != $val['uid']) { ?>
    <a href="javascript:void(0)" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user<?php echo $talkanswerid; ?>',<?php echo $val['tid']; ?>);" onmouseout="clear_user_choose();">
        <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" />
    </a>
    
<?php } else { ?>        <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" />
    
<?php } ?>
<?php } else { ?><a href="index.php?mod=<?php echo $val['username']; ?>"><img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" /></a>
<?php } ?>
<?php if($this->Config['is_topic_user_follow']) { ?>
<?php echo $val['follow_html']; ?>
<?php } ?>
</div>
<?php if($val['user_css']) { ?>
<p class="<?php echo $val['user_css']; ?>"><?php echo $val['user_str']; ?></p>
<?php } ?>
</div>


<!--悬浮头像、弹出对话框-->
<div id="user_<?php echo $val['tid']; ?>_user<?php echo $talkanswerid; ?>"></div>
<!--悬浮头像、弹出对话框-->

<!--私信对话框-->
<div id="Pmsend_to_user_area" style="width:430px;" style="display:none"></div>
<!--私信对话框-->

<!--AT、拉黑对话框-->
<div id="alert_follower_menu_<?php echo $val['uid']; ?>" style="display:none"></div>
<!--AT、拉黑对话框-->

<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);" style="display:none"></div>

<!--分组对话框-->
<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox" style="display:none"></div>
<!--分组对话框-->

<!--备注对话框-->
<div id="get_remark_<?php echo $val['uid']; ?>" style="display:none"></div>
<!--备注对话框-->

<!--微博内容中 @用户 悬浮提示-->
<div id="at_<?php echo $val['tid']; ?>_user" class="at_style" style="display:none;"></div>
<!--微博内容中 @用户 悬浮提示-->
<?php } else { ?><div class="wb_l_face"><div class="avatar"><img src="<?php echo $val['face']; ?>" title="未在微博登录的论坛用户" onerror="javascript:faceError(this);" /></div></div>
<?php } ?>
<div class="Contant">
	<div style="_overflow:hidden">
		<div class="oriTxt">
			<p class="utitle">
<?php if($val['uid']) { ?>
<span class="un">
<a title="查看<?php echo $val['nickname']; ?>的微博" href="index.php?mod=<?php echo $val['username']; ?>" class="photo_vip_t_name"><?php echo $val['nickname']; ?></a>
<?php if($val['validate_html']) { ?>
<?php echo $val['validate_html']; ?>&nbsp;
<?php } else { ?>
<?php if($this->Config['topic_level_radio']) { ?>
<span class="wb_l_level">
<a class="ico_level wbL<?php echo $val['level']; ?>" title="点击查看微博等级" href="index.php?mod=settings&code=exp" target="_blank"><?php echo $val['level']; ?></a>
</span>
<?php } ?>
<?php } ?>
<?php if($this->Config['is_signature']) { ?>
<?php if(!$_GET['mod_original'] && 'photo'!=$this->Code) { ?>
<?php if($val['signature']) { ?>
<span class="signature">
<?php if($val['uid'] == MEMBER_ID ||  'admin' == MEMBER_ROLE_TYPE) { ?>
<a href="javascript:void(0);" onclick="follower_choose(<?php echo $val['uid']; ?>,'<?php echo $val['nickname']; ?>','topic_signature');" title="点击修改个人签名">
<em ectype="user_signature_ajax_<?php echo $val['uid']; ?>">(<?php echo $val['signature']; ?>)</em>
</a>
<?php } else { ?><em>(<?php echo $val['signature']; ?>)</em>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php } ?>
<?php echo $this->hookall_temp['global_topiclist_extra1']; ?>
</span>
<?php echo $this->hookall_temp['global_topiclist_extra2']; ?>
<?php } else { ?><span class="un"><a title="未在微博登录的论坛用户" href="javascript:;" ><?php echo $val['nickname']; ?></a></span>
			
<?php } ?>
<span class="ut"><a href="<?php echo $val['bbsurl']; ?>" target="_blank"><?php echo $val['dateline']; ?></a></span>
			</p>
<?php if($val['title']) { ?>
			<p><b><?php echo $val['title']; ?></b></p>
			
<?php } ?>
<span id="c_<?php echo $val['pid']; ?>_short"><?php echo $val['content']; ?></span>
			<span id="c_<?php echo $val['pid']; ?>_full" style="display:none;"><?php echo $val['content_full']; ?></span>
<?php if($val['longtext']) { ?>
				<span>
				<a id="linktext_<?php echo $val['pid']; ?>" href="javascript:;" onclick="item_longtext('<?php echo $val['pid']; ?>');return false;">查看全文</a>
				</span>
			
<?php } ?>

<?php if($val['first'] == 0) { ?>
			<div class="blogTxt">
				<div class="top"></div>
				<div class="mid">
<?php if($val['tuid']) { ?>
					<span>
					<a href="index.php?mod=<?php echo $val['t_username']; ?>" onmouseover="get_user_choose(<?php echo $val['tuid']; ?>,'_reply_user',<?php echo $val['tid']; ?>);" onmouseout="clear_user_choose();"><?php echo $val['t_nickname']; ?></a><?php echo $val['t_validate_html']; ?> : 
					<!--悬浮头像、弹出对话框-->
					<span id="user_<?php echo $val['tid']; ?>_reply_user"></span>
					<!--悬浮头像、弹出对话框-->
					</span>
<?php } else { ?><span><a title="未在微博登录的论坛用户" href="javascript:;"><?php echo $val['t_nickname']; ?></a>: </span>
					
<?php } ?>
<span><?php echo $val['t_title']; ?></span>
					<div>发布于：<?php echo $val['t_dateline']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $val['bbsurl']; ?>" target="_blank">回帖(<?php echo $val['replys']; ?>)</a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo $val['lasturl']; ?>" target="_blank"><?php echo $val['lastpost']; ?></a></div>
				</div>
				<div class="bottom"></div>
			</div>
			<div class="from"><div class="option"><ul><li></li></ul></div><div class="mycome">来自<a href="<?php echo $val['forumurl']; ?>" target="_blank">论坛 - <?php echo $val['forumtitle']; ?></a></div></div>
<?php } else { ?><div class="from"><div class="option"><ul><li><span>
<?php if($val['replys']) { ?>
			<a id="topic_list_reply_<?php echo $val['tid']; ?>_aid" href="javascript:void(0)" onclick="replyTopic(<?php echo $val['rid']; ?>,'reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',0,0,{item:'bbs'});return false;">回帖 (<?php echo $val['replys']; ?>)</a></span></li><li><span><a href="<?php echo $val['lasturl']; ?>" target="_blank"><?php echo $val['lastpost']; ?></a>
<?php } else { ?>回帖 (<?php echo $val['replys']; ?>)&nbsp;&nbsp;</span></li><li><span><?php echo $val['lastpost']; ?>
			
<?php } ?>
</span></li></ul></div><div class="mycome">来自<a href="<?php echo $val['forumurl']; ?>" target="_blank">论坛 - <?php echo $val['forumtitle']; ?></a></div></div>
			
<?php } ?>
</div>
	</div>
	<div id="reply_area_<?php echo $val['tid']; ?>"></div>
</div>
<div class="mBlog_linedot"></div><?php } elseif($this->Code=='cms') { ?>
<?php if($val['uid']) { ?>
<div class="wb_l_face">
<div class="avatar">
<?php if($this->Code != '') { ?>
    
<?php if(MEMBER_ID != $val['uid']) { ?>
    <a href="javascript:void(0)" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user<?php echo $talkanswerid; ?>',<?php echo $val['tid']; ?>);" onmouseout="clear_user_choose();">
        <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" />
    </a>
    
<?php } else { ?>        <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" />
    
<?php } ?>
<?php } else { ?><a href="index.php?mod=<?php echo $val['username']; ?>"><img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" /></a>
<?php } ?>
<?php if($this->Config['is_topic_user_follow']) { ?>
<?php echo $val['follow_html']; ?>
<?php } ?>
</div>
<?php if($val['user_css']) { ?>
<p class="<?php echo $val['user_css']; ?>"><?php echo $val['user_str']; ?></p>
<?php } ?>
</div>


<!--悬浮头像、弹出对话框-->
<div id="user_<?php echo $val['tid']; ?>_user<?php echo $talkanswerid; ?>"></div>
<!--悬浮头像、弹出对话框-->

<!--私信对话框-->
<div id="Pmsend_to_user_area" style="width:430px;" style="display:none"></div>
<!--私信对话框-->

<!--AT、拉黑对话框-->
<div id="alert_follower_menu_<?php echo $val['uid']; ?>" style="display:none"></div>
<!--AT、拉黑对话框-->

<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);" style="display:none"></div>

<!--分组对话框-->
<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox" style="display:none"></div>
<!--分组对话框-->

<!--备注对话框-->
<div id="get_remark_<?php echo $val['uid']; ?>" style="display:none"></div>
<!--备注对话框-->

<!--微博内容中 @用户 悬浮提示-->
<div id="at_<?php echo $val['tid']; ?>_user" class="at_style" style="display:none;"></div>
<!--微博内容中 @用户 悬浮提示-->
<?php } else { ?><div class="wb_l_face"><div class="avatar"><img src="<?php echo $val['face']; ?>" title="未在微博登录的网站用户" onerror="javascript:faceError(this);" /></div></div>
<?php } ?>
<div class="Contant">
	<div style="_overflow:hidden">
		<div class="oriTxt">
			<p class="utitle">
<?php if($val['uid']) { ?>
<span class="un">
<a title="查看<?php echo $val['nickname']; ?>的微博" href="index.php?mod=<?php echo $val['username']; ?>" class="photo_vip_t_name"><?php echo $val['nickname']; ?></a>
<?php if($val['validate_html']) { ?>
<?php echo $val['validate_html']; ?>&nbsp;
<?php } else { ?>
<?php if($this->Config['topic_level_radio']) { ?>
<span class="wb_l_level">
<a class="ico_level wbL<?php echo $val['level']; ?>" title="点击查看微博等级" href="index.php?mod=settings&code=exp" target="_blank"><?php echo $val['level']; ?></a>
</span>
<?php } ?>
<?php } ?>
<?php if($this->Config['is_signature']) { ?>
<?php if(!$_GET['mod_original'] && 'photo'!=$this->Code) { ?>
<?php if($val['signature']) { ?>
<span class="signature">
<?php if($val['uid'] == MEMBER_ID ||  'admin' == MEMBER_ROLE_TYPE) { ?>
<a href="javascript:void(0);" onclick="follower_choose(<?php echo $val['uid']; ?>,'<?php echo $val['nickname']; ?>','topic_signature');" title="点击修改个人签名">
<em ectype="user_signature_ajax_<?php echo $val['uid']; ?>">(<?php echo $val['signature']; ?>)</em>
</a>
<?php } else { ?><em>(<?php echo $val['signature']; ?>)</em>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php } ?>
<?php echo $this->hookall_temp['global_topiclist_extra1']; ?>
</span>
<?php echo $this->hookall_temp['global_topiclist_extra2']; ?>
<?php } else { ?><span class="un"><a title="未在微博登录的网站用户" href="javascript:;" ><?php echo $val['nickname']; ?></a></span>
			
<?php } ?>
<span class="ut"><a href="<?php echo $val['cmsurl']; ?>" target="_blank"><?php echo $val['dateline']; ?></a></span>
			</p>
<?php if($val['title']) { ?>
			<p>〖<?php echo $val['title']; ?>〗</p>
			
<?php } ?>
<span id="c_<?php echo $val['pid']; ?>_short"><?php echo $val['content']; ?></span>
			<span id="c_<?php echo $val['pid']; ?>_full" style="display:none;"><?php echo $val['content_full']; ?></span>
<?php if($val['longtext']) { ?>
				<span>
				<a id="linktext_<?php echo $val['pid']; ?>" href="javascript:;" onclick="item_longtext('<?php echo $val['pid']; ?>');return false;">查看全文</a>
				</span>
			
<?php } ?>
<div class="from"><div class="option"><ul><li><span>
<?php if($val['replys']) { ?>
			<a id="topic_list_reply_<?php echo $val['tid']; ?>_aid" href="javascript:void(0)" onclick="replyTopic(<?php echo $val['tid']; ?>,'reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',0,0,{item:'cms'});return false;">评论 (<?php echo $val['replys']; ?>)</a></span></li><li><span><a href="<?php echo $val['replyurl']; ?>" target="_blank"><?php echo $val['replytime']; ?></a>
<?php } else { ?>评论 (<?php echo $val['replys']; ?>)&nbsp;&nbsp;</span></li><li><span><?php echo $val['replytime']; ?>
			
<?php } ?>
</span></li></ul></div><div class="mycome">来自<a href="<?php echo $val['typeurl']; ?>" target="_blank">网站 - <?php echo $val['typetitle']; ?></a></div></div>
		</div>
	</div>
	<div id="reply_area_<?php echo $val['tid']; ?>"></div>
</div>
<div class="mBlog_linedot"></div>
<?php } else { ?>
<?php $talkanswerid = ''; ?>

<div class="wb_l_face">
<div class="avatar">
<?php if($this->Code != '') { ?>
    
<?php if(MEMBER_ID != $val['uid']) { ?>
    <a href="javascript:void(0)" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user<?php echo $talkanswerid; ?>',<?php echo $val['tid']; ?>);" onmouseout="clear_user_choose();">
        <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" />
    </a>
    
<?php } else { ?>        <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" />
    
<?php } ?>
<?php } else { ?><a href="index.php?mod=<?php echo $val['username']; ?>"><img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" /></a>
<?php } ?>
<?php if($this->Config['is_topic_user_follow']) { ?>
<?php echo $val['follow_html']; ?>
<?php } ?>
</div>
<?php if($val['user_css']) { ?>
<p class="<?php echo $val['user_css']; ?>"><?php echo $val['user_str']; ?></p>
<?php } ?>
</div>


<!--悬浮头像、弹出对话框-->
<div id="user_<?php echo $val['tid']; ?>_user<?php echo $talkanswerid; ?>"></div>
<!--悬浮头像、弹出对话框-->

<!--私信对话框-->
<div id="Pmsend_to_user_area" style="width:430px;" style="display:none"></div>
<!--私信对话框-->

<!--AT、拉黑对话框-->
<div id="alert_follower_menu_<?php echo $val['uid']; ?>" style="display:none"></div>
<!--AT、拉黑对话框-->

<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);" style="display:none"></div>

<!--分组对话框-->
<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox" style="display:none"></div>
<!--分组对话框-->

<!--备注对话框-->
<div id="get_remark_<?php echo $val['uid']; ?>" style="display:none"></div>
<!--备注对话框-->

<!--微博内容中 @用户 悬浮提示-->
<div id="at_<?php echo $val['tid']; ?>_user" class="at_style" style="display:none;"></div>
<!--微博内容中 @用户 悬浮提示-->
<div class="Contant">
	<div id="topic_lists_<?php echo $val['tid']; ?>" style="_overflow:hidden">
		<div class="oriTxt">
<?php if('myfavorite'==$this->Code && $val['favorite_time']) { ?>
				<p style="color:#666; font-size:12px;">收藏于：<?php echo $val['favorite_time']; ?></p>
			
<?php } ?>
  
			<p class="utitle">
				<!--个人签名文件--><span class="un">
<a title="查看<?php echo $val['nickname']; ?>的微博" href="index.php?mod=<?php echo $val['username']; ?>" class="photo_vip_t_name"><?php echo $val['nickname']; ?></a>
<?php if($val['validate_html']) { ?>
<?php echo $val['validate_html']; ?>&nbsp;
<?php } else { ?>
<?php if($this->Config['topic_level_radio']) { ?>
<span class="wb_l_level">
<a class="ico_level wbL<?php echo $val['level']; ?>" title="点击查看微博等级" href="index.php?mod=settings&code=exp" target="_blank"><?php echo $val['level']; ?></a>
</span>
<?php } ?>
<?php } ?>
<?php if($this->Config['is_signature']) { ?>
<?php if(!$_GET['mod_original'] && 'photo'!=$this->Code) { ?>
<?php if($val['signature']) { ?>
<span class="signature">
<?php if($val['uid'] == MEMBER_ID ||  'admin' == MEMBER_ROLE_TYPE) { ?>
<a href="javascript:void(0);" onclick="follower_choose(<?php echo $val['uid']; ?>,'<?php echo $val['nickname']; ?>','topic_signature');" title="点击修改个人签名">
<em ectype="user_signature_ajax_<?php echo $val['uid']; ?>">(<?php echo $val['signature']; ?>)</em>
</a>
<?php } else { ?><em>(<?php echo $val['signature']; ?>)</em>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php } ?>
<?php echo $this->hookall_temp['global_topiclist_extra1']; ?>
</span>
<?php echo $this->hookall_temp['global_topiclist_extra2']; ?>
				<!--个人签名文件-->
				<span class="ut"><a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>" target="_blank"><?php echo $val['dateline']; ?> </a></span>
			</p>
			<span id="topic_content_<?php echo $val['tid']; ?>_short"><?php echo $val['content']; ?></span>
			<span id="topic_content_<?php echo $val['tid']; ?>_full"></span>
<?php if($val['longtextid'] > 0) { ?>
				<span>
				<a href="javascript:;" onclick="view_longtext('<?php echo $val['longtextid']; ?>', '<?php echo $val['tid']; ?>', this);return false;">查看全文</a>
				</span>
			
<?php } ?>
<?php if($val['attachid'] && $val['attach_list']) { ?>
<?php $val['attach_key']=$val['tid'].'_'.mt_rand(); ?>
<ul class="attachList" id="attach_area_<?php echo $val['attach_key']; ?>">
<?php if(is_array($val['attach_list'])) { foreach($val['attach_list'] as $iv) { ?>
	<li><img src="<?php echo $iv['attach_img']; ?>" class="attachList_img" />
	<div class="attachList_att">
	<p class="attachList_att_name"><b><?php echo $iv['attach_name']; ?></b>
	&nbsp;（<?php echo $iv['attach_size']; ?>）</p>
	<p class="attachList_att_doc"><a href="javascript:void(0);"
		onclick="downattach(<?php echo $iv['id']; ?>);">点此下载</a>（需<?php echo $iv['attach_score']; ?>积分，已下载<?php echo $iv['attach_down']; ?>次）</p>
	</div>
	</li>
	
<?php } } ?>
</ul>
<?php } ?>

<?php if($val['imageid'] && $val['image_list']) { ?>
<?php $val['image_key']=$val['tid'].'_'.mt_rand(); ?>
<ul class="imgList" id="image_area_<?php echo $val['image_key']; ?>">
<?php if(is_array($val['image_list'])) { foreach($val['image_list'] as $iv) { ?>
	<li><a href="<?php echo $iv['image_original']; ?>" class="artZoomAll"
		rel="<?php echo $iv['image_small']; ?>" rev="<?php echo $val['image_key']; ?>"><img
		src="<?php echo $iv['image_small']; ?>" /></a>
	<div class="artZoomBox" style="display: none;">
	<div class="tool"><a title="向右转" href="#" class="imgRight">向右转</a><a
		title="向左转" href="#" class="imgLeft">向左转</a><a title="查看原图"
		href="<?php echo $iv['image_original']; ?>" class="viewImg">查看原图</a></div>
	<a class="maxImgLinkAll" href="<?php echo $iv['image_original']; ?>"> <img
     src="<?php echo $iv['image_original']; ?>" class="maxImg"></a></div>
	</li>
	
<?php } } ?>
</ul>
<?php } ?>
<!--style="width:<?php echo $this->Config['thumbwidth']; ?>px; height:<?php echo $this->Config['thumbheight']; ?>px;"-->

<!--投票 Begin-->
<?php if($val['is_vote'] > 0) { ?>
<?php $val['vote_key']=$val['tid'].'_'.$val['random'] ?>
<ul class="imgList" id="vote_detail_<?php echo $val['vote_key']; ?>">
	<li><a href="javascript:;"
		onclick="getVoteDetailWidgets('<?php echo $val['vote_key']; ?>', <?php echo $val['is_vote']; ?>);"><img
		src='./images/vote_pic_01.gif' /></a></li>
</ul>
<div id="vote_area_<?php echo $val['vote_key']; ?>" style="display: none;">
<div class="blogTxt">
<div class="top"></div>
<div class="mid" id="vote_content_<?php echo $val['vote_key']; ?>"></div>
<div class="bottom"></div>
</div>
</div>
<?php } ?>
<!--投票 End-->
<?php if($val['videoid'] and $this->Config['video_status']) { ?>
<div class="feedUservideo"><a
	onClick="javascript:showFlash('<?php echo $val['VideoHosts']; ?>', '<?php echo $val['VideoLink']; ?>', this, '<?php echo $val['VideoID']; ?>','<?php echo $val['VideoUrl']; ?>');">
<div id="play_<?php echo $val['VideoID']; ?>" class="vP"><img
	src="images/feedvideoplay.gif" /></div>
<img src="<?php echo $val['VideoImg']; ?>" style="border: none" /> </a></div>
<?php } ?>

<?php if($val['musicid']) { ?>
<?php if($val['xiami_id']) { ?>
<div class="feedUserImg"><embed width="257" height="33"
	wmode="transparent" type="application/x-shockwave-flash"
	src="http://www.xiami.com/widget/0_<?php echo $val['xiami_id']; ?>/singlePlayer.swf"></embed></div>
<?php } else { ?><div class="feedUserImg">
<div id="play_<?php echo $val['MusicID']; ?>"></div>
<img src="images/music.gif" title="点击播放音乐"
	onClick="javascript:showFlash('music', '<?php echo $val['MusicUrl']; ?>', this, '<?php echo $val['MusicID']; ?>');"
	style="cursor: pointer; border: none;" /></div>
<?php } ?>
<?php } ?><script type="text/javascript"> var __TOPIC_VIEW__ = '<?php echo $topic_view; ?>'; </script>
<?php if(($tpid=$val['top_parent_id'])>0 && !in_array($this->Code, array('forward', 'reply'))) { ?>
<?php if(('mycomment'==$this->Code || $topic_view) && 'reply'==$val['type'] && $tpid!=($pid=$val['parent_id']) && $parent_list[$pid]) { ?>
<p class="feedP">回复{<a
	href="index.php?mod=<?php echo $parent_list[$pid]['username']; ?>"><?php echo $parent_list[$pid]['nickname']; ?>：</a><span><?php echo $parent_list[$pid]['content']; ?></span>}</p>
<?php } ?>

<?php if(!$topic_view) { ?>
<?php $pt=$parent_list[$tpid]; ?>
<div class="blogTxt">
<div class="top"></div>
<div class="mid">
<?php if($pt) { ?>
 <span> <a
	href="index.php?mod=<?php echo $pt['username']; ?>"
	onmouseover="get_user_choose(<?php echo $pt['uid']; ?>,'_reply_user',<?php echo $val['tid']; ?>);"
	onmouseout="clear_user_choose();"> <?php echo $pt['nickname']; ?> </a>
<?php echo $pt['validate_html']; ?> : <!--悬浮头像、弹出对话框--> <span
	id="user_<?php echo $val['tid']; ?>_reply_user"></span> <!--悬浮头像、弹出对话框--> </span> 
<?php $TPT_ = $TPT_ ? $TPT_ : 'TPT_'; ?>
<span id="topic_content_<?php echo $TPT_; ?><?php echo $pt['tid']; ?>_short"><?php echo $pt['content']; ?></span> <span
	id="topic_content_<?php echo $TPT_; ?><?php echo $pt['tid']; ?>_full"></span> 
<?php if($pt['longtextid'] > 0) { ?>
<span> <a href="javascript:;"
	onclick="view_longtext('<?php echo $pt['longtextid']; ?>', '<?php echo $pt['tid']; ?>', this, '<?php echo $TPT_; ?>', '<?php echo $val['tid']; ?>');return false;">查看全文</a>
</span> 
<?php } ?>
 
<?php if($pt['attachid'] && $pt['attach_list']) { ?>
<table class="attachst" style="width:440px;">
<?php if(is_array($pt['attach_list'])) { foreach($pt['attach_list'] as $iv) { ?>
	<tr>
		<td class="attachst_img"><img src="<?php echo $iv['attach_img']; ?>" /></td>
		<td class="attachst_att">
		<p class="attachList_att_name"><b><?php echo $iv['attach_name']; ?></b>&nbsp;（<?php echo $iv['attach_size']; ?>）</p>
		<p class="attachList_att_doc"><a href="javascript:void(0);"
		onclick="downattach(<?php echo $iv['id']; ?>);">点此下载</a>（需<?php echo $iv['attach_score']; ?>积分，已下载<?php echo $iv['attach_down']; ?>次）</p>

		</td>
	</tr>
	
<?php } } ?>
</table>
<?php } ?>
 
<?php if($pt['imageid'] && $pt['image_list']) { ?>
 
<?php $pt['image_key']=$pt['tid'].'_'.mt_rand(); ?>
<ul class="imgList" id="image_area_<?php echo $pt['image_key']; ?>">
<?php if(is_array($pt['image_list'])) { foreach($pt['image_list'] as $iv) { ?>
	<li><a href="<?php echo $iv['image_original']; ?>" class="artZoomAll"
		rel="<?php echo $iv['image_small']; ?>" rev="<?php echo $pt['image_key']; ?>"><img
		src="<?php echo $iv['image_small']; ?>" /></a>
	<div class="artZoomBox" style="display:none;">
	<div class="tool"><a title="向右转" href="#" class="imgRight">向右转</a><a
		title="向左转" href="#" class="imgLeft">向左转</a><a title="查看原图"
		href="<?php echo $iv['image_original']; ?>" class="viewImg">查看原图</a></div>
	<a class="maxImgLinkAll" href="<?php echo $iv['image_original']; ?>"> <img src="<?php echo $iv['image_original']; ?>" class="maxImg"></a></div>
	</li>
	
<?php } } ?>
</ul>
<?php } ?>
 <!--style="width:<?php echo $this->Config['thumbwidth']; ?>px; height:<?php echo $this->Config['thumbheight']; ?>px;"-->

<!--投票 Begin--> 
<?php if($pt['is_vote'] > 0) { ?>
 
<?php $__vote_key = $pt['tid'].'_'.$pt['random'] ?>
<ul class="imgList" id="vote_detail_<?php echo $__vote_key; ?>">
<li><a href="javascript:;" onclick="getVoteDetailWidgets('<?php echo $__vote_key; ?>', <?php echo $pt['is_vote']; ?>);"><img src='./images/vote_pic_01.gif' /></a></li>
</ul>
<div id="vote_area_<?php echo $__vote_key; ?>" style="display: none;">
<div class="vote_zf_box" id="vote_content_<?php echo $__vote_key; ?>"></div>
</div>
<?php } ?>
 <!--投票 End--> 
<?php if($pt['videoid'] and $this->Config['video_status']) { ?>
<div class="feedUservideo">
<a onClick="javascript:showFlash('<?php echo $pt['VideoHosts']; ?>', '<?php echo $pt['VideoLink']; ?>', this, '<?php echo $pt['VideoID']; ?>','<?php echo $pt['VideoUrl']; ?>');">
<div id="play_<?php echo $pt['VideoID']; ?>" class="vP"><img src="images/feedvideoplay.gif" /></div>
<img src="<?php echo $pt['VideoImg']; ?>" style="border: none" /> </a></div>
<?php } ?>
 
<?php if($pt['musicid']) { ?>
 
<?php if($pt['xiami_id']) { ?>
<div class="feedUserImg">
<embed width="257" height="33" wmode="transparent" type="application/x-shockwave-flash" src="http://www.xiami.com/widget/0_<?php echo $pt['xiami_id']; ?>/singlePlayer.swf"></embed></div>
<?php } else { ?><div class="feedUserImg">
<div id="play_<?php echo $pt['MusicID']; ?>"></div>
<img src="images/music.gif" title="点击播放音乐" onClick="javascript:showFlash('music', '<?php echo $pt['MusicUrl']; ?>', this, '<?php echo $pt['MusicID']; ?>');" style="cursor: pointer; border: none;" /></div>
<?php } ?>
 
<?php } ?>
<div style="width:400px; float:left; padding:5px 0; margin:0;">
<a href="index.php?mod=topic&code=<?php echo $tpid; ?>" target="_blank">原文评论(<?php echo $pt['replys']; ?>)</a>&nbsp;
<a onclick="get_forward_choose(<?php echo $tpid; ?>);return false;"href="index.php?mod=topic&code=<?php echo $tpid; ?>" target="_blank">转发原文(<?php echo $pt['forwards']; ?>)</a>&nbsp;
<?php echo $pt['from_html']; ?></div>
<?php } else { ?> 
<?php $val['reply_disable']=0; ?>
<p><span>原始微博已删除</span></p>
<?php } ?>
</div>
<div class="bottom"></div>
</div>
<?php } ?>
<?php } ?>
<?php if($this->Module=='qun') { ?>
              <script type="text/javascript">
$(document).ready(function(){
var objStr1 = "#topic_lists_<?php echo $val['tid']; ?>_a";
var objStr2 = "#topic_lists_<?php echo $val['tid']; ?>_b";
$(objStr1).mouseover(function(){$(objStr2).show();});
$(objStr1).mouseout(function(){$(objStr2).hide();});
});
</script>
<?php if($this->Config['qun_attach_enable']) $allow_attach = 1; else $allow_attach = 0  ?>
<div class="from"> 
<div class="option"> 
<ul>
<?php if(MEMBER_ID>0) { ?>
<li>
<!--转发的判断 Begin-->
<?php if($val['managetype'] != 2) { ?>
<span>
<a href="javascript:void(0);" onclick="
<?php if($allow_list_manage) { ?>
get_forward_choose(<?php echo $val['tid']; ?>,<?php echo $allow_attach; ?>, {appitem:'<?php echo $val['item']; ?>', appitem_id:'<?php echo $val['item_id']; ?>',noReply:1});
<?php } else { ?>get_forward_choose(<?php echo $val['tid']; ?>,<?php echo $allow_attach; ?>);
<?php } ?>
" style="cursor:pointer;">转发
<?php if($val['forwards']) { ?>
(<?php echo $val['forwards']; ?>)
<?php } ?>
</a>
	 </span>
	 
<?php } else { ?> <span title="设置了特殊的权限，不允许转发">转发</span>
	 
<?php } ?>
<!--转发的判断 End-->
</li>
<li class="o_line_l">|</li>

<li>
<?php if(!$val['reply_disable'] && $val['managetype'] != 2) { ?>
<span>
<a href="javascript:void(0)" onclick="
<?php if($allow_list_manage) { ?>
replyTopic(<?php echo $val['tid']; ?>,'reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',1,<?php echo $allow_attach; ?>,{appitem:'<?php echo $val['item']; ?>', appitem_id:'<?php echo $val['item_id']; ?>'});
<?php } else { ?>replyTopic(<?php echo $val['tid']; ?>,'reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',0,<?php echo $allow_attach; ?>);
<?php } ?>
return false;">评论
<?php if($val['replys']) { ?>
(<?php echo $val['replys']; ?>)
<?php } ?>
</a>
</span>
<?php } else { ?><span>评论</span>
<?php } ?>
</li>

<li class="o_line_l">|</li>
<li id="topic_lists_<?php echo $val['tid']; ?>_a" class="mobox"><a href="javascript:void(0)" class="moreti" ><span class="txt">更多</span><span class="more"></span></a> 
<div id="topic_lists_<?php echo $val['tid']; ?>_b" class="molist" style="display:none">
<?php if(MEMBER_ID>0) { ?>
<?php if('myfavorite'==$this->
Code) { ?>
 <span id="favorite_<?php echo $val['tid']; ?>"><a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'delete');return false;">取消收藏</a></span>
<?php } else { ?><span id="favorite_<?php echo $val['tid']; ?>"><a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'add');return false;">收藏</a></span> 
<?php } ?>
<?php } ?>
<?php if($this->Config['is_report'] || MEMBER_ID > 0) { ?>
<a href="javascript:void(0)" onclick="ReportBox('<?php echo $val['tid']; ?>')" title="举报不良信息">举报</a>
<?php } ?>

<?php if($val['uid']==MEMBER_ID || 'admin'==MEMBER_ROLE_TYPE) { ?>
<?php if($this->Code > 0  ||  in_array($this->Code,array('list_reply','do_add'))) $eid = 'reply_list'; else $eid = 'topic_list'  ?>
<a href="javascript:void(0)" onclick="deleteTopic(<?php echo $val['tid']; ?>,'<?php echo $eid; ?>_<?php echo $val['tid']; ?>');return false;">删除</a>
<?php $datetime = time(); $modify_time = $this->Config['topic_modify_time'] * 60 ?>
<?php if($datetime - $val['addtime'] < $modify_time || 'admin'==MEMBER_ROLE_TYPE ) { ?>
<?php if($val['replys'] <= 0 && $val['forwards'] <= 0 || 'admin'==MEMBER_ROLE_TYPE) { ?>
<a href="javascript:void(0);" onclick="modifyTopic(<?php echo $val['tid']; ?>,'modify_topic_<?php echo $val['tid']; ?>','<?php echo $eid; ?>',<?php echo $allow_attach; ?>);return false;" style="cursor:pointer;">编辑</a>
<?php } ?>
<?php } ?>
<!--推荐开始 Begin-->
		<a href="javascript:void(0)" onclick="showTopicRecdDialog({'tid':'<?php echo $val['tid']; ?>'});return false;">推荐</a>
	<!--推荐开始 End-->
<?php } ?>
</div>
</li>
<?php } ?>
</ul>
</div> 
<div class="mycome">
<?php if(!$no_from) { ?>
<?php echo $val['from_html']; ?>
<?php } ?>
</div> 
</div>
<?php } else { ?><script type="text/javascript">
$(document).ready(function(){
var objStr1 = "#<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_a";
var objStr2 = "#<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_b";
$(objStr1).mouseover(function(){$(objStr2).show();});
$(objStr1).mouseout(function(){$(objStr2).hide();});
});
</script>
<?php if($this->Config['attach_enable']) $allow_attach = 1; else $allow_attach = 0  ?>
<div class="from"> 
<div class="option">
<!--不是群内成员无法对群内的微博进行操作-->
<ul>
<?php if($this->Get['mod'] == 'talk' &&  $val['reply_ok']) { ?>
<li><span id="answer_<?php echo $val['tid']; ?>" class="talkreply" onclick="showMainPublishBox('answer','talk','<?php echo $talk['lid']; ?>','<?php echo $val['tid']; ?>','<?php echo $val['uid']; ?>');return false;">回答</span></li><li class="o_line_l">|</li>
<?php } ?>

<?php if($this->Get['type'] != 'my_verify') { ?>
<?php $tpid=$val['top_parent_id']; if ($tpid&&$parent_list[$tpid]) $root_type=$parent_list[$tpid]['type']; ?>
<?php if((!isset($root_type)) || (isset($root_type) && in_array($root_type, get_topic_type('forward')))) { ?>
	<li>
	  <!--转发的判断 Begin-->
	  
<?php if((in_array($val['type'], get_topic_type('forward')) || $this->Module=='qun') && $val['managetype'] != 2) { ?>
	  
<?php $not_allow_forward=0; ?>
<span 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
>
			<a href="javascript:void(0);" onclick="get_forward_choose(<?php echo $val['tid']; ?>,<?php echo $allow_attach; ?>);" style="cursor:pointer;">转发
<?php if($val['forwards']) { ?>
(<?php echo $val['forwards']; ?>)
<?php } ?>
</a>
		</span>
	 
<?php } else { ?> 
<?php $not_allow_forward=1; ?>
 
<?php if(isset($val['fansgroup'])) { ?>
	  <span><?php echo $val['fansgroup']; ?></span>
	 
<?php } else { ?> <span title="设置了特殊的权限，不允许转发">转发</span>
	 
<?php } ?>
 
<?php } ?>
 <!--转发的判断 End-->
	</li>
	<li class="o_line_l">|</li>
<?php } else { ?><?php $not_allow_forward=1; ?>
<?php } ?>
<li>
<?php if(!$val['reply_disable'] && $val['managetype'] != 2) { ?>
	<span>
		<a id="topic_list_reply_<?php echo $val['tid']; ?>_aid" href="javascript:void(0)" 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
 onclick="replyTopic(<?php echo $val['tid']; ?>,'<?php echo $talkanswerid; ?>reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',<?php echo $not_allow_forward; ?>,<?php echo $allow_attach; ?>);return false;">评论
<?php if($val['replys']) { ?>
(<?php echo $val['replys']; ?>)
<?php } ?>
</a>
		</span>
	 
<?php } else { ?> <span>评论</span>
	
<?php } ?>
</li>

	<li class="o_line_l">|</li>

	<li id="<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_a" class="mobox">
		<a href="javascript:void(0)" class="moreti" ><span class="txt">更多</span><span class="more"></span></a> 
		<div id="<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_b" class="molist" style="display:none">
<?php if('myfavorite'==$this->Code) { ?>
 
				<span id="favorite_<?php echo $val['tid']; ?>" 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
>
					<a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'delete');return false;">取消收藏</a>
				</span>
<?php } else { ?><span id="favorite_<?php echo $val['tid']; ?>" 
<?php if(MEMBER_ID < 1) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
>
					<a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'add');return false;">收藏</a>
				</span> 
			
<?php } ?>
<?php if($this->Config['is_report'] || MEMBER_ID > 0) { ?>
			<span 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
><a href="javascript:void(0)" onclick="ReportBox('<?php echo $val['tid']; ?>')" title="举报不良信息">举报</a></span>
			
<?php } ?>
<?php if($val['uid']==MEMBER_ID || 'admin'==MEMBER_ROLE_TYPE) { ?>
<?php if($this->Code > 0  ||  in_array($this->Code,array('list_reply','do_add'))) $eid = 'reply_list'; else $eid = 'topic_list'  ?>
<a href="javascript:void(0)" onclick="deleteTopic(<?php echo $val['tid']; ?>,'<?php echo $eid; ?>_<?php echo $val['tid']; ?>');return false;">删除</a>
<?php $datetime = time(); $modify_time = $this->Config['topic_modify_time'] * 60 ?>
<?php if($datetime - $val['addtime'] < $modify_time || 'admin'==MEMBER_ROLE_TYPE ) { ?>
<?php if($val['replys'] <= 0 && $val['forwards'] <= 0 || 'admin'==MEMBER_ROLE_TYPE) { ?>
						<a href="javascript:void(0);" onclick="modifyTopic(<?php echo $val['tid']; ?>,'modify_topic_<?php echo $val['tid']; ?>','<?php echo $eid; ?>',<?php echo $allow_attach; ?>);return false;" style="cursor:pointer;">编辑</a>
					
<?php } ?>
<?php } ?>
<!--推荐开始 Begin-->
					<a href="javascript:void(0)" onclick="showTopicRecdDialog({'tid':'<?php echo $val['tid']; ?>','tag_id':'<?php echo $tag_id; ?>'});return false;">推荐</a>
				<!--推荐开始 End-->
				
			
<?php } ?>
<?php if('admin'==MEMBER_ROLE_TYPE) { ?>
			    <a onclick="force_out(<?php echo $val['uid']; ?>);" href="javascript:void(0);">封杀</a>
			    <a onclick="force_ip('<?php echo $val['postip']; ?>');" href="javascript:void(0);">封IP</a>
			
<?php } ?>
</div>
	</li>
<?php } else { ?><li id="topic_lists_<?php echo $val['id']; ?>_a" class="mobox">
<?php if($val['uid']==MEMBER_ID || 'admin'==MEMBER_ROLE_TYPE) { ?>
	  
<?php if($this->Code > 0  ||  in_array($this->Code,array('list_reply','do_add'))) $eid = 'reply_list'; else $eid = 'topic_list'  ?>
  <a href="javascript:void(0)" onclick="deleteVerify(<?php echo $val['id']; ?>,'<?php echo $eid; ?>_<?php echo $val['id']; ?>');return false;">删除</a>
	
<?php } ?>
</li>
<?php } ?>
</ul>
</div> 
<div class="mycome">
<!-- <a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>"><?php echo $val['dateline']; ?></a>  -->
<?php if(!$no_from) { ?>
<?php echo $val['from_html']; ?>
<?php } ?>
<?php echo $this->hookall_temp['global_topiclist_extra3']; ?>
</div>
<?php echo $this->hookall_temp['global_topiclist_extra4']; ?>
</div>
			
<?php } ?>
</div>
	</div>
	<div id="reply_area_<?php echo $val['tid']; ?>"></div>
	<div id="modify_topic_<?php echo $val['tid']; ?>"></div>
	<div id="forward_menu_<?php echo $val['tid']; ?>" class="Fbox"></div>
</div>
<?php if(!$no_mBlog_linedot2) { ?>
	<div class="mBlog_linedot"></div>
<?php } ?>
					
<?php } ?>
</div>
		  	
<?php } } ?>
<!--微博列表 End-->
		
<?php } ?>
  
          
<?php if($page_arr['html']) { ?>
          <div class="pageStyle">
            <li><?php echo $page_arr['html']; ?></li>
          </div>
          
<?php } ?>
  
<?php } else { ?>
<?php if('bbs' == $this->Code || 'cms' == $this->Code) { ?>
	<br>暂时没有可显示的内容
<?php } else { ?><br>分类下暂时没有发布微博。
	
<?php } ?>
  	
<?php } ?>
  
		  
<?php if('groupview'== $this->Code && $counts <=0) { ?>
		   <BR />
			"<strong><?php echo $groupname; ?></strong>" 分组下的用户暂时没有发布微博。
		  
<?php } ?>
          
<?php if($counts <=5) { ?>
          <div id="topic_list_<?php echo $counts; ?>">
            
<?php if('myat'== $this->
            Code) { ?>
 <BR />
            这里会显示含有"@<?php echo MEMBER_NICKNAME; ?>"的微博。<BR />
            <BR />
            <span>@昵称 </span>技巧：注意昵称后面有“空格”，可以理解为向某人说，被@昵称 提到的人如果在系统中存在，那么TA就可在其个人首页“@提到我的”的栏目中看到你发布的内容。
            <?php } elseif('mycomment' == $this->
            Code) { ?> <BR />
            <BR />
            <BR />
            这里会显示他人对你微博所做的评论。<BR />
            <BR />
            <A HREF="index.php?mod=<?php echo $member['username']; ?>&code=fans" title="关注<?php echo $member['nickname']; ?>的">关注你的</A>人越多，就会有越多人参与你分享内容的讨论，尝试通过<A HREF="index.php?mod=profile&code=invite">邀请好友</A>来让更多人关注你；<BR /><?php } elseif('tocomment' == $this->Code) { ?> <BR />
            <BR />
            <BR />
            这里会显示你对他人微博所做的评论。<BR />
            <BR />
            <?php } elseif('myfavorite' == $this->
            Code) { ?> <BR />
            这里会显示你所收藏的微博。<BR />
            <BR />
            在登录状态下，每个微博的下方都有一个收藏连接，点击即可自动完成收藏，然后你就可以在这里看到了。你可以访问<A HREF="index.php?mod=topic&code=hot">热门微博</A>来发现有收藏价值的内容；<BR />
            <?php } elseif('favoritemy' == $this->
            Code) { ?> <BR />
            这里会显示谁收藏了你的微博。<BR />
            <BR />
            赶快分享些有价值的新鲜事吧，当有人收藏后，你就会在这里看到。<BR /><?php } elseif('myhome' == $this->Code ) { ?><BR /><BR />
			这里显示我和我关注人的微博。<BR /><BR />
			关注你喜欢的人，你就可以在这看到他们分享的内容，尝试通过<A HREF="index.php?mod=topic&code=top">达人榜</A>、<A HREF="index.php?mod=profile&code=search">找人</A>选择用户加关注；<BR /><?php } elseif('tag' == $this->Code ) { ?><BR /><BR />
			这里显示我关注话题的相关微博。<BR /><BR />
			对你感兴趣的话题进行关注，就可以在这里直接查看相关微博，还可以结识有共同话题的人，尝试通过<A HREF="index.php?mod=tag">话题榜</A> 选择话题关注；<BR /><?php } elseif('event' == $view ) { ?><BR />
			这里显示我关注活动的相关微博。<BR />
			对你感兴趣的活动进行关注，就可以在这里直接查看相关微博，还可以结识有共同话题的人。<BR /><?php } elseif('qun' == $this->Code ) { ?><BR /><BR />
			这里显示我加入的群相关的微博。<BR /><BR />
			加入你感兴趣的群，就可以在这里直接查看相关微博，还可以结识有共同话题的人。<a href="index.php?mod=qun" target="_blank">去群里逛逛吧~~</a><BR /><?php } elseif('recd' == $this->Code ) { ?><BR /><BR />
			这里显示推荐的微博。<BR /><BR /><?php } elseif('cms' == $this->Code ) { ?><BR /><BR />
			这里显示来自<a href="<?php echo $cms_url; ?>" target="_blank">网站资讯</a>的内容。<BR /><BR />
<?php if('admin'==MEMBER_ROLE_TYPE) { ?>
			前提条件是：微博必须整合了DedeCMS系统。<BR /><BR />
			
<?php } ?>
<?php } elseif('bbs' == $this->Code ) { ?><BR /><BR />
<?php if($this->Config['dzbbs_enable']) { ?>
			这里显示来自<a href="<?php echo $bbs_url; ?>" target="_blank">论坛</a>的帖子。<BR /><BR />
<?php if('admin'==MEMBER_ROLE_TYPE) { ?>
			前提条件是：微博必须整合了Ucenter系统和Discuz论坛。<BR /><BR />
			
<?php } ?>
<?php } elseif($this->Config['phpwind_enable']) { ?>这里显示来自<a href="<?php echo $bbs_url; ?>" target="_blank">论坛</a>的帖子。<BR /><BR />
<?php if('admin'==MEMBER_ROLE_TYPE) { ?>
			前提条件是：微博必须整合了PhpWind论坛，且同时开启了调用phpwind论坛帖子。<BR /><BR />
			
<?php } ?>
<?php } ?>
<?php } elseif('fenlei' == $view ) { ?><BR />
			这里显示我关注分类的相关微博。<BR />
			对你感兴趣的分类进行关注，就可以在这里直接查看相关微博。<BR />	
			
<?php } ?>
          </div>
          
<?php } ?>
        </div>
<?php echo $this->js_show_msg(); ?>
		<!--微博列表 End-->
      </div>
    </div>
  </div>