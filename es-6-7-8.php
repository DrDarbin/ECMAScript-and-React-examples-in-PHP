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
	//console.log(pizza);
	
	const pizza2 = 2;
	//pizza2 = 3; // Error
	//console.log(pizza2);

/**
 * LET
 * izolates visual area of var
 **/
	var topic = 4;
	if(topic){
		let topic = 5;
		console.log('block', topic);
	}
	//console.log('global', topic);

/**
 * `${}`
 * template for vars
 **/
	//console.log(`${pizza}, ${pizza2}, ${topic}`);

	/*console.log(`
		Hello, ${pizza}!

		Whitespaces and formating remain untuched.
		${pizza2}!

		${topic}
	`);*/

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
	//introduction();
	//introduction( newPerson );

/**
 * ARROW FUNCTION
 * var function_name = x => [function body]
 **/
	var fname = 'Glen';
	var lname = 'Green';
	
	var arrow_func1 = firstName => console.log(`Arrow function test name is: ${firstName}`);
	var arrow_func2 = (firstName,lastName) => console.log(`Arrow function test name is: ${firstName} ${lastName}`);
	
	//arrow_func1(fname);
	//arrow_func2(fname, lname);

/**
 * ARROW FUNCTION
 * var function_name = x => [function body]
 **/
	var arrow_func3 = (firstName,lastName) => {
		if(!firstName){
			throw new Error('firstName is required');
		}
		
		if(!lastName){
			throw new Error('lastName is required');
		}
		console.log(`Arrow function test name is: ${firstName} ${lastName}`);
	}
	//arrow_func3('xyz');

/**
 * DESCTRUCTION
 **/
	var x = {
		x1: "Alex",
		x2: "Ann"
	}
	var {x2} = x;
	console.log(x2);
	
	lordify = (z) => {
		console.log(`${z.x1} is a lord`);
	}
	lordify(x);		// Alex is a second lord
	
	lordify2 = ({x1}) => {
		console.log(`${x1} is a second lord`);
	}
	lordify2(x);	// Alex is a second lord

	// destruction in array
	var arr = ["x","y","z"];
	var [,,d] = arr;
	console.log(d);	// z
	console.log('---------');
/**
 * DESCTRUCTION FROM ARRAY
 **/
	var [,,x] = ['a', 'b', 'c'];
	console.log(x);	// c

/**
 * RESCTRUCTION FROM ARRAY
 **/
	var x = 1;
	var y = 2;
	var z = {x, y};
	console.log(z);
	
	var print = function() {
		console.log(`Property 1 is ${this.x}, property 2 is ${this.y}`);
	};
	var s = {x, y, print};
	s.print();

/**
 * ОПЕРАТОР РАСПРОСТРАНЕНИЯ ...
 * Can b used for arrays and objects
 **/
	var peaks = ['a', 'b', 'c'];
	var [last] = [...peaks].reverse();	// creates a copy of the array
	console.log(last);
	console.log(peaks.join(','));	// the array remained unchenged

	var [first, ...rest] = peaks;
	console.log(rest.join(','));	// rest of the elemets

/**
 * PROMISES
 * https://learn.javascript.ru/promise
 **/
	var p = new Promise(function(resolve,reject){
		//... asynch code here
		//throw new Error('Promise error');
	});
	//p.catch(alert);

	/*var promise = new Promise((resolve, reject) => {

		setTimeout(() => {
			reject(new Error("время вышло!"));
		}, 1000);

	});

	promise
		.then(
			result => alert("Fulfilled: " + result),
			error => alert("Rejected: " + error.message) // Rejected: время вышло!
		);*/
	
	// chaining
	/*httpGet(...)
		.then(...)
		.then(...)
		.then(...)
		.catch(error => {
			alert(error); // Error: Not Found
		});
	*/
	/*
	1. Функция в первом then возвращает «обычное» значение user. Это значит, что then возвратит промис в состоянии «выполнен» с user в качестве результата. Он станет аргументом в следующем then.
	2. Функция во втором then возвращает промис (результат нового вызова httpGet). Когда он будет завершён (может пройти какое-то время), то будет вызван следующий then с его результатом.
	3. Третий then ничего не возвращает.*/

</script>

</body>
</html>