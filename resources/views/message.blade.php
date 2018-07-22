<html>
   <head>
      <title>Ajax Example</title>
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      
      
   </head>
   
   <body>
      <div id = "msg">0</div>
      <?php
         echo Form::button('Add To Cart',['onClick'=>'getMessage()']);
      ?>
      <button onclick="getMessage()">Try it</button>

      <script>
         function getMessage(){
            $.ajax({
               type:'POST',
               url:'/getmsg',
               success:function(data){
                  $("#msg").html(data.msg);
               }
            });
         }
         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
         });
      </script>
   </body>

</html>