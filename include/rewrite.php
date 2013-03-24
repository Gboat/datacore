<?php
if(!defined('IN_DATACORE')) {
    exit('invalid request');
}
include(ROOT_PATH . 'setting/rewrite.php');
if($_rewrite['mode']) {
    include_once(ROOT_PATH . 'include/lib/rewrite.han.php');
    global $rewriteHandler;
    $rewriteHandler=new rewriteHandler();
    $rewriteHandler->absPath=$_rewrite['abs_path'];
    $rewriteHandler->gateway=$_rewrite['gateway'];
    $rewriteHandler->argSeparator=$_rewrite['arg_separator'];
    $rewriteHandler->varSeparator=$_rewrite['var_separator'];
    $rewriteHandler->prependVarList=$_rewrite['prepend_var_list'];
    $rewriteHandler->varReplaceList=(array)$_rewrite['var_replace_list'];
    $rewriteHandler->valueReplaceList=(array)$_rewrite['value_replace_list'];
    if(true === IN_DATACORE_INDEX || true === IN_DATACORE_AJAX) {
        $rewriteHandler->parseRequest($_rewrite['request']);
    }
}
?>