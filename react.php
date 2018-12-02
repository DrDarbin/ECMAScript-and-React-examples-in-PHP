<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>React tests</title>
</head>
<body>
<div id="react-container"></div>
<div id="react-list"></div>
<div id="react-list-arr"></div>
<div id="react-list-class"></div>
<div id="react-list-class2"></div>

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
/**
 * Create react element
 * Property "data-reactroot" will be added to h1 automatically
 * it is a root component of a components tree
 **/ 
	var dish = React.createElement("h1", 
		{id: "recipe-0", 'data-type': "title"},
		"Baked Salmon"
	)
	ReactDOM.render(dish, document.getElementById('react-container'))

/**
 * Children elements
 * className = class since "class" is js reserved word
 **/
	var list = React.createElement(
		"ul",
		null,
		React.createElement("li", {className: "bw_list"}, "Element 1"),
		React.createElement("li", {className: "bw_list"}, "Element 2"),
		React.createElement("li", {className: "bw_list"}, "Element 3"),
		React.createElement("li", {className: "bw_list"}, "Element 4")
	)
	ReactDOM.render(list, document.getElementById('react-list'))

/**
 * Children elements
 * Using array to construct components
 * We need to use key for each children component
 **/
	var items = [
		"Element A",
		"Element B",
		"Element C",
		"Element D"
	]
	var list_arr = React.createElement(
		"ul",
		null,
		items.map((element, id) => 
			React.createElement("li", {key: id, className: "bw_list"}, element)
		)
	)
	ReactDOM.render(list_arr, document.getElementById('react-list-arr'))

/**
 * React.createClass
 * Creating react component to use it multiple times
 * We can use 'this' and 'this.props' inside 'render' function
 * for refernce to the instance of the component
 **/
	const IngredientsList = React.createClass({
		displayName: "IngredientsList",
		render() {
			return React.createElement(
				"ul", 
				{className: "ingredients"},
				React.createElement("li", null, "Element A1"),
				React.createElement("li", null, "Element A2"),
				React.createElement("li", null, "Element A3"),
				React.createElement("li", null, "Element A4")
			)
		}
	})

	list_class = React.createElement(IngredientsList, null, null)

	ReactDOM.render(
		list_class, 
		document.getElementById('react-list-class')
	)

/**
 * React.createClass with THIS, THIS.PROPS and array
 * We can use 'this' and 'this.props' inside 'render' function
 * for refernce to the instance of the component
 * take a look at using items2 array (especially for list_class2) -
 * the array is passed by referrence from list_class2 to IngredientsList2
 * via the {items2} and this.props.items2
 **/
 	const items2 = [
		"Element B1",
		"Element B2",
		"Element B3",
		"Element B4"
	]

	const IngredientsList2 = React.createClass({
		displayName: "IngredientsList",
		render() {
			return React.createElement(
				"ul", 
				{className: "ingredients"},
				this.props.items2.map((ingredient, id) =>
					React.createElement("li", {key: id}, ingredient)
				)
			)
		}
	})

	list_class2 = React.createElement(IngredientsList2, {items2}, null)

	ReactDOM.render(
		list_class2, 
		document.getElementById('react-list-class2')
	)
</script>
</body>
</html>