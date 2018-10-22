<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>React tests</title>
</head>
<body>

<script>
/**
 * CONSTANTS
 * can't be changed
 **/
	var pizza = true;
	pizza = false;
	console.log(pizza);
	
	const pizza2 = 2;
	//pizza2 = 3; // Error
	console.log(pizza2);

/**
 * LET
 * izolates visual area of var
 **/
	var topic = 4;
	if(topic){
		let topic = 5;
		console.log('block', topic);
	}
	console.log('global', topic);

/**
 * `${}`
 * template for vars
 **/
	console.log(`${pizza}, ${pizza2}, ${topic}`);

	console.log(`
		Hello, ${pizza}!

		Whitespaces and formating remain untuched.
		${pizza2}!

		${topic}
	`);

/**
 * DEFAULT PARAMETERS
 * can be used in the functions
 **/
	var defaultPerson = {
		name: {
			first: "Jhon",
			last: "Doe"
		},
		profession: "Developer"
	}
	var newPerson = {
		name: {
			first: "Greg",
			last: "Matue"
		},
		profession: "Marketer"
	}
	function introduction( p = defaultPerson ){
		console.log(`Hello! My name is ${p.name.first} ${p.name.last}. I\'m a ${p.profession}`);
	}
	introduction();
	introduction( newPerson );

/**
 * ARROW FUNCTION
 * var function_name = x => [function body]
 **/
	var fname = 'Glen';
	var lname = 'Green';
	
	var arrow_func1 = firstName => console.log(`Arrow function test name is: ${firstName}`);
	var arrow_func2 = (firstName,lastName) => console.log(`Arrow function test name is: ${firstName} ${lastName}`);
	
	arrow_func1(fname);
	arrow_func2(fname, lname);
</script>

</body>
</html>