<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    
<div class="visible-print text-center">
	<h1> QR Code Generator Example</h1>
     
    {!! QrCode::size(250)->generate('www.example.in'); !!}
     
    <p>example </p>
</div>
    
</body>
</html>