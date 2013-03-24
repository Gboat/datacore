/**
 * 记事狗微博
 * 
 * @author 		~ZZ~
 * @package 	datacore.net
 * @category	JSGST
 * @version		v1.0 $Date: 2011-05-16
 */

(function($){
  if (typeof JSGST == 'undefined') {
    JSGST = {};
  }
  
  if (typeof JSGST.API_URL == 'undefined') {
    JSGST.API_URL = {
		'topic.search':'ajax.php?mod=misc&code=tag',
		'at.search':'ajax.php?mod=misc&code=atuser'
	};
  }

  /**
   * 扩展Function功能，函数可以调用api方法实现api接口
   * 
   * @example function(){}.api('/account/contains');
   */ 
  $.extend(Function.prototype,{
	_isApi: false,
    _apiUrl: null,
    _apiFormat: 'json',
    _apiParams : null,
    
    getApiUrl: function(params) {
      var url = this._apiUrl;
	  
      // 查找并替换URL中的参数
      var matches = null;
      var regex = /\{([^}]+)\}/i;
      while (matches = regex.exec(url)) {
        if (!params || !params[matches[1]]) {
          throw '缺少调用参数';
        }
        url = url.replace(matches[0], params[matches[1]]);
      }
      return url;
    },
    
    /**
     * 调用此方法来实现API接口
     */
    api: function(url,params,format) {
      var ext = format;
      
      this._isApi = true;
      this._apiUrl = url;
      this._apiParams = params;
      if (typeof format == 'string') {
        this._apiFormat = format;
        ext = arguments.length > 3 ? arguments[3] : null;
      }
      if (ext) {
        $.extend(this,ext);
      }
      return this;
    },
    
    /**
     * API异步请求
     */
    request: function(method,params,callback,fail,url) {
      if (!this._isApi) {
        throw '该函数没有实现API接口';
      }
      var self = this;
      var data = null;
      var paramKey;
      var required;
      var defaultValue;
      
      if (this._apiParams) {
        data = {};
        for (var i = 0; i < this._apiParams.length; i++) {
          required = false;
          defaultValue = null;
        
          if ($.isPlainObject(this._apiParams[i])) {
            paramKey = this._apiParams[i].key;
            required = typeof this._apiParams[i].required == 'boolean' ? this._apiParams[i].required : !!this._apiParams[i].required;
            defaultValue = typeof this._apiParams[i].defaultValue == 'undefined' ? null : this._apiParams[i].defaultValue;
          } else {
            paramKey = this._apiParams[i];
          }

          if (!params || typeof params[paramKey] === 'undefined' || params[paramKey] === null) {
            if (required) {
              throw '调用API(' + this._apiUrl + ')时缺少参数：'+paramKey;
            } else if (defaultValue) {
              if (!params) {
                params = {};
              }
              params[paramKey] = defaultValue;
            }
          } 
          if (params && params[paramKey] !== undefined) {
            data[paramKey] = params[paramKey];
          }
        }
      }
      url = url ? url : this.getApiUrl(params);
      $.ajax({
        url:   url,
        type:  method,
        data:  data,
        dataType: this._apiFormat,
        async: true,
        cache: false,
        
        success: function() {
          var args = $(arguments).toArray();
          var ret = self.apply(self,args);
          args.unshift(ret);
          if (callback) {
            callback.apply(self, args);
          }
        },
        
        error: function(ret) {
          if (fail) {
            fail.apply(self,arguments);
            return;
          }
          
          var args = $(arguments).toArray();
          args.unshift(null);
          callback.apply(self, args);
        }
      });
    },
    
    /**
     * 通过GET调用API
     */
    get: function(url, params,callback,fail) {
      if ($.isPlainObject(url)) {
        fail = callback;
        callback = params;
        params = url;
        url = null;
      } else if ($.isFunction(url)) {
        fail = params;
        callback = url;
        params = null;
        url = null;
      } else if ($.isFunction(params)) {
        fail = callback;
        callback = params;
        params = null;
      }
      this.request('GET', params, callback, fail, url);
    },
    
    /**
     * 通过POST调用API
     */
    post: function(url, params, callback, fail) {
      if ($.isPlainObject(url)) {
        fail = callback;
        callback = params;
        params = url;
        url = null;
      } else if ($.isFunction(url)) {
        fail = params;
        callback = url;
        params = null;
        url = null;
      } else if ($.isFunction(params)) {
        fail = callback;
        callback = params;
        params = null;
      }
      this.request('POST', params, callback, fail, url);
    }
  });

  JSGST.parseJSON = function(json) {
    if (typeof json == 'string') {
      try {
        json = $.parseJSON(json);
      } catch (e) {
        json = null;
      }
    }
    
    return json;
  };

  JSGST.API = {};

  /**
   * 话题API
   * 
   * @package JSGST.Topic
   */
  JSGST.API.Topic = {
      
    /**
     * 查询话题，对返回值进行处理
     * 
     * @param String fchar
     * @result Object
     */
    search: function(result) {
      result = $.trim(result);
      if (result === '') {
        return null;
      }
      
      var data = [];
      var rows = result.split("\n");
      var row;
      for (var i = 0; i < rows.length; i++) {
        if ($.trim(rows[i]) === '') {
          continue;
        }
		//用::分隔
        row = rows[i].split('|');
        if (!row || row.length === 0) {
          continue;
        }
        data[data.length] = row;
      }
      return data;
    }.api(JSGST.API_URL['topic.search'],['q'],'text')
  };

  /**
   * 微博API
   * 
   * @package JSGST.Statuses
   */
  JSGST.API.Statuses = {
	  
	searchAt: function(result) {
      result = $.trim(result);
      if (result === '') {
        return null;
      }
      
      var data = [];
      var rows = result.split("\n");
      var row;
      for (var i = 0; i < rows.length; i++) {
        if ($.trim(rows[i]) === '') {
          continue;
        }
		//用::分隔
        row = rows[i].split('|');
        if (!row || row.length === 0) {
          continue;
        }
        data[data.length] = row;
      }
      return data;
    }.api(JSGST.API_URL['at.search'],['q'],'text'),
	
	 //获取光标所在位置的话题(##内)
    getEditTopic: function(startIndex, content) {
		//找出微博中的所有话题
		var topics = JSGST.API.Statuses.findTopics(content);
		var topic = '';
		for (var i = 0; i < topics.length; i++) {
			var len = topics[i].length;
			var start = content.replace(/[\r\n]/ig,' ').indexOf(topics[i]);
			if (startIndex > start && startIndex < (start+len)) {
				topic = topics[i];
				break;
			}
		}
		topic = topic.replace(/#/ig,'');
		return topic;
    },
    getEditTopicRange: function(startIndex, content){
		var topics = JSGST.API.Statuses.findTopics(content);
		var range = {start:0,end:0};
		for (var i = 0; i < topics.length; i++) {
			var len = topics[i].length;
			var start = content.indexOf(topics[i]);
			if (startIndex >= start && startIndex <= (start+len)){
				range.start = start;
				range.end = start+len;
				break;
			}
		}
		return range;
    },

	//将微博内容中的所有##之间的字符串放入数组中
    findTopics:function(content) {
		var topics = [];
		var reg = /#[^#]+#/ig;
		var result;
		while (result = reg.exec(content)){
			topics.push(result[0]);
		}
		return topics;
    }
  };

  $.extend($.fn,{
	//获取文本框内光标位置
    getSelectionStart: function() {
      var e = this[0];
      if (e.selectionStart) {
        return e.selectionStart;
      } else if (document.selection) {
        e.focus();
        var r=document.selection.createRange();
        var sr = r.duplicate();
        sr.moveToElementText(e);
        sr.setEndPoint('EndToEnd', r);
        return sr.text.length - r.text.length;
      }
      
      return 0;
    },
    getSelectionEnd: function() {
      var e = this[0];
      if (e.selectionEnd) {
        return e.selectionEnd;
      } else if (document.selection) {
        e.focus();
        var r=document.selection.createRange();
        var sr = r.duplicate();
        sr.moveToElementText(e);
        sr.setEndPoint('EndToEnd', r);
        return sr.text.length;
      }
      
      return 0;
    },
	
	//自动插入默认字符串
    insertString: function(str) {
      $(this).each(function() {
          var tb = $(this);
          tb.focus();
          if (document.selection){
              var r = document.selection.createRange();
              document.selection.empty();
              r.text = str;
              r.collapse();
              r.select();
          } else {
              var newstart = tb.get(0).selectionStart+str.length;
              tb.val(tb.val().substr(0,tb.get(0).selectionStart) + 
          str + tb.val().substring(tb.get(0).selectionEnd));
              tb.get(0).selectionStart = newstart;
              tb.get(0).selectionEnd = newstart;
          }
      });
      
      return this;
    },
    setSelection: function(startIndex,len) {
      $(this).each(function(){
        if (this.setSelectionRange){
          this.setSelectionRange(startIndex, startIndex + len);  
        } else if (document.selection) {
          var range = this.createTextRange();  
          range.collapse(true);  
          range.moveStart('character', startIndex);  
          range.moveEnd('character', len);  
          range.select();
        } else {
          this.selectionStart = startIndex;
          this.selectionEnd = startIndex + len;
        }
      });
      
      return this;
    },
    getSelection: function() {
      var elem = this[0];
    
        var sel = '';
        if (document.selection){
            var r = document.selection.createRange();
            document.selection.empty();
            sel = r.text;
        } else {
            var start = elem.selectionStart;
            var end = elem.selectionEnd;
        var content = $(elem).is(':input') ? $(elem).val() : $(elem).text();
            sel = content.substring(start, end);
        }
        return sel;
    }
  });
})(jQuery);
