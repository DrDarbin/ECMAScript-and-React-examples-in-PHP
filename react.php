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
<div id="react-fabric"></div>
<div id="react-fabric2"></div>
<div id="react-fabric3"></div>
<div id="jsx-1"></div>

<h2>- properties-and-defaults</h2>
<div id="properties-and-defaults"></div>

<!-- React libraries -->
<script src="https://unpkg.com/react@15.4.2/dist/react.js"></script>
<script src="https://unpkg.com/react-dom@15.4.2/dist/react-dom.js"></script>

<!-- Babel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.29/browser.js"></script>

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

/**
 * Factory
 * to create elements
 **/
	fabricList = React.DOM.ul(
		{className: "fabric"},
		React.DOM.li(null, "C1"),
		React.DOM.li(null, "C2"),
		React.DOM.li(null, "C3")
	)
	ReactDOM.render(fabricList, document.getElementById('react-fabric'))

/**
 * Factory with map-function
 * to create elements
 **/
	var items = ["C91", "C92", "C93"]
	fabricList2 = React.DOM.ul(
		{className: "fabric2"},
		items.map((ingredient, i) =>
			React.DOM.li({key: i}, ingredient)
		)
	)
	ReactDOM.render(fabricList2, document.getElementById('react-fabric2'))

/**
 * Custom Factory
 * To simplify the code and use it as a function instead of createElement construction
 **/
	const {render} = ReactDOM
	
	var arr3 = ["D1", "D2", "D3"]

	const ingredientList = ({arr3}) =>
		React.createElement(
			'ul',
			{className: "factory"},
			arr3.map((ingredient, i) =>
				React.createElement('li', {key: i}, ingredient)
			)
		)
	
	const igredientsFunc = React.createFactory( ingredientList )

	render(
		ingredientList({arr3}),
		document.getElementById('react-fabric3')
	)
</script>

<!--
 - JSX
 - Babel
 -->
	<script type="text/babel">
/**
 * JSX
 * It looks like creating custom <XYZ atr="abc"> functions 
 * with "atr" atributes, we can put arrays there also
 **/
		const Menu = ({title}) =>
			<article>
				<header>
					<h1>{title}</h1>
				</header>
			</article>
		
		ReactDOM.render(
			<Menu title="JSX-example-1" />,
			document.getElementById('jsx-1')
		)
/**
 * Variable types and properties required
 * Default values
 *
 * Example: Check if the var is array, for instance
 * probably we need to install prop-types first, otherwise we will get an error
 * "propTypes is not defined"
 * https://stackoverflow.com/questions/45692537/proptypes-is-not-defined
 **/
	const Summary = React.createClass({
		displayName: "Summary",
		propTypes: {
			title: PropTypes.string.isRequired,
			ingredients: PropTypes.array.isRequired,
			steps: PropTypes.array.isRequired
		},
		/* 
		// or we can use this to show default properties
		getDefaultProps(){
			return {
				ingredients: 0,
				steps: 0,
				title: "[recipe]"
			}
		}*/
		render() {
			const {title, ingredients, steps} = this.props
			return (
				<div className="Summary">
					<h1>{title}</h1>
					<p>
						<span>{ingredients.length} Ingredients | </span>
						<span>{steps.length} Steps</span>
					</p>
				</div>
			)
		}
	})

	ReactDOM.render(
		<Summary	title = "Summary"
					ingredients = "a, b, c"
					steps = "x, y, z"/>,
		document.getElementById('properties-and-defaults')
	)
/**
 * Manual checking of properties
 * Example: property is a string 20 symbols long
 **/
	propTypes: {
		ingredients: PropTypes.array.isRequired,
		steps: PropTypes.array.isRequired,
		title: (props, propName) =>
			(typeof props[propName] !== 'string') ?
				new Error("A title must be a string") :
				(props[propName].length > 20) ?
					new Error("Title is over 20 characters") :
					null
	}
	</script>
</body>
</html>