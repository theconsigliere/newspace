"use strict";function _typeof(e){return(_typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}
/*! modernizr 3.6.0 (Custom Build) | MIT *
* Added 2018-04-17
* https://modernizr.com/download/?-appearance-audio-backgroundblendmode-backgroundcliptext-backgroundsize-bgpositionshorthand-bgpositionxy-bgrepeatspace_bgrepeatround-bgsizecover-borderimage-borderradius-boxshadow-boxsizing-canvas-checked-contextmenu-cookies-cors-cssanimations-csscalc-csschunit-csscolumns-cssexunit-cssfilters-cssgradients-cssgrid_cssgridlegacy-csshyphens_softhyphens_softhyphensfind-cssinvalid-cssmask-csspointerevents-csspositionsticky-cssremunit-cssscrollbar-csstransforms-csstransforms3d-csstransformslevel2-csstransitions-cssvalid-cssvhunit-cssvmaxunit-cssvminunit-cssvwunit-cubicbezierrange-datalistelem-details-displaytable-eventlistener-flexbox-fontface-geolocation-htmlimports-ie8compat-inlinesvg-input-inputtypes-json-lastchild-ligatures-localstorage-mediaqueries-multiplebgs-nthchild-objectfit-opacity-overflowscrolling-picture-preserve3d-queryselector-rgba-scriptasync-scriptdefer-sessionstorage-siblinggeneral-sizes-srcset-subpixelfont-supports-svg-svgfilters-target-textalignlast-textshadow-unicode-unknownelements-variablefonts-video-videocrossorigin-wrapflow-setclasses !*/!function(e,t,n){function i(e,t){return _typeof(e)===t}function r(e){var t=k.className,n=x._config.classPrefix||"";if(C&&(t=t.baseVal),x._config.enableJSClass){var i=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");t=t.replace(i,"$1"+n+"js$2")}x._config.enableClasses&&(t+=" "+n+e.join(" "+n),C?k.className.baseVal=t:k.className=t)}function o(){return"function"!=typeof t.createElement?t.createElement(arguments[0]):C?t.createElementNS.call(t,"http://www.w3.org/2000/svg",arguments[0]):t.createElement.apply(t,arguments)}function a(t,n,i){var r;if("getComputedStyle"in e){r=getComputedStyle.call(e,t,n);var o=e.console;if(null!==r)i&&(r=r.getPropertyValue(i));else if(o){o[o.error?"error":"log"].call(o,"getComputedStyle returning null, its possible modernizr test results are inaccurate")}}else r=!n&&t.currentStyle&&t.currentStyle[i];return r}function s(e,t){return e-1===t||e===t||e+1===t}function d(e,t){if("object"==_typeof(e))for(var n in e)_(e,n)&&d(n,e[n]);else{var i=(e=e.toLowerCase()).split("."),o=x[i[0]];if(2==i.length&&(o=o[i[1]]),void 0!==o)return x;t="function"==typeof t?t():t,1==i.length?x[i[0]]=t:(!x[i[0]]||x[i[0]]instanceof Boolean||(x[i[0]]=new Boolean(x[i[0]])),x[i[0]][i[1]]=t),r([(t&&0!=t?"":"no-")+i.join("-")]),x._trigger(e,t)}return x}function l(e){return e.replace(/([a-z])-([a-z])/g,(function(e,t,n){return t+n.toUpperCase()})).replace(/^-/,"")}function c(e,n,i,r){var a,s,d,l,c="modernizr",u=o("div"),p=function(){var e=t.body;return e||((e=o(C?"svg":"body")).fake=!0),e}();if(parseInt(i,10))for(;i--;)(d=o("div")).id=r?r[i]:c+(i+1),u.appendChild(d);return(a=o("style")).type="text/css",a.id="s"+c,(p.fake?p:u).appendChild(a),p.appendChild(u),a.styleSheet?a.styleSheet.cssText=e:a.appendChild(t.createTextNode(e)),u.id=c,p.fake&&(p.style.background="",p.style.overflow="hidden",l=k.style.overflow,k.style.overflow="hidden",k.appendChild(p)),s=n(u,e),p.fake?(p.parentNode.removeChild(p),k.style.overflow=l,k.offsetHeight):u.parentNode.removeChild(u),!!s}function u(e,t){return!!~(""+e).indexOf(t)}function p(e,t){return function(){return e.apply(t,arguments)}}function f(e){return e.replace(/([A-Z])/g,(function(e,t){return"-"+t.toLowerCase()})).replace(/^ms-/,"-ms-")}function h(t,i){var r=t.length;if("CSS"in e&&"supports"in e.CSS){for(;r--;)if(e.CSS.supports(f(t[r]),i))return!0;return!1}if("CSSSupportsRule"in e){for(var o=[];r--;)o.push("("+f(t[r])+":"+i+")");return c("@supports ("+(o=o.join(" or "))+") { #modernizr { position: absolute; } }",(function(e){return"absolute"==a(e,null,"position")}))}return n}function m(e,t,r,a){function s(){c&&(delete j.style,delete j.modElem)}if(a=!i(a,"undefined")&&a,!i(r,"undefined")){var d=h(e,r);if(!i(d,"undefined"))return d}for(var c,p,f,m,g,y=["modernizr","tspan","samp"];!j.style&&y.length;)c=!0,j.modElem=o(y.shift()),j.style=j.modElem.style;for(f=e.length,p=0;f>p;p++)if(m=e[p],g=j.style[m],u(m,"-")&&(m=l(m)),j.style[m]!==n){if(a||i(r,"undefined"))return s(),"pfx"!=t||m;try{j.style[m]=r}catch(e){}if(j.style[m]!=g)return s(),"pfx"!=t||m}return s(),!1}function g(e,t,n,r,o){var a=e.charAt(0).toUpperCase()+e.slice(1),s=(e+" "+O.join(a+" ")+a).split(" ");return i(t,"string")||i(t,"undefined")?m(s,t,r,o):function(e,t,n){var r;for(var o in e)if(e[o]in t)return!1===n?e[o]:i(r=t[e[o]],"function")?p(r,n||t):r;return!1}(s=(e+" "+I.join(a+" ")+a).split(" "),t,n)}function y(e,t,i){return g(e,n,n,t,i)}var b=[],v=[],T={_version:"3.6.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,t){var n=this;setTimeout((function(){t(n[e])}),0)},addTest:function(e,t,n){v.push({name:e,fn:t,options:n})},addAsyncTest:function(e){v.push({name:null,fn:e})}},x=function(){};x.prototype=T,(x=new x).addTest("cookies",(function(){try{t.cookie="cookietest=1";var e=-1!=t.cookie.indexOf("cookietest=");return t.cookie="cookietest=1; expires=Thu, 01-Jan-1970 00:00:01 GMT",e}catch(e){return!1}})),x.addTest("cors","XMLHttpRequest"in e&&"withCredentials"in new XMLHttpRequest),x.addTest("eventlistener","addEventListener"in e),x.addTest("geolocation","geolocation"in navigator),x.addTest("ie8compat",!e.addEventListener&&!!t.documentMode&&7===t.documentMode),x.addTest("json","JSON"in e&&"parse"in JSON&&"stringify"in JSON),x.addTest("queryselector","querySelector"in t&&"querySelectorAll"in t),x.addTest("svg",!!t.createElementNS&&!!t.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect);var w="CSS"in e&&"supports"in e.CSS,A="supportsCSS"in e;x.addTest("supports",w||A),x.addTest("target",(function(){var t=e.document;if(!("querySelectorAll"in t))return!1;try{return t.querySelectorAll(":target"),!0}catch(e){return!1}})),x.addTest("picture","HTMLPictureElement"in e),x.addTest("localstorage",(function(){var e="modernizr";try{return localStorage.setItem(e,e),localStorage.removeItem(e),!0}catch(e){return!1}})),x.addTest("sessionstorage",(function(){var e="modernizr";try{return sessionStorage.setItem(e,e),sessionStorage.removeItem(e),!0}catch(e){return!1}})),x.addTest("svgfilters",(function(){var t=!1;try{t="SVGFEColorMatrixElement"in e&&2==SVGFEColorMatrixElement.SVG_FECOLORMATRIX_TYPE_SATURATE}catch(e){}return t}));var k=t.documentElement;x.addTest("contextmenu","contextMenu"in k&&"HTMLMenuItemElement"in e);var C="svg"===k.nodeName.toLowerCase();x.addTest("audio",(function(){var e=o("audio"),t=!1;try{(t=!!e.canPlayType)&&((t=new Boolean(t)).ogg=e.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,""),t.mp3=e.canPlayType('audio/mpeg; codecs="mp3"').replace(/^no$/,""),t.opus=e.canPlayType('audio/ogg; codecs="opus"')||e.canPlayType('audio/webm; codecs="opus"').replace(/^no$/,""),t.wav=e.canPlayType('audio/wav; codecs="1"').replace(/^no$/,""),t.m4a=(e.canPlayType("audio/x-m4a;")||e.canPlayType("audio/aac;")).replace(/^no$/,""))}catch(e){}return t})),x.addTest("canvas",(function(){var e=o("canvas");return!(!e.getContext||!e.getContext("2d"))})),x.addTest("video",(function(){var e=o("video"),t=!1;try{(t=!!e.canPlayType)&&((t=new Boolean(t)).ogg=e.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),t.h264=e.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),t.webm=e.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,""),t.vp9=e.canPlayType('video/webm; codecs="vp9"').replace(/^no$/,""),t.hls=e.canPlayType('application/x-mpegURL; codecs="avc1.42E01E"').replace(/^no$/,""))}catch(e){}return t})),x.addTest("bgpositionshorthand",(function(){var e=o("a").style,t="right 10px bottom 10px";return e.cssText="background-position: "+t+";",e.backgroundPosition===t})),x.addTest("multiplebgs",(function(){var e=o("a").style;return e.cssText="background:url(https://),url(https://),red url(https://)",/(url\s*\(.*?){3}/.test(e.background)})),x.addTest("csspointerevents",(function(){var e=o("a").style;return e.cssText="pointer-events:auto","auto"===e.pointerEvents})),x.addTest("cssremunit",(function(){var e=o("a").style;try{e.fontSize="3rem"}catch(e){}return/rem/.test(e.fontSize)})),x.addTest("rgba",(function(){var e=o("a").style;return e.cssText="background-color:rgba(150,255,150,.5)",(""+e.backgroundColor).indexOf("rgba")>-1})),x.addTest("preserve3d",(function(){var t,n,i=e.CSS,r=!1;return!!(i&&i.supports&&i.supports("(transform-style: preserve-3d)"))||(t=o("a"),n=o("a"),t.style.cssText="display: block; transform-style: preserve-3d; transform-origin: right; transform: rotateY(40deg);",n.style.cssText="display: block; width: 9px; height: 1px; background: #000; transform-origin: right; transform: rotateY(40deg);",t.appendChild(n),k.appendChild(t),r=n.getBoundingClientRect(),k.removeChild(t),r=r.width&&r.width<4)})),x.addTest("unknownelements",(function(){var e=o("a");return e.innerHTML="<xyz></xyz>",1===e.childNodes.length})),x.addTest("srcset","srcset"in o("img")),x.addTest("scriptasync","async"in o("script")),x.addTest("scriptdefer","defer"in o("script")),x.addTest("videocrossorigin","crossOrigin"in o("video")),x.addTest("inlinesvg",(function(){var e=o("div");return e.innerHTML="<svg/>","http://www.w3.org/2000/svg"==("undefined"!=typeof SVGRect&&e.firstChild&&e.firstChild.namespaceURI)}));var S=o("input"),z="autocomplete autofocus list placeholder max min multiple pattern required step".split(" "),E={};x.input=function(t){for(var n=0,i=t.length;i>n;n++)E[t[n]]=!!(t[n]in S);return E.list&&(E.list=!(!o("datalist")||!e.HTMLDataListElement)),E}(z),x.addTest("datalistelem",x.input.list);var P="search tel url email datetime date month week time datetime-local number range color".split(" "),L={};x.inputtypes=function(e){for(var i,r,o,a=e.length,s=0;a>s;s++)S.setAttribute("type",i=e[s]),(o="text"!==S.type&&"style"in S)&&(S.value="1)",S.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(i)&&S.style.WebkitAppearance!==n?(k.appendChild(S),o=(r=t.defaultView).getComputedStyle&&"textfield"!==r.getComputedStyle(S,null).WebkitAppearance&&0!==S.offsetHeight,k.removeChild(S)):/^(search|tel)$/.test(i)||(o=/^(url|email)$/.test(i)?S.checkValidity&&!1===S.checkValidity():"1)"!=S.value)),L[e[s]]=!!o;return L}(P);var M=T._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];T._prefixes=M,x.addTest("csscalc",(function(){var e="width:",t=o("a");return t.style.cssText=e+M.join("calc(10px);"+e),!!t.style.length})),x.addTest("cubicbezierrange",(function(){var e=o("a");return e.style.cssText=M.join("transition-timing-function:cubic-bezier(1,0,0,1.1); "),!!e.style.length})),x.addTest("cssgradients",(function(){for(var e,t="background-image:",n="",i=0,r=M.length-1;r>i;i++)e=0===i?"to ":"",n+=t+M[i]+"linear-gradient("+e+"left top, #9f9, white);";x._config.usePrefixes&&(n+=t+"-webkit-gradient(linear,left top,right bottom,from(#9f9),to(white));");var a=o("a").style;return a.cssText=n,(""+a.backgroundImage).indexOf("gradient")>-1})),x.addTest("opacity",(function(){var e=o("a").style;return e.cssText=M.join("opacity:.55;"),/^0.55$/.test(e.opacity)})),x.addTest("csspositionsticky",(function(){var e="position:",t="sticky",n=o("a").style;return n.cssText=e+M.join(t+";"+e).slice(0,-e.length),-1!==n.position.indexOf(t)}));var _,R={elem:o("modernizr")};x._q.push((function(){delete R.elem})),x.addTest("csschunit",(function(){var e,t=R.elem.style;try{t.fontSize="3ch",e=-1!==t.fontSize.indexOf("ch")}catch(t){e=!1}return e})),x.addTest("cssexunit",(function(){var e,t=R.elem.style;try{t.fontSize="3ex",e=-1!==t.fontSize.indexOf("ex")}catch(t){e=!1}return e})),function(){var e={}.hasOwnProperty;_=i(e,"undefined")||i(e.call,"undefined")?function(e,t){return t in e&&i(e.constructor.prototype[t],"undefined")}:function(t,n){return e.call(t,n)}}(),T._l={},T.on=function(e,t){this._l[e]||(this._l[e]=[]),this._l[e].push(t),x.hasOwnProperty(e)&&setTimeout((function(){x._trigger(e,x[e])}),0)},T._trigger=function(e,t){if(this._l[e]){var n=this._l[e];setTimeout((function(){var e;for(e=0;e<n.length;e++)(0,n[e])(t)}),0),delete this._l[e]}},x._q.push((function(){T.addTest=d})),d("htmlimports","import"in o("link")),x.addAsyncTest((function(){var e,t,n=o("img"),i="sizes"in n;!i&&"srcset"in n?("data:image/gif;base64,R0lGODlhAgABAPAAAP///wAAACH5BAAAAAAALAAAAAACAAEAAAICBAoAOw==",e="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==",t=function(){d("sizes",2==n.width)},n.onload=t,n.onerror=t,n.setAttribute("sizes","9px"),n.srcset=e+" 1w,data:image/gif;base64,R0lGODlhAgABAPAAAP///wAAACH5BAAAAAAALAAAAAACAAEAAAICBAoAOw== 8w",n.src=e):d("sizes",i)}));var B=T.testStyles=c;x.addTest("unicode",(function(){var e,t=o("span"),n=o("span");return B("#modernizr{font-family:Arial,sans;font-size:300em;}",(function(i){t.innerHTML=C?"妇":"&#5987;",n.innerHTML=C?"☆":"&#9734;",i.appendChild(t),i.appendChild(n),e="offsetWidth"in t&&t.offsetWidth!==n.offsetWidth})),e})),x.addTest("checked",(function(){return B("#modernizr {position:absolute} #modernizr input {margin-left:10px} #modernizr :checked {margin-left:20px;display:block}",(function(e){var t=o("input");return t.setAttribute("type","checkbox"),t.setAttribute("checked","checked"),e.appendChild(t),20===t.offsetLeft}))})),B("#modernizr{display: table; direction: ltr}#modernizr div{display: table-cell; padding: 10px}",(function(e){var t,n=e.childNodes;t=n[0].offsetLeft<n[1].offsetLeft,x.addTest("displaytable",t,{aliases:["display-table"]})}),2),function(){var e=navigator.userAgent,t=e.match(/w(eb)?osbrowser/gi),n=e.match(/windows phone/gi)&&e.match(/iemobile\/([0-9])+/gi)&&parseFloat(RegExp.$1)>=9;return t||n}()?x.addTest("fontface",!1):B('@font-face {font-family:"font";src:url("https://")}',(function(e,n){var i=t.getElementById("smodernizr"),r=i.sheet||i.styleSheet,o=r?r.cssRules&&r.cssRules[0]?r.cssRules[0].cssText:r.cssText||"":"",a=/src/i.test(o)&&0===o.indexOf(n.split(" ")[0]);x.addTest("fontface",a)})),x.addTest("cssinvalid",(function(){return B("#modernizr input{height:0;border:0;padding:0;margin:0;width:10px} #modernizr input:invalid{width:50px}",(function(e){var t=o("input");return t.required=!0,e.appendChild(t),t.clientWidth>10}))})),B("#modernizr div {width:100px} #modernizr :last-child{width:200px;display:block}",(function(e){x.addTest("lastchild",e.lastChild.offsetWidth>e.firstChild.offsetWidth)}),2),B("#modernizr div {width:1px} #modernizr div:nth-child(2n) {width:2px;}",(function(e){for(var t=e.getElementsByTagName("div"),n=!0,i=0;5>i;i++)n=n&&t[i].offsetWidth===i%2+1;x.addTest("nthchild",n)}),5),B("#modernizr{overflow: scroll; width: 40px; height: 40px; }#"+M.join("scrollbar{width:10px} #modernizr::").split("#").slice(1).join("#")+"scrollbar{width:10px}",(function(e){x.addTest("cssscrollbar","scrollWidth"in e&&30==e.scrollWidth)})),x.addTest("siblinggeneral",(function(){return B("#modernizr div {width:100px} #modernizr div ~ div {width:200px;display:block}",(function(e){return 200==e.lastChild.offsetWidth}),2)})),B("#modernizr{position: absolute; top: -10em; visibility:hidden; font: normal 10px arial;}#subpixel{float: left; font-size: 33.3333%;}",(function(t){var n=t.firstChild;n.innerHTML="This is a text written in Arial",x.addTest("subpixelfont",!!e.getComputedStyle&&"44px"!==e.getComputedStyle(n,null).getPropertyValue("width"))}),1,["subpixel"]),x.addTest("cssvalid",(function(){return B("#modernizr input{height:0;border:0;padding:0;margin:0;width:10px} #modernizr input:valid{width:50px}",(function(e){var t=o("input");return e.appendChild(t),t.clientWidth>10}))})),B("#modernizr { height: 50vh; }",(function(t){var n=parseInt(e.innerHeight/2,10),i=parseInt(a(t,null,"height"),10);x.addTest("cssvhunit",s(i,n))})),B("#modernizr1{width: 50vmax}#modernizr2{width:50px;height:50px;overflow:scroll}#modernizr3{position:fixed;top:0;left:0;bottom:0;right:0}",(function(e){var t=e.childNodes[2],n=e.childNodes[1],i=e.childNodes[0],r=parseInt((n.offsetWidth-n.clientWidth)/2,10),o=i.clientWidth/100,d=i.clientHeight/100,l=parseInt(50*Math.max(o,d),10),c=parseInt(a(t,null,"width"),10);x.addTest("cssvmaxunit",s(l,c)||s(l,c-r))}),3),B("#modernizr1{width: 50vm;width:50vmin}#modernizr2{width:50px;height:50px;overflow:scroll}#modernizr3{position:fixed;top:0;left:0;bottom:0;right:0}",(function(e){var t=e.childNodes[2],n=e.childNodes[1],i=e.childNodes[0],r=parseInt((n.offsetWidth-n.clientWidth)/2,10),o=i.clientWidth/100,d=i.clientHeight/100,l=parseInt(50*Math.min(o,d),10),c=parseInt(a(t,null,"width"),10);x.addTest("cssvminunit",s(l,c)||s(l,c-r))}),3),B("#modernizr { width: 50vw; }",(function(t){var n=parseInt(e.innerWidth/2,10),i=parseInt(a(t,null,"width"),10);x.addTest("cssvwunit",s(i,n))})),x.addTest("details",(function(){var e,t=o("details");return"open"in t&&(B("#modernizr details{display:block}",(function(n){n.appendChild(t),t.innerHTML="<summary>a</summary>b",e=t.offsetHeight,t.open=!0,e=e!=t.offsetHeight})),e)}));var H=function(){var t=e.matchMedia||e.msMatchMedia;return t?function(e){var n=t(e);return n&&n.matches||!1}:function(t){var n=!1;return c("@media "+t+" { #modernizr { position: absolute; } }",(function(t){n="absolute"==(e.getComputedStyle?e.getComputedStyle(t,null):t.currentStyle).position})),n}}();T.mq=H,x.addTest("mediaqueries",H("only all"));var j={style:R.elem.style};x._q.unshift((function(){delete j.style}));var q="Moz O ms Webkit",O=T._config.usePrefixes?q.split(" "):[];T._cssomPrefixes=O;var W=function(t){var i,r=M.length,o=e.CSSRule;if(void 0===o)return n;if(!t)return!1;if((i=(t=t.replace(/^@/,"")).replace(/-/g,"_").toUpperCase()+"_RULE")in o)return"@"+t;for(var a=0;r>a;a++){var s=M[a];if(s.toUpperCase()+"_"+i in o)return"@-"+s.toLowerCase()+"-"+t}return!1};T.atRule=W;var I=T._config.usePrefixes?q.toLowerCase().split(" "):[];T._domPrefixes=I;var N=T.testProp=function(e,t,i){return m([e],n,t,i)};x.addTest("textshadow",N("textShadow","1px 1px")),T.testAllProps=g,T.testAllProps=y,x.addTest("ligatures",y("fontFeatureSettings",'"liga" 1')),x.addTest("cssanimations",y("animationName","a",!0)),x.addTest("appearance",y("appearance")),x.addTest("backgroundcliptext",(function(){return y("backgroundClip","text")})),x.addTest("bgpositionxy",(function(){return y("backgroundPositionX","3px",!0)&&y("backgroundPositionY","5px",!0)})),x.addTest("bgrepeatround",y("backgroundRepeat","round")),x.addTest("bgrepeatspace",y("backgroundRepeat","space")),x.addTest("backgroundsize",y("backgroundSize","100%",!0)),x.addTest("bgsizecover",y("backgroundSize","cover")),x.addTest("borderimage",y("borderImage","url() 1",!0)),x.addTest("borderradius",y("borderRadius","0px",!0)),x.addTest("boxsizing",y("boxSizing","border-box",!0)&&(t.documentMode===n||t.documentMode>7)),x.addTest("boxshadow",y("boxShadow","1px 1px",!0)),x.addTest("cssgridlegacy",y("grid-columns","10px",!0)),x.addTest("cssgrid",y("grid-template-rows","none",!0)),function(){x.addTest("csscolumns",(function(){var e=!1,t=y("columnCount");try{(e=!!t)&&(e=new Boolean(e))}catch(e){}return e}));for(var e,t,n=["Width","Span","Fill","Gap","Rule","RuleColor","RuleStyle","RuleWidth","BreakBefore","BreakAfter","BreakInside"],i=0;i<n.length;i++)e=n[i].toLowerCase(),t=y("column"+n[i]),("breakbefore"===e||"breakafter"===e||"breakinside"==e)&&(t=t||y(n[i])),x.addTest("csscolumns."+e,t)}(),x.addTest("cssfilters",(function(){if(x.supports)return y("filter","blur(2px)");var e=o("a");return e.style.cssText=M.join("filter:blur(2px); "),!!e.style.length&&(t.documentMode===n||t.documentMode>9)})),x.addAsyncTest((function(){var n=300;setTimeout((function i(){function r(e,n){try{var i,r=o("div"),a=o("span"),s=r.style,d=0,l=!1,c=!1,u=t.body.firstElementChild||t.body.firstChild;return s.cssText="position:absolute;top:0;left:0;overflow:visible;width:1.25em;",r.appendChild(a),t.body.insertBefore(r,u),a.innerHTML="mm",d=a.offsetHeight,a.innerHTML="m"+e+"m",i=a.offsetHeight>d,n?(a.innerHTML="m<br />m",d=a.offsetWidth,a.innerHTML="m"+e+"m",c=a.offsetWidth>d):c=!0,!0===i&&!0===c&&(l=!0),t.body.removeChild(r),r.removeChild(a),l}catch(e){return!1}}function a(n){try{var i,r=o("input"),a=o("div"),s="lebowski",d=!1,l=t.body.firstElementChild||t.body.firstChild;a.innerHTML=s+n+s,t.body.insertBefore(a,l),t.body.insertBefore(r,a),r.setSelectionRange?(r.focus(),r.setSelectionRange(0,0)):r.createTextRange&&((i=r.createTextRange()).collapse(!0),i.moveEnd("character",0),i.moveStart("character",0),i.select());try{e.find?d=e.find(s+s):d=(i=e.self.document.body.createTextRange()).findText(s+s)}catch(e){d=!1}return t.body.removeChild(a),t.body.removeChild(r),d}catch(e){return!1}}return t.body||t.getElementsByTagName("body")[0]?(d("csshyphens",(function(){if(!y("hyphens","auto",!0))return!1;try{return function(){try{var e,n,i,r=o("div"),a=o("span"),s=r.style,d=t.body.firstElementChild||t.body.firstChild;return r.appendChild(a),a.innerHTML="Bacon ipsum dolor sit amet jerky velit in culpa hamburger et. Laborum dolor proident, enim dolore duis commodo et strip steak. Salami anim et, veniam consectetur dolore qui tenderloin jowl velit sirloin. Et ad culpa, fatback cillum jowl ball tip ham hock nulla short ribs pariatur aute. Pig pancetta ham bresaola, ut boudin nostrud commodo flank esse cow tongue culpa. Pork belly bresaola enim pig, ea consectetur nisi. Fugiat officia turkey, ea cow jowl pariatur ullamco proident do laborum velit sausage. Magna biltong sint tri-tip commodo sed bacon, esse proident aliquip. Ullamco ham sint fugiat, velit in enim sed mollit nulla cow ut adipisicing nostrud consectetur. Proident dolore beef ribs, laborum nostrud meatball ea laboris rump cupidatat labore culpa. Shankle minim beef, velit sint cupidatat fugiat tenderloin pig et ball tip. Ut cow fatback salami, bacon ball tip et in shank strip steak bresaola. In ut pork belly sed mollit tri-tip magna culpa veniam, short ribs qui in andouille ham consequat. Dolore bacon t-bone, velit short ribs enim strip steak nulla. Voluptate labore ut, biltong swine irure jerky. Cupidatat excepteur aliquip salami dolore. Ball tip strip steak in pork dolor. Ad in esse biltong. Dolore tenderloin exercitation ad pork loin t-bone, dolore in chicken ball tip qui pig. Ut culpa tongue, sint ribeye dolore ex shank voluptate hamburger. Jowl et tempor, boudin pork chop labore ham hock drumstick consectetur tri-tip elit swine meatball chicken ground round. Proident shankle mollit dolore. Shoulder ut duis t-bone quis reprehenderit. Meatloaf dolore minim strip steak, laboris ea aute bacon beef ribs elit shank in veniam drumstick qui. Ex laboris meatball cow tongue pork belly. Ea ball tip reprehenderit pig, sed fatback boudin dolore flank aliquip laboris eu quis. Beef ribs duis beef, cow corned beef adipisicing commodo nisi deserunt exercitation. Cillum dolor t-bone spare ribs, ham hock est sirloin. Brisket irure meatloaf in, boudin pork belly sirloin ball tip. Sirloin sint irure nisi nostrud aliqua. Nostrud nulla aute, enim officia culpa ham hock. Aliqua reprehenderit dolore sunt nostrud sausage, ea boudin pork loin ut t-bone ham tempor. Tri-tip et pancetta drumstick laborum. Ham hock magna do nostrud in proident. Ex ground round fatback, venison non ribeye in.",t.body.insertBefore(r,d),s.cssText="position:absolute;top:0;left:0;width:5em;text-align:justify;text-justification:newspaper;",e=a.offsetHeight,n=a.offsetWidth,s.cssText="position:absolute;top:0;left:0;width:5em;text-align:justify;text-justification:newspaper;"+M.join("hyphens:auto; "),i=a.offsetHeight!=e||a.offsetWidth!=n,t.body.removeChild(r),r.removeChild(a),i}catch(e){return!1}}()}catch(e){return!1}})),d("softhyphens",(function(){try{return r("&#173;",!0)&&r("&#8203;",!1)}catch(e){return!1}})),void d("softhyphensfind",(function(){try{return a("&#173;")&&a("&#8203;")}catch(e){return!1}}))):void setTimeout(i,n)}),n)})),x.addTest("flexbox",y("flexBasis","1px",!0)),x.addTest("cssmask",y("maskRepeat","repeat-x",!0)),x.addTest("overflowscrolling",y("overflowScrolling","touch",!0)),x.addTest("textalignlast",y("textAlignLast")),x.addTest("csstransforms",(function(){return-1===navigator.userAgent.indexOf("Android 2.")&&y("transform","scale(1)",!0)})),x.addTest("csstransforms3d",(function(){return!!y("perspective","1px",!0)})),x.addTest("csstransformslevel2",(function(){return y("translate","45px",!0)})),x.addTest("csstransitions",y("transition","all",!0)),x.addTest("variablefonts",y("fontVariationSettings"));var $=T.prefixed=function(e,t,n){return 0===e.indexOf("@")?W(e):(-1!=e.indexOf("-")&&(e=l(e)),t?g(e,t,n):g(e,"pfx"))};x.addTest("backgroundblendmode",$("backgroundBlendMode","text")),x.addTest("objectfit",!!$("objectFit"),{aliases:["object-fit"]}),x.addTest("wrapflow",(function(){var e=$("wrapFlow");if(!e||C)return!1;var t=e.replace(/([A-Z])/g,(function(e,t){return"-"+t.toLowerCase()})).replace(/^ms-/,"-ms-"),i=o("div"),r=o("div"),a=o("span");r.style.cssText="position: absolute; left: 50px; width: 100px; height: 20px;"+t+":end;",a.innerText="X",i.appendChild(r),i.appendChild(a),k.appendChild(i);var s=a.offsetLeft;return k.removeChild(i),r=a=i=n,150==s})),function(){var e,t,n,r,o,a;for(var s in v)if(v.hasOwnProperty(s)){if(e=[],(t=v[s]).name&&(e.push(t.name.toLowerCase()),t.options&&t.options.aliases&&t.options.aliases.length))for(n=0;n<t.options.aliases.length;n++)e.push(t.options.aliases[n].toLowerCase());for(r=i(t.fn,"function")?t.fn():t.fn,o=0;o<e.length;o++)1===(a=e[o].split(".")).length?x[a[0]]=r:(!x[a[0]]||x[a[0]]instanceof Boolean||(x[a[0]]=new Boolean(x[a[0]])),x[a[0]][a[1]]=r),b.push((r?"":"no-")+a.join("-"))}}(),r(b),delete T.addTest,delete T.addAsyncTest;for(var V=0;V<x._q.length;V++)x._q[V]();e.Modernizr=x}(window,document);
//# sourceMappingURL=modernizr-custom-min.js.map