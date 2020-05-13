---
title: 'MATLAB Review'
morea_type: module
morea_id: module-matlab-pre-plotting-review
published: true
---
# Initializing Matrices 

``` matlab
x = [2 3 4 5]; % a 1x4 row vector
y = [5 7 9 11]'; % a 4x1 column vector (note the ') 
A = [2 4 6; 1 3 5]; % a 2x3 matrix using semicolons t delimit rows
B = [5 7
 	   	   	  3 1
 	   	   	  4 2]; % a 3x2 matrix using new-lines to delimit rows
```

## Creating Series

``` matlab
t = 0:.01:10; % create a vector of values from 0 to 10 in increments of .01
tt = linspace(0, 10, 50); % create a vector of 50 values spread uniformly from 0 to 10
```

# Matrix Indexing

```
xThird = x(3);  % retrieve the 3rd element from x, store it in a variable named xThird
Ar2c3 = A(2,3); % retrieve the element from the 2nd row and 3rd column of A, store it as Ar2c3
b2 = B(:,2);    % retrieve the second column of B, store it as b2
```
## Indexing Across Vectors

```
[xMin, xMinI] = min(x); % find the minimum value of x, store it as xMin, and the index at which it occurs, stored as xMinI
yMinX = y(xMinI); % retrieve the value of y at the relative position that the minimum of x was found.
```

## Logical Indexing

``` matlab
B(B > 2) % Select all values of B that are greater than 2
y(x == 4); % select the values of y corresponding to where x is equal to 4
```

# Reading Input from a User

```
val = input('Enter a value: '); % Show the prompt 'Enter a value: ', wait for someone to type an expression and press 'Enter', evaluate the typed expression and store the result as val.
```

Remember, `input` does not care what the user enters, as long as it is a valid expression. For example, all the follownig will work when running the above line:

<samp class="env-matlab">
Enter a value: <kbd>42</kbd>
Enter a value: <kbd>[2 3 4; 5 7 9]</kbd>
Enter a value: <kbd>rad2deg(pi/4)</kbd>
Enter a value: <kbd>linspace(0,50,1000)</kbd>
</samp>

It is up to the programmer to decide how to check for and handle
values that will not work for the given program.

# Vectorized Calculations

Vectorized calculations are a way to evaluate a mathematical expression repeatedily for each value in a vector.

```
distance = [25 12 15 25];
angleDeg = [23 65 30 85];

xComp = distance.*cos(deg2rad(angleDeg));
yComp = distance.*sin(deg2rad(angleDeg));
```

In this example the x and y component equations are evaluated for each
value in the `distance` and `angleDeg`. `xComp` and `yComp` will have
the same length as `distance` and `angleDeg`. An error will be
generated if the `distance` and `angleDeg` have a different number of
elements.
