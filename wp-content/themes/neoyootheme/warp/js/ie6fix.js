/* Copyright (C) YOOtheme GmbH, YOOtheme Proprietary Use License (http://www.yootheme.com/license) */

function addHover(a,b){b==void 0&&(b="hovered");jQuery(a).bind({mouseenter:function(){jQuery(this).addClass(b)},mouseleave:function(){jQuery(this).removeClass(b)}})}function addFocus(a,b){b==void 0&&(b="focused");jQuery(a).bind({focus:function(){jQuery(this).addClass(b)},blur:function(){jQuery(this).removeClass(b)}})}function fixPngBackground(a){jQuery(a).addClass("png_bg")}
function correctPngInline(){var a=navigator.appVersion.split("MSIE");if(parseFloat(a[1])>=5.5&&document.body.filters)for(var a=document.getElementsByTagName("img"),b=/\bcorrect-png\b/,d=0;d<a.length;d++){var c=a[d],f=c.src.toUpperCase();if(f.substring(f.length-3,f.length)=="PNG"&&b.test(c.className)){var f=c.id?"id='"+c.id+"' ":"",g=c.className?"class='"+c.className+"' ":"",h=c.title?"title='"+c.title+"' ":"title='"+c.alt+"' ",e="display:inline-block;"+c.style.cssText;c.align=="left"&&(e="float:left;"+
e);c.align=="right"&&(e="float:right;"+e);c.parentElement.href&&(e="cursor:hand;"+e);filterSizingMethod="crop";a[d].outerHTML="<span "+f+g+h+' style="width:'+c.width+"px; height:"+c.height+"px;"+e+";filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+c.src+"', sizingMethod='"+filterSizingMethod+"');\"></span>";d-=1}}}
function correctPngBackground(a,b){var d=b||"scale";jQuery(a).each(function(){var a=jQuery(this);a.is("img")&&a.css("background-image").match(/\.png/i)!=null&&(fnFixPng(this,d),a.attachEvent("onpropertychange",fnPropertyChanged))})}function fnFixPng(a,b){var d=a.currentStyle.backgroundImage,d=d.substring(5,d.length-2);a.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+d+"', sizingMethod='"+b+"')";a.style.backgroundImage="url(x.gif)"}
function fnPropertyChanged(){if(window.event.propertyName=="style.backgroundImage"){var a=window.event.srcElement;if(!a.currentStyle.backgroundImage.match(/x\.gif/i)){var b=a.currentStyle.backgroundImage,b=b.substring(5,b.length-2);a.filters.item(0).src=b;a.style.backgroundImage="url(x.gif)"}}};
