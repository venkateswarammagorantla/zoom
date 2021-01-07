<!DOCTYPE html>
<html>
<body>
<form action="{{URL::to('/uploadfile1')}}" method="post" enctype="multipart/form-data">
	<input type="file" name="image">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	<input type="submit" value="upload_file">
</form>
</body>
</html>