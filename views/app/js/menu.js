$(function() {
     var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
console.log (pgurl);
//console.log($(".sub li").attr("class"));
     $(".sub li ").removeClass('active');
     console.log($(".sub li").attr("class"));

     $(".sub li a").each(function(){
//console.log($(this).attr("href"));
          if($(this).attr("href") == pgurl){
          	
           $(this).parent().addClass("active");
           $(this).closest('.sub').addClass("active");
           $(this).closest('ul').removeAttr("style");
           $(this).parent().addClass("active");
          $(this).closest('.dcjq-parent-li').addClass("active");
          $(this).closest('a').next().find('.dcjq-parent').addClass("active");
         // $(this ).parent('ul').addClass("active");
          //sub-menu dcjq-parent-li
console.log($(".sub").parent().attr("class"));
console.log($(this).closest('a').next().find('.dcjq-parent').attr("class"));
         }
     })
});