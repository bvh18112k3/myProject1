<!DOCTYPE html>
<html>
<body>

<form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
    @csrf
    <img src="" alt="">
    Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
