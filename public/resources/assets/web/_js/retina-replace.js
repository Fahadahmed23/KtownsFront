(function($){"use strict";var retinaReplace=function(element,options){this.options=options;var $el=$(element);var is_image=$el.is('img');var normal_url=is_image?$el.attr('src'):$el.backgroundImageUrl();var retina_url=this.options.generateUrl($el,normal_url);$('<img/>').attr('src',retina_url).load(function(){if(is_image){$el.attr('src',$(this).attr('src'))}else{$el.backgroundImageUrl($(this).attr('src'));$el.backgroundSize($(this)[0].width,$(this)[0].height)}
$el.attr('data-retina','complete')})}
retinaReplace.prototype={constructor:retinaReplace}
$.fn.retinaReplace=function(option){if(getDevicePixelRatio()<=1){return this}
return this.each(function(){var $this=$(this);var data=$this.data('retinaReplace');var options=$.extend({},$.fn.retinaReplace.defaults,$this.data(),typeof option=='object'&&option);if(!data){$this.data('retinaReplace',(data=new retinaReplace(this,options)))}
if(typeof option=='string'){data[option]()}})}
$.fn.retinaReplace.defaults={suffix:'_2x',generateUrl:function(element,url){var dot_index=url.lastIndexOf('.');var extension=url.substr(dot_index+1);var file=url.substr(0,dot_index);return file+this.suffix+'.'+extension}}
$.fn.retinaReplace.Constructor=retinaReplace;var getDevicePixelRatio=function(){if(window.devicePixelRatio===undefined){return 1}
return window.devicePixelRatio}
$.fn.backgroundImageUrl=function(url){return url?this.each(function(){$(this).css("background-image",'url("'+url+'")')}):$(this).css("background-image").replace(/url\(|\)|"|'/g,"")}
$.fn.backgroundSize=function(retinaWidth,retinaHeight){var sizeValue=Math.floor(retinaWidth/2)+'px '+Math.floor(retinaHeight/2)+'px';$(this).css("background-size",sizeValue);$(this).css("-webkit-background-size",sizeValue)}
$(function(){$("[data-retina='true']").retinaReplace()})})(window.jQuery)