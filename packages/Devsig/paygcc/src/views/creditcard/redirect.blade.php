@if(isset($response))
    {!! $response !!}
@endif

@if($response_url)
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
    <script type="text/javascript">

        function htmlDecode(input){
            var e = document.createElement('textarea');
            e.innerHTML = input;
            // handle case of empty input
            return e.childNodes.length === 0 ? "" : e.childNodes[0].nodeValue;
        }
        
        window.location = htmlDecode("{{$response_url}}");
    </script>
</body>
</html>
@endif
