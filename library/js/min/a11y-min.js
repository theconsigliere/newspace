"use strict";!function(e){e(".menu-item a").on("keydown",(function(t){37===t.which?(t.preventDefault(),e(this).parent().prev().children("a").focus()):39===t.which?(t.preventDefault(),e(this).parent().next().children("a").focus()):40===t.which?(t.preventDefault(),e(this).next().length?e(this).next().find("li:first-child a").first().focus():e(this).parent().next().children("a").focus()):38===t.which&&(t.preventDefault(),e(this).parent().prev().length?e(this).parent().prev().children("a").focus():e(this).parents("ul").first().prev("a").focus())}))}(jQuery),function(e){e(".menu-toggle").on("click",(function(){e(".primary-menu nav ul").toggle(),e(".primary-menu nav ul").is(":visible")?e(this).addClass("open").attr("aria-expanded","true"):e(this).removeClass("open").attr("aria-expanded","false")}))}(jQuery),function(){var e=navigator.userAgent.toLowerCase().indexOf("webkit")>-1,t=navigator.userAgent.toLowerCase().indexOf("opera")>-1,a=navigator.userAgent.toLowerCase().indexOf("msie")>-1;(e||t||a)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var e,t=location.hash.substring(1);/^[A-z0-9_-]+$/.test(t)&&(e=document.getElementById(t))&&(/^(?:a|select|input|button|textarea)$/i.test(e.tagName)||(e.tabIndex=-1),e.focus())}),!1)}(),jQuery("document").ready((function(e){var t=e("#commentform");t.attr("aria-live","polite"),t.prepend('<div id="comment-status" aria-live="assertive" role="status" tabindex="-1"></div>');var a,n=e("#comment-status");e("a.comment-reply-link").click((function(){a=e(this).parents(".comment").attr("id")})),t.submit((function(){var r=t.serialize();e("#commentform .plate-comment-error").remove(),e("#commentform .plate-field-error").remove();var s=!1;if(e("#commentform [aria-required=true]").each((function(){var t=e(this).attr("id")+"-error";if(""==e.trim(e(this).val())){var a=e(this).prev("label").html();e(this).attr("aria-describedby",t),e(this).parent().append(' <span class="plate-field-error" id="'+t+'">'+a+": "+plateComments.required+"</span>"),s=!0}"email"==e(this).attr("name")&&""!=e.trim(e(this).val())&&(function(e){return!!/^([\w-\+.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(e)}(e(this).val())||(e(this).attr("aria-describedby",t),e(this).parent().append(' <span class="plate-field-error"id="'+t+'">'+plateComments.emailInvalid+"</span>"),s=!0))})),s)return n.html('<p class="plate-comment-error">'+plateComments.error+"</p>").focus(),!1;n.html('<p class="yourtheme-comment-processing">'+plateComments.processing+"</p>");var i=t.attr("action");return e.ajax({type:"post",url:i,data:r,dataType:"json",error:function(e,t,a){n.html('<p class="plate-comment-error">'+plateComments.flood+"</p>").focus()},success:function(r,s){var i=r.success,o=r.response,m=r.status;i?(n.html('<p class="plate-comment-success" >'+m+"</p>").focus(),e("#comments").has("ol.commentlist").length>0?null!=a?e("#"+a).prepend(o):e(".commentlist").append(o):(e("#comments").append('<ol class="commentlist"></ol>'),e("ol.commentlist").html(o)),t.find("textarea[name=comment]").val("")):(n.html('<p class="plate-comment-error" >'+m+"</p>").focus(),t.find("textarea[name=comment]").val(""))}}),!1}))}));
//# sourceMappingURL=a11y-min.js.map