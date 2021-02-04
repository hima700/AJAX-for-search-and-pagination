<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class = "a">

 <div class="jumbotron text-center">
    <input type="text" id="search_box" name="query" placeholder="Search here" size="50" > 
 </div>
<div>
  
<div class="container">
      <div id="tableData">    
      </div>
</div>

</body>

<style>
    body {
        color: rgb(117, 93, 62);
        background: rgb(135, 185, 202);

    }

	div.a {
        font-size: large;
		color: rgb(117, 93, 62);
        background: rgb(135, 185, 202);
    }

    div.a input {
        padding: 10px;
		    border: 2px solid rgb(135, 185, 202);
    }

</style>




</html>

<script type="text/javascript">
  $(document).ready(function(){
    function loadData(page, query =''){
      $.ajax({
        url  : "pagination.php",
		    method : "POST",
		    data : {page:page, query:query},
        success:function(data){
		     $("#tableData").html(data);
		  
        }
      });
    }
    loadData();
    
    // Pagination code
    $(document).on('click', '.pagination li a', function(e){
      e.preventDefault();
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      loadData(page,query);
	});

	$('#search_box').keyup(function(){
		var query = $('#search_box').val();
		loadData(1,query);
	});
	
  });
</script>




