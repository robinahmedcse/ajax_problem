 
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ajax</title>

        <!-- ajax -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  



        <script>


        var xmlHttp = new XMLHttpRequest();

        function ajax_email_check(given_email, objectId) {
        //alert(objectId);

            var sarverPage = 'ajax/email/check/' + given_email;
        // alert(sarverPage);
            xmlHttp.open('GET', sarverPage);

            xmlHttp.onreadystatechange = function () {
             //   alert(xmlHttp.readyState);
       //         alert(xmlHttp.status);

                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    document.getElementById(objectId).innerHTML = xmlHttp.responseText;
                }

            }//onreadystatechange
            xmlHttp.send(null);
        }//end of function ajax_email_check


        </script>

    </head>
    <body>


        {!! Form::open(['url'=>'#','method'=>'POST','class'=>'form-horizontal form-label-left']) !!}
        <!-- Category name -->
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category-name">email<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="email" name="email" onblur="ajax_email_check(this.value, 'res');"  id="email">
                <span class="text-danger" id="res"></span>

        
            </div>
        </div>



        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
<!--                    <input type="submit" name='btn' value="Save " class="btn btn-success">-->
            </div>
        </div>
        {!! Form::close() !!}



 

        
        
    </body>
</html>

 

