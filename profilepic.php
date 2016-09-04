<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="scripts/jquery.imgareaselect.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/imgareaselect-deprecated.css" />
    <script type="text/javascript">
        function submitForm() {
            console.log("submit event");
            var fd = new FormData(document.getElementById("fileinfo"));
            fd.append("label", "WEBUPLOAD");
            $.ajax({
                xhr: function() {
            var xhr = new window.XMLHttpRequest();
            xhr.addEventListener('progress', function(e) {
                if (e.lengthComputable) {
                     console.log(100 * (e.loaded / e.total) + '%');
                }
            });
            return xhr;
        }, 
              url: "file_upload_parser.php",
              type: "POST",
              data: fd,
              processData: false,  // tell jQuery not to process the data
              contentType: false,  // tell jQuery not to set contentType
            }).done(function( data ) {
                $("#output").empty();
                 $("#output").append(data);
                var imagePath = $('#people').attr('src');

                 jQuery('input[name=original]').val(imagePath);
                 $(".imgareaselect-selection").parent().remove();
                 $(".imgareaselect-outer").remove();
              $("#output").ready(function () {


     
 $('#people').imgAreaSelect({
    x1 : 200,
    y1 : 200,
    x2 : 400,
    y2: 400,
    minHeight:100,
    minWidth:100,
    persistent: true,
    aspectRatio: '1:1',
    id: "mydiv",
  
    fadeSpeed: "1",
    handles: true,
    onSelectEnd: function ( image, selection) {
        var img = document.getElementById('people');
        var width = img.naturalWidth;
        var height = img.naturalHeight;
        var ratio = height/$("#people").height();
        alert(ratio);
       
        console.log(imagePath)
            jQuery('input[name=x1]').val(selection.x1);
            jQuery('input[name=y1]').val(selection.y1);
            jQuery('input[name=ratio]').val(ratio);
            
            jQuery('input[name=width]').val(selection.width);
            jQuery('input[name=height]').val(selection.height);
        }
});

});


                          });
            return false;
        }
    </script>
    <style type="text/css">
        #output{
            height: 60%;
            max-width: 60%;
        }
        #output img{
          max-width: 100%;
          max-height: 100%;
        }
        .uploadbody{
         
          width: 100%;
          height: 100%;
        }
        #fileinfo{
          width: 30%;
        }
        #fileinfo input{
          background-color: white;
          margin: 10px;
        }
    </style>
</head>
<div class="uploadbody">
    <form method="post" id="fileinfo" name="fileinfo" onsubmit="return submitForm();">
        <label>Select a file:</label><br>
        <input type="file" name="file" required />
        <input type="submit" value="Upload" />

    </form>
   
   <div id="container">
    <div id="output"></div>
     <form action="img.php" method="post" >
       <input type="hidden" name="x1" value="" />
       <input type="hidden" name="y1" value="" />
       <input type="hidden" name="ratio" value="" />
       <input type="hidden" name="original" value="" />
       <input type="hidden" name="width" value="" />
       <input type="hidden" name="height" value="" />
       <input type="submit" value="Crop" />

   </form>
    </div>
</div>
</html>