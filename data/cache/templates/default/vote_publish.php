<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?><div id="vote_publish_wp"> 
<form method="post" autocomplete="off" id="vote_edit_form" onsubmit="return false;">
<?php if($this->Get['arf'] == 'edit') { ?>
<input type="hidden" name="vid" value="<?php echo $vid; ?>"/>
<?php } ?>
<p class="index_v">
<sub><span>*</span>投票标题</sub>
<sup><input id="subject" name="subject" value="<?php echo $vote['subject']; ?>" type="text"></sup>
<sup id="subject_tips" style="display:none; color:#ff0000; display:block;"></sup>
</p>    
<p class="vote_addpictext">
<sub>&nbsp;</sub>
<sup><span class="lv_icon1"></span><a id="addtip" href="javascript:void(0);">添加投票说明</a></sup>
</p>
<p class="vote_addpictext" id="intropoll" style="display:none">
<sub>&nbsp;</sub>
<sup><textarea id="message" name="message" class="vt_textarea"><?php echo $vote['message']; ?></textarea></sup>
</p>
<p class="vote_select">
<sub><span>*</span>投票选项：</sub>
<sup><span>可设置20项,每项最多20个汉字</span></sup>
</p>
<div id="option_wp">
<?php if(is_array($options)) { foreach($options as $value) { ?>
<?php $key=$value-1; ?>
<?php $readonly="";if (isset($opts[$key]) && $is_voted && MEMBER_ROLE_TYPE != 'admin')$readonly='readonly="readonly"'; ?>
<?php $opt_name="option[]";if (isset($opts[$key]))$opt_name="old_option[".$opts[$key]['oid']."]"; ?>
<p>
        <sub>&nbsp;</sub>
        <sup class="vote_al"><?php echo $value; ?>.</sup>
        <sup class="vote_ar"><input id="option_<?php echo $value; ?>" name="<?php echo $opt_name; ?>" value="<?php echo $opts[$key]['option']; ?>" type="text" <?php echo $readonly; ?> ></sup>
        <sup id="option_<?php echo $value; ?>_tips" style="display:none;"></sup>
        </p>
<?php } } ?>
</div>
<p id="moretip">
<sub>&nbsp;</sub>
<sup><span class="vote_addicon"></span><a href="javascript:;" onclick="showMoreOption(<?php echo $perpage; ?>,<?php echo $max_option; ?>);" onfocus="this.blur();">增加选项</a></sup>
</p>
<?php if(!$is_voted) { ?>
<p>
<sub>单选/多选：</sub>
<sup class="input">
    <select name="maxchoice" id="maxchoice">
    <option value="1">单选</option>
<?php if(is_array($maxchoice)) { foreach($maxchoice as $i) { ?>
<?php if($i==1) continue; ?>
<?php $selected='';if($i==$vote['maxchoice']) $selected='selected="selected"'; ?>
<option value="<?php echo $i; ?>" <?php echo $selected; ?>>最多可选<?php echo $i; ?>项</option>
<?php } } ?>
</select>
</sup>
</p>
<?php } ?>
<p>
<sub>投票结果：</sub>
<sup>
<?php if(empty($checked['is_view'])) $checked['is_view']['1']="checked" ?>
<input type="radio" id='is_view_1' name="is_view"   value="1" <?php echo $checked['is_view']['1']; ?> class="vt_radio1" defaultvalue="1"/><label for="is_view_1">任何人可见</label>
<input type="radio"  id="is_view_2" name="is_view"  value="0" <?php echo $checked['is_view']['0']; ?> class="vt_radio1" /><label for="is_view_2">投票后可见</label>
</sup>
</p>
<p>
<sub>截止时间：</sub>
<sup class="vote_endtime input" style="float:left; display:inline">
<input id="expiration" name="expiration" value="<?php echo $expiration; ?>" onclick="WdatePicker({minDate:'%y-%M-%d'})"  type="text" readonly="readonly">
&nbsp;&nbsp;
<?php echo $hour_select; ?>&nbsp;时&nbsp;&nbsp;<?php echo $min_select; ?>&nbsp;分
</sup>
</p>
<p>
<sub>&nbsp;</sub>
<sup>
<input type="button" class="shareI" id="vote_save_btn" value="提交" />
<?php if($this->Get['arf'] == "edit") { ?>
    &nbsp;&nbsp;
    <input type="button" class="shareI" id="vote_cancel_btn" value="取消" />
<?php } ?>
<span style="margin-left:5px;" id="vote_submit_tips"></span>
</sup>
</p>
</form>
</div>
<script language="javascript">
    function initIntro()
    {
        if($('#intropoll').is(':hidden')) {
            $('#intropoll').show();
            $('#addtip').html("隐藏投票详细说明");
        } else {
            if (($('#message').val().length == 0) || (confirm("详细说明将被清空，你确定要隐藏吗？"))) {
                $('#intropoll').hide();
                $('#message').val('');
                $('#addtip').html("添加投票详细说明");
            }
        }
    }
    function showMoreOption(perpage, max_option)
    {
        var iRowNums = $("#option_wp").find("p").length;
        if (iRowNums >= max_option) {
            return ;
        }
        if ((iRowNums + perpage) >= max_option) {
            $("#moretip").hide();
        }
        for (i=1;i<=perpage;i++) {
            var num = iRowNums + i;
            $("#option_wp").append('<p><sub>&nbsp;</sub><sup class="vote_al">'+num+'.</sup><sup class="vote_ar"><input id="option_'+num+'" name="option[]" value="" type="text" onblur="setVoteOptionBlur(this);"></sup><sup id="option_'+num+'_tips" style="display:none;"></sup></p>');
        }
    }
    function checkVoteSubject()
    {
        var subject = $("#subject").val();
        if (strlen(subject) < 2) {
            $("#subject_tips").html("标题必须有哦，最多25个汉字");
            $("#subject_tips").show();
            return false;
        } else {
            $("#subject_tips").html("<img src='templates/default/images/member/accept.png' class='vote_accept'/>");
            $("#subject_tips").show();
        }
        return true;
    }
    function checkVoteOption(obj)
    {
        var opt_tips_id = '#'+obj.id+ "_tips";
        if (strlen(obj.value) > 0) {
            $(opt_tips_id).html("<img src='templates/default/images/member/accept.png' class='vote_accept'/>");
            $(opt_tips_id).show();
        } else {
            $(opt_tips_id).hide();
        }
    }
    //获取有效的option数
    function validOptionNumber()
    {
        var obj_options = $("#option_wp input");
        var len = obj_options.length;
        var count = 0;
        for (i=0;i<len;++i) {
            if (strlen(obj_options[i].value) > 0) {
                count++;
            }
        }
        return count;
    }
    //表单数据验证
    function validate() 
    {
        if (checkVoteSubject() == false) {
            $("#subject").focus();
            return false;
        }
        var count = validOptionNumber();
        if (count < 2) {
            show_message('选项太少啦，至少2个哦');
            return false;
        }
        return true;
    }
    //发起投票
    function publishVote(type)
    {
        if (isUndefined(type)) {
            var type = 'create';
        }
        if (validate()) {
            $("#vote_submit_tips").html("<span class='loading'>提交中，请稍候……</span>");
            $("#vote_save_btn").attr('disabled', true);
            //对发布时间的处理
            var expiration = $("#expiration").val();
            var old = expiration;
            var hour = $("#hour").val();
            var min = $("#min").val();
            if (!isUndefined(hour) && !isUndefined(min)) {
                expiration += ' '+hour+":"+min;
            }
            $("#expiration").val(expiration);
            var post_data = $('#vote_edit_form').serialize();
            $("#expiration").val(old);
            $.post(
                "ajax.php?mod=vote&code="+type+"&rand="+Math.random()+"&item="+__APPITEM__+"&item_id="+__APPITEM_ID__, 
                post_data, 
                function(r){
                    publishVoteCallBack(r);
                },
                'json'
            );
        }
    }
