(function(){'use strict';$.popup=function(){var me=this;var fn=function(f){return typeof f==='function'};var setfn=function(f){return typeof f==='function'?f:null};var isnull=function(v){return v===null};var notnull=function(v){return!isnull(v)};var undef=function(v){return typeof v==='undefined'};var isstr=function(v){return typeof v==='string'};var isobj=function(v){return v!=null&&typeof v==='object'};var isempty=function(o){return 0===o.length?!0:!1};var ucfirst=function(s){return s[0].toUpperCase()+s.substring(1)};if(isempty(arguments)){me.confirm=function(){var param=arguments;var _content=param[0],_title=null,_onConfirm=setfn(param[1]),_onCancel=setfn(param[2]);if(isstr(param[1]))
{_title=param[1];_onConfirm=setfn(param[2]),_onCancel=setfn(param[3])}
var confirm=new $.popup({dialog:'confirm',title:_title,content:_content,onConfirm:_onConfirm,onCancel:_onCancel});return confirm};me.prompt=function(){var param=arguments;var _default=param[0],_content=null,_title=null,_onConfirm=setfn(param[1]),_onCancel=setfn(param[2]);if(isstr(param[1]))
{_content=param[1];_onConfirm=setfn(param[2]);_onCancel=setfn(param[3])}
if(isstr(param[2]))
{_title=param[2];_onConfirm=setfn(param[3]);_onCancel=setfn(param[4])}
var prompt=new $.popup({content:_content,title:_title,dialog:'prompt',prompt:{value:_default},onConfirm:_onConfirm,onCancel:_onCancel});return prompt};me.form=function(){var param=arguments;var _content=null,_title=null,_htmlcontent=param[0],_onSubmit=setfn(param[1]),_onCancel=setfn(param[2]);if(isstr(param[1]))
{_content=param[1];_onSubmit=setfn(param[2]);_onCancel=setfn(param[3])}
if(isstr(param[2]))
{_title=param[2];_onSubmit=setfn(param[3]);_onCancel=setfn(param[4])}
var form=new $.popup({content:_content,title:_title,dialog:'form',form:{content:_htmlcontent},onSubmit:_onSubmit,onCancel:_onCancel});return form};return me}
var agent,options={};var callback=arguments[1];var elem=arguments[2];var $container,$content,$title,$message,$toolbar,$outer,$prompt,$form,display;me.settings={};me.defaults={html:!0,position:'center',dialog:'alert',prompt:{value:null,addClass:null},form:{content:null,addClass:null},content:null,title:null,icon:null,iconPath:'images/icons/',buttons:{OK:{text:'OK',style:'default',addClass:null,action:null}},buttonDisplay:'inline',modal:!0,autoclose:!1,timeout:3000,overlay:!0,opacity:null,closeEsc:!1,closeOverlay:!1,animated:!0,animateEntrance:'flipInX',animateClosing:'fadeOut',onLoad:function(){},onBuild:function(){},onShow:function(){},onClose:function(){},onHide:function(){},onConfirm:null,onSubmit:null,onCancel:null};var btn_defaults={text:null,style:'default',addClass:null,action:null};if(isstr(arguments[0]))
{options.content=arguments[0];callback=arguments[1];if(isstr(arguments[1]))
{options.title=arguments[1];callback=arguments[2]}}
else if(isobj(arguments[0]))options=arguments[0];me.settings=$.extend({},me.defaults,options);if(me.settings.iconPath.substr(-1)!='/')me.settings.iconPath+='/';var build=function()
{var container=$('<div class="pop-container modal"></div>');var overlay=$('<div class="pop-overlay"></div>');var fixer=$('<div class="pop-fixer"></div>');var outer=$('<div class="pop-outer"></div>');var content=$('<div class="pop-content"></div>');var icon=$('<div class="pop-icon"></div>');var img=$('<img />');var title=$('<h1 class="pop-title"></h1>');var message=$('<div class="pop-message"></div>');var form=$('<form class="pop-form"></form>');var row=$('<div class="pop-row"></div>');var prompt=$('<input class="pop-prompt" />');var toolbar=$('<div class="pop-toolbar"></div>');var button=$('<a href="#" class="pop-button"></a>');if(!$.support.leadingWhitespace){agent='msie8';container.addClass('msie8')}
if(eval('/*@cc_on !@*/false')&&(document.documentMode===9)){agent='msie9';container.addClass('msie9')}
container.append(overlay).append(fixer.append(outer));outer.append(content.append(title).append(message)).append(toolbar.addClass(me.settings.buttonDisplay));if(notnull(me.settings.position))container.addClass(me.settings.position);if(notnull(me.settings.title))title.html(me.settings.title);if(notnull(me.settings.content))message.html(me.settings.content);if(notnull(me.settings.icon)){img.attr('src',me.settings.iconPath+me.settings.icon);content.prepend(icon.append(img))}
if(!1==me.settings.html){message.html($('<div></div>').text(me.settings.content).html());title.html($('<div></div>').text(me.settings.title).html())}
if(!1==me.settings.modal){container.removeClass('modal');overlay.remove()}
if(!0==me.settings.closeOverlay)overlay.on('click',function(){me.close()});if(notnull(me.settings.opacity))
{overlay.fadeTo(0,parseFloat(me.settings.opacity));if('msie8'==agent)overlay.addClass('opacity-'+(me.settings.opacity.toFixed(1)*100))}
if(!1==me.settings.overlay)
{overlay.remove();if('msie9'==agent||'msie8'==agent)container.addClass('ie-overlay-false')}
if(!0==me.settings.closeEsc){$(document).keydown(function(e){e=e||window.event;if(e.keyCode==27){var container=$('body').find('.pop-container').last();var instance=container.data('popup').instance;if(!0==instance.settings.closeEsc&&container.hasClass('shown'))instance.close()}})}
if(!0==me.settings.autoclose)setTimeout(function(){me.close()},me.settings.timeout);if('confirm'==me.settings.dialog){me.defaults.buttons={confirm:{text:'Confirm',style:'danger',addClass:null,action:function()
{if(fn(me.settings.onConfirm))
{var close=me.settings.onConfirm.call(me,$container);if(!1!==close)me.close()}else me.close();return!1}},cancel:{text:'Cancel',style:'default',addClass:null,action:function()
{if(fn(me.settings.onCancel))
{var close=me.settings.onCancel.call(me,$container);if(!1!==close)me.close()}else me.close();return!1}}};me.settings=$.extend({},me.defaults,options)}
if('prompt'==me.settings.dialog){$.each(me.settings.prompt,function(key,value)
{if('value'==key)prompt.val(value);else if('addClass'==key)prompt.addClass(value);else prompt.attr(key,value)});message.append(form.append(row.append(prompt)));form.on('submit',function()
{if(fn(me.settings.onConfirm))
{var close=me.settings.onConfirm.call(me,$container,prompt);if(!1!==close)me.close()}
else me.close();return!1});me.defaults.buttons={confirm:{text:'Confirm',style:'danger',addClass:null,action:function()
{if(fn(me.settings.onConfirm))
{var close=me.settings.onConfirm.call(me,$container,prompt);if(!1!==close)me.close()}
else me.close();return!1}},cancel:{text:'Cancel',style:'default',addClass:null,action:function()
{if(fn(me.settings.onCancel))
{var close=me.settings.onCancel.call(me,$container,prompt);if(!1!==close)me.close()}else me.close();return!1}}};$prompt=prompt;me.settings=$.extend({},me.defaults,options)}
if('form'==me.settings.dialog){$.each(me.settings.form,function(key,value)
{if('content'==key)form.html(value);else if('addClass'==key)form.addClass(value);else form.attr(key.toLowerCase(),value)});message.append(form);form.on('submit',function(e)
{if(fn(me.settings.onSubmit))
{var submit=me.settings.onSubmit.call(me,$container,form);if(!1==submit)return!1}});me.defaults.buttons={submit:{text:'Submit',style:'danger',addClass:null,action:function()
{form.submit();return!1}},cancel:{text:'Cancel',style:'default',addClass:null,action:function()
{if(fn(me.settings.onCancel))
{var close=me.settings.onCancel.call(me,$container,form);if(!1!==close)me.close()}else me.close();return!1}}};$form=form;me.settings=$.extend({},me.defaults,options)}
if(me.settings.buttons!==!1)$.each(me.settings.buttons,function(btnkey,btnvalue)
{var item={},btn=button.clone();if(isobj(this))
{var item=$.extend({},btn_defaults,this);$.each(item,function(key,value)
{if('text'==key)
{if(isnull(value))btn.html(ucfirst(btnkey));else btn.html(value)}
else if('addClass'==key)btn.addClass(value);else if('style'==key)btn.addClass(value.toLowerCase());else if('prepend'==key)btn.prepend(value);else if('append'==key)btn.append(value);else if('action'!==key)btn.attr(key.toLowerCase(),value)})}
else if(fn(this))
{btn.html(ucfirst(btnkey));item.action=this}
btn.attr('rel','btn-'+btnkey);btn.on('click',function(e)
{e.preventDefault();if(fn(item.action))
{var close=null;if(me.settings.dialog=='alert')close=item.action.call(me,$container,btn);else if(me.settings.dialog=='confirm')close=item.action.call(me,$container,btn);else if(me.settings.dialog=='prompt')close=item.action.call(me,$container,$prompt,btn);else if(me.settings.dialog=='form')close=item.action.call(me,$container,$form,btn);if(!1!==close)me.close()}
else if(!1!==item.action)me.close()}).appendTo(toolbar)});container.data('popup',{instance:me});$('body').append(container);$container=container;$content=content;$title=title;$message=message;$toolbar=toolbar;$outer=outer;var show=me.settings.onBuild.call(me,$container);if(show!==!1)me.show()};me.show=function()
{if('shown'==display)return me;if(isnull(me))return null;var animated=me.settings.animated,entrance=me.settings.animateEntrance,onShow=me.settings.onShow;display='shown';if(animated)
{notnull(entrance)&&me.animate(entrance);$container.addClass('shown').fadeIn(function(){onShow.call(me,$container)})}
else{$container.addClass('shown').fadeIn(0);onShow.call(me,$container)}
return me};me.hide=function()
{if('hidden'==display)return me;var onHide=me.settings.onHide,hide=onHide.call(me,$container),animated=me.settings.animated;if(hide!==!1)
{display='hidden';if(animated)
$container.fadeOut(400,function(){$(this).removeClass('shown')});else $container.fadeOut(0).removeClass('shown')}
return me};me.close=function()
{if('closed'==display)return me;var animated=me.settings.animated,closing=me.settings.animateClosing,onClose=me.settings.onClose,close=me.settings.onClose.call(me,$container);if(close!==!1)
{if('hidden'==display)
{$container.remove();me=null}
display='closed';if(animated)
{if(notnull(closing))
{me.animate(closing);$container.fadeOut(400,function(){$(this).removeClass('shown').remove();me=null})}}
else{$container.removeClass('shown').remove();me=null}}
return me};me.exit=function()
{$('body').find('.pop-container').each(function(){var instance=$(this).data('popup').instance;instance.close()});return me};me.closeAll=function(){me.exit()};me.animate=function(animation,callback)
{var animationEnd='webkitAnimationEnd oanimationend msAnimationEnd animationend';$outer.addClass(animation+' animated');$outer.bind(animationEnd,function(){$outer.removeClass(animation+' animated');if(fn(callback))callback.call(me,$container);$outer.unbind(animationEnd)});return me};me.bounce=function(fn){me.animate('bounce',fn);return me};me.shake=function(fn){me.animate('shake',fn);return me};me.pulse=function(fn){me.animate('pulse',fn);return me};me.rubberBand=function(fn){me.animate('rubberBand',fn);return me};me.wobble=function(fn){me.animate('wobble',fn);return me};me.swing=function(fn){me.animate('swing',fn);return me};me.flash=function(fn){me.animate('flash',fn);return me};me.tada=function(fn){me.animate('tada',fn);return me};me.getDefaults=function(){return me.defaults};me.getSettings=function(){return me.settings};me.width=function(value,callback)
{if(typeof value==='undefined')return $content.outerWidth();value=parseInt(value,10);if(callback==!1)
{$content.outerWidth(value)}
else{$content.animate({width:value},300,function(){if(fn(callback))callback.call(me,$container)})}
return me};me.height=function(value,callback)
{if(typeof value==='undefined')return $content.outerHeight()+$toolbar.outerHeight();value=parseInt(value,10)-$toolbar.outerHeight();if(callback==!1)
{$content.outerHeight(value+$toolbar.outerHeight())}
else{$content.animate({height:value},300,function(){if(fn(callback))callback.call(me,$container)})}
return me};me.resize=function(width,height,callback)
{$container.removeClass('fullscreen');if(callback==!1)me.width(width,!1).height(height,!1);else{me.width(width).height(height);if(fn(callback))callback.call(me,$container)}};me.revert=function(callback)
{$container.removeClass('fullscreen');if(!1==callback)$content.css({height:'',width:''});else{var curHeight=$content.height(),curWidth=$content.width(),autoHeight=$content.css('height','auto').outerHeight(),autoWidth=$content.css('width','auto').outerWidth();$content.height(curHeight).width(curWidth);$content.animate({'width':autoWidth},function(){$content.animate({'height':autoHeight},function(){$content.css({'width':'','height':''});if(fn(callback))callback.call(me,$container)})})}
return me};me.fullscreen=function(callback)
{var fwidth=$(window).width(),fheight=$(window).height();$container.addClass('fullscreen');if(!1==callback)me.width(fwidth,!1).height(fheight,!1);else{me.width(fwidth).height(fheight);if(fn(callback))callback.call(me,$container)}
return me};me.position=function(position)
{if(undef(position))return me.settings.position;position=position.toLowerCase();$container.removeClass(me.settings.position).addClass(position);me.settings.position=position;return me};me.content=function(value,faded)
{if(undef(value))return me.settings.content;if(value==me.settings.content)return me;if(!1==faded)$message.html(value);else{$message.fadeOut(200,function(){$message.html(value).fadeIn(200)})}
me.settings.content=value;return me};me.title=function(value,faded)
{if(undef(value))return me.settings.title;if(value==me.settings.title)return me;if(!1==faded)$title.html(value);else{$title.fadeOut(200,function(){$title.html(value).fadeIn()})}
me.settings.title=value};me.buttons=function()
{var btn={};$.each(me.settings.buttons,function(key){btn[key]=$toolbar.find('a[rel=btn-'+key+']')});return btn};me.autoclose=function(timeout,callback)
{if(undef(timeout))timeout=me.settings.timeout;setTimeout(function(){if(fn(callback))
{var close=callback.call(me,$container);if(close!==!1)me.close()}
else me.close()},timeout)};me.onShow=function(callback){if(fn(callback))me.settings.onShow=callback;return me};me.onClose=function(callback){if(fn(callback))me.settings.onClose=callback;return me};me.onHide=function(callback){if(fn(callback))me.settings.onHide=callback;return me};me.onConfirm=function(func)
{var dialog=me.settings.dialog;if(undef(func))
{if(fn(me.settings.onConfirm))
{if('confirm'==dialog)me.settings.onConfirm.call(me,$container);if('prompt'==dialog)me.settings.onConfirm.call(me,$container,$prompt)}
return me}
if(fn(func))me.settings.onConfirm=func;return me};me.onSubmit=function(func)
{if(undef(func))
{if(fn(me.settings.onSubmit))me.settings.onSubmit.call(me,$container,$form);return me}
if(fn(func))me.settings.onSubmit=func;return me};me.onCancel=function(func)
{var dialog=me.settings.dialog;if(undef(func))
{if(fn(me.settings.onCancel))
{if('confirm'==dialog)me.settings.onCancel.call(me,$container);if('prompt'==dialog)me.settings.onCancel.call(me,$container,$prompt);if('form'==dialog)me.settings.onCancel.call(me,$container,$form)}
return me}
if(fn(func))me.settings.onCancel=func;return me};me.settings.onLoad.call(me);build();if(fn(callback))callback.call(me,$container);return this}}(jQuery))