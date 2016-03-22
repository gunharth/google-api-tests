<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	@foreach($events->items as $item)
	{{ $item->summary }} {{ $item->start->dateTime }}
	@endforeach
</body>
</html>