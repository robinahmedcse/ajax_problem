<html>
    <head>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    
    
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

 

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    </head>
    
    
    <body >

        <form>
            <input type="hidden" id="token_si" name="_token" value="{{ csrf_token()}}">
            <input type="search" size="30" onkeyup="search()" id="mySearch">
        </form>

   
        <?php  $customers = DB::table('tbl_customer')->get(); ?>
        
   <table  class="table table-bordered table-hover table-condensed generaldata ">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
            </tr>
        </thead>
            <tbody id="">
             @foreach($customers as $customer)
            <tr>
                <td>{{$customer->CustomerName}}</td>
                 <td>{{$customer->City}}</td>
            </tr>
             @endforeach
            
        </tbody>
       
    </table>
    
 
        
        <table  class="table table-bordered table-hover table-condensed ajaxdata" style="display: none">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
            </tr>
        </thead>
         <tbody id="success">
            
        </tbody>
    
    </table>
  
    
     </body>
</html>







<script type="text/javascript">
    
    function search(){
        
        var search = $("#mySearch").val();
        
        if(search){
            $(".generaldata").hide();
            $(".ajaxdata").show();
        }else{
              $(".generaldata").show();
            $(".ajaxdata").hide();
        }
        

        $.ajax({
             // type:'GET',
               type:"POST",
                 url:'{{URL::to("/search/caught")}}',
               data:{
                   search:search,
                   _token:$('#token_si').val()
               },
               datatype:'html',
               
                success:function(response)
                        {
                          console.log(response);
                         $('#success').html(response);
                        }
    
                });
    
    
            }
 
</script> 

 