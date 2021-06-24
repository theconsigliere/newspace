!function(e,t,n){function i(e,t){return typeof e===t}function r(){var e,t,n,r,o,a,s;for(var d in w)if(w.hasOwnProperty(d)){if(e=[],t=w[d],t.name&&(e.push(t.name.toLowerCase()),t.options&&t.options.aliases&&t.options.aliases.length))for(n=0;n<t.options.aliases.length;n++)e.push(t.options.aliases[n].toLowerCase());for(r=i(t.fn,"function")?t.fn():t.fn,o=0;o<e.length;o++)a=e[o],s=a.split("."),1===s.length?C[s[0]]=r:(!C[s[0]]||C[s[0]]instanceof Boolean||(C[s[0]]=new Boolean(C[s[0]])),C[s[0]][s[1]]=r),x.push((r?"":"no-")+s.join("-"))}}function o(e){var t=z.className,n=C._config.classPrefix||"";if(E&&(t=t.baseVal),C._config.enableJSClass){var i=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");t=t.replace(i,"$1"+n+"js$2")}C._config.enableClasses&&(t+=" "+n+e.join(" "+n),E?z.className.baseVal=t:z.className=t)}function a(){return"function"!=typeof t.createElement?t.createElement(arguments[0]):E?t.createElementNS.call(t,"http://www.w3.org/2000/svg",arguments[0]):t.createElement.apply(t,arguments)}function s(t,n,i){var r;if("getComputedStyle"in e){r=getComputedStyle.call(e,t,n);var o=e.console;if(null!==r)i&&(r=r.getPropertyValue(i));else if(o){var a=o.error?"error":"log";o[a].call(o,"getComputedStyle returning null, its possible modernizr test results are inaccurate")}}else r=!n&&t.currentStyle&&t.currentStyle[i];return r}function d(e,t){return e-1===t||e===t||e+1===t}function l(e,t){if("object"==typeof e)for(var n in e)j(e,n)&&l(n,e[n]);else{e=e.toLowerCase();var i=e.split("."),r=C[i[0]];if(2==i.length&&(r=r[i[1]]),void 0!==r)return C;t="function"==typeof t?t():t,1==i.length?C[i[0]]=t:(!C[i[0]]||C[i[0]]instanceof Boolean||(C[i[0]]=new Boolean(C[i[0]])),C[i[0]][i[1]]=t),o([(t&&0!=t?"":"no-")+i.join("-")]),C._trigger(e,t)}return C}function c(e){return e.replace(/([a-z])-([a-z])/g,function(e,t,n){return t+n.toUpperCase()}).replace(/^-/,"")}function u(){var e=t.body;return e||(e=a(E?"svg":"body"),e.fake=!0),e}function p(e,n,i,r){var o,s,d,l,c="modernizr",p=a("div"),f=u();if(parseInt(i,10))for(;i--;)d=a("div"),d.id=r?r[i]:c+(i+1),p.appendChild(d);return o=a("style"),o.type="text/css",o.id="s"+c,(f.fake?f:p).appendChild(o),f.appendChild(p),o.styleSheet?o.styleSheet.cssText=e:o.appendChild(t.createTextNode(e)),p.id=c,f.fake&&(f.style.background="",f.style.overflow="hidden",l=z.style.overflow,z.style.overflow="hidden",z.appendChild(f)),s=n(p,e),f.fake?(f.parentNode.removeChild(f),z.style.overflow=l,z.offsetHeight):p.parentNode.removeChild(p),!!s}function f(e,t){return!!~(""+e).indexOf(t)}function h(e,t){return function(){return e.apply(t,arguments)}}function m(e,t,n){var r;for(var o in e)if(e[o]in t)return!1===n?e[o]:(r=t[e[o]],i(r,"function")?h(r,n||t):r);return!1}function g(e){return e.replace(/([A-Z])/g,function(e,t){return"-"+t.toLowerCase()}).replace(/^ms-/,"-ms-")}function v(t,i){var r=t.length;if("CSS"in e&&"supports"in e.CSS){for(;r--;)if(e.CSS.supports(g(t[r]),i))return!0;return!1}if("CSSSupportsRule"in e){for(var o=[];r--;)o.push("("+g(t[r])+":"+i+")");return o=o.join(" or "),p("@supports ("+o+") { #modernizr { position: absolute; } }",function(e){return"absolute"==s(e,null,"position")})}return n}function b(e,t,r,o){function s(){l&&(delete I.style,delete I.modElem)}if(o=!i(o,"undefined")&&o,!i(r,"undefined")){var d=v(e,r);if(!i(d,"undefined"))return d}for(var l,u,p,h,m,g=["modernizr","tspan","samp"];!I.style&&g.length;)l=!0,I.modElem=a(g.shift()),I.style=I.modElem.style;for(p=e.length,u=0;p>u;u++)if(h=e[u],m=I.style[h],f(h,"-")&&(h=c(h)),I.style[h]!==n){if(o||i(r,"undefined"))return s(),"pfx"!=t||h;try{I.style[h]=r}catch(e){}if(I.style[h]!=m)return s(),"pfx"!=t||h}return s(),!1}function y(e,t,n,r,o){var a=e.charAt(0).toUpperCase()+e.slice(1),s=(e+" "+O.join(a+" ")+a).split(" ");return i(t,"string")||i(t,"undefined")?b(s,t,r,o):(s=(e+" "+V.join(a+" ")+a).split(" "),m(s,t,n))}function T(e,t,i){return y(e,n,n,t,i)}var x=[],w=[],k={_version:"3.6.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,t){var n=this;setTimeout(function(){t(n[e])},0)},addTest:function(e,t,n){w.push({name:e,fn:t,options:n})},addAsyncTest:function(e){w.push({name:null,fn:e})}},C=function(){};C.prototype=k,C=new C,C.addTest("cookies",function(){try{t.cookie="cookietest=1";var e=-1!=t.cookie.indexOf("cookietest=");return t.cookie="cookietest=1; expires=Thu, 01-Jan-1970 00:00:01 GMT",e}catch(e){return!1}}),C.addTest("cors","XMLHttpRequest"in e&&"withCredentials"in new XMLHttpRequest),C.addTest("eventlistener","addEventListener"in e),C.addTest("geolocation","geolocation"in navigator),C.addTest("ie8compat",!e.addEventListener&&!!t.documentMode&&7===t.documentMode),C.addTest("json","JSON"in e&&"parse"in JSON&&"stringify"in JSON),C.addTest("queryselector","querySelector"in t&&"querySelectorAll"in t),C.addTest("svg",!!t.createElementNS&&!!t.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect);var A="CSS"in e&&"supports"in e.CSS,S="supportsCSS"in e;C.addTest("supports",A||S),C.addTest("target",function(){var t=e.document;if(!("querySelectorAll"in t))return!1;try{return t.querySelectorAll(":target"),!0}catch(e){return!1}}),C.addTest("picture","HTMLPictureElement"in e),C.addTest("localstorage",function(){var e="modernizr";try{return localStorage.setItem(e,e),localStorage.removeItem(e),!0}catch(e){return!1}}),C.addTest("sessionstorage",function(){var e="modernizr";try{return sessionStorage.setItem(e,e),sessionStorage.removeItem(e),!0}catch(e){return!1}}),C.addTest("svgfilters",function(){var t=!1;try{t="SVGFEColorMatrixElement"in e&&2==SVGFEColorMatrixElement.SVG_FECOLORMATRIX_TYPE_SATURATE}catch(e){}return t});var z=t.documentElement;C.addTest("contextmenu","contextMenu"in z&&"HTMLMenuItemElement"in e);var E="svg"===z.nodeName.toLowerCase();C.addTest("audio",function(){var e=a("audio"),t=!1;try{(t=!!e.canPlayType)&&(t=new Boolean(t),t.ogg=e.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,""),t.mp3=e.canPlayType('audio/mpeg; codecs="mp3"').replace(/^no$/,""),t.opus=e.canPlayType('audio/ogg; codecs="opus"')||e.canPlayType('audio/webm; codecs="opus"').replace(/^no$/,""),t.wav=e.canPlayType('audio/wav; codecs="1"').replace(/^no$/,""),t.m4a=(e.canPlayType("audio/x-m4a;")||e.canPlayType("audio/aac;")).replace(/^no$/,""))}catch(e){}return t}),C.addTest("canvas",function(){var e=a("canvas");return!(!e.getContext||!e.getContext("2d"))}),C.addTest("video",function(){var e=a("video"),t=!1;try{(t=!!e.canPlayType)&&(t=new Boolean(t),t.ogg=e.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),t.h264=e.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),t.webm=e.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,""),t.vp9=e.canPlayType('video/webm; codecs="vp9"').replace(/^no$/,""),t.hls=e.canPlayType('application/x-mpegURL; codecs="avc1.42E01E"').replace(/^no$/,""))}catch(e){}return t}),C.addTest("bgpositionshorthand",function(){var e=a("a"),t=e.style,n="right 10px bottom 10px";return t.cssText="background-position: "+n+";",t.backgroundPosition===n}),C.addTest("multiplebgs",function(){var e=a("a").style;return e.cssText="background:url(https://),url(https://),red url(https://)",/(url\s*\(.*?){3}/.test(e.background)}),C.addTest("csspointerevents",function(){var e=a("a").style;return e.cssText="pointer-events:auto","auto"===e.pointerEvents}),C.addTest("cssremunit",function(){var e=a("a").style;try{e.fontSize="3rem"}catch(e){}return/rem/.test(e.fontSize)}),C.addTest("rgba",function(){var e=a("a").style;return e.cssText="background-color:rgba(150,255,150,.5)",(""+e.backgroundColor).indexOf("rgba")>-1}),C.addTest("preserve3d",function(){var t,n,i=e.CSS,r=!1;return!!(i&&i.supports&&i.supports("(transform-style: preserve-3d)"))||(t=a("a"),n=a("a"),t.style.cssText="display: block; transform-style: preserve-3d; transform-origin: right; transform: rotateY(40deg);",n.style.cssText="display: block; width: 9px; height: 1px; background: #000; transform-origin: right; transform: rotateY(40deg);",t.appendChild(n),z.appendChild(t),r=n.getBoundingClientRect(),z.removeChild(t),r=r.width&&r.width<4)}),C.addTest("unknownelements",function(){var e=a("a");return e.innerHTML="<xyz></xyz>",1===e.childNodes.length}),C.addTest("srcset","srcset"in a("img")),C.addTest("scriptasync","async"in a("script")),C.addTest("scriptdefer","defer"in a("script")),C.addTest("videocrossorigin","crossOrigin"in a("video")),C.addTest("inlinesvg",function(){var e=a("div");return e.innerHTML="<svg/>","http://www.w3.org/2000/svg"==("undefined"!=typeof SVGRect&&e.firstChild&&e.firstChild.namespaceURI)});var P=a("input"),L="autocomplete autofocus list placeholder max min multiple pattern required step".split(" "),M={};C.input=function(t){for(var n=0,i=t.length;i>n;n++)M[t[n]]=!!(t[n]in P);return M.list&&(M.list=!(!a("datalist")||!e.HTMLDataListElement)),M}(L),C.addTest("datalistelem",C.input.list);var R="search tel url email datetime date month week time datetime-local number range color".split(" "),_={};C.inputtypes=function(e){for(var i,r,o,a=e.length,s="1)",d=0;a>d;d++)P.setAttribute("type",i=e[d]),o="text"!==P.type&&"style"in P,o&&(P.value=s,P.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(i)&&P.style.WebkitAppearance!==n?(z.appendChild(P),r=t.defaultView,o=r.getComputedStyle&&"textfield"!==r.getComputedStyle(P,null).WebkitAppearance&&0!==P.offsetHeight,z.removeChild(P)):/^(search|tel)$/.test(i)||(o=/^(url|email)$/.test(i)?P.checkValidity&&!1===P.checkValidity():P.value!=s)),_[e[d]]=!!o;return _}(R);var B=k._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];k._prefixes=B,C.addTest("csscalc",function(){var e="width:",t=a("a");return t.style.cssText=e+B.join("calc(10px);"+e),!!t.style.length}),C.addTest("cubicbezierrange",function(){var e=a("a");return e.style.cssText=B.join("transition-timing-function:cubic-bezier(1,0,0,1.1); "),!!e.style.length}),C.addTest("cssgradients",function(){for(var e,t="background-image:",n="gradient(linear,left top,right bottom,from(#9f9),to(white));",i="",r=0,o=B.length-1;o>r;r++)e=0===r?"to ":"",i+=t+B[r]+"linear-gradient("+e+"left top, #9f9, white);";C._config.usePrefixes&&(i+=t+"-webkit-"+n);var s=a("a"),d=s.style;return d.cssText=i,(""+d.backgroundImage).indexOf("gradient")>-1}),C.addTest("opacity",function(){var e=a("a").style;return e.cssText=B.join("opacity:.55;"),/^0.55$/.test(e.opacity)}),C.addTest("csspositionsticky",function(){var e="position:",t="sticky",n=a("a"),i=n.style;return i.cssText=e+B.join(t+";"+e).slice(0,-e.length),-1!==i.position.indexOf(t)});var H={elem:a("modernizr")};C._q.push(function(){delete H.elem}),C.addTest("csschunit",function(){var e,t=H.elem.style;try{t.fontSize="3ch",e=-1!==t.fontSize.indexOf("ch")}catch(t){e=!1}return e}),C.addTest("cssexunit",function(){var e,t=H.elem.style;try{t.fontSize="3ex",e=-1!==t.fontSize.indexOf("ex")}catch(t){e=!1}return e});var j;!function(){var e={}.hasOwnProperty;j=i(e,"undefined")||i(e.call,"undefined")?function(e,t){return t in e&&i(e.constructor.prototype[t],"undefined")}:function(t,n){return e.call(t,n)}}(),k._l={},k.on=function(e,t){this._l[e]||(this._l[e]=[]),this._l[e].push(t),C.hasOwnProperty(e)&&setTimeout(function(){C._trigger(e,C[e])},0)},k._trigger=function(e,t){if(this._l[e]){var n=this._l[e];setTimeout(function(){var e,i;for(e=0;e<n.length;e++)(i=n[e])(t)},0),delete this._l[e]}},C._q.push(function(){k.addTest=l}),l("htmlimports","import"in a("link")),C.addAsyncTest(function(){var e,t,n,i=a("img"),r="sizes"in i;!r&&"srcset"in i?(t="data:image/gif;base64,R0lGODlhAgABAPAAAP///wAAACH5BAAAAAAALAAAAAACAAEAAAICBAoAOw==",e="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==",n=function(){l("sizes",2==i.width)},i.onload=n,i.onerror=n,i.setAttribute("sizes","9px"),i.srcset=e+" 1w,"+t+" 8w",i.src=e):l("sizes",r)});var q=k.testStyles=p;C.addTest("unicode",function(){var e,t=a("span"),n=a("span");return q("#modernizr{font-family:Arial,sans;font-size:300em;}",function(i){t.innerHTML=E?"妇":"&#5987;",n.innerHTML=E?"☆":"&#9734;",i.appendChild(t),i.appendChild(n),e="offsetWidth"in t&&t.offsetWidth!==n.offsetWidth}),e}),C.addTest("checked",function(){return q("#modernizr {position:absolute} #modernizr input {margin-left:10px} #modernizr :checked {margin-left:20px;display:block}",function(e){var t=a("input");return t.setAttribute("type","checkbox"),t.setAttribute("checked","checked"),e.appendChild(t),20===t.offsetLeft})}),q("#modernizr{display: table; direction: ltr}#modernizr div{display: table-cell; padding: 10px}",function(e){var t,n=e.childNodes;t=n[0].offsetLeft<n[1].offsetLeft,C.addTest("displaytable",t,{aliases:["display-table"]})},2),function(){var e=navigator.userAgent,t=e.match(/w(eb)?osbrowser/gi),n=e.match(/windows phone/gi)&&e.match(/iemobile\/([0-9])+/gi)&&parseFloat(RegExp.$1)>=9;return t||n}()?C.addTest("fontface",!1):q('@font-face {font-family:"font";src:url("https://")}',function(e,n){var i=t.getElementById("smodernizr"),r=i.sheet||i.styleSheet,o=r?r.cssRules&&r.cssRules[0]?r.cssRules[0].cssText:r.cssText||"":"",a=/src/i.test(o)&&0===o.indexOf(n.split(" ")[0]);C.addTest("fontface",a)}),C.addTest("cssinvalid",function(){return q("#modernizr input{height:0;border:0;padding:0;margin:0;width:10px} #modernizr input:invalid{width:50px}",function(e){var t=a("input");return t.required=!0,e.appendChild(t),t.clientWidth>10})}),q("#modernizr div {width:100px} #modernizr :last-child{width:200px;display:block}",function(e){C.addTest("lastchild",e.lastChild.offsetWidth>e.firstChild.offsetWidth)},2),q("#modernizr div {width:1px} #modernizr div:nth-child(2n) {width:2px;}",function(e){for(var t=e.getElementsByTagName("div"),n=!0,i=0;5>i;i++)n=n&&t[i].offsetWidth===i%2+1;C.addTest("nthchild",n)},5),q("#modernizr{overflow: scroll; width: 40px; height: 40px; }#"+B.join("scrollbar{width:10px} #modernizr::").split("#").slice(1).join("#")+"scrollbar{width:10px}",function(e){C.addTest("cssscrollbar","scrollWidth"in e&&30==e.scrollWidth)}),C.addTest("siblinggeneral",function(){return q("#modernizr div {width:100px} #modernizr div ~ div {width:200px;display:block}",function(e){return 200==e.lastChild.offsetWidth},2)}),q("#modernizr{position: absolute; top: -10em; visibility:hidden; font: normal 10px arial;}#subpixel{float: left; font-size: 33.3333%;}",function(t){var n=t.firstChild;n.innerHTML="This is a text written in Arial",C.addTest("subpixelfont",!!e.getComputedStyle&&"44px"!==e.getComputedStyle(n,null).getPropertyValue("width"))},1,["subpixel"]),C.addTest("cssvalid",function(){return q("#modernizr input{height:0;border:0;padding:0;margin:0;width:10px} #modernizr input:valid{width:50px}",function(e){var t=a("input");return e.appendChild(t),t.clientWidth>10})}),q("#modernizr { height: 50vh; }",function(t){var n=parseInt(e.innerHeight/2,10),i=parseInt(s(t,null,"height"),10);C.addTest("cssvhunit",d(i,n))}),q("#modernizr1{width: 50vmax}#modernizr2{width:50px;height:50px;overflow:scroll}#modernizr3{position:fixed;top:0;left:0;bottom:0;right:0}",function(e){var t=e.childNodes[2],n=e.childNodes[1],i=e.childNodes[0],r=parseInt((n.offsetWidth-n.clientWidth)/2,10),o=i.clientWidth/100,a=i.clientHeight/100,l=parseInt(50*Math.max(o,a),10),c=parseInt(s(t,null,"width"),10);C.addTest("cssvmaxunit",d(l,c)||d(l,c-r))},3),q("#modernizr1{width: 50vm;width:50vmin}#modernizr2{width:50px;height:50px;overflow:scroll}#modernizr3{position:fixed;top:0;left:0;bottom:0;right:0}",function(e){var t=e.childNodes[2],n=e.childNodes[1],i=e.childNodes[0],r=parseInt((n.offsetWidth-n.clientWidth)/2,10),o=i.clientWidth/100,a=i.clientHeight/100,l=parseInt(50*Math.min(o,a),10),c=parseInt(s(t,null,"width"),10);C.addTest("cssvminunit",d(l,c)||d(l,c-r))},3),q("#modernizr { width: 50vw; }",function(t){var n=parseInt(e.innerWidth/2,10),i=parseInt(s(t,null,"width"),10);C.addTest("cssvwunit",d(i,n))}),C.addTest("details",function(){var e,t=a("details");return"open"in t&&(q("#modernizr details{display:block}",function(n){n.appendChild(t),t.innerHTML="<summary>a</summary>b",e=t.offsetHeight,t.open=!0,e=e!=t.offsetHeight}),e)});var W=function(){var t=e.matchMedia||e.msMatchMedia;return t?function(e){var n=t(e);return n&&n.matches||!1}:function(t){var n=!1;return p("@media "+t+" { #modernizr { position: absolute; } }",function(t){n="absolute"==(e.getComputedStyle?e.getComputedStyle(t,null):t.currentStyle).position}),n}}();k.mq=W,C.addTest("mediaqueries",W("only all"));var I={style:H.elem.style};C._q.unshift(function(){delete I.style});var N="Moz O ms Webkit",O=k._config.usePrefixes?N.split(" "):[];k._cssomPrefixes=O;var $=function(t){var i,r=B.length,o=e.CSSRule;if(void 0===o)return n;if(!t)return!1;if(t=t.replace(/^@/,""),(i=t.replace(/-/g,"_").toUpperCase()+"_RULE")in o)return"@"+t;for(var a=0;r>a;a++){var s=B[a];if(s.toUpperCase()+"_"+i in o)return"@-"+s.toLowerCase()+"-"+t}return!1};k.atRule=$;var V=k._config.usePrefixes?N.toLowerCase().split(" "):[];k._domPrefixes=V;var U=k.testProp=function(e,t,i){return b([e],n,t,i)};C.addTest("textshadow",U("textShadow","1px 1px")),k.testAllProps=y,k.testAllProps=T,C.addTest("ligatures",T("fontFeatureSettings",'"liga" 1')),C.addTest("cssanimations",T("animationName","a",!0)),C.addTest("appearance",T("appearance")),C.addTest("backgroundcliptext",function(){return T("backgroundClip","text")}),C.addTest("bgpositionxy",function(){return T("backgroundPositionX","3px",!0)&&T("backgroundPositionY","5px",!0)}),C.addTest("bgrepeatround",T("backgroundRepeat","round")),C.addTest("bgrepeatspace",T("backgroundRepeat","space")),C.addTest("backgroundsize",T("backgroundSize","100%",!0)),C.addTest("bgsizecover",T("backgroundSize","cover")),C.addTest("borderimage",T("borderImage","url() 1",!0)),C.addTest("borderradius",T("borderRadius","0px",!0)),C.addTest("boxsizing",T("boxSizing","border-box",!0)&&(t.documentMode===n||t.documentMode>7)),C.addTest("boxshadow",T("boxShadow","1px 1px",!0)),C.addTest("cssgridlegacy",T("grid-columns","10px",!0)),C.addTest("cssgrid",T("grid-template-rows","none",!0)),function(){C.addTest("csscolumns",function(){var e=!1,t=T("columnCount");try{(e=!!t)&&(e=new Boolean(e))}catch(e){}return e});for(var e,t,n=["Width","Span","Fill","Gap","Rule","RuleColor","RuleStyle","RuleWidth","BreakBefore","BreakAfter","BreakInside"],i=0;i<n.length;i++)e=n[i].toLowerCase(),t=T("column"+n[i]),("breakbefore"===e||"breakafter"===e||"breakinside"==e)&&(t=t||T(n[i])),C.addTest("csscolumns."+e,t)}(),C.addTest("cssfilters",function(){if(C.supports)return T("filter","blur(2px)");var e=a("a");return e.style.cssText=B.join("filter:blur(2px); "),!!e.style.length&&(t.documentMode===n||t.documentMode>9)}),C.addAsyncTest(function(){function n(){function r(){try{var e=a("div"),n=a("span"),i=e.style,r=0,o=0,s=!1,d=t.body.firstElementChild||t.body.firstChild;return e.appendChild(n),n.innerHTML="Bacon ipsum dolor sit amet jerky velit in culpa hamburger et. Laborum dolor proident, enim dolore duis commodo et strip steak. Salami anim et, veniam consectetur dolore qui tenderloin jowl velit sirloin. Et ad culpa, fatback cillum jowl ball tip ham hock nulla short ribs pariatur aute. Pig pancetta ham bresaola, ut boudin nostrud commodo flank esse cow tongue culpa. Pork belly bresaola enim pig, ea consectetur nisi. Fugiat officia turkey, ea cow jowl pariatur ullamco proident do laborum velit sausage. Magna biltong sint tri-tip commodo sed bacon, esse proident aliquip. Ullamco ham sint fugiat, velit in enim sed mollit nulla cow ut adipisicing nostrud consectetur. Proident dolore beef ribs, laborum nostrud meatball ea laboris rump cupidatat labore culpa. Shankle minim beef, velit sint cupidatat fugiat tenderloin pig et ball tip. Ut cow fatback salami, bacon ball tip et in shank strip steak bresaola. In ut pork belly sed mollit tri-tip magna culpa veniam, short ribs qui in andouille ham consequat. Dolore bacon t-bone, velit short ribs enim strip steak nulla. Voluptate labore ut, biltong swine irure jerky. Cupidatat excepteur aliquip salami dolore. Ball tip strip steak in pork dolor. Ad in esse biltong. Dolore tenderloin exercitation ad pork loin t-bone, dolore in chicken ball tip qui pig. Ut culpa tongue, sint ribeye dolore ex shank voluptate hamburger. Jowl et tempor, boudin pork chop labore ham hock drumstick consectetur tri-tip elit swine meatball chicken ground round. Proident shankle mollit dolore. Shoulder ut duis t-bone quis reprehenderit. Meatloaf dolore minim strip steak, laboris ea aute bacon beef ribs elit shank in veniam drumstick qui. Ex laboris meatball cow tongue pork belly. Ea ball tip reprehenderit pig, sed fatback boudin dolore flank aliquip laboris eu quis. Beef ribs duis beef, cow corned beef adipisicing commodo nisi deserunt exercitation. Cillum dolor t-bone spare ribs, ham hock est sirloin. Brisket irure meatloaf in, boudin pork belly sirloin ball tip. Sirloin sint irure nisi nostrud aliqua. Nostrud nulla aute, enim officia culpa ham hock. Aliqua reprehenderit dolore sunt nostrud sausage, ea boudin pork loin ut t-bone ham tempor. Tri-tip et pancetta drumstick laborum. Ham hock magna do nostrud in proident. Ex ground round fatback, venison non ribeye in.",t.body.insertBefore(e,d),i.cssText="position:absolute;top:0;left:0;width:5em;text-align:justify;text-justification:newspaper;",r=n.offsetHeight,o=n.offsetWidth,i.cssText="position:absolute;top:0;left:0;width:5em;text-align:justify;text-justification:newspaper;"+B.join("hyphens:auto; "),s=n.offsetHeight!=r||n.offsetWidth!=o,t.body.removeChild(e),e.removeChild(n),s}catch(e){return!1}}function o(e,n){try{var i=a("div"),r=a("span"),o=i.style,s=0,d=!1,l=!1,c=!1,u=t.body.firstElementChild||t.body.firstChild;return o.cssText="position:absolute;top:0;left:0;overflow:visible;width:1.25em;",i.appendChild(r),t.body.insertBefore(i,u),r.innerHTML="mm",s=r.offsetHeight,r.innerHTML="m"+e+"m",l=r.offsetHeight>s,n?(r.innerHTML="m<br />m",s=r.offsetWidth,r.innerHTML="m"+e+"m",c=r.offsetWidth>s):c=!0,!0===l&&!0===c&&(d=!0),t.body.removeChild(i),i.removeChild(r),d}catch(e){return!1}}function s(n){try{var i,r=a("input"),o=a("div"),s="lebowski",d=!1,l=t.body.firstElementChild||t.body.firstChild;o.innerHTML=s+n+s,t.body.insertBefore(o,l),t.body.insertBefore(r,o),r.setSelectionRange?(r.focus(),r.setSelectionRange(0,0)):r.createTextRange&&(i=r.createTextRange(),i.collapse(!0),i.moveEnd("character",0),i.moveStart("character",0),i.select());try{e.find?d=e.find(s+s):(i=e.self.document.body.createTextRange(),d=i.findText(s+s))}catch(e){d=!1}return t.body.removeChild(o),t.body.removeChild(r),d}catch(e){return!1}}return t.body||t.getElementsByTagName("body")[0]?(l("csshyphens",function(){if(!T("hyphens","auto",!0))return!1;try{return r()}catch(e){return!1}}),l("softhyphens",function(){try{return o("&#173;",!0)&&o("&#8203;",!1)}catch(e){return!1}}),void l("softhyphensfind",function(){try{return s("&#173;")&&s("&#8203;")}catch(e){return!1}})):void setTimeout(n,i)}var i=300;setTimeout(n,i)}),C.addTest("flexbox",T("flexBasis","1px",!0)),C.addTest("cssmask",T("maskRepeat","repeat-x",!0)),C.addTest("overflowscrolling",T("overflowScrolling","touch",!0)),C.addTest("textalignlast",T("textAlignLast")),C.addTest("csstransforms",function(){return-1===navigator.userAgent.indexOf("Android 2.")&&T("transform","scale(1)",!0)}),C.addTest("csstransforms3d",function(){return!!T("perspective","1px",!0)}),C.addTest("csstransformslevel2",function(){return T("translate","45px",!0)}),C.addTest("csstransitions",T("transition","all",!0)),C.addTest("variablefonts",T("fontVariationSettings"));var F=k.prefixed=function(e,t,n){return 0===e.indexOf("@")?$(e):(-1!=e.indexOf("-")&&(e=c(e)),t?y(e,t,n):y(e,"pfx"))};C.addTest("backgroundblendmode",F("backgroundBlendMode","text")),C.addTest("objectfit",!!F("objectFit"),{aliases:["object-fit"]}),C.addTest("wrapflow",function(){var e=F("wrapFlow");if(!e||E)return!1;var t=e.replace(/([A-Z])/g,function(e,t){return"-"+t.toLowerCase()}).replace(/^ms-/,"-ms-"),i=a("div"),r=a("div"),o=a("span");r.style.cssText="position: absolute; left: 50px; width: 100px; height: 20px;"+t+":end;",o.innerText="X",i.appendChild(r),i.appendChild(o),z.appendChild(i);var s=o.offsetLeft;return z.removeChild(i),r=o=i=n,150==s}),r(),o(x),delete k.addTest,delete k.addAsyncTest;for(var G=0;G<C._q.length;G++)C._q[G]();e.Modernizr=C}(window,document);