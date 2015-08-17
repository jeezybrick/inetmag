$(window).resize(function () {
    whatSize();
});

function whatSize() {
    if (window.innerWidth < "768") {
       /* $(".image_top").css("margin-bottom", "35px").css("margin-top", "0px");*/
        $("#nout_pl_panel,#bit_tehn_panel,#collapsePhone").css("position", "relative");
        /*  $(".notebookList").css("height", "auto");*/
        $("#zagolovok").addClass("text-center");
        $("#submitButtonAddComment").addClass("btn-block");


    } else {
      /*  $(".image_top").css("margin-bottom", "0px").css("margin-top", "35px");*/
          $("#nout_pl_panel,#bit_tehn_panel,#collapsePhone").css("position", "absolute");
       /* $(".notebookList").css("height", "350px");*/
          $("#zagolovok").removeClass("text-center");
          $("#submitButtonAddComment").removeClass("btn-block");

    }

    if (window.innerWidth < "1200") {
 $(".notebookList").css("height", "auto");
    } else {
 $(".notebookList").css("height", "420px");
    }
         
}
whatSize();