<?php
/*******************************************************************
 * [JishiGou] (C)2005 - 2099 INET Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename navigation.php $
 *
 * @Author http://inet.hitwh.edu.cn $
 *
 * @Date 2012-04-28 05:53:12 1137669000 1616649813 7271 $
 *******************************************************************/

 
  
$config['navigation']=array (
  'list' => 
  array (
    0 => 
    array (
      'order' => 101,
      'name' => '广场',
      'code' => 'new',
      'url' => 'index.php?mod=topic&code=new',
      'target' => '_parent',
      'avaliable' => '1',
      'type_list' => 
      array (
        0 => 
        array (
          'order' => 99,
          'name' => '同城微博',
          'code' => 'tc',
          'url' => 'index.php?mod=topic&code=tc',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        1 => 
        array (
          'order' => 98,
          'name' => '最新微博',
          'code' => 'topic',
          'url' => 'index.php?mod=topic&code=new',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        2 => 
        array (
          'order' => 97,
          'name' => '热门评论',
          'code' => 'hot_reply',
          'url' => 'index.php?mod=topic&code=hotreply',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        3 => 
        array (
          'order' => 96,
          'name' => '热门转发',
          'code' => 'hot_forward',
          'url' => 'index.php?mod=topic&code=hotforward',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        4 => 
        array (
          'order' => 95,
          'name' => '最新评论',
          'code' => 'reply',
          'url' => 'index.php?mod=topic&code=newreply',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        5 => 
        array (
          'order' => 94,
          'name' => '达人榜',
          'code' => 'top',
          'url' => 'index.php?mod=topic&code=top',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        6 => 
        array (
          'order' => 93,
          'name' => '话题榜',
          'code' => 'tag',
          'url' => 'index.php?mod=tag',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        7 => 
        array (
          'order' => 92,
          'name' => '名人堂',
          'code' => 'people',
          'url' => 'index.php?mod=people',
          'target' => '_parent',
          'avaliable' => '1',
        ),
      ),
    ),
    1 => 
    array (
      'order' => 99,
      'name' => '微群',
      'code' => 'qun',
      'url' => 'index.php?mod=qun',
      'target' => '_parent',
      'avaliable' => '1',
      'type_list' => 
      array (
        0 => 
        array (
          'order' => 98,
          'name' => '发现新群',
          'code' => 'findqun',
          'url' => 'index.php?mod=qun',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        1 => 
        array (
          'order' => 97,
          'name' => '我的微群',
          'code' => 'myqun',
          'url' => 'index.php?mod=qun&code=profile',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        2 => 
        array (
          'order' => 96,
          'name' => '关注人的微群',
          'code' => 'fqun',
          'url' => 'index.php?mod=qun&code=profile&view=followed',
          'target' => '_parent',
          'avaliable' => '1',
        ),
      ),
    ),
    2 => 
    array (
      'order' => 90,
      'name' => '应用',
      'code' => 'app',
      'url' => '#',
      'target' => '_parent',
      'avaliable' => '1',
      'type_list' => 
      array (
        0 => 
        array (
          'order' => 100,
          'name' => '投票',
          'code' => 'vote',
          'url' => 'index.php?mod=vote',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        1 => 
        array (
          'order' => 99,
          'name' => '上墙',
          'code' => 'wall',
          'url' => 'index.php?mod=wall&code=control',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        2 => 
        array (
          'order' => 98,
          'name' => '活动',
          'code' => 'event',
          'url' => 'index.php?mod=event',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        3 => 
        array (
          'order' => 97,
          'name' => '勋章',
          'code' => 'medal',
          'url' => 'index.php?mod=other&code=medal',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        4 => 
        array (
          'order' => 95,
          'name' => '直播',
          'code' => 'live',
          'url' => 'index.php?mod=live',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        5 => 
        array (
          'order' => 94,
          'name' => '访谈',
          'code' => 'talk',
          'url' => 'index.php?mod=talk',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        6 => 
        array (
          'order' => 93,
          'name' => '图片墙',
          'code' => 'photo',
          'url' => 'index.php?mod=topic&code=photo',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        7 => 
        array (
          'order' => 92,
          'name' => '微博秀',
          'code' => 'show',
          'url' => 'index.php?mod=show&code=show',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        8 => 
        array (
          'order' => 90,
          'name' => '签名档',
          'code' => 'qmd',
          'url' => 'index.php?mod=tools&code=qmd',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        9 => 
        array (
          'order' => 88,
          'name' => 'QQ机器人',
          'code' => 'robot',
          'url' => 'index.php?mod=tools&code=imjiqiren',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        10 => 
        array (
          'order' => 87,
          'name' => '分享到微博',
          'code' => 'share',
          'url' => 'index.php?mod=tools&code=share',
          'target' => '_parent',
          'avaliable' => '1',
        ),
      ),
    ),
    3 => 
    array (
      'order' => 7,
      'name' => '找人',
      'code' => 'search',
      'url' => 'index.php?mod=profile&code=search',
      'target' => '_parent',
      'avaliable' => '1',
      'type_list' => 
      array (
        0 => 
        array (
          'order' => 5,
          'name' => '同城用户',
          'code' => 'samecity',
          'url' => 'index.php?mod=profile&code=search',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        1 => 
        array (
          'order' => 4,
          'name' => '同类人',
          'code' => 'usertag',
          'url' => 'index.php?mod=profile&code=usertag',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        2 => 
        array (
          'order' => 2,
          'name' => '同兴趣',
          'code' => 'maybe_friend',
          'url' => 'index.php?mod=profile&code=maybe_friend',
          'target' => '_parent',
          'avaliable' => '1',
        ),
        3 => 
        array (
          'order' => 1,
          'name' => '邀请好友',
          'code' => 'invite',
          'url' => 'index.php?mod=profile&code=invite',
          'target' => '_parent',
          'avaliable' => '1',
        ),
      ),
    ),
  ),
);
 ?>