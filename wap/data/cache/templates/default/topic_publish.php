<?php /* 2013-01-27 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?>
<?php if(in_array($this->Code,array('myhome')) || !empty($tag_value)) { ?>
<div class="m">
    <div style="padding:2px;">
<?php if($tag) { ?>
	针对# <?php echo $tag; ?> #说点什么
<?php } else { ?>随便说说
<?php } ?>
<?php if($this->Config['topic_input_length']>0) { ?>
	：(<?php echo $this->Config['topic_input_length']; ?>字以内)
<?php } ?>
</div>
        <div class="u2">
        <form action="index.php?mod=topic&amp;code=do_add" method="post" enctype="multipart/form-data" name="forminfo" id="forminfo">
             <div>
                <textarea name="content" id="content" style="width:98%;" rows="2" cols="" /></textarea>
				<p>图片：(注：需要浏览器支持)<input name="topic" type="file" id="topic" style="width:190px;"/></p>
             </div>
            <input name="topictype" type="hidden" id="topictype" value="first" />
             <input name="tag" type="hidden" id="tag" value="<?php echo $tag; ?>" />
             <div style="margin-top:3px;">
			 	<input type="submit" name="addTopic" value="发布" />	
<?php if($this->Config['sina_enable'] && sina_weibo_init()) { ?>
<?php echo array_iconv($this->Config['charset'],'utf-8',sina_weibo_syn()); ?>
<?php } ?>
<?php if($this->Config['qqwb_enable'] && qqwb_init()) { ?>
<?php echo array_iconv($this->Config['charset'],'utf-8',qqwb_syn()); ?>
<?php } ?>
<?php if($this->Config['kaixin_enable'] && kaixin_init()) { ?>
<?php echo array_iconv($this->Config['charset'],'utf-8',kaixin_syn_html()); ?>
<?php } ?>
<?php if($this->Config['renren_enable'] && renren_init()) { ?>
<?php echo array_iconv($this->Config['charset'],'utf-8',renren_syn_html()); ?>
<?php } ?>
             </div>
             <div>
             <input name="tag" type="hidden" id="tag" value="<?php echo $tag_value; ?>" />
             </div>
            <input name="return_code" type="hidden" id="return_code" value="mod=<?php echo $this->Get['mod']; ?>&code=<?php echo $this->Code; ?>" />
            <input type="hidden" />
        </form> 
        </div>
</div>
<?php } ?>