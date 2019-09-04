"use strict";!function(e){function t(t,a){return a?a.querySelector(t):e.querySelector(t)}function a(t,a){return a?a.querySelectorAll(t):e.querySelectorAll(t)}function i(e,t){return e.getAttribute(t)}function n(e,t){return e[W].contains(t)}function o(e){[].forEach.call(e,function(e){for(var t=0;t<e.children[J];t++)"H2"!=e[R][t][U]&&"H3"!=e[R][t][U]||ge.push(e[R][t])})}function c(){var e="&nbsp;",t="<span>",i="</span>";if(ne&&0!=ne[J])for(var n=0;n<ne[J];n++){var o=n>=10?"".concat(t).concat(n).concat(e).concat(e,"—").concat(e).concat(e).concat(i):"".concat(t,"0").concat(n).concat(e).concat(e,"—").concat(e).concat(e).concat(i);ne[n][G]=n>=10?n:"0".concat(n),ge[n].insertAdjacentHTML("afterbegin",o)}if(ce&&0!=ce[J])for(var c=0;c<ce[J];c++){var r=a("ol li",ce[c]);if(0!=r[J])for(var s=0;s<r[J];s++){var l=s,d=s>=10?"".concat(t).concat(++l,".").concat(i):"".concat(t,"0").concat(++l,".").concat(i);r[s].insertAdjacentHTML("afterbegin",d)}else console.log("false",ce[c])}}function r(e){var t=document.cookie.match(new RegExp("(?:^|; )"+e.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g,"\\$1")+"=([^;]*)"));return t?decodeURIComponent(t[1]):void 0}function s(e){var t=r(e);return t&&re?void re[W].add("hide"):void 0}function l(e){var t=/[&\/\\#,+()$~%.'":*?!<>{}0-9]/g,a=e.value;t.test(a)&&(a=a.replace(t,""),e.value=a)}function d(e){var t=/[\/\\#+()$~%'":*<>{}]/g,a=e.value;t.test(a)&&(a=a.replace(t,""),e.value=a)}function u(e){var t=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;return t.test(e)}function v(e,t,a){$(e).prop("selectedIndex",t).trigger(a)}function f(e){var t=+e.value,a=e[X];return!!isNaN(t)||(a[W].add("error"),!1)}function p(e){var t=e.value,a=e[X];return!!u(t)||(a[W].add("error"),!1)}function h(e,t){for(var a={action:"modalForm",name:null,email:null},i=[],o=0;o<e[J];o++){if(n(e[o],"inp-name")){if(!f(e[o]))return pe[W].remove("load"),!1;a.name=e[o].value,"pdf"==t&&void 0==a.file&&(a.file=!0,a.post_id=E)}if(n(e[o],"inp-email")){if(!p(e[o]))return pe[W].remove("load"),!1;a.email=e[o].value}n(e[o],"ch-sub")&&e[o][K]&&"sub"==t&&i.push(e[o].value),n(e[o],"mes-tar")&&(a.message=e[o].value)}return!(i[J]<=0&&"sub"==t)&&("sub"==t&&(a.type=i),a)}function m(e){if(!e)return!1;var t=document.createElement("a");t.download=e.substring(e.lastIndexOf("/")+1,e[J]),t[Q]=e,document.body.appendChild(t),t.click(),document.body.removeChild(t)}function b(){var e={action:"ajaxSearch",cat:$(".s-category").val(),tag_id:$(".s-tag").val(),s:$(".s-field").val()};w(e)}function g(){var e={action:"getLawyers",practice:$(".s-practice").val(),location:$(".s-location").val(),sector:$(".s-sector").val(),s:$(".s-field-law").val()};w(e)}function w(e){$.ajax({url:ajax.url,data:e,type:"POST",success:function(e){$("#ajaxContent").empty().append(e)},error:function(){console.log("Ajax error!")}}),ue.animate({scrollTop:$(".res-sect").offset().top},600)}function y(e,t,a){$.ajax({url:ajax.url,data:e,type:"POST",success:function(i){"sub"==t?(pe[W].remove("load"),pe[W].add("sucsses"),setTimeout(function(){pe[W].remove("sucsses")},3e3)):"pdf"==t?(he[W].remove("load"),he[W].add("sucsses"),e.file&&m(i),setTimeout(function(){he[W].remove("sucsses")},3e3)):"touch"==t&&(me[W].remove("load"),me[W].add("sucsses"),setTimeout(function(){me[W].remove("sucsses")},3e3)),a.reset()},error:function(e){console.warn(e)}})}var x,k,C,_,j,T,S,E,P=$(".nav-search"),B=$(".logo"),V=$(".menu__wrapper"),A=a(".cont-tab"),q=a(".cont-tab-2"),D=a(".cont-tab-ins"),H=a(".map-titl"),L=a(".map-cont"),z=t(".mod-menu"),I=t(".btn-menu"),M=a(".job-tab"),N=a(".job-cont"),O=t(".modals"),F=a(".j-all-cont"),W="classList",R="children",U="tagName",G="textContent",J="length",K="checked",Q="href",X="parentNode",Y=t(".op-cont"),Z=a(".scroll-cont"),ee=t(".sc-ofrs"),te=t(".menu > ul > li > a"),ae=t(".mod-menu__wrap > ul > li > a"),ie=a(".atl-slide"),ne=a(".cl-num"),oe=a(".bl-num"),ce=a(".bl-num ol"),re=t(".cok-b"),se=t(".c-drop-down"),le=a(".ins-tab"),de=t(".ins-view")?t(".ins-view")[Q]:null,ue=$("html, body"),ve=(t(".ajaxForm"),a(".ch-sub")),fe=t(".ch-sub-0"),pe=t(".sub-btn"),he=t(".pdf-sub"),me=t(".touch-btn"),be=$(".header-search"),ge=[];s("policy"),o(oe),c(),e.addEventListener("click",function(t){for(var a=t.target;a!=this;){if(n(a,"btn-menu")&&(a[W].add("active"),z[W].add("active")),n(a,"btn-menu-close")&&(I[W].remove("active"),z[W].remove("active")),n(a,"job-tab")){x=i(a,"data-city");for(var o=0;o<M[J];o++)M[o][W].remove("active");return a[W].add("active"),void[].forEach.call(N,function(e,t){return"all"==x?(e[W].remove("hide"),void e[W].add("active")):(k=i(e,"data-city"),void(k==x?(n(e,"hide")&&e[W].remove("hide"),e[W].add("active")):e[W].add("hide")))})}if(n(a,"j-open")||n(a,"mod-close")||a==te||a==ae||n(a,"exp")||n(a,"subs")||n(a,"dow-info")){if(t.preventDefault(),a==te||a==ae||n(a,"exp"))return n(z,"active")&&z[W].remove("active"),O[W].add("active-static"),void(e.body.style.overflow="hidden");if(n(a,"subs"))return O[W].add("active-sub"),void(e.body.style.overflow="hidden");if(n(a,"dow-info"))return E=i(a,"data-id"),O[W].add("active-dow"),void(e.body.style.overflow="hidden");if(n(O,"active")||n(O,"active-static")||n(O,"active-sub")||n(O,"active-dow"))return O[W].remove("active-dow"),O[W].remove("active-sub"),O[W].remove("active-static"),O[W].remove("active"),void(e.body.style.overflow="visible");e.body.style.overflow="hidden",C=i(a,"data-id"),O[W].add("active"),[].forEach.call(F,function(e){if(e[W].remove("active-cont"),_=i(e,"data-id"),_==C)return void e[W].add("active-cont")})}if(n(a,"ch-cont")&&(j=i(a,"data-id"),[].forEach.call(F,function(e){if(e[W].remove("active-cont"),_=i(e,"data-id"),_==j)return void e[W].add("active-cont")})),n(a,"cok"))return e.cookie="policy=true",void re[W].add("hide");if(n(a,"ach-m"))return a[W].contains("active")?(Y[W].remove("open"),void a[W].remove("active")):(a[W].add("active"),void Y[W].add("open"));if(n(a,"map-titl")){T=i(a,"data-id");for(var c=0;c<H[J];c++)H[c][W].remove("active"),a==H[c]&&H[c][W].add("active");[].forEach.call(L,function(e){e[W].remove("active"),S=i(e,"data-id"),S==T&&e[W].add("active")})}if(n(a,"opener-c")&&se[W].add("active"),n(a,"op-btn")){if(!n(se,"active"))return void se[W].add("active");se[W].remove("active")}if(n(a,"js-lnk"))for(var r=0;r<a.children[J];r++)if(n(a.children[r],"lnk-a"))return void(window.location=a.children[r][Q]);if(n(a,"ins-view"))for(var s=0;s<le[J];s++){var l=i(le[s],"data-category");if(l&&n(le[s],"active"))return void(a[Q]="".concat(de,"?c=").concat(l));a[Q]="".concat(de)}if(n(a,"ch-sub")){var d=n(a,"ch-sub-0");if(d)for(var u=1;u<ve[J];u++)ve[u][K]=!1;else fe[K]=!1}if(n(a,"sh-lnk"))return t.preventDefault(),window.open(a[Q],a.title,"width=548,height=325,left=0,top=0,toolbar=0,status=0"),!1;a=a[X]}}),e.addEventListener("keyup",function(e){for(var t=e.target;t!=this;){if(n(t,"inp")){var a=t[X];n(a,"wr-inp")&&n(a,"error")&&a[W].remove("error"),n(t,"inp-name")&&l(t)}n(t,"mes-tar")&&d(t),t=t[X]}}),$(window).scroll(function(){$(this).scrollTop()>50?$("nav").addClass("op"):$("nav").removeClass("op")}),$(window).scroll(function(){$(this).scrollTop()>500?$("nav").addClass("sticky"):$("nav").removeClass("sticky")}),$(".achor-atc").click(function(){return ue.animate({scrollTop:$($.attr(this,"href")).offset().top},400),!1}),$("input[data-head-search]").focus(function(){P.addClass("nav-search_active"),V.addClass("hide"),window.innerWidth<768&&B.addClass("hide")}).blur(function(){P.removeClass("nav-search_active"),V.removeClass("hide"),window.innerWidth<768&&B.removeClass("hide")}),$(".tg-sl").click(function(e){$(this).toggleClass("open"),$(this).children(".tg-sl-cont").slideToggle(),e.stopPropagation()}),$(".map-titl").click(function(){$(this).is("active")||($(".map-titl").removeClass("active"),$(this).addClass("active"))}),$(e).on("click",".ex-tab, .ins-tab, .ex-tab-2",function(){var e,t=i(this,"data-id"),a=n(this,"ex-tab")?".ex-tab":n(this,"ins-tab")?".ins-tab":n(this,"ex-tab-2")?".ex-tab-2":null,o=n(this,"ex-tab")?".cont-tab":n(this,"ins-tab")?".cont-tab-ins":n(this,"ex-tab-2")?".cont-tab-2":null;if(!$(this).is("active")){$(a).removeClass("active"),$(o).removeClass("active"),$(this).addClass("active"),e=n(this,"ex-tab")?A:n(this,"ins-tab")?D:n(this,"ex-tab-2")?q:null;for(var c=0;c<e[J];c++){var r=i(e[c],"data-id");if(r==t)return void e[c][W].add("active")}}}),$(".tog-slide").click(function(e){$(this).toggleClass("open"),$(this).children(".tog-cont").slideToggle(),e.stopPropagation()});var we=(new Swiper(".slider_awards",{slidesPerView:4,spaceBetween:105,scrollbar:{el:".slider__scrollbar",dragSize:103,draggable:!0,hide:!1},breakpoints:{1050:{slidesPerView:3},760:{slidesPerView:2,spaceBetween:55}}}),new Swiper(".slider_client",{slidesPerView:4,spaceBetween:105,scrollbar:{el:".slider__scrollbar",dragSize:103,draggable:!0,hide:!1},breakpoints:{1050:{slidesPerView:3},760:{slidesPerView:2,spaceBetween:55}}}),new Swiper(".slider_reviews",{spaceBetween:700,pagination:{el:".slider-pagin",clickable:!0,renderBullet:function(e,t){return'<button class="bullet '.concat(t,'" >0').concat(e+1,"</button>")}},navigation:{nextEl:".btn-next",prevEl:".btn-prev"},allowTouchMove:!1,breakpoints:{1100:{allowTouchMove:!0}}}),new Swiper(".slider_article",{init:!1,effect:"fade",preloadImages:!1,lazy:!0,pagination:{el:".slider-pagin",clickable:!0,renderBullet:function(e,t){return'<button class="bullet '.concat(t,'" >0').concat(e+1,"</button>")}},navigation:{nextEl:".btn-next",prevEl:".btn-prev"}}));if(ie&&ie[J]>1&&we.init(),Z&&[].forEach.call(Z,function(e){new SimpleBar(e,{autoHide:!1,forceVisible:"x"})}),ee&&new SimpleBar(ee,{autoHide:!1,forceVisible:!0}),window.innerWidth<500){$("nav").addClass("nav-mob");var $e=i(t("input[data-head-search]"),"data-mob-text"),ye=t("input[data-head-search]");ye.setAttribute("placeholder",$e)}$(".s-category, .s-tag").on("change",function(){b(),current_page=1}),$(".ins-s").on("submit",function(e){e.preventDefault(),b(),current_page=1}),$(".s-practice, .s-sector, .s-location").on("change",function(){g()}),$(".law-s").on("submit",function(e){e.preventDefault(),g()}),$("#ajaxContent").click(function(e){var t=e.target,a=t.closest(".s-more"),n=t.closest(".s-clr"),o=t.closest(".cr-itm");if(a){var c={action:"loadmore",query:true_posts,page:current_page};$.ajax({url:ajax.url,data:c,type:"POST",success:function(e){e?($(".search-ins").append(e),current_page++,current_page==max_pages&&a.remove()):a.remove()}})}else if(n)$(".s-field, .s-field-law").val(""),$(".cr-itm").each(function(){$(this).remove()}),v(".s-sel",0,"change");else if(o){var r=i(o,"data-type");"cat"===r?v(".s-category",0,"change"):"tag"===r?v(".s-tag",0,"change"):"practice"===r?v(".s-".concat(r),0,"change"):"location"===r?v(".s-".concat(r),0,"change"):"sector"===r?v(".s-".concat(r),0,"change"):"s"===r&&$(".s-field, .s-field-law").val("").trigger("submit"),o.remove()}}),$(".ajaxForm").on("submit",function(e){e.preventDefault();var t,a=this.elements,n=i(this,"data-type");"sub"==n?(pe[W].add("load"),t=h(a,n),t?y(t,n,this):pe[W].remove("load")):"pdf"==n?(he[W].add("load"),t=h(a,n),t?y(t,n,this):he[W].remove("load")):"touch"==n&&(me[W].add("load"),t=h(a,n),t?y(t,n,this):me[W].remove("load"))});var xe=location.search.split("tab=")[1];xe&&setTimeout(function(){$(".place-map li button").eq(xe).trigger("click"),L[xe][W].add("active")},500),be.on("submit",function(t){t.preventDefault();var a=$(".header-search-input"),i=a.val();e.location[Q]="/search/"+i})}(document);