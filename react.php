<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>React tests</title>
</head>
<body>
<div class="react-container"></div>

<!-- React libraries -->
<script src="https://unpkg.com/react@15.4.2/dist/react.js"></script>
<script src="https://unpkg.com/react-dom@15.4.2/dist/react-dom.js"></script>

<!-- https://reactjs.org/docs/cdn-links.html -->
<!-- React 16 for development -->
<!-- <script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script> -->

<!-- React 16 for production -->
<!-- <script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script> -->

<!-- React -->
<script>
	React.createElement("h1", {id: "test001", 'data-type': "title"}, "Test React DOM")
</script>
</body>
</html>