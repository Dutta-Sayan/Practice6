<?php






?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <style>
    .container{
      width: 1200px;
      margin: auto;
    }
    .show-images{
      display: flex;
      flex-wrap: wrap;
    }
    .image{
      width: 300px;
      height: 300px;
      padding: 20px;
      img{
        width: 300px;
        height: 300px;
        margin: 10px;
        object-fit: cover;
      }
    }
    .load{
      height: 30px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="show-images">
        
      </div>
      <button class="load">Load more</button>
  </div>

  <script>
    $(document).ready(function(){
      var limit =2;
      var start = 0;
      function loadImage(limit, start) {
        $.ajax({
          url:"loadimage.php",
          type: "POST",
          data: {
            limit : limit,
            start : start
          },
          dataType: 'json',
          success: function(response) {
            console.log(response);
            $.each(response, function(key, value){
              $(".show-images").append('<div class="image"><img src='+value['path']+' alt=""></div>');
            });
          }
        });
      }
      loadImage(limit, start);
      $(".load").click(function(){
        start =start +limit;
        loadImage(limit, start);
      })
    });
  </script>
</body>
</html>