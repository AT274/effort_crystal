$(function() {
  $('.add').on("click", function() {
    console.log("ok");
    var id = $(this).data('triangle')
    var value = $('#slidevalue' + id).text()
    console.log(value)
    $.ajax('http://192.168.33.10/myapp/goals/addOne/' + id + '/' + value, {
        type: 'get'
      })
      .done(function(data) {
        console.log(data);
        var data = JSON.parse(data);
        var progress = data.progress;
        console.log(progress);

        //achieveしたら削除
        if (progress == "achieve") {
          console.log("achieve!");
          $.ajax('http://192.168.33.10/myapp/goals/delete/' + id, {
              type: 'post'
            })
            .done(function(data) {
              data = JSON.parse(data);
              deletable = data.status;
              console.log("deletable:" + deletable);
              if (deletable == "true") {
                $('.delete-target-' + id).hide();
              } else {
                console.log("done消去に失敗しました");
              }
            })
            .fail(function() {
              console.log("消去に失敗しました");
            });
        } else {
          obj[id].refresh(progress, obj[id].max);
          $('.progress-' + id).text(progress);
        }
      })
      .fail(function() {
        window.alert('1足せませんでした');
      });
  });
});