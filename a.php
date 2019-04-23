<script type="text/javascript">

 var Text = 'hello';

 
 
 function myFunction1() {
 	var y = document.getElementById("a1");
    y.style.display = "none";
 
   var x = document.getElementById("a2");
    x.style.display = "block";
  }
   function myFunction() {
 	var y = document.getElementById("a2");
    y.style.display = "none";
 
   var x = document.getElementById("a1");
    x.style.display = "block";
  }

  </script>
<style type="text/css">
	#a2{
		display: none;
	}
</style>

<html>
      
      <input type='submit' name='a1' id="a1" value='button1' onclick='myFunction1()'>
      <input type='submit' name='a2' id="a2" value='button2' onclick='myFunction()'>
</html>