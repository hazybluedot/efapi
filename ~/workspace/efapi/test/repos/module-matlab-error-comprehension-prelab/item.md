---
title: 'Pre-lab: Making Sense When MATLAB Can''t Make Sense'
morea_type: module
morea_id: module-matlab-error-comprehension-prelab
published: true
---
<!-- TODO: Add example of filenamed practice1(3).m or something -->

One of the most frustrating aspects of programming is encountering
error messages. An error results when the computer cannot make sense
of an instruction you gave it. Sometimes this is due to a typo in
syntax, other times it is due to a miss-understanding of how a function
or other feature of the language is used. 

The first three steps when you encounter any kind of error are always the same:

1. Read the error message.
2. Read the error message again.
3. Did you read the error message? Try reading it out loud.

It is common to feel overwhelmed when you see a big chunk of red
text. It is ok to feel overwhelmed: it means you are learning
something that is challenging and you have pushed yourself to your
limit. It is ok to take a break, step away, and calm your mind when
you feel overwhelmed. But when you come back: *read the error
message*.

Even if you do not understand what all the words in an error message
mean, by reading all your error messages you will begin to recognize
patterns in them that will help guide your mind to locating the cause.

The following controlled examples will help you start learning
patterns of common error messages, and what cause them.

# Getting Started

The following examples are includes in the
[error_examples.zip](error_examples.zip) archive. Download this
archive and extract the files to your "Lab10" folder. 

Note: the exact wording of errors may vary across different versions
of MATLAB, so it is important to run each example as you read about it
so you can see what the error looks like in the version of MATLAB
*you* are running. For each of the errors described below,

1. read the explanation of what the cause of the error is
2. run the example code with the error so you can see what the error message looks like
3. Try to fix the example so it runs without errors


<!-- :break section -->

# Example: Syntax Errors

MATLAB conducts a syntax check on your entire program before anything
else. If any syntax errors occur it will not attempt to run your any
of your code, even the parts that occur before the syntax error. Thus,
it is important to fix any syntax errors that exist because you won't
be able to test other parts of your code until you do so! The
`example5.m` file contains several common syntax errors.

![](pix/error_syntax.png)

To see the error message for each one, comment out all the others
first, then try running the program.

Notice that if you are using MATLAB's built in editor, it will mark
syntax errors as you type using red wavy underlines, and also a red
marker on the right scroll-bar area of the editor window. If you click
on a red marker on the scroll bar, the window will re-position to make
the error location visible.

In most cases the error message contains a helpful hint that well help
you figure out what is wrong. Read the error message.

<!-- :break section -->

# Example: Unrecognized Function or Variable

This example can be run in `example4a.m` which contains an error due to a mistyped variable name:

``` matlab
%% Execute

x = distance.*cos(deg2rad(tehta)); % typo in "theta"
y = distance.*sin(deg2rad(theta));

totalDistance = sum(distance);
netDistance = sqrt(sum(x)^2 + sum(y)^2);
```

If you try to run this program, you will see something like this:

<pre class="env-matlab">
<samp>>> example4a
Enter a vector of angles in degrees: 23
Enter a vector of distances in feet: 31
<span class="error-text">Unrecognized function or variable 'thtea'.
Error in <span class="function-name">example4a</span> (<span class="line-ref">>line 13</span>)
x = distance.*cos(deg2rad(thtea)); % typo in "theta"</span>
</samp>
</pre>

<div class="col-md-6">

<object class="svg-highlight" id="solver-overview" type="image/svg+xml" data="pix/error_unrecognized_function_annotated.svg"
	data-attribute-selector="#error-unrecognized-function-annotations">
	<img src="pix/error_unrecognized_function.png" />
</object>

</div>

The editor interface provides some helpful features to help track down errors:

<div class="col-md-6">

