<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?><dvi id="g_publishbox">
    <form method="post" action="">
        <div id="g_maininput" class="mainiput">
            <textarea name="content" class="mblog_content" id="g_content" ><?php echo $mblog_content; ?></textarea>
        </div>
        <div id="g_publishbar"></div>
        <input type="hidden" id="g_type" name="type" value="<?php echo $topic_type; ?>"/>
        <input type="hidden" id="g_totid" name="totid" value="<?php echo $totid; ?>"/>
    </form>
</div>