/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/fr/misc/drupal.js. */
(function(){var jquery_init=jQuery.fn.init;jQuery.fn.init=function(selector,context,rootjQuery){if(selector&&typeof selector==='string'){var hash_position=selector.indexOf('#');if(hash_position>=0){var bracket_position=selector.indexOf('<');if(bracket_position>hash_position)throw'Syntax error, unrecognized expression: '+selector}};return jquery_init.call(this,selector,context,rootjQuery)};jQuery.fn.init.prototype=jquery_init.prototype})();var Drupal=Drupal||{settings:{},behaviors:{},themes:{},locale:{}};Drupal.jsEnabled=document.getElementsByTagName&&document.createElement&&document.createTextNode&&document.documentElement&&document.getElementById;Drupal.attachBehaviors=function(context){context=context||document;if(Drupal.jsEnabled)jQuery.each(Drupal.behaviors,function(){this(context)})};Drupal.checkPlain=function(str){str=String(str);var replace={'&':'&amp;','"':'&quot;','<':'&lt;','>':'&gt;'};for(var character in replace){var regex=new RegExp(character,'g');str=str.replace(regex,replace[character])};return str};Drupal.t=function(str,args){if(Drupal.locale.strings&&Drupal.locale.strings[str])str=Drupal.locale.strings[str];if(args)for(var key in args){switch(key.charAt(0)){case'@':args[key]=Drupal.checkPlain(args[key]);break;case'!':break;case'%':default:args[key]=Drupal.theme('placeholder',args[key]);break};str=str.replace(key,args[key])};return str};Drupal.formatPlural=function(count,singular,plural,args){var args=args||{};args['@count']=count;var index=Drupal.locale.pluralFormula?Drupal.locale.pluralFormula(args['@count']):((args['@count']==1)?0:1);if(index==0){return Drupal.t(singular,args)}else if(index==1){return Drupal.t(plural,args)}else{args['@count['+index+']']=args['@count'];delete args['@count'];return Drupal.t(plural.replace('@count','@count['+index+']'),args)}};Drupal.theme=function(func){for(var i=1,args=[];i<arguments.length;i++)args.push(arguments[i]);return(Drupal.theme[func]||Drupal.theme.prototype[func]).apply(this,args)};Drupal.parseJson=function(data){if((data.substring(0,1)!='{')&&(data.substring(0,1)!='['))return{status:0,data:data.length?data:Drupal.t('Unspecified error')};return eval('('+data+');')};Drupal.freezeHeight=function(){Drupal.unfreezeHeight();var div=document.createElement('div');$(div).css({position:'absolute',top:'0px',left:'0px',width:'1px',height:$('body').css('height')}).attr('id','freeze-height');$('body').append(div)};Drupal.unfreezeHeight=function(){$('#freeze-height').remove()};Drupal.encodeURIComponent=function(item,uri){uri=uri||location.href;item=encodeURIComponent(item).replace(/%2F/g,'/');return(uri.indexOf('?q=')!=-1)?item:item.replace(/%26/g,'%2526').replace(/%23/g,'%2523').replace(/\/\//g,'/%252F')};Drupal.getSelection=function(element){if(typeof(element.selectionStart)!='number'&&document.selection){var range1=document.selection.createRange(),range2=range1.duplicate();range2.moveToElementText(element);range2.setEndPoint('EndToEnd',range1);var start=range2.text.length-range1.text.length,end=start+range1.text.length;return{start:start,end:end}};return{start:element.selectionStart,end:element.selectionEnd}};Drupal.ahahError=function(xmlhttp,uri){if(xmlhttp.status==200){if(jQuery.trim($(xmlhttp.responseText).text())){var message=Drupal.t("An error occurred. \n@uri\n@text",{'@uri':uri,'@text':xmlhttp.responseText})}else var message=Drupal.t("An error occurred. \n@uri\n(no information available).",{'@uri':uri,'@text':xmlhttp.responseText})}else var message=Drupal.t("An HTTP error @status occurred. \n@uri",{'@uri':uri,'@status':xmlhttp.status});return message};if(Drupal.jsEnabled){$(document.documentElement).addClass('js');document.cookie='has_js=1; path=/';$(document).ready(function(){Drupal.attachBehaviors(this)})};Drupal.theme.prototype={placeholder:function(str){return'<em>'+Drupal.checkPlain(str)+'</em>'}};
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/fr/misc/drupal.js. */
/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/fr/sites/default/files/languages/fr_dac4a2980b43c0a40faf0c59e2895c55.js. */
Drupal.locale={pluralFormula:function($n){return Number(($n>1))},strings:{Save:"Enregistrer",Edit:"Modifier","Not published":"Non publi\\303\\251","Save and send":"Enregistrer et envoyer","Save and send test":"Enregistrer et envoyer le test","Automatic alias":"Alias automatique",Close:"Fermer",Anonymous:"Anonyme","An error occurred at ":"Une erreur s\'est produite \\303\\240","jQuery UI Tabs: Mismatching fragment identifier.":"Onglets jQuery UI : identifiant de fragment ne correspondant pas.","jQuery UI Tabs: Not enough arguments to add tab.":"Onglets jQuery UI : pas assez d\'arguments pour ajouter l\'onglet.",ID:"Identifiant (ID)",Upload:"Transfert de fichiers","Select all rows in this table":"S\\303\\251lectionner toutes les lignes du tableau","Deselect all rows in this table":"D\\303\\251s\\303\\251lectionner toutes les lignes du tableau","1 attachment":"@count fichier attach\\303\\251","@count attachments":"@count fichiers attach\\303\\251s","Only files with the following extensions are allowed: %files-allowed.":"Seuls les fichiers se terminant par les extensions suivantes sont autoris\\303\\251s\\302\\240: %files-allowed.","Drag to re-order":"Cliquer-d\\303\\251poser pour r\\303\\251-organiser","Changes made in this table will not be saved until the form is submitted.":"Les changements effectu\\303\\251s dans ce tableau ne seront pris en compte que lorsque la configuration aura \\303\\251t\\303\\251 enregistr\\303\\251e.","Your server has been successfully tested to support this feature.":"Le test a r\\303\\251ussi. Votre serveur supporte cette fonctionnalit\\303\\251.","Your system configuration does not currently support this feature. The \x3ca href=\"http://drupal.org/node/15365\"\x3ehandbook page on Clean URLs\x3c/a\x3e has additional troubleshooting information.":"La configuration de votre syst\\303\\250me ne supporte pas cette fonctionnalit\\303\\251. La \x3ca href=\"http://drupal.org/node/15365\"\x3epage du manuel sur les URLs simplifi\\303\\251es\x3c/a\x3e apporte une aide suppl\\303\\251mentaire.","Testing clean URLs...":"Test des URLs simplifi\\303\\251es...","Unspecified error":"Erreur non sp\\303\\251cifi\\303\\251e","The changes to these blocks will not be saved until the \x3cem\x3eSave blocks\x3c/em\x3e button is clicked.":"N\'oubliez pas de cliquer sur \x3cem\x3eEnregistrer les blocs\x3c/em\x3e pour confirmer les modifications apport\\303\\251es ici.",unlimited:"illimit\\303\\251","Loading...":"En cours de chargement...","Internal server error. Please see server or PHP logs for error information.":"Erreur interne du serveur. Consultez les logs du serveur ou les logs PHP pour plus d\'informations sur l\'erreur.","The selected file %filename cannot be uploaded. Only files with the following extensions are allowed: %extensions.":"Le fichier s\\303\\251lectionn\\303\\251 %filename ne peut pas \\303\\252tre transf\\303\\251r\\303\\251. Seulement les fichiers avec les extensions suivantes sont permis : %extensions.",Latitude:"Latitude",Longitude:"Longitude","Log messages":"Journaliser les messages","Please select a file.":"Veuillez s\\303\\251lectionner un fichier.","You are not allowed to operate on more than %num files.":"Vous n\'\\303\\252tes pas autoris\\303\\251(e) \\303\\240 effectuer des op\\303\\251rations sur plus de %num fichiers.","Please specify dimensions within the allowed range that is from 1x1 to @dimensions.":"Veuillez sp\\303\\251cifier des dimensions qui correspondent \\303\\240 la plage allou\\303\\251e, soit de 1x1 \\303\\240 @dimensions.","%filename is not an image.":"%filename n\'est pas une image.","File browsing is disabled in directory %dir.":"L\'exploration des fichiers est d\\303\\251sactiv\\303\\251e dans le r\\303\\251pertoire %dir.","Do you want to refresh the current directory?":"Souhaitez-vous rafra\\303\\256chir le r\\303\\251pertoire courant ?","Delete selected files?":"Voulez-vous vraiment supprimer les fichiers s\\303\\251lectionn\\303\\251s ?","Please select a thumbnail.":"Veuillez s\\303\\251lectionner une vignette.","You must select at least %num files.":"Vous devez s\\303\\251lectionner au moins %num fichier(s).","You can not perform this operation.":"Vous ne pouvez pas r\\303\\251aliser cette op\\303\\251ration.","Insert file":"Ins\\303\\251rer un fichier","Change view":"Changer la vue","Crop must be inside the image boundaries.":"Le recadrage doit se faire \\303\\240 l\'int\\303\\251rieur des limites de l\'image.",unknown:"inconnu","Insert this token into your form":"Ins\\303\\251rer ce jeton (\x3cem\x3etoken\x3c/em\x3e) dans votre formulaire","First click a text field to insert your tokens into.":"Cliquez d\'abord sur un champ de texte pour ins\\303\\251rer vos jetons (\x3cem\x3etokens\x3c/em\x3e) dans celui -ci.","\x3cnone\x3e":"--aucun--","Not in book":"Pas dans le livre","\x3ccreate a new book\x3e":"--cr\\303\\251er un nouveau livre--","New book":"Nouveau livre","By @name on @date":"Par @name le @date","By @name":"Par @name","Not in menu":"Pas dans le menu","No attachments":"Aucune pi\\303\\250ce jointe","Alias: @alias":"Alias : @alias","No alias":"Aucun alias","No terms":"Aucun terme","New revision":"Nouvelle r\\303\\251vision","No revision":"Aucune r\\303\\251vision","@number comments per page":"@number commentaires par page","Requires a title":"Titre obligatoire","No body":"Pas de corps","Not restricted":"Non restreint","Pause Slideshow":"Arr\\303\\252ter le diaporama","Play Slideshow":"D\\303\\251marrer le diaporama","Group node":"N\\305\\223ud de groupe","May not be posted into a group.":"Ne peut pas \\303\\252tre post\\303\\251 dans un groupe","Standard group post":"Contribution standard de groupe","Wiki group post":"Contribution wiki de groupe","Facebook and !site_name":"Facebook et !site_name","!site_name Only":"!site_name uniquement","Do you also want to logout from your Facebook account?":"Voulez-vous \\303\\251galement vous d\\303\\251connecter de Facebook ?","Move map":"Bouger la carte","Add/Edit Waste Point":"Ajouter/editer point pollue","Add new @type":"Ajouter nouveau @type","Edit existing @type":"Editer @type existant","Photo added. Thank you for your contribution to Waste Map!":"Photo ajout\\303\\251e. Merci pour votre contribution \\303\\240 la carte des d\\303\\251chets.","Upload geotagged photo":"Envoyer une photo geolocalisee","This photo is not geotagged, so please enter coordinates manually:":"Ce n\'est pas une photo g\\303\\251olocalis\\303\\251e. Merci d\'entrer les coordonn\\303\\251es manuellement.","Zoom in here":"Zoomer ici","Switch map type":"Changer le type de carte","To add a Waste Point, zoom in and click the exact location of the waste on map. Click \x3cem\x3eMove map\x3c/em\x3e if you want to move the map to correct location beforehand.":"Pour ajouter un point pollue, zoomez et clickez sur la position exacte du dechet sur la carte. Clickez sur \x3cem\x3eBouger la carte\x3c/em\x3e si vous voulez deplacer la carte vers la position correcte."}};
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/fr/sites/default/files/languages/fr_dac4a2980b43c0a40faf0c59e2895c55.js. */
/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/fr/sites/all/modules/nice_menus/superfish/js/superfish.js. */
(function($){$.fn.superfish=function(op){var sf=$.fn.superfish,c=sf.c,$arrow=$(['<span class="',c.arrowClass,'"> &#187;</span>'].join('')),over=function(){var $$=$(this),menu=getMenu($$);clearTimeout(menu.sfTimer);$$.showSuperfishUl().siblings().hideSuperfishUl()},out=function(){var $$=$(this),menu=getMenu($$),o=sf.op;clearTimeout(menu.sfTimer);menu.sfTimer=setTimeout(function(){o.retainPath=($.inArray($$[0],o.$path)>-1);$$.hideSuperfishUl();if(o.$path.length&&$$.parents(['li.',o.hoverClass].join('')).length<1)over.call(o.$path)},o.delay)},getMenu=function($menu){var menu=$menu.parents(['ul.',c.menuClass,':first'].join(''))[0];sf.op=sf.o[menu.serial];return menu},addArrow=function($a){$a.addClass(c.anchorClass).append($arrow.clone())};return this.each(function(){var s=this.serial=sf.o.length,o=$.extend({},sf.defaults,op);o.$path=$('li.'+o.pathClass,this).slice(0,o.pathLevels).each(function(){$(this).addClass([o.hoverClass,c.bcClass].join(' ')).filter('li:has(ul)').removeClass(o.pathClass)});sf.o[s]=sf.op=o;$('li:has(ul)',this)[($.fn.hoverIntent&&!o.disableHI)?'hoverIntent':'hover'](over,out).each(function(){if(o.autoArrows)addArrow($('>a:first-child',this))}).not('.'+c.bcClass).hideSuperfishUl();var $a=$('a',this);$a.each(function(i){var $li=$a.eq(i).parents('li');$a.eq(i).focus(function(){over.call($li)}).blur(function(){out.call($li)})});o.onInit.call(this)}).each(function(){var menuClasses=[c.menuClass];if(sf.op.dropShadows&&!($.browser.msie&&$.browser.version<7))menuClasses.push(c.shadowClass);$(this).addClass(menuClasses.join(' '))})};var sf=$.fn.superfish;sf.o=[];sf.op={};sf.IE7fix=function(){var o=sf.op;if($.browser.msie&&$.browser.version>6&&o.dropShadows&&o.animation.opacity!=undefined)this.toggleClass(sf.c.shadowClass+'-off')};sf.c={bcClass:'sf-breadcrumb',menuClass:'sf-js-enabled',anchorClass:'sf-with-ul',arrowClass:'sf-sub-indicator',shadowClass:'sf-shadow'};sf.defaults={hoverClass:'sfHover',pathClass:'overideThisToUse',pathLevels:1,delay:800,animation:{opacity:'show'},speed:'normal',autoArrows:true,dropShadows:true,disableHI:false,onInit:function(){},onBeforeShow:function(){},onShow:function(){},onHide:function(){}};$.fn.extend({hideSuperfishUl:function(){var o=sf.op,not=(o.retainPath===true)?o.$path:'';o.retainPath=false;var $ul=$(['li.',o.hoverClass].join(''),this).add(this).not(not).removeClass(o.hoverClass).find('>ul').hide().css('visibility','hidden');o.onHide.call($ul);return this},showSuperfishUl:function(){var o=sf.op,sh=sf.c.shadowClass+'-off',$ul=this.addClass(o.hoverClass).find('>ul:hidden').css('visibility','visible');sf.IE7fix.call($ul);o.onBeforeShow.call($ul);$ul.animate(o.animation,o.speed,function(){sf.IE7fix.call($ul);o.onShow.call($ul)});return this}})})(jQuery);
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/fr/sites/all/modules/nice_menus/superfish/js/superfish.js. */
/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/fr/sites/all/modules/nice_menus/superfish/js/jquery.bgiframe.min.js. */
(function($){$.fn.bgIframe=$.fn.bgiframe=function(s){if($.browser.msie&&parseInt($.browser.version)<=6){s=$.extend({top:'auto',left:'auto',width:'auto',height:'auto',opacity:true,src:'javascript:false;'},s||{});var prop=function(n){return n&&n.constructor==Number?n+'px':n},html='<iframe class="bgiframe"frameborder="0"tabindex="-1"src="'+s.src+'"style="display:block;position:absolute;z-index:-1;'+(s.opacity!==false?'filter:Alpha(Opacity=\'0\');':'')+'top:'+(s.top=='auto'?'expression(((parseInt(this.parentNode.currentStyle.borderTopWidth)||0)*-1)+\'px\')':prop(s.top))+';left:'+(s.left=='auto'?'expression(((parseInt(this.parentNode.currentStyle.borderLeftWidth)||0)*-1)+\'px\')':prop(s.left))+';width:'+(s.width=='auto'?'expression(this.parentNode.offsetWidth+\'px\')':prop(s.width))+';height:'+(s.height=='auto'?'expression(this.parentNode.offsetHeight+\'px\')':prop(s.height))+';"/>';return this.each(function(){if($('> iframe.bgiframe',this).length==0)this.insertBefore(document.createElement(html),this.firstChild)})};return this};if(!$.browser.version)$.browser.version=navigator.userAgent.toLowerCase().match(/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/)[1]})(jQuery);
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/fr/sites/all/modules/nice_menus/superfish/js/jquery.bgiframe.min.js. */
/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/fr/sites/all/modules/nice_menus/superfish/js/jquery.hoverIntent.minified.js. */
(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY,track=function(ev){cX=ev.pageX;cY=ev.pageY},compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev])}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}},delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev])},handleHover=function(e){var p=(e.type=="mouseover"?e.fromElement:e.toElement)||e.relatedTarget;while(p&&p!=this)try{p=p.parentNode}catch(e){p=this};if(p==this)return false;var ev=jQuery.extend({},e),ob=this;if(ob.hoverIntent_t)ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if(e.type=="mouseover"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1)ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}else{$(ob).unbind("mousemove",track);if(ob.hoverIntent_s==1)ob.hoverIntent_t=setTimeout(function(){delay(ev,ob)},cfg.timeout)}};return this.mouseover(handleHover).mouseout(handleHover)}})(jQuery);
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/fr/sites/all/modules/nice_menus/superfish/js/jquery.hoverIntent.minified.js. */
/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/fr/sites/all/modules/nice_menus/nice_menus.js. */
(function($){$(document).ready(function(){$('ul.nice-menu').superfish({hoverClass:'over',autoArrows:false,dropShadows:false,delay:Drupal.settings.nice_menus_options.delay,speed:Drupal.settings.nice_menus_options.speed}).find('ul').bgIframe({opacity:false});$('ul.nice-menu ul').css('display','none')})})(jQuery);
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/fr/sites/all/modules/nice_menus/nice_menus.js. */
/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/fr/sites/all/modules/spamspan/spamspan.compressed.js. */
Drupal.behaviors.spamspan=function(_1){$("span."+Drupal.settings.spamspan.m,_1).each(function(_2){var _3=($("span."+Drupal.settings.spamspan.u,this).text()+"@"+$("span."+Drupal.settings.spamspan.d,this).text()).replace(/\s+/g,"").replace(/\[dot\]/g,"."),_4=$("span."+Drupal.settings.spamspan.h,this).text().replace(/^ ?\((.*)\) ?$/,"$1"),_5=$.map(_4.split(/, /),function(n,i){return(n.replace(/: /,"="))}),_6=$("span."+Drupal.settings.spamspan.t,this).text().replace(/^ \((.*)\)$/,"$1"),_7="mailto:"+encodeURIComponent(_3),_8=_5.join("&");_7+=_8?("?"+_8):"";$(this).after($("<a></a>").attr("href",_7).html(_6?_6:_3).addClass("spamspan")).remove()})};
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/fr/sites/all/modules/spamspan/spamspan.compressed.js. */
/* Source and licensing information for the line(s) below can be found at http://www.letsdoitworld.org/fr/modules/user/user.js. */
Drupal.behaviors.password=function(context){var translate=Drupal.settings.password;$("input.password-field:not(.password-processed)",context).each(function(){var passwordInput=$(this).addClass('password-processed'),parent=$(this).parent(),monitorDelay=700;$(this).after('<span class="password-strength"><span class="password-title">'+translate.strengthTitle+'</span> <span class="password-result"></span></span>').parent();var passwordStrength=$("span.password-strength",parent),passwordResult=$("span.password-result",passwordStrength);parent.addClass("password-parent");var outerItem=$(this).parent().parent();$("input.password-confirm",outerItem).after('<span class="password-confirm">'+translate.confirmTitle+' <span></span></span>').parent().addClass("confirm-parent");var confirmInput=$("input.password-confirm",outerItem),confirmResult=$("span.password-confirm",outerItem),confirmChild=$("span",confirmResult);$(confirmInput).parent().after('<div class="password-description"></div>');var passwordDescription=$("div.password-description",$(this).parent().parent()).hide(),passwordCheck=function(){if(this.timer)clearTimeout(this.timer);if(!passwordInput.val()){passwordStrength.css({visibility:"hidden"});passwordDescription.hide();return};var result=Drupal.evaluatePasswordStrength(passwordInput.val());passwordResult.html(result.strength==""?"":translate[result.strength+"Strength"]);var classMap={low:"error",medium:"warning",high:"ok"},newClass=classMap[result.strength]||"";if(this.passwordClass){passwordResult.removeClass(this.passwordClass);passwordDescription.removeClass(this.passwordClass)};passwordDescription.html(result.message);passwordResult.addClass(newClass);if(result.strength=="high"){passwordDescription.hide()}else passwordDescription.addClass(newClass);this.passwordClass=newClass;confirmResult.css({visibility:(confirmInput.val()==""?"hidden":"visible")});var success=passwordInput.val()==confirmInput.val();if(this.confirmClass)confirmChild.removeClass(this.confirmClass);var confirmClass=success?"ok":"error";confirmChild.html(translate["confirm"+(success?"Success":"Failure")]).addClass(confirmClass);this.confirmClass=confirmClass;passwordStrength.css({visibility:"visible"});passwordDescription.show()},passwordDelayedCheck=function(){if(this.timer)clearTimeout(this.timer);if(!passwordInput.val()){passwordStrength.css({visibility:"hidden"});passwordDescription.hide();return};this.timer=setTimeout(passwordCheck,monitorDelay)};passwordInput.keyup(passwordDelayedCheck).blur(passwordCheck);confirmInput.keyup(passwordDelayedCheck).blur(passwordCheck)})};Drupal.evaluatePasswordStrength=function(value){var strength="",msg="",translate=Drupal.settings.password,hasLetters=value.match(/[a-zA-Z]+/),hasNumbers=value.match(/[0-9]+/),hasPunctuation=value.match(/[^a-zA-Z0-9]+/),hasCasing=value.match(/[a-z]+.*[A-Z]+|[A-Z]+.*[a-z]+/);if(!value.length){strength="";msg=""}else if(value.length<6){strength="low";msg=translate.tooShort}else if(value.toLowerCase()==translate.username.toLowerCase()){strength="low";msg=translate.sameAsUsername}else if(hasLetters&&hasNumbers&&hasPunctuation&&hasCasing){strength="high"}else{var count=(hasLetters?1:0)+(hasNumbers?1:0)+(hasPunctuation?1:0)+(hasCasing?1:0);strength=count>1?"medium":"low";msg=[];if(!hasLetters||!hasCasing)msg.push(translate.addLetters);if(!hasNumbers)msg.push(translate.addNumbers);if(!hasPunctuation)msg.push(translate.addPunctuation);msg=translate.needsMoreVariation+"<ul><li>"+msg.join("</li><li>")+"</li></ul>"};return{strength:strength,message:msg}};Drupal.setDefaultTimezone=function(){var offset=new Date().getTimezoneOffset()*-60;$("#edit-date-default-timezone, #edit-user-register-timezone").val(offset)};Drupal.behaviors.userSettings=function(context){$('div.user-admin-picture-radios input[type=radio]:not(.userSettings-processed)',context).addClass('userSettings-processed').click(function(){$('div.user-admin-picture-settings',context)[['hide','show'][this.value]]()})};
/* Source and licensing information for the above line(s) can be found at http://www.letsdoitworld.org/fr/modules/user/user.js. */