Line Number <!-- {#error-uf-line-num} -->

: Every error message will have a line number listed. Most of the time, this line number is the line the problem is. In some cases, MATLAB has a hard time identifying the correct line, but you can be sure that the error is somewhere on the listed line, or above it.

Same-name Highlight <!-- {#error-uf-name-highlight} -->

: When you place the cursor on a variable name, MATLAB will highlight
  all other names that are the same. Use this to help your eye find
  places where the name should and shouldn't be.

You will also see this error if you try to use a variable that has not
been declared yet. If you get this error and everything is spelled
correctly, place the cursor on one of the occurrences to highlight all
other occurrences and look for one that appears on the right side of
the assignment operator (`=`) somewhere above where the error
occurred. If there isn't one, then that is your error.

<!-- {dl:#error-unrecognized-function-annotations} -->
</div>

<!-- :break section -->

# Example: Incorrect dimensions for matrix operation

You will find this example in the `example4b.m` file. Here we use a matrix multiplication (`*`) when we meant to use an element-wise multiplication (`.*`):

``` matlab
%% Execute

x = distance.*cos(deg2rad(theta)); 
y = distance*sin(deg2rad(theta));  % Used '*' instead of '.*'

totalDistance = sum(distance);
netDistance = sqrt(sum(x)^2 + sum(y)^2);
```

If we run the program and enter vectors like asked, the program will terminate early with an error:

<pre class="env-matlab">
<samp>>> example4b
Enter a vector of angles in degrees: <kbd>[25, -30, 55]</kbd>
Enter a vector of distances in feet: <kbd>[10, 18, 12]</kbd>
<span class="error-text">Error using <span class="function-name"> * </span>
Incorrect dimensions for matrix multiplication. Check that the number of columns in the first matrix matches
the number of rows in the second matrix. To perform elementwise multiplication, use '.*'.
Error in <span class="function-name">example4b</span> (<span class="line-ref">line 14</span>)
y = distance*sin(deg2rad(theta)); </span>
</samp>
</pre>

Note that in this case, an error is only generated when we use vector inputs. If we run the program and supply scalar values it runs as expected:

<pre class="env-matlab">
<samp>>> example4b
Enter a vector of angles in degrees: <kbd>25</kbd>
Enter a vector of distances in feet: <kbd>18</kbd>
The total distance covered is 18.0 ft, while the net distance is 18.0 ft
</samp>
</pre>

Errors of this nature, that appear only under certain input conditions
can be particularly tricky to identify and fix. If you encounter a
situation like this, where an error is thrown sometimes but not
always, try to systematically document under what conditions the error
happens, and what conditions it does not. In this case, if the error
message was not enough to help us figure out what and where the error
was we might try the program again several times, varying the input in
different ways each time and look for patterns.

<!-- :break section -->

# Example: Array indices must be positive integers or logical values

This example can be found in `example2a.m`.

``` matlab
posPolar = input(['Enter a angle in degrees and distance in feet as ' ...
             'a vector [angle, distance]: ']); 

theta = posPolar(0);    % in MATLAB, indexes start at 1  
distance = posPolar(1); 
```

<pre class="env-matlab">
<samp>>> example2a
Enter a angle in degrees and distance in feet as a vector [angle, distance]: [25, 15]
<span class="error-text">Array indices must be positive integers or logical values.
Error in <span class="function-name">example2a</span> (<span class="line-ref">line 11</span>)
theta = posPolar(0);    % in MATLAB, indexes start at 1
</samp>
</pre>

While it may seem easy to spot `0` as an array index, it is common to use variables to index into arrays, as in when we want to find the value in one array corresponding to another:

``` matlab
>> x = [3 5 7 4 6 8];
>> y = [13 15 17 14 16];
>> [xMax, xMaxI] = max(x);
>> y(xMaxI) % the value of y that corresponds to the maximum value of x
ans =
    18
```

In this example, you never see the index as a number, it is a value
stored in a variable name. If x and y were different lengths you might
get this error. In that case, it might be that the error is not in the
indexing itself, but in the reason why x and y are different length.s

<!-- :break section -->

# Example: Index exceeds the number of array elements

Another common indexing error occurs when you attempt to use an index
that is larger than the number of elements in the array. This example
can be found in `example2b.m`.

``` matlab
posPolar = input(['Enter a angle in degrees and distance in feet as ' ...
             'a vector [angle, distance]: ']); 

theta = posPolar(1);      
distance = posPolar(3); % posPolar should only have 2 elements
```

<pre class="env-matlab">
<samp>
>> example2b
Enter a angle in degrees and distance in feet as a vector [angle, distance]: [24, 18]
<span class="error-text">Index exceeds the number of array elements (2).
Error in <span class="function-name">example2b</span> (<span class="line-num">line 12</span>)
distance = posPolar(3); % posPolar should only have 2 elements </span>
</samp>
</pre>

Notice the error message contains the number of elements in the
array, `(2)`. You can use this information to help decide if the problem is
due to a vector that is shorter than you expected, or if the index
supplied is too large due to some other error. 

Notice also that this error could occur if the program is correct, but
the data given to it is not what is expected. If we run the (correct)
`example2.m` file:

<pre class="env-matlab">
<samp>>> example2
Enter an angle in degrees and distance in feet as a vector [angle, distance]: 25
<span class="error-text">Index exceeds the number of array elements (1).
Error in <span class="function-name">example2</span> (<span class="line-num">line 19</span>)
distance = posPolar(2);</span>
</samp>
</pre>

Here the user enters just a single scalar value when the program is
expecting a vector of 2 elements.

Errors like this, caused by the user providing invalid data, are not
always something the programmer can plan for, though there are techniques
for dealing with this type of scenario that we will explore in a
future lab.
