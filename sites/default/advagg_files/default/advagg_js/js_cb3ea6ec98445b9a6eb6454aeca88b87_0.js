/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/misc/drupal.js. */
(function(){var jquery_init=jQuery.fn.init;jQuery.fn.init=function(selector,context,rootjQuery){if(selector&&typeof selector==='string'){var hash_position=selector.indexOf('#');if(hash_position>=0){var bracket_position=selector.indexOf('<');if(bracket_position>hash_position)throw'Syntax error, unrecognized expression: '+selector}};return jquery_init.call(this,selector,context,rootjQuery)};jQuery.fn.init.prototype=jquery_init.prototype})();var Drupal=Drupal||{settings:{},behaviors:{},themes:{},locale:{}};Drupal.jsEnabled=document.getElementsByTagName&&document.createElement&&document.createTextNode&&document.documentElement&&document.getElementById;Drupal.attachBehaviors=function(context){context=context||document;if(Drupal.jsEnabled)jQuery.each(Drupal.behaviors,function(){this(context)})};Drupal.checkPlain=function(str){str=String(str);var replace={'&':'&amp;','"':'&quot;','<':'&lt;','>':'&gt;'};for(var character in replace){var regex=new RegExp(character,'g');str=str.replace(regex,replace[character])};return str};Drupal.t=function(str,args){if(Drupal.locale.strings&&Drupal.locale.strings[str])str=Drupal.locale.strings[str];if(args)for(var key in args){switch(key.charAt(0)){case'@':args[key]=Drupal.checkPlain(args[key]);break;case'!':break;case'%':default:args[key]=Drupal.theme('placeholder',args[key]);break};str=str.replace(key,args[key])};return str};Drupal.formatPlural=function(count,singular,plural,args){var args=args||{};args['@count']=count;var index=Drupal.locale.pluralFormula?Drupal.locale.pluralFormula(args['@count']):((args['@count']==1)?0:1);if(index==0){return Drupal.t(singular,args)}else if(index==1){return Drupal.t(plural,args)}else{args['@count['+index+']']=args['@count'];delete args['@count'];return Drupal.t(plural.replace('@count','@count['+index+']'),args)}};Drupal.theme=function(func){for(var i=1,args=[];i<arguments.length;i++)args.push(arguments[i]);return(Drupal.theme[func]||Drupal.theme.prototype[func]).apply(this,args)};Drupal.parseJson=function(data){if((data.substring(0,1)!='{')&&(data.substring(0,1)!='['))return{status:0,data:data.length?data:Drupal.t('Unspecified error')};return eval('('+data+');')};Drupal.freezeHeight=function(){Drupal.unfreezeHeight();var div=document.createElement('div');$(div).css({position:'absolute',top:'0px',left:'0px',width:'1px',height:$('body').css('height')}).attr('id','freeze-height');$('body').append(div)};Drupal.unfreezeHeight=function(){$('#freeze-height').remove()};Drupal.encodeURIComponent=function(item,uri){uri=uri||location.href;item=encodeURIComponent(item).replace(/%2F/g,'/');return(uri.indexOf('?q=')!=-1)?item:item.replace(/%26/g,'%2526').replace(/%23/g,'%2523').replace(/\/\//g,'/%252F')};Drupal.getSelection=function(element){if(typeof(element.selectionStart)!='number'&&document.selection){var range1=document.selection.createRange(),range2=range1.duplicate();range2.moveToElementText(element);range2.setEndPoint('EndToEnd',range1);var start=range2.text.length-range1.text.length,end=start+range1.text.length;return{start:start,end:end}};return{start:element.selectionStart,end:element.selectionEnd}};Drupal.ahahError=function(xmlhttp,uri){if(xmlhttp.status==200){if(jQuery.trim($(xmlhttp.responseText).text())){var message=Drupal.t("An error occurred. \n@uri\n@text",{'@uri':uri,'@text':xmlhttp.responseText})}else var message=Drupal.t("An error occurred. \n@uri\n(no information available).",{'@uri':uri,'@text':xmlhttp.responseText})}else var message=Drupal.t("An HTTP error @status occurred. \n@uri",{'@uri':uri,'@status':xmlhttp.status});return message};if(Drupal.jsEnabled){$(document.documentElement).addClass('js');document.cookie='has_js=1; path=/';$(document).ready(function(){Drupal.attachBehaviors(this)})};Drupal.theme.prototype={placeholder:function(str){return'<em>'+Drupal.checkPlain(str)+'</em>'}};
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/misc/drupal.js. */
/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/sites/all/modules/nice_menus/superfish/js/superfish.js. */
(function($){$.fn.superfish=function(op){var sf=$.fn.superfish,c=sf.c,$arrow=$(['<span class="',c.arrowClass,'"> &#187;</span>'].join('')),over=function(){var $$=$(this),menu=getMenu($$);clearTimeout(menu.sfTimer);$$.showSuperfishUl().siblings().hideSuperfishUl()},out=function(){var $$=$(this),menu=getMenu($$),o=sf.op;clearTimeout(menu.sfTimer);menu.sfTimer=setTimeout(function(){o.retainPath=($.inArray($$[0],o.$path)>-1);$$.hideSuperfishUl();if(o.$path.length&&$$.parents(['li.',o.hoverClass].join('')).length<1)over.call(o.$path)},o.delay)},getMenu=function($menu){var menu=$menu.parents(['ul.',c.menuClass,':first'].join(''))[0];sf.op=sf.o[menu.serial];return menu},addArrow=function($a){$a.addClass(c.anchorClass).append($arrow.clone())};return this.each(function(){var s=this.serial=sf.o.length,o=$.extend({},sf.defaults,op);o.$path=$('li.'+o.pathClass,this).slice(0,o.pathLevels).each(function(){$(this).addClass([o.hoverClass,c.bcClass].join(' ')).filter('li:has(ul)').removeClass(o.pathClass)});sf.o[s]=sf.op=o;$('li:has(ul)',this)[($.fn.hoverIntent&&!o.disableHI)?'hoverIntent':'hover'](over,out).each(function(){if(o.autoArrows)addArrow($('>a:first-child',this))}).not('.'+c.bcClass).hideSuperfishUl();var $a=$('a',this);$a.each(function(i){var $li=$a.eq(i).parents('li');$a.eq(i).focus(function(){over.call($li)}).blur(function(){out.call($li)})});o.onInit.call(this)}).each(function(){var menuClasses=[c.menuClass];if(sf.op.dropShadows&&!($.browser.msie&&$.browser.version<7))menuClasses.push(c.shadowClass);$(this).addClass(menuClasses.join(' '))})};var sf=$.fn.superfish;sf.o=[];sf.op={};sf.IE7fix=function(){var o=sf.op;if($.browser.msie&&$.browser.version>6&&o.dropShadows&&o.animation.opacity!=undefined)this.toggleClass(sf.c.shadowClass+'-off')};sf.c={bcClass:'sf-breadcrumb',menuClass:'sf-js-enabled',anchorClass:'sf-with-ul',arrowClass:'sf-sub-indicator',shadowClass:'sf-shadow'};sf.defaults={hoverClass:'sfHover',pathClass:'overideThisToUse',pathLevels:1,delay:800,animation:{opacity:'show'},speed:'normal',autoArrows:true,dropShadows:true,disableHI:false,onInit:function(){},onBeforeShow:function(){},onShow:function(){},onHide:function(){}};$.fn.extend({hideSuperfishUl:function(){var o=sf.op,not=(o.retainPath===true)?o.$path:'';o.retainPath=false;var $ul=$(['li.',o.hoverClass].join(''),this).add(this).not(not).removeClass(o.hoverClass).find('>ul').hide().css('visibility','hidden');o.onHide.call($ul);return this},showSuperfishUl:function(){var o=sf.op,sh=sf.c.shadowClass+'-off',$ul=this.addClass(o.hoverClass).find('>ul:hidden').css('visibility','visible');sf.IE7fix.call($ul);o.onBeforeShow.call($ul);$ul.animate(o.animation,o.speed,function(){sf.IE7fix.call($ul);o.onShow.call($ul)});return this}})})(jQuery);
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/sites/all/modules/nice_menus/superfish/js/superfish.js. */
/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/sites/all/modules/nice_menus/superfish/js/jquery.bgiframe.min.js. */
(function($){$.fn.bgIframe=$.fn.bgiframe=function(s){if($.browser.msie&&parseInt($.browser.version)<=6){s=$.extend({top:'auto',left:'auto',width:'auto',height:'auto',opacity:true,src:'javascript:false;'},s||{});var prop=function(n){return n&&n.constructor==Number?n+'px':n},html='<iframe class="bgiframe"frameborder="0"tabindex="-1"src="'+s.src+'"style="display:block;position:absolute;z-index:-1;'+(s.opacity!==false?'filter:Alpha(Opacity=\'0\');':'')+'top:'+(s.top=='auto'?'expression(((parseInt(this.parentNode.currentStyle.borderTopWidth)||0)*-1)+\'px\')':prop(s.top))+';left:'+(s.left=='auto'?'expression(((parseInt(this.parentNode.currentStyle.borderLeftWidth)||0)*-1)+\'px\')':prop(s.left))+';width:'+(s.width=='auto'?'expression(this.parentNode.offsetWidth+\'px\')':prop(s.width))+';height:'+(s.height=='auto'?'expression(this.parentNode.offsetHeight+\'px\')':prop(s.height))+';"/>';return this.each(function(){if($('> iframe.bgiframe',this).length==0)this.insertBefore(document.createElement(html),this.firstChild)})};return this};if(!$.browser.version)$.browser.version=navigator.userAgent.toLowerCase().match(/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/)[1]})(jQuery);
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/sites/all/modules/nice_menus/superfish/js/jquery.bgiframe.min.js. */
/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/sites/all/modules/nice_menus/superfish/js/jquery.hoverIntent.minified.js. */
(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY,track=function(ev){cX=ev.pageX;cY=ev.pageY},compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev])}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}},delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev])},handleHover=function(e){var p=(e.type=="mouseover"?e.fromElement:e.toElement)||e.relatedTarget;while(p&&p!=this)try{p=p.parentNode}catch(e){p=this};if(p==this)return false;var ev=jQuery.extend({},e),ob=this;if(ob.hoverIntent_t)ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if(e.type=="mouseover"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1)ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}else{$(ob).unbind("mousemove",track);if(ob.hoverIntent_s==1)ob.hoverIntent_t=setTimeout(function(){delay(ev,ob)},cfg.timeout)}};return this.mouseover(handleHover).mouseout(handleHover)}})(jQuery);
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/sites/all/modules/nice_menus/superfish/js/jquery.hoverIntent.minified.js. */
/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/sites/all/modules/nice_menus/nice_menus.js. */
(function($){$(document).ready(function(){$('ul.nice-menu').superfish({hoverClass:'over',autoArrows:false,dropShadows:false,delay:Drupal.settings.nice_menus_options.delay,speed:Drupal.settings.nice_menus_options.speed}).find('ul').bgIframe({opacity:false});$('ul.nice-menu ul').css('display','none')})})(jQuery);
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/sites/all/modules/nice_menus/nice_menus.js. */
/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/sites/all/modules/spamspan/spamspan.compressed.js. */
Drupal.behaviors.spamspan=function(_1){$("span."+Drupal.settings.spamspan.m,_1).each(function(_2){var _3=($("span."+Drupal.settings.spamspan.u,this).text()+"@"+$("span."+Drupal.settings.spamspan.d,this).text()).replace(/\s+/g,"").replace(/\[dot\]/g,"."),_4=$("span."+Drupal.settings.spamspan.h,this).text().replace(/^ ?\((.*)\) ?$/,"$1"),_5=$.map(_4.split(/, /),function(n,i){return(n.replace(/: /,"="))}),_6=$("span."+Drupal.settings.spamspan.t,this).text().replace(/^ \((.*)\)$/,"$1"),_7="mailto:"+encodeURIComponent(_3),_8=_5.join("&");_7+=_8?("?"+_8):"";$(this).after($("<a></a>").attr("href",_7).html(_6?_6:_3).addClass("spamspan")).remove()})};
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/sites/all/modules/spamspan/spamspan.compressed.js. */
/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/sites/all/modules/admin/includes/jquery.cookie.js. */
jQuery.cookie=function(name,value,options){if(typeof value!='undefined'){options=options||{};if(value===null){value='';options.expires=-1};var expires='';if(options.expires&&(typeof options.expires=='number'||options.expires.toUTCString)){var date;if(typeof options.expires=='number'){date=new Date();date.setTime(date.getTime()+(options.expires*24*60*60*1e3))}else date=options.expires;expires='; expires='+date.toUTCString()};var path=options.path?'; path='+options.path:'',domain=options.domain?'; domain='+options.domain:'',secure=options.secure?'; secure':'';document.cookie=[name,'=',encodeURIComponent(value),expires,path,domain,secure].join('')}else{var cookieValue=null;if(document.cookie&&document.cookie!=''){var cookies=document.cookie.split(';');for(var i=0;i<cookies.length;i++){var cookie=jQuery.trim(cookies[i]);if(cookie.substring(0,name.length+1)==(name+'=')){cookieValue=decodeURIComponent(cookie.substring(name.length+1));break}}};return cookieValue}};
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/sites/all/modules/admin/includes/jquery.cookie.js. */
/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/sites/all/modules/admin/includes/jquery.drilldown.js. */
(function($){$.fn.drilldown=function(method,settings){var menu=this,activePath,rootTitle=settings.rootTitle||'Home';switch(method){case'goTo':if(this.activePath&&this.activePath===$(settings.activeLink).attr('href'))return false;return true;case'setActive':var breadcrumb=[],activeMenu;$(settings.activeLink).each(function(){$(this).parents('ul.menu').each(function(){if($(this).parents('ul.menu').size()>0){$(this).siblings('a').each(function(){breadcrumb.unshift($(this))})}else if($(this).children('li').size()>1){var root;if($(this).siblings('a.drilldown-root').size()>0){root=$(this).siblings('a.drilldown-root')}else{root=$('<a href="#" class="drilldown-root" style="display:none">'+rootTitle+'</a>');$(this).before(root)};breadcrumb.unshift(root)}});if($(this).next().is('ul.menu')){activeMenu=$(this).next();breadcrumb.push($(this))}else activeMenu=$(this).parents('ul.menu').eq(0);if(activeMenu){$('.drilldown-active-trail',menu).removeClass('drilldown-active-trail');$('ul.menu',menu).removeClass('drilldown-active-menu').removeClass('clear-block');$(activeMenu).addClass('drilldown-active-menu').addClass('clear-block').parents('li').addClass('drilldown-active-trail').show()}});if(breadcrumb.length>0){var trail=$(settings.trail);trail.empty();for(var key in breadcrumb)if(breadcrumb[key]){var clone=$('<a></a>').attr('href',$(breadcrumb[key]).attr('href')).attr('class',$(breadcrumb[key]).attr('class')).html($(breadcrumb[key]).html()).addClass('depth-'+key).appendTo(trail);$('a.depth-'+key,trail).data('original',$(breadcrumb[key])).click(function(){settings.activeLink=$(this).data('original');if(settings.activeLink.siblings('ul.drilldown-active-menu').size()===0){menu.drilldown('setActive',settings);return false};return menu.drilldown('goTo',settings)})}};$(menu).trigger('refresh.drilldown');break;case'init':if($('ul.menu ul.menu',menu).size()>0){$(menu).addClass('drilldown');$(settings.trail).addClass('drilldown-trail');var activeLink;$('ul.menu a',menu).removeClass('active');if(settings.activePath&&$('ul.menu a[href='+settings.activePath+']',menu).size()>0){this.activePath=settings.activePath;activeLink=$('ul.menu a[href='+settings.activePath+']',menu).addClass('active')};if(!activeLink)activeLink=$('ul.menu a.active',menu).size()?$('ul.menu a.active',menu):$('ul.menu > li > a',menu);if(activeLink)menu.drilldown('setActive',{activeLink:$(activeLink[0]),trail:settings.trail,rootTitle:rootTitle});$('ul.menu li:has(ul.menu)',this).click(function(){if($(this).parent().is('.drilldown-active-menu'))if(menu.data('disableMenu')){return true}else{var url=$(this).children('a').attr('href'),activeLink=$('ul.menu a[href='+url+']',menu);menu.drilldown('setActive',{activeLink:activeLink,trail:settings.trail,rootTitle:rootTitle});return false}});$('ul.menu li:has(ul.menu) a',menu).click(function(){menu.data('disableMenu',true)})};break};return this}})(jQuery);
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/sites/all/modules/admin/includes/jquery.drilldown.js. */
/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/sites/all/modules/admin/includes/admin.toolbar.js. */
Drupal.behaviors.adminToolbar=function(context){$('#admin-toolbar:not(.processed)').each(function(){var toolbar=$(this);toolbar.addClass('processed');Drupal.adminToolbar.init(toolbar);$('.admin-toggle',this).click(function(){Drupal.adminToolbar.toggle(toolbar)});$('div.admin-tab',this).click(function(){Drupal.adminToolbar.tab(toolbar,$(this),true)})});$('div.admin-panes:not(.processed)').each(function(){var panes=$(this);panes.addClass('processed');$('h2.admin-pane-title a').click(function(){var target=$(this).attr('href').split('#')[1],panes=$(this).parents('div.admin-panes')[0];$('.admin-pane-active',panes).removeClass('admin-pane-active');$('div.admin-pane.'+target,panes).addClass('admin-pane-active');$(this).addClass('admin-pane-active');return false})})};Drupal.adminToolbar={};Drupal.adminToolbar.init=function(toolbar){if(!$(document.body).hasClass('admin-ah')){var expanded=this.getState('expanded');if(expanded==1)$(document.body).addClass('admin-expanded')};var target=this.getState('activeTab');if(target)if($('div.admin-tab.'+target).size()>0){var tab=$('div.admin-tab.'+target);this.tab(toolbar,tab,false)};var classes=toolbar.attr('class').split(' ');if(classes[0]==='nw'||classes[0]==='ne'||classes[0]==='se'||classes[0]==='sw')$(document.body).addClass('admin-'+classes[0]);if(classes[1]==='horizontal'||classes[1]==='vertical')$(document.body).addClass('admin-'+classes[1]);if(classes[2]==='df'||classes[2]==='ah')$(document.body).addClass('admin-'+classes[2])};Drupal.adminToolbar.tab=function(toolbar,tab,animate){if(!tab.is('.admin-tab-active')){var target=$('span',tab).attr('id').split('admin-tab-')[1];if(toolbar.is('.vertical')&&animate){$('.admin-tab-active',toolbar).fadeOut('fast');$(tab).fadeOut('fast',function(){$('.admin-tab-active',toolbar).fadeIn('fast').removeClass('admin-tab-active');$(tab).slideDown('fast').addClass('admin-tab-active');Drupal.adminToolbar.setState('activeTab',target)})}else{$('div.admin-tab',toolbar).removeClass('admin-tab-active');$(tab,toolbar).addClass('admin-tab-active');Drupal.adminToolbar.setState('activeTab',target)};$('div.admin-block.admin-active',toolbar).removeClass('admin-active');$('#block-'+target,toolbar).addClass('admin-active')};return false};Drupal.adminToolbar.toggle=function(toolbar){if($(document.body).is('.admin-expanded')){if($(toolbar).is('.vertical')){$('div.admin-blocks',toolbar).animate({width:'0px'},'fast',function(){$(this).css('display','none')});if($(toolbar).is('.nw')||$(toolbar).is('sw')){$(document.body).animate({marginLeft:'0px'},'fast',function(){$(this).toggleClass('admin-expanded')})}else $(document.body).animate({marginRight:'0px'},'fast',function(){$(this).toggleClass('admin-expanded')})}else{$('div.admin-blocks',toolbar).animate({height:'0px'},'fast');if($(toolbar).is('.nw')||$(toolbar).is('ne')){$(document.body).animate({marginTop:'0px'},'fast',function(){$(this).toggleClass('admin-expanded')})}else $(document.body).animate({marginBottom:'0px'},'fast',function(){$(this).toggleClass('admin-expanded')})};this.setState('expanded',0)}else{if($(toolbar).is('.vertical')){$('div.admin-blocks',toolbar).animate({width:'260px'},'fast');if($(toolbar).is('.nw')||$(toolbar).is('sw')){$(document.body).animate({marginLeft:'260px'},'fast',function(){$(this).toggleClass('admin-expanded')})}else $(document.body).animate({marginRight:'260px'},'fast',function(){$(this).toggleClass('admin-expanded')})}else{$('div.admin-blocks',toolbar).animate({height:'260px'},'fast');if($(toolbar).is('.nw')||$(toolbar).is('ne')){$(document.body).animate({marginTop:'260px'},'fast',function(){$(this).toggleClass('admin-expanded')})}else $(document.body).animate({marginBottom:'260px'},'fast',function(){$(this).toggleClass('admin-expanded')})};if($(document.body).hasClass('admin-ah')){this.setState('expanded',0)}else this.setState('expanded',1)}};Drupal.adminToolbar.getState=function(key){if(!Drupal.adminToolbar.state){Drupal.adminToolbar.state={};var cookie=$.cookie('DrupalAdminToolbar'),query=cookie?cookie.split('&'):[];if(query)for(var i in query)if(typeof(query[i])=='string'&&query[i].indexOf('=')!=-1){var values=query[i].split('=');if(values.length===2)Drupal.adminToolbar.state[values[0]]=values[1]}};return Drupal.adminToolbar.state[key]?Drupal.adminToolbar.state[key]:false};Drupal.adminToolbar.setState=function(key,value){var existing=Drupal.adminToolbar.getState(key);if(existing!=value){Drupal.adminToolbar.state[key]=value;var query=[];for(var i in Drupal.adminToolbar.state)query.push(i+'='+Drupal.adminToolbar.state[i]);$.cookie('DrupalAdminToolbar',query.join('&'),{expires:7,path:'/'})}};
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/sites/all/modules/admin/includes/admin.toolbar.js. */
/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/sites/all/modules/admin/includes/admin.menu.js. */
Drupal.behaviors.adminToolbarMenu=function(context){if(jQuery().drilldown)$('#admin-toolbar div.admin-block:has(ul.menu):not(.admin-toolbar-menu)').addClass('admin-toolbar-menu').each(function(){var menu=$(this),trail='#admin-toolbar div.admin-tab.'+$(this).attr('id').split('block-')[1]+' span',rootTitle=$(trail).text();if($('a:has(span.menu-description)',menu).size()>0){menu.addClass('admin-toolbar-menu-hover');$('a:has(span.menu-description)',menu).hover(function(){$('<a></a>').attr('class',$(this).attr('class')).addClass('menu-hover').append($('span.menu-description',this).clone()).appendTo(menu).show()},function(){$(menu).children('a.menu-hover').remove()})};menu.bind('refresh.drilldown',function(){$(trail+' a').unbind('click').click(function(){if($(this).parents('div.admin-tab').is('.admin-tab-active')){var settings={activeLink:$(this).data('original'),trail:trail};if(settings.activeLink.siblings('ul.drilldown-active-menu').size()===0){menu.drilldown('setActive',settings);return false};return menu.drilldown('goTo',settings)};$(this).parents('div.admin-tab').click();return false})});menu.drilldown('init',{activePath:Drupal.settings.activePath,trail:trail,rootTitle:rootTitle})})};
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/sites/all/modules/admin/includes/admin.menu.js. */
/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/misc/autocomplete.js. */
Drupal.behaviors.autocomplete=function(context){var acdb=[];$('input.autocomplete:not(.autocomplete-processed)',context).each(function(){var uri=this.value;if(!acdb[uri])acdb[uri]=new Drupal.ACDB(uri);var input=$('#'+this.id.substr(0,this.id.length-13)).attr('autocomplete','OFF')[0];$(input.form).submit(Drupal.autocompleteSubmit);new Drupal.jsAC(input,acdb[uri]);$(this).addClass('autocomplete-processed')})};Drupal.autocompleteSubmit=function(){return $('#autocomplete').each(function(){this.owner.hidePopup()}).size()==0};Drupal.jsAC=function(input,db){var ac=this;this.input=input;this.db=db;$(this.input).keydown(function(event){return ac.onkeydown(this,event)}).keyup(function(event){ac.onkeyup(this,event)}).blur(function(){ac.hidePopup();ac.db.cancel()})};Drupal.jsAC.prototype.onkeydown=function(input,e){if(!e)e=window.event;switch(e.keyCode){case 40:this.selectDown();return false;case 38:this.selectUp();return false;default:return true}};Drupal.jsAC.prototype.onkeyup=function(input,e){if(!e)e=window.event;switch(e.keyCode){case 16:case 17:case 18:case 20:case 33:case 34:case 35:case 36:case 37:case 38:case 39:case 40:return true;case 9:case 13:case 27:this.hidePopup(e.keyCode);return true;default:if(input.value.length>0){this.populatePopup()}else this.hidePopup(e.keyCode);return true}};Drupal.jsAC.prototype.select=function(node){this.input.value=node.autocompleteValue};Drupal.jsAC.prototype.selectDown=function(){if(this.selected&&this.selected.nextSibling){this.highlight(this.selected.nextSibling)}else{var lis=$('li',this.popup);if(lis.size()>0)this.highlight(lis.get(0))}};Drupal.jsAC.prototype.selectUp=function(){if(this.selected&&this.selected.previousSibling)this.highlight(this.selected.previousSibling)};Drupal.jsAC.prototype.highlight=function(node){if(this.selected)$(this.selected).removeClass('selected');$(node).addClass('selected');this.selected=node};Drupal.jsAC.prototype.unhighlight=function(node){$(node).removeClass('selected');this.selected=false};Drupal.jsAC.prototype.hidePopup=function(keycode){if(this.selected&&((keycode&&keycode!=46&&keycode!=8&&keycode!=27)||!keycode))this.input.value=this.selected.autocompleteValue;var popup=this.popup;if(popup){this.popup=null;$(popup).fadeOut('fast',function(){$(popup).remove()})};this.selected=false};Drupal.jsAC.prototype.populatePopup=function(){if(this.popup)$(this.popup).remove();this.selected=false;this.popup=document.createElement('div');this.popup.id='autocomplete';this.popup.owner=this;$(this.popup).css({marginTop:this.input.offsetHeight+'px',width:(this.input.offsetWidth-4)+'px',display:'none'});$(this.input).before(this.popup);this.db.owner=this;this.db.search(this.input.value)};Drupal.jsAC.prototype.found=function(matches){if(!this.input.value.length)return false;var ul=document.createElement('ul'),ac=this;for(key in matches){var li=document.createElement('li');$(li).html('<div>'+matches[key]+'</div>').mousedown(function(){ac.select(this)}).mouseover(function(){ac.highlight(this)}).mouseout(function(){ac.unhighlight(this)});li.autocompleteValue=key;$(ul).append(li)};if(this.popup)if(ul.childNodes.length>0){$(this.popup).empty().append(ul).show()}else{$(this.popup).css({visibility:'hidden'});this.hidePopup()}};Drupal.jsAC.prototype.setStatus=function(status){switch(status){case'begin':$(this.input).addClass('throbbing');break;case'cancel':case'error':case'found':$(this.input).removeClass('throbbing');break}};Drupal.ACDB=function(uri){this.uri=uri;this.delay=300;this.cache={}};Drupal.ACDB.prototype.search=function(searchString){var db=this;this.searchString=searchString;if(this.cache[searchString])return this.owner.found(this.cache[searchString]);if(this.timer)clearTimeout(this.timer);this.timer=setTimeout(function(){db.owner.setStatus('begin');$.ajax({type:"GET",url:db.uri+'/'+Drupal.encodeURIComponent(searchString),dataType:'json',success:function(matches){if(typeof matches.status=='undefined'||matches.status!=0){db.cache[searchString]=matches;if(db.searchString==searchString)db.owner.found(matches);db.owner.setStatus('found')}},error:function(xmlhttp){alert(Drupal.ahahError(xmlhttp,db.uri))}})},this.delay)};Drupal.ACDB.prototype.cancel=function(){if(this.owner)this.owner.setStatus('cancel');if(this.timer)clearTimeout(this.timer);this.searchString=''};
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/misc/autocomplete.js. */
