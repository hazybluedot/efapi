---
title: Summary
morea_id: prelab08-summary
morea_type: module
published: true
---
We introduced the following topics

# Commenting

- Comments are for the benefit of the human reader:
    - yourself, including your future self
	- others you share your code with
	- the grader to help assess your intent and thought process
- Comments can be helpful, or redundant and unhelpful. 
- Comments are *necessary* to describe the meaning of literal values
  included in code.

# User interaction

- Requesting user input using the `input` function.

  The key understanding when using the `input` function is that when
  MATLAB evaluates it, it will wait until the user presses the "Enter"
  key before moving on to evaluate anything else in the program. It
  will happily wait indefinitely because computers are very patient.
  If it looks like your program isn't running after clicking the "run"
  button, it might just be waiting for you to give it some input.
  
  
- Printing formatted output using `fprintf`

  The use of `fprintf` can be challenging for new users. Be sure to
  spend some time experimenting with it to better understand its
  behavior. The key concept is that `fprintf` takes a *[format
  specification](https://www.mathworks.com/help/matlab/ref/fprintf.html#btf8xsy-1_sep_shared-formatSpec)*
  which is text that is used as a template, followed by one or more
  expressions (usually variable names) that are used as values to fill
  in the template.
  
  - A format specification may contain one for more *formatting
    operators*, a sequence of characters starting with <kbd>%</kbd>
    and ending with a *conversion character* depending on the type of
    value and how it should be displayed. Common conversion characters
    we will use are
	
	- `%d` or `%i` for integer values (whole numbers, no decimal point), e.g. `1`, `9002`
	- `%f` for floating-point numbers. Floating-point refers to how the computer stores the number, for our purposes you can think of it as numbers that have a decimal point, e.g. `2.5`, `5.0`. Control the precision (the number of values to show after the decimal place) by including the number of values between the `%` and `f` character:
	  - `%.2f` will format a number with two digits after the decimal
	- `%e` or `%E` for formatting numbers using scientific
      notation. Especially useful if you need to display a number with
      a fixed number of significant figures, e.g. `%.2e` will format a
      number using three significant figures, one before the decimal,
      two after.
	- `%s` for string values. Strings are sequences of characters most commonly used for displaying text.


# Vectors and matrices

- What they are
- How to initialize them in MATLAB
  - Arbitrary values
  
  ``` matlab
  x = [5 2 8 9];
  ```
  - A sequence of numbers between a defined start and end value at
	fixed interval. Use when the interval needs to be specified
	exactly. The length of the vector will be automatic.
	
	``` matlab
	start_val = 0;   % starting value of the sequence
	end_val = 10;    % the last value in the sequence
	increment = 0.5; % increment each value by this amount to get the next value
	x = start_val:increment:final_val;
	```
	  
  - A sequence of numbers, when the number of elements needs to be
    set explicitly and the interval is defined automatically:
	
	``` matlab
	start_val = 0;  % starting value of the sequence
	end_val = 10;   % last value in the sequence
	nElements = 20; % the number of elements in the vector
	x = linspace(start_val, end_val, nElements);
	```
	  
- How to index into vectors to select...
  - a single element
	
	``` matlab
	x = myArray(3); % get the 3rd element of the vector myArray, assign it to x
	% x is be a scalar
	```
	
  - several adjacent elements
    
	``` matlab
	x = myArray(3:5); % get the 3rd through 5th elements of array myArray, assign it to x
	% x is an array of length 3
	```
      
  - an arbitrary set of elements
    
    ``` matlab
    x = myArray([3 6 8 9]); % get the 3rd, 6th, 8th, and 9th elements of myArray, assign them to x
    % x is an array of length 4
    ```
# Arithmetic
  
- When adding (subtracting) a scalar value to a vector, the value will be added (subtracted) from each element of the vector.
- When multiplying (dividing) by a vector, use the `.*` (`./`) version
  of the operator for an element-wise multiplication (division).

# Graded Items

- [Quiz: Pre-Lab 8]({{wwwroot}}/sys.php?f=assess/main&name=prelab08_matrices)