<?php if($this->Get['arf'] == 'index') { ?>
        //首页调用
        function publishVoteCallBack(r)
        {
            $("#vote_save_btn").attr('disabled', false);
            $("#vote_submit_tips").html("");
            if (r.done) {
                MessageBox('notice', r.msg);
                if($('#i_already').length > 0){
                    $('#i_already').val(r.retval.content);
                }else{
                    $('#i_alreadyajax').val(r.retval.content);
                }
                //$('#mapp_item').val(r.retval.item);
                //$('#mapp_item_id').val(r.retval.vid);
                $(".menu_vsb").hide();
            } else {
                MessageBox('warning', r.msg);
            }
        }<?php } elseif($this->Get['arf'] == 'edit') { ?>function publishVoteCallBack(r)
        {
            $("#vote_save_btn").attr('disabled', false);
            if (r.done) {
                location.reload();
            } else {
                $("#vote_submit_tips").html("");
                MessageBox('warning', r.msg);
            }
        }
<?php } else { ?>function publishVoteCallBack(r)
        {
            $("#vote_save_btn").attr('disabled', false);
            $("#vote_submit_tips").html("");
            if (r.done) {
                $("#vote_publish_tips").html(r.msg);
                //$('#item').val('vote');
                //$('#item_id').val(r.retval.vid);
                $('#topic_simple_content').html(r.retval.content);
                var handle_key = 'vote_success_share';
                showDialog(handle_key, 'local', '分享到微博', {id:'vote_publish_ret_wp'}, 500);
                $('#topic_simple_close_btn').click(
                    function() {
                        closeDialog(handle_key);
                        location.href = "index.php?mod=vote&code=view&vid="+r.retval.vid;
                    }
                );
                $('#topic_simple_share_btn').click(
                    function () {
                        var response = function() {
                            location.href = "index.php?mod=vote&code=view&vid="+r.retval.vid;
                        }
                        //publishSimpleTopic($('#topic_simple_content').val(), 'vote', r.retval.vid, {response:response});
                        publishSimpleTopic($('#topic_simple_content').val(), '', 0, {response:response});
                    }
                );
            } else {
                MessageBox('warning', r.msg);
            }
        }
<?php } ?>
function setVoteOptionBlur(obj)
    {
        checkVoteOption(obj);
        //select选择项设置
        //得到最大的index
        var max_index = $("#maxchoice option:last").attr("index")+1;
        var count = validOptionNumber();
        if (count > max_index) {
            if (count >= 2) {
                var val = max_index + 1;
                $("#maxchoice").append("<option value='"+val+"'>最多可选"+val+"项</option>");
            }
        } else if (count < max_index) {
            if (count >= 1) {
                $("#maxchoice option:last").remove(); 
            }
        }
    }
    $(document).ready(function(){
        $("#addtip").click(
            function(){initIntro();}
        );
        //自动截取字符串
        $("#subject").keyup(
            function(){
                checkPublishText(25, 'subject');
                return false;
            }
        );
        //检查subject
        $("#subject").blur(
            function(){
                checkVoteSubject();
            }
        );
        $("#option_wp input").focus(
            function() {
                checkVoteSubject();
            }
        );
        $("#option_wp input").keyup(
            function() {
                checkPublishText(20, this.id);
                return false;
            }
        );
        $("#option_wp input").blur(
            function () {
                setVoteOptionBlur(this);
            }
        );
<?php if($this->Get['arf'] == 'edit') { ?>
            initIntro();
            $("#vote_save_btn").click(function(){publishVote('edit');});
            $("#vote_cancel_btn").click(function(){closeDialog("<?php echo $this->Get['handle_key']; ?>");});
<?php } else { ?>$("#vote_save_btn").click(function(){publishVote();});
<?php } ?>
});
</script>
<script src="templates/default/js/date/WdatePicker.js?v=build+20120428" type="text/javascript"></script>