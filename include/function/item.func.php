<?php
if(!defined('IN_DATACORE')) {
    exit('invalid request');
}
function item_topic_from($topic) {
    $topic['item_id'] = (int) $topic['item_id'];
    if($topic['item_id'] > 0) {
        #if NEDU
        if (defined('NEDU_MOYO'))
        {
            $r = nlogic('feeds.app.jsg')->topic_from($topic['item'], $topic['item_id']);
            if ($r && is_array($r))
            {
                return array_merge($topic, $r);
            }
        }
        #endif
        $func = "_item_topic_from_{$topic['item']}";
        if(function_exists($func)) {
            return $func($topic);
        }
    }
    return $topic;
}
function _item_topic_from_api($topic) {
    static $api_config=null;
    if(null===$api_config) {
        $api_config = ConfigHandler::get('api');
    }
    $topic['from_html'] = $topic['from_string'] = '来自网站API';
    if($api_config['enable'] && $api_config['from_enable']) {
        $api_info = jsg_info($topic['item_id'], 'app');
        if($api_info['show_from']) {
            $topic['from_html'] = $topic['from_string'] = "来自{$api_info['app_name']}";
            if($api_info['source_url']) {
                $topic['from_html'] = "来自<a target='_blank' href='{$api_info['source_url']}'>{$api_info['app_name']}</a>";
            }
        }
    }
    return $topic;
}
function _item_topic_from_vote($topic) {
    global $rewriteHandler;
    static $static_vote_href=null;
    if(!$static_vote_href) {
        $static_vote_href = 'index.php?mod=vote&code=view&vid=|REPLACE_VALUE|';
        if($rewriteHandler) {
            $static_vote_href = $rewriteHandler->formatURL($static_vote_href);
        }
    }
    $vote_href = str_replace('|REPLACE_VALUE|', $topic['item_id'], $static_vote_href);
        $topic['from_html'] = $topic['from_string'] = "来自投票";
    $subject = Load::Logic('vote', 1)->id2subject($topic['item_id']);
    $sub_from = '';
    if (!empty($subject)) {
        $sub_from = ' - '.$subject;
    }
    if($sub_from) {
        $topic['from_html'] = '来自<a href="'.$vote_href.'" target="_blank">投票'.$sub_from.'</a>';
    }
    return $topic;
}
function _item_topic_from_qun($topic) {
    global $rewriteHandler;
    static $static_qun_href=null;
    if(!$static_qun_href) {
        $static_qun_href = 'index.php?mod=qun&qid=|REPLACE_VALUE|';
        if($rewriteHandler) {
            $static_qun_href = $rewriteHandler->formatURL($static_qun_href);
        }
    }
    $qun_href = str_replace('|REPLACE_VALUE|', $topic['item_id'], $static_qun_href);
        $topic['from_html'] = $topic['from_string'] = "来自微群";
    $qun_info = Load::Logic('qun', 1)->get_qun_info($topic['item_id']);
    $sub_from = '';
    if (!empty($qun_info)) {
        $sub_from = ' - '.$qun_info['name'];
    }
    if($sub_from) {
        $topic['from_html'] = '来自<a href="'.$qun_href.'" target="_blank">微群'.$sub_from.'</a>';
    }
    return $topic;
}
function _item_topic_from_fenlei($topic) {
    global $rewriteHandler;
    static $static_fenlei_href=null;
    if(!$static_fenlei_href) {
        $static_fenlei_href = 'index.php?mod=fenlei&code=detail&fid=|REPLACE_VALUE1|&id=|REPLACE_VALUE2|';
        if($rewriteHandler) {
            $static_fenlei_href = $rewriteHandler->formatURL($static_fenlei_href);
        }
    }
        $topic['from_html'] = $topic['from_string'] = "来自分类信息";
    $fenlei_info = Load::Logic('fenlei', 1)->get_fenlei_info($topic['item_id']);
    if($fenlei_info){
        $fenlei_href = str_replace(array('|REPLACE_VALUE1|', '|REPLACE_VALUE2|'), array($fenlei_info['fid'], $topic['item_id']), $static_fenlei_href);
        $sub_from = '';
        if (!empty($fenlei_info)) {
            $sub_from = ' - '.$fenlei_info['title'];
        }
        $topic['from_html'] = '来自<a href="'.$fenlei_href.'" target="_blank">分类信息'.$sub_from.'</a>';
    }
    return $topic;
}
function _item_topic_from_event($topic) {
    global $rewriteHandler;
    static $static_event_href=null;
    if(!$static_event_href) {
        $static_event_href = 'index.php?mod=event&code=detail&id=|REPLACE_VALUE|';
        if($rewriteHandler) {
            $static_event_href = $rewriteHandler->formatURL($static_event_href);
        }
    }
    $event_href = str_replace('|REPLACE_VALUE|', $topic['item_id'], $static_event_href);
        $topic['from_html'] = $topic['from_string'] = "来自活动";
    $event_info = Load::Logic('event', 1)->get_event_info($topic['item_id']);
    $main_from = $sub_from = '';
    if (!empty($event_info)) {
                                                $sub_from = ' - '.$event_info['title'];
    }
    if($sub_from) {
        $topic['from_html'] = '来自'.$main_from.'<a href="'.$event_href.'" target="_blank" title="'.$event_info[title].'">活动'.$sub_from.'</a>';
    }
    return $topic;
}
function _item_topic_from_url($topic) {    
    $topic['from_html'] = $topic['from_string'] = "来自内容评论";
    $url_info = Load::logic('url', 1)->get_info_by_id($topic['item_id']);
    $sub_from = '';
    if($url_info) {
        $sub_from = $url_info['title'];
    }
    if($sub_from) {
        $topic['from_html'] = '来自<a href="'.$url_info['url'].'" target="_blank" title="'.$url_info['title'].'">'.$sub_from.'</a>';
    }
    return $topic;
}
function _item_topic_from_live($topic) {
    global $rewriteHandler;
    static $static_live_href=null;
    if(!$static_live_href) {
        $static_live_href = 'index.php?mod=live&code=view&id=|REPLACE_VALUE|';
        if($rewriteHandler) {
            $static_live_href = $rewriteHandler->formatURL($static_live_href);
        }
    }
    $live_href = str_replace('|REPLACE_VALUE|', $topic['item_id'], $static_live_href);
        $topic['from_html'] = $topic['from_string'] = "来自微直播";
    $subject = Load::Logic('live', 1)->id2subject($topic['item_id']);
    $sub_from = '';
    if (!empty($subject)) {
        $sub_from = ' - '.$subject;
    }
    if($sub_from) {
        $topic['from_html'] = '来自<a href="'.$live_href.'" target="_blank">微直播'.$sub_from.'</a>';
    }
    return $topic;
}
function _item_topic_from_talk($topic) {
    global $rewriteHandler;
    static $static_talk_href=null;
    if(!$static_talk_href) {
        $static_talk_href = 'index.php?mod=talk&code=view&id=|REPLACE_VALUE|';
        if($rewriteHandler) {
            $static_talk_href = $rewriteHandler->formatURL($static_talk_href);
        }
    }
    $talk_href = str_replace('|REPLACE_VALUE|', $topic['item_id'], $static_talk_href);
        $topic['from_html'] = $topic['from_string'] = "来自微访谈";
    $subject = Load::Logic('talk', 1)->id2subject($topic['item_id']);
    $sub_from = '';
    if (!empty($subject)) {
        $sub_from = ' - '.$subject;
    }
    if($sub_from) {
        $topic['from_html'] = '来自<a href="'.$talk_href.'" target="_blank">微访谈'.$sub_from.'</a>';
    }
    return $topic;
}
?>