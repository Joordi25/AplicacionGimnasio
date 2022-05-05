$(document).ready(function(){
    $(".submit-button.correct").click(function(){
        $(".input-fields").addClass("run-ani");
    });
  
    $(".submit-button.correct").click(function(){
        setTimeout(function(){
       $(".submit-section").addClass("run-ani");
   }, 300);
    });
  
    $(".submit-button.correct").click(function(){
        setTimeout(function(){
       $("#success-tick").addClass("run-ani");
   }, 1100);
    });
  
    $(".submit-button.correct").click(function(){
        setTimeout(function(){
       $("span.success-text").addClass("run-ani");
   }, 1300);
    });

    $(".code-rerun").click(function(){
        $(".input-fields, .submit-section").removeClass("run-ani");
    });
  
    $(".code-rerun").click(function(){
        $("#success-tick").removeClass("run-ani");
    });
  
    $(".code-rerun").click(function(){
        $("span.success-text").removeClass("run-ani");
    });
});