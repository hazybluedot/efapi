---
title: 'Adding User Interaction'
morea_type: module
morea_id: module-matlab-user-io
published: true
---
A program would be of little use if the only data it could operate on
was written in the program itself. We usually want to write a program
to solve a common problem multiple times, each time with different
data. To do this, we need a way to get data into the program, and
because it would be equally unhelpful if once we performed some
calculations we didn't present the results to the user running the
program, we need a way to format results nicely.


# User Input

One of the simplests ways to interact with a user is to prompt them to
enter a value. In MATLAB this is done with the `input` function. 

```
>> x = input('Enter a value: ')
Enter a value: 10
x = 
    10
```

As you can see from the above example `input` takes at least 1
argument, in this case a text *string* that will be displayed to the
user. When evaluated, `input` will prompt the user and wait for them
to type an *expression* in and press <kbd>Enter</kbd>. Once this
happens, MATLAB will evaluate the expression and return the resulting
value. In the example above, `input` is used in conjunction with the
assignment operator, `=` to store the resulting value in the variable
`x`.

## Play and Observe

Try using the `input` function to write a short program that asks the
user for a number and then squares the number. Don't include a
trainling semi-colon on the line that squares the number so that the
result is echoed to the command window.

- What happens when you do not include a trailing space in the input prompt, e.g.

  ``` matlab
  x = input('Enter a value: ');
  ```
  
  vs.
  
  ``` matlab
  x = input('Enter a value:');
  ```
  
- What happens if when you are prompted to enter a value, you enter something other than a single number? For example, try:
  - <kbd>2 + 3</kbd>
  - <kbd>(1 + tand(30))/pi</kbd>
  - <kbd>twelve</kbd>
  - <kbd>'42'</kbd> (notice the quotes)

Use the value stored in the variable for a simple calculation. Do you
notice any patterns in what kinds of input produces a valid number and
what kinds of input generate an error?

## Read the Docs

Look up the MATLAB documentation for the `input` function and read the
"Syntax" and "Description" sections. It is ok if you do not understand
what everything means in these sections right now. Over time you will
see that all MATLAB help pages have the same basic
structure. Familiarizing yourself with this pattern will help you more
efficiently find information in the future.

Notice that the documentation lists two ways the `input` function can
be called. The first is how we have already seen:

``` matlab
x = input(prompt)
```

Where `prompt` will be a text string that is displayed to the user. 

The second method looks like this:

``` matlab
str = input(prompt, 's')
```

Experiment with this way of using `input and read the corresponding
sentence in the "Description" of the documentation. 

1. Based on your observation of the difference between the different
   ways to call `input` and what is in the documentation, can you
   explain how adding the 's' input argument changes the behavior of
   the function?
2. Try typing in and running some of the examples shown in the
   documentation. Make small adjustments and observe the effect.

# User Output

So far we have seen that MATLAB has produced a lot of output all by
itself, but we haven't had a lot of control over how that output is
formatted. When writing a program that we intend to use over and over
again, it is often helpful to produce more descriptive output that
helps the user better understand the result.  One way to produce
nicely formatted output in MATLAB is with the `fprintf` function:

```
>> fprintf('The answer is %d\n', 42);
The answer is 42
```

`fprintf` takes at least 1 argument, a text string called the
`formatSpec`. The `formatSpec` is used as a template to produce
output. Most characters in `formatSpec` are just copied verbatim to
the output, as you can see from the portion in the example that is
"The answer is ". The `%` character in the `formatSpec` is special, it
denotes the start of a formatting operator that is treated as a
place-holder for a value that will be filled in when MATLAB evaluates
the function. Formatting operators end with a character which tells
MATLAB how to treat the value that will be substiuted in. In the
preceding example the formatting operator `%d` ends with `d` which
means the value will be treated as an integer. 

The values for this placeholder must be provided as additional
arguments to the `fprintf` function. In the above example there is a
single value, `42`.

The character combination `\n` in the `formatSpec` tells `fprintf` to
print a new line. Try running the above example without the `\n` to
see the difference.

## Play and Observe

Try each of the following format specification strings in the example
above and observe how the output changes with each one:

- <kbd>'The answer is %0.2f\n'</kbd>
- <kbd>'The answer is %s\n'</kbd>
  
  ::: collapse explain
  For a bit of explaination of what is going on with this example,
  refer to the <a href="http://www.asciitable.com/">ASCII Table</a>
  and find the row corresponding to a decimal (Dec) value of '42'.
  Try running the same line with different numeric values and observe
  the result.
  :::
- <kbd>'%d is the answer!\n'</kbd>
- <kbd>'The answer is %d'</kbd>

## Read the Docs

Read the "Syntax" and "Description" section of the [MATLAB
documentation for
fprintf](https://www.mathworks.com/help/matlab/ref/fprintf.html).

Notice there are three different ways to call fprintf, the first two
have no output arguments and differ in their input arguments. The
third has an output argument and can be used with either of the input
argument configurations.  We have only shown the second method so far,
and is likely the only one we will use in EF 105.

1. Try typing in and running some of the examples shown in the
   documentation. Making small changes and observe how they affect the
   behavior.

## Challenge Yourself

Try writing a working line of code that uses `fprint` to output 2
different values.
