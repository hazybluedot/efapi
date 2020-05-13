---
title: 'Lab 9 Pre-lab: Making Sense When MATLAB Can''t Make Sense'
morea_type: module
morea_id: module-matlab-error-comprehension-1
published: true
---
<!-- TODO: Add example of filenamed practice1(3).m or something -->

One of the most frustrating aspects of programming is encountering
error messages. An error results when the computer cannot make sense
of an instruction you gave it. Sometimes this is due to a typo in
syntax, other times it is due to a miss-understanding of how a function
or other feature of the language is used. 

~~~ aside Read the Error Message
If the lab 8 quiz hadn't accidentally been open a week earlier than planned, the question "What is the first step when encountering an error message?" would have been a multiple-choice question. Can you guess what the only correct answer would have been?
~~~

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

<!-- :break section -->

## Example: Syntax Errors

MATLAB runs a syntax check on your entire program before anything
else, so you will have to fix these before you can make any progress. The `example5.m` file contains several common syntax errors.

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

## Example: Unrecognized Function or Variable

This example can be run in `example4a.m` which contains an error due to a mistyped variable name:

``` matlab
%% Execute

x = distance.*cos(deg2rad(tehta)); % typo in "theta"
y = distance.*sin(deg2rad(theta));

totalDistance = sum(distance);
netDistance = sqrt(sum(x)^2 + sum(y)^2);
```

If you try to run this program, you will see something like this:

<samp class="env-matlab">
>> example4a
Enter a vector of angles in degrees: 23
Enter a vector of distances in feet: 31
<span class="error-text">Unrecognized function or variable 'thtea'.
Error in <span class="function-name">example4a</span> (<span class="line-ref">>line 13</span>)
x = distance.*cos(deg2rad(thtea)); % typo in "theta"</span>
</samp>

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

## Example: Incorrect dimensions for matrix operation

You will find this example in the `example4b.m` file. Here we use a matrix multiplication (`*`) when we meant to use an element-wise multiplication (`.*`):

``` matlab
%% Execute

x = distance.*cos(deg2rad(theta)); 
y = distance*sin(deg2rad(theta));  % Used '*' instead of '.*'

totalDistance = sum(distance);
netDistance = sqrt(sum(x)^2 + sum(y)^2);
```

If we run the program and enter vectors like asked, the program will terminate early with an error:

<samp class="env-matlab">
>> example4b
Enter a vector of angles in degrees: <kbd>[25, -30, 55]</kbd>
Enter a vector of distances in feet: <kbd>[10, 18, 12]</kbd>
<span class="error-text">Error using <span class="function-name"> * </span>
Incorrect dimensions for matrix multiplication. Check that the number of columns in the first matrix matches
the number of rows in the second matrix. To perform elementwise multiplication, use '.*'.
Error in <span class="function-name">example4b</span> (<span class="line-ref">line 14</span>)
y = distance*sin(deg2rad(theta)); </span>
</samp>

Note that in this case, an error is only generated when we use vector inputs. If we run the program and supply scalar values it runs as expected:

<samp class="env-matlab">
>> example4b
Enter a vector of angles in degrees: <kbd>25</kbd>
Enter a vector of distances in feet: <kbd>18</kbd>
The total distance covered is 18.0 ft, while the net distance is 18.0 ft
</samp>

Errors of this nature, that appear only under certain input conditions
can be particularly tricky to identify and fix. If you encounter a
situation like this, where an error is thrown sometimes but not
always, try to systematically document under what conditions the error
happens, and what conditions it does not. In this case, if the error
message was not enough to help us figure out what and where the error
was we might try the program again several times, varying the input in
different ways each time and look for patterns.

<!-- :break section -->

## Example: Array indices must be positive integers or logical values

This example can be found in `example2a.m`.

``` matlab
posPolar = input(['Enter a angle in degrees and distance in feet as ' ...
             'a vector [angle, distance]: ']); 

theta = posPolar(0);    % in MATLAB, indexes start at 1  
distance = posPolar(1); 
```

<samp class="env-matlab">
>> example2a
Enter a angle in degrees and distance in feet as a vector [angle, distance]: [25, 15]
<span class="error-text">Array indices must be positive integers or logical values.
Error in <span class="function-name">example2a</span> (<span class="line-ref">line 11</span>)
theta = posPolar(0);    % in MATLAB, indexes start at 1
</samp>

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

## Example: Index exceeds the number of array elements

Another common indexing error occurs when you attempt to use an index
that is larger than the number of elements in the array. This example
can be found in `example2b.m`.

``` matlab
posPolar = input(['Enter a angle in degrees and distance in feet as ' ...
             'a vector [angle, distance]: ']); 

theta = posPolar(1);      
distance = posPolar(3); % posPolar should only have 2 elements
```

<samp class="env-matlab">
>> example2b
Enter a angle in degrees and distance in feet as a vector [angle, distance]: [24, 18]
<span class="error-text">Index exceeds the number of array elements (2).
Error in <span class="function-name">example2b</span> (<span class="line-num">line 12</span>)
distance = posPolar(3); % posPolar should only have 2 elements </span>
</samp>

Notice the error message contains the number of elements in the
array, `(2)`. You can use this information to help decide if the problem is
due to a vector that is shorter than you expected, or if the index
supplied is too large due to some other error. 

Notice also that this error could occur if the program is correct, but
the data given to it is not what is expected. If we run the (correct)
`example2.m` file:

<samp class="env-matlab">
>> example2
Enter a angle in degrees and distance in feet as a vector [angle, distance]: 25
<span class="error-text">Index exceeds the number of array elements (1).
Error in <span class="function-name">example2</span> (<span class="line-num">line 19</span>)
distance = posPolar(2);</span>
</samp>

Here the user enters just a single scalar value when the program is
expecting a vector of 2 elements.

<!-- :break section -->

## Practice

We will do this activity first thing in class for Lab 9.

You will be modifying your trajectory program for this activity, it
would be a good idea to save a new copy called
`lab08_practice_errors.m` or similar so you do not accidentally break
a working version or upload the wrong one for the previous section.

In pairs or groups of three:

1. Each person spend a minute or two breaking the trajectory program you wrote (if
it currently doesn't work, you've already completed this step!). If you have a working program, just break it in one small way to make the next step easier.
2. Show your broken program to a neighbor. Explain to them how it
   *should* work, but show them what it is doing instead. Ask them to
   try and figure out what is wrong.
3. Take a moment to look over your neighbor's broken code, try to
   figure out what is broken. If you think you found it, direct them
   how to fix it, have them make the change and run the program
   again. If this fixes the problem, you're done, if it doesn't try
   repeating this process until you can explain to them how to fix the
   program.

You do not need to turn in the file used for this activity. Store it
alongside the other examples of errors for your own reference.

## Review

What is the *first* thing you should do when you encounter an error message?
