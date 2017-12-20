$(function() {
  $('.delete_achievement').on("click", function() {
    console.log("デリートはじまり");
    var id = $(this).data('x');
    console.log(id);
    $.ajax('http://192.168.33.10/myapp/achievements/delete/' + id, {
        type: 'post'
      })
      .done(function(data) {
        data = JSON.parse(data);
        deletable = data.status;
        console.log("deletable:" + deletable);
        if (deletable == "true") {
          $('.delete-target-achievement-' + id).hide();
        } else {
          console.log("done消去に失敗しました");
        }
      })
      .fail(function() {
        console.log("消去に失敗しました");
      });
  })
});