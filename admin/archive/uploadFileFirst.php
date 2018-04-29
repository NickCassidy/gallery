<!DOCTYPE html> 
<html lang="en">
<head>
<style>
.btn {
  background: #ffffff;
  background-image: -webkit-linear-gradient(top, #ffffff, #ffffff);
  background-image: -moz-linear-gradient(top, #ffffff, #ffffff);
  background-image: -ms-linear-gradient(top, #ffffff, #ffffff);
  background-image: -o-linear-gradient(top, #ffffff, #ffffff);
  background-image: linear-gradient(to bottom, #ffffff, #ffffff);
  -webkit-border-radius: 6;
  -moz-border-radius: 6;
  border-radius: 6px;
  font-family: Arial;
  color: #000000;
  font-size: 16px;
  padding: 10px 20px 10px 20px;
  border: solid #1f628d 2px;
  text-decoration: none;
}

.btn:hover {
  background: #eeeeee;
  background-image: -webkit-linear-gradient(top, #eeeeee, #dddddd);
  background-image: -moz-linear-gradient(top, #eeeeee, #dddddd);
  background-image: -ms-linear-gradient(top, #eeeeee, #dddddd);
  background-image: -o-linear-gradient(top, #eeeeee, #dddddd);
  background-image: linear-gradient(to bottom, #eeeeee, #dddddd);
  text-decoration: none;
}	

</style>	


</head>
<body>
<h1>Upload Main Photo</h1>
<form action="uploadFile.php" method="POST" enctype="multipart/form-data">
<input type="File" class="btn" name="file" size="100"><br><br>
<input type="Submit" class="btn" value="Upload"> 
</form>
</body>
</html>