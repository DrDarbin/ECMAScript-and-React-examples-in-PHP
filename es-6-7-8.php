<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>ES tests</title>
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
	//console.log(x2);
	
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
	//console.log(d);	// z
	//console.log('---------');
/**
 * DESCTRUCTION FROM ARRAY
 **/
	var [,,x] = ['a', 'b', 'c'];
	//console.log(x);	// c

/**
 * RESCTRUCTION FROM ARRAY
 **/
	var x = 1;
	var y = 2;
	var z = {x, y};
	//console.log(z);
	
	var print = function() {
		//console.log(`Property 1 is ${this.x}, property 2 is ${this.y}`);
	};
	var s = {x, y, print};
	//s.print();

/**
 * SPREAD OPERATOR (...) (ОПЕРАТОР РАСПРОСТРАНЕНИЯ) ...
 * Can be used for arrays and objects
 * creates copy or do similar to implode (PHP) action
 **/
	var peaks = ['a', 'b', 'c'];
	var [last] = [...peaks].reverse();	// creates a copy of the array
	//console.log(last);
	//console.log(peaks.join(','));	// the array remained unchenged

	var [first, ...rest] = peaks;
	//console.log(rest.join(','));	// rest of the elemets

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
	//console.log('--------');

/**
 * CLASSES
 **/
	class Test {
		constructor(prop1, prop2) {
			this.p1 = prop1
			this.p2 = prop2
		}
		
		print() {
			console.log(`Proprties of this class are: ${this.p1} and ${this.p2}`)
		}
	}
	const t = new Test('x1', 'x2')
	t.print()

	class Test2 extends Test {
		constructor(prop1, prop2, prop3){
			super(prop1, prop2)
			this.p3 = prop3
		}
		print(){
			super.print()
			console.log(`Test 2 uses additional ${this.p3} property`);
		}
	}
	const t2 = new Test2('y1','y2', 'y3')
	t2.print()

/**
 * MODULES: EXPORT/IMPORT
 * This feature is only just beginning to be implemented in browsers natively at this time. It is implemented in many transpilers, such as * * * TypeScript and Babel, and bundlers such as Rollup and Webpack.
 *  See test-module.js for export function examples
 **/
	//import {print, log} from 'test-module.js'

	// test-module.js (for export)
	// export const print(message) => log(y1, new Date())
	// export const log(x1, x2){
	//	console.log(`Message: ${x1}; Date: ${x2.toString()}`)
	// }

	// CommonJS (for Node.js)
	// const {log, print1} = require('test-module.js') // for import

	// module.exports = {print, log} // for export

/**
 * FUNCTIONAL PROGRAMING
 * concat
 **/
	// Creating a copy of an object
	//Object.assign()
	
	// array joining. The function creates a copy of an array and adds new values to it
	//Array.concat({})

	let a = [{x: "1"}, {x: "2"}, {x: "3"}]
	//console.log(a)
	const addX = (y, arr) => arr.concat({y})
	b = addX("4", a)
	//console.log("initial array a: " + a)
	//console.log("new array: " + b)
	//console.log(b)

	const addX2 = (z, arr2) => [...arr2, {z}]
	c = addX("5", b)
	//console.log(c)

	// Pure functions rules: 
	// 1. get args
	// 2. return values or functions
	// 3. don't make changes in the outer world

/**
 * FILTER, MAP
 **/
	const schools = ["Omaha", "Warton", "Wolis"]
	// console.log(schools.join(" | "))
	// check if the first letter of each element is W
	const wschools = schools.filter(string => string[0] === "W")
	//console.log(wschools)
	
	// Delete array elements with "filter" function, since it doesn't change the initial array (don't us pop, splice etc.)
	const cutSchools = (cut, list) => list.filter( school => school !== cut)
	//console.log(cutSchools("Warton", schools))

	const nameSchools = list => list.map(school => `${school} High School`)
	const objSchools = list => list.map(school => `{name: ${school} High School`)
	const objSchools2 = schools.map(school => ({name: school}))
	//console.log(nameSchools(schools))
	//console.log(objSchools(schools))
	//console.log(objSchools2)

	const editName = (oldName, name, arr) => 
		arr.map (item => (item.name === oldName) ? ({...item, name}) : item
		)
	const schoolsEdited = editName("Omaha", "New Name", objSchools2)
	//console.log(schoolsEdited)
	//console.log(objSchools2)

/**
 * REDUCE
 * implements actions for each element in array, reducing it
 * The reduce() method executes a reducer function (that you provide) on each member of the array resulting in a single output value.
 * Your reducer function's returned value is assigned to the accumulator, whose value is remembered across each iteration throughout the array and ultimately becomes the final, single resulting value.
 * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/Reduce
 **/
	
	// DEMO 1
	const array1 = [1, 2, 3, 4];
	const reducer = (accumulator, currentValue) => accumulator + currentValue;

	// 1 + 2 + 3 + 4
	console.log(array1.reduce(reducer));
	// expected output: 10

	// 5 + 1 + 2 + 3 + 4
	console.log(array1.reduce(reducer, 5));
	// expected output: 15
	
	// DEMO 2
	const ages = [21, 35, 18, 89, 34, 23, 20]
	const maxAge = ages.reduce(
			(max, value) => {
				//console.log(`${max} > ${value} = ${max > value}`);
				if(max > value) {
					return max
				}
				else {
					return value
				}
				// we need to delete console.log to use short form:
				//(max > value) ? max : value;
			}, 0
		)
	//console.log(maxAge)
/**
 * REDUCE RIGHT - reduce an array from the end
 **/

/**
 * HIGHER-ORDER FUNCTIONS
	is a function that does at least one of the following:
		- takes one or more functions as arguments (i.e. procedural parameters),
r		- eturns a function as its result.
 **/

	// option 1
	const function2 = function1 => function1("pass function as argument")
	function2(arg => console.log(arg))
	
	// option 2
	const f2 = f1 => arg => f1(arg + "!")
	f3 = f2(msg => console.log(msg))
	f3("test 3")
/**
 * RECURSION
 **/
	/*const countdown = (value, fn) => {
		fn(value)
		return (value > 0) ? countdown(value-1, fn) : value
	}
	countdown(10, value => console.log(value))*/

	console.log('------------')

/**
 * COMPOSE FUNCTIONS
 * similar to f1.f2.f3 or f1(f2(f3))
 * http://functionaljs.com/functions/compose/
 * better to install functional.js
 **/

	// this trik with spread operator ...fns (terrate through the functions) can be done with functions only
	// composed - is a returned value on each iterration
	// the first iterration returns arg as a f
	// (composed, f) => f(composed) is a reducer arrow function used in reduce
	const compose = (...fns) =>
		(arg) =>
			fns.reduce(
				(composed, f) => f(composed),
				arg
			)
	
	const ff1 = a => a + 1
	const ff2 = b => b + 2
	const ff3 = c => c + 100
	const ff4 = e => console.log(e)
	
	//similar to
	//ff4(ff3(ff2(ff1(300))))

	const fsum = compose(
		ff1,
		ff2,
		ff3,
		ff4
	)
	fsum(400)

	/*
	// functional.js example
	var e = function (a) {
		return "hello " + a;
	};
	var f = function (a) {
		return a + 1;
	};
	var g = function (a) {
		return a * 100;
	};
	var composed = fjs.compose(e, f, g);
	composed(2); // => "hello 201"
	*/
</script>

</body>
</html>