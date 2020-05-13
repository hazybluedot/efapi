---
title: 'Working with Vectors'
morea_id: module-matlab-vectors
morea_type: module
published: true
---
It is time to take what we have learned about working with vectors in
MATLAB and apply it to our trajectory motion program. Position is a
quantity that is usually represented as a vector since it is comprised
of an x component and a y component.

# Request a Vector as Input

The first change we will make to our example program is to ask the
user to input a vector, rather than a scalar value.

## Example 2

~~~ aside Input Checking
Note that even though in the text prompt to the user we ask for a vector or a matrix, MATLAB has no way of knowing this, it does not understand the *meaning* of the prompt, it just displays it. As a result, the user could enter a valid expression that is *not* a vector or matrix which may break the program. It is up to the programmer to decide how to handle valid but incorrect user input. The topic of *input validation* is a complex one, and beyond the scope of this lab, though we may touch on it a bit later in the semester. There are many resources online if you are curious.
~~~

You can find the code for this example in `example2.m`. 

The `input` function that we have already used is a bit more flexible
than we have let on. What the user types in at the prompt can be *any*
valid MATLAB expression, including an expression that evaluates to a
vector or matrix:

<samp class="env-matlab">
>> example2
Enter a angle in degrees and distance in feet as a vector [angle, distance]: <kbd>[25, 15]</kbd>
ans =
     2
The x component is 13.6 and the y component is 6.3
</samp>

What happens if the user does not use correct syntax for vectors,
e.g. leaves off the `[`, `]`, or both?

## Practice: Request a Vector as Input

In your trajectory equation program, combine $x_{0}$ and $y_{0}$ into
the vector $[x_{0}, y_{0}]$ named `pos0`. Prompt the user to input an
initial position as a vector.

### Sample Output

When you your program in `lab08_practice_[netid].m`, the input and
output should look something like this:

<samp class="env-matlab">
Enter an initial position as [x, y]: <kbd>[-5, 3]</kbd>
Enter a launch angle in radians: <kbd>pi/4</kbd>
The resulting y coordinate is 28.0 m
</samp>

<!-- :break section -->

# Vectorize the Calculations

The calculations we have been putting into our program so far are
similar to those we can do on our calculator: for a single set of
input values, calculate a single result. As you saw in the pre-lab
material, one of MATLAB's strengths is the relatively easy way in
which *vectorized* operations, calculations that take matrices or
vectors as input and produce matrices or vectors as output, can be
expressed.

## Example 3

This example is in `exampl3.m`.

``` matlab
%% Read

theta = input('Enter a vector of angles in degrees: ');
distance = input('Enter a vector of distances in feet: ');

%% Execute

x = distance.*cos(deg2rad(theta));
y = distance.*sin(deg2rad(theta));

%% Print

fprintf('The x component is %.1f and the y component is %.1f\n', [x; y]);
```

~~~ aside Bad Design?
The way `fprintf` is implemented in MATLAB is an example of questionable engineering design. In the scalar case each parameter after the format string is filled into a corresponding format operator starting with `%`. However, when `x`, and `y` are vectors, `fprintf` applies `formatSpec` to the input arguments *in column order*, which means the first line of output will use the first two value from the `x` result vector, not one from `x` and one from `y`. 

This is also a mini-lesson in self-confidence. Never accept that the confusing behavior of a program or other tool is necessarily a result of your own lack of knowledge or understanding. Sometimes confusing and flat-out bad designs end up in comercial products. Always question "is this really the best way this could have been designed", and ask the same question when you begin designing your own tools and products.
~~~

### Sample Output

<samp class="env-matlab">
>> example3
Enter a vector of angles in degrees: <kbd>[25,45,-60]</kbd>
Enter a vector of distances in feet: <kbd>[15,25,18]</kbd>
The x component is 13.6 and the y component is 6.3
The x component is 17.7 and the y component is 17.7
The x component is 9.0 and the y component is -15.6
</samp>

Notice how we had to modify the call to `fprintf` to produce the
correct output. See the side-bar for a bit of an explanation. You do
**not** need to remember this trick, typically we will avoid
situations in which a vector or matrix is passed to `fprintf`.

## Practice: Vectorize the Calculation

Modify your program in `lab08_practice_[netid].m` once more. Now
instead of prompting the user to enter a value for theta, calculate y
for all theta on a range of 0 to pi/2 at increments of 0.01 radians.

### Sample Output

After your modifications, a sample run should look something like this:

<samp class="env-matlab">
Enter an initial position as [x, y]: <kbd>[-5, 3]</kbd>
The resulting y coordinate is 2.5 m
The resulting y coordinate is 2.7 m
The resulting y coordinate is 3.0 m
.
.
.
The resulting y coordinate is 62.1 m
The resulting y coordinate is -2007.2 m
The resulting y coordinate is -779450.8 m
</samp>

<!-- :break section -->

# Create Useful Output (for a Human)

While the large vector of `y` values may be useful for another stage
of calculations, it is not very helpful to a human user of your
program. If the final stage is to present numbers to a human, it is
usually best to perform some calculation on the vectors to produce a
summary of the result. 

## Example 4

Find the code shown in this section in `example4.m`.

For example, in the coordinate example we might modify the program to
print the total and net distance of the result vector:

``` matlab
%% Read

theta = input('Enter a vector of angles in degrees: ');
distance = input('Enter a vector of distances in feet: ');

%% Execute

x = distance.*cos(deg2rad(theta));
y = distance.*sin(deg2rad(theta));

totalDistance = sum(distance);
netDistance = sqrt(sum(x)^2 + sum(y)^2);

%% Print

fprintf('The total distance covered is %.1f ft, while the net distance is %.1f ft\n', totalDistance, netDistance);
```

Notice how we include the calculations of the total and net distance
in the 'Execute' section since this is still part of the calculation
using read data.

### Sample Output

<samp class="env-matlab">
>> example4
Enter a vector of angles in degrees: <kbd>[25,45,-60]</kbd>
Enter a vector of distances in feet: <kbd>[15,25,18]</kbd>
The total distance covered is 58.0 ft, while the net distance is 41.1 ft
</samp>

## Example Using the `min` Function

There is no example file for this section, just type the lines in the command window. The important take away is that some functions in MATLAB, like `min` and `max`, can be invoked in different ways depending on what you want from them. Both `min` and `max` and other functions related to finding a single value from a vector can be called to return either a single value:

``` matlab
>> x = [2, 1, 4, 3];
>> xMin = min(x)
xMin =
     1
```

Which is the value of the element found, in this case the minimum value of `x` since we used the `min` function. 

As you recall from our work in spreadsheets, it is often useful to know the *index* at which a value is found, so in the above example we might want to know at what *index*, or relative offset, does the minimum value of x occur? We can find this value by calling the `min` function so that it returns two values. The first is the value of the element found, like last time, and the second is the index, or relative offset, at which that value was found.

``` matlab
>> [xMin, xMinI] = min(x)
xMin =
     1
xMinI =
     2
```

In this example, we name the value of the minimum of x `xMin`, and the index at which the minimum occurs `xMinI`. Here the index corresponding to the minimum value in `x` is 2 indicating that the minimum value is found at position 2 in the vector `x`. We can use matrix indexing notation to retrieve this value:

``` matlab
>> x(xMinI)
ans =
      1
```

You can learn about the different ways any of MATLAB's built in
functions can be called by using the `doc` command, for example:

``` matlab
>> doc min
```

Will show that `min` can be called so that it returns a single value, or two values. Look up the documentation for `max` to confirm it has a similar behavior.

## Practice: Create Useful Output

In your practice program, make a change similar to what we did in the example. Instead of printing out a whole bunch of lines, each with a single value of `y`, let us find some interesting way to summarize the values of `y`:
Calculate:

1. Calculate the maximum value of `y`
2. Find the value of `theta` which produced the *maximum* value of `y`.
3. Print both values in a human-friendly message using `fprintf`

### Sample Output

Once you make these changes in `lab08_practice_[netid].m`, a sample
run should look something like this:

<samp class="env-matlab">
Enter an initial position as [x, y]: <kbd>[-5,3]</kbd>
The maximum y coordinate is 330.4 m when theta is 1.53 radians
</samp>

Notice how the printed output shows both the maximum y coordinate and
the corresponding value of theta on the same line. Refer to the
example files to see how to print more than one value in a `fprintf`
format specification.

Also notice that we are printing the value of `y` with a single digit
after the decimal point, and the value of `theta` with two digits
after the decimal point. Adjust your output to match.

### Upload

Upload your working version of `lab08_practice_[netid].m` to your [lab 8 dropbox](/ef105-2019-08/sys.php?f=dropbox/main&pid=Lab08). We will use an automated test to help with grading. The test will not be able to understand the words in your input or output prompt, so it is important that your program uses the same pattern for input and output as in the sample output above: 

1. The input vector should be given in [x, y], not [y, x]
2. The output message should contain only two numbers: the first should be the maximum y coordinate, the second should be the corresponding value of theta in radians.
3. The program should generate only two lines of text in the command window: 1 for the input prompt and 1 for the output message. 

Note that a new line is created with the special character combination
of `\n` in either the prompt or output text. Both your prompt and
output text should contain this special combination exactly once at
the end of the message.
