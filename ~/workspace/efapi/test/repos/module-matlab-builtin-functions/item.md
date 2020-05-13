---
title: 'Built-in Functions'
morea_id: module-matlab-builtin-functions
morea_type: module
published: true
---
Functions in MATLAB work very similarly to functions in
Excel. Functions have a name, such as 'sin', or 'mean', and take 0 or
more input *arguments*, and may return a value.

<!-- :break section -->
## Trig Functions

Like Excel, and most other programming environments, trig functions in
MATLAB work with radians.

<pre class="env-matlab">
<samp>>> tan(pi/4)
ans =
    1.0000
</samp>
</pre>

You can use the functions <code>deg2rad</code> and
<code>rad2deg</code> to convert between radians and degrees.

<pre class="env-matlab">
<samp>>> tan(deg2rad(45))
ans =
    1.0000
</samp>
</pre>

::: aside Degree Trig Functions 
MATLAB conveniently defines versions
of the common trig functions which take and produce values in
degrees. Try `sind`, or `atan2d` for the degree versions of `sin` and
`atan2`, respectively. 

Using these functions can be handy, but don't forget about the `deg2rad` and `rad2deg` functions, you may still need them if a final result needs to be converted between radians and degrees.
:::

## Function Calls are Expressions

Function calls like `tan(pi/4)` are evaluated to a value, and so are
expressions. This means that, among other things, they can go on the
right hand side of an assignment operator:

<pre class="env-matlab">
<samp>>> theta = atan2(2, -2)
theta = 
    2.3562
</samp>
</pre>

Like the `ATAN2` function you used in a spreadsheet, MATLAB's `atan2`
implements the arc-tangent function that accepts 2 input *arguments*, a
`Y` component and an `X` component. Notice that *unlike* Excel and
other spreadsheet software, but consistent with other programming
environments, MATLAB's `atan2` treats the first input argument as `Y`
and the second as `X`.

::: box Common Errors
Matlab does not prevent you from naming a variable with the same name as a built-in function. Try the following in the command window:
  
<pre class="env-matlab">
<samp>>> tan(pi/4)
>> tan = 2
>> tan(pi/4)
</samp>
</pre>
  
1. The first time you call `tan(pi/4)` matlab evaluates it as you would expect and produces the answer 1.
2. Once you evaluate `tan = 2` notice that a new variable appears in the workspace named `tan` with the value `2`.
3. Now when you try calling `tan(pi/4)` MATLAB generates an error. This is because when you try to call the function MATLAB sees the variable `tan` in your workspace first and tries to evaluate the line using that. The error says something about array indexes because MATLAB thinks `tan` is an array, something we will learn about next week.

If you do accidentally create a variable name with the same name as a function, you can clear it from the workspace using the clear command:

<pre class="env-matlab">
<samp>>> clear tan
</samp>
</pre>

Now the `tan` function will work as expected again.

You can also inadvertently use pre-defined constants, such as `pi`, as a variable name. If you assign `pi` a different value, for example `3`, then any calculations that use `pi` will be incorrect, but MATLAB will not generate an error! <!-- {p:.alert .alert-warning} -->
:::

## Building up Complex Expressions

As you might expect, we can create more complex expressions by
combining simple expressions with the familiar arithmetic operators:

<pre class="env-matlab">
<samp>>> (1 + tan(pi/4))^2
ans =
     4
</samp>
</pre>

Parenthesis work the same way they do on your calculator or in a
spreadsheet. As you might expect, MATLAB will happily evaluate an
arbitrarily complex expression on the right hand side of the
assignment operator:

<pre class="env-matlab">
<samp>>> x0 = 5.5;
>> y0 = 3.4;
>> v0 = 80.2;
>> g = -9.81;
>> x = 21;
>> y = y0 + tan(theta)*(x - x0) + (g/(2*v0^2))*(1 + tan(theta)^2)*(x - x0)^2
y =
  -12.4661
</samp>
</pre>

::: box Common Error
Variables must be defined before they can be used! After evaluating the above lines in your command window, evaluate 

<pre class="env-matlab">
<samp>>> clear x
</samp>
</pre>

Then press the up-arrow until you see the trajectory motion equation again and press "Enter" to attempt to evaluate it

You should get an error similar to 

<pre class="env-matlab">
<samp>
<span class="error-text">Unrecognized function or variable 'x'.</span>
</samp>
</pre>

This is because when we try to evaluate the trajectory equation MATLAB
searches for a variable named 'x' in the workspace, but there is none
since we just cleared it!
:::
