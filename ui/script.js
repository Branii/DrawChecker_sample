$(function () {
  $("#checker").on("click", function () {
    if ($(this).is(":checked")) {
      $.post("app/exec/startchecker.php", function (data){
        console.log(data);
      })
    } else {
      $.post("app/exec/stopchecker.php", function (data){
        console.log(data);
      })
    }
  });


  $("#worker").on("click", function () {
    if ($(this).is(":checked")) {
      $.post("app/exec/startworker.php", function (data){
        console.log(data);
      })
    } else {
      $.post("app/exec/stopworker.php", function (data){
        console.log(data);
      })
    }
  });

});
