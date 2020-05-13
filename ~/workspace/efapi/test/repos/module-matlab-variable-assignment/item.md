---
title: 'Variable Assignment'
morea_type: module
morea_id: module-matlab-variable-assignment
published: true
---
## Variable Assignment

This works just like storing values as variables on your calculator, except it is much easier with MATLAB (and a full keyboard).

<pre class="env-matlab">
<samp>
>> x = 42
x =
    42
</samp>
</pre>

We say that the variable `x` has been *assigned* the value `42`, or
that the value `42` is now "stored in `x`". Notice that a new entry
has appeared in the workspace corresponding to this variable
assignmetn.

More generally, variable assignment looks like

<code>
<em>name</em> = <em>expression</em>
</code>

Where *name* is any valid MATLAB symbol name (more on this next week), and *expression* is any valid expression. For example:

::: box {.arg1 .arg2} Common Error
- What happens when you try reversing the order of the assignment? Try evaluating `42 = x` in the command window. This is a syntax error. When using the assignment operator the value on the left must be a valid variable name and the value on teh right a valid expression.
- The name must be a [valid MATLAB variable name](https://www.mathworks.com/help/matlab/matlab_prog/variable-names.html).
  - can contain only letters, numbers, or the underscore character (`_`).
  - must start with a letter
:::


<pre class="env-matlab">
<samp>
>> y = 1 + 1
y =
    2
</samp>
</pre>

Evaluates the expression <code>1 + 1</code> and stores the value in a
variable named <code>y</code>.

The code `y = 1 + 1` is a *statement*. In MATLAB, statements are
comprised of expressions with possibly other operators and
syntax. Statements do not evaluate to values, but rather form complete
instructions that MATLAB can follow. Generally, a statement can be
phrased as a complete english sentence, such as "Evaluate 1 + 1 and
store the result in a variable named 'y'".

You do not need to remember or care *too* much about the distinction
between expressions and statements right now, but it is used in MATLAB
documentation and error messages, so a familiarity with these terms
will help you better understand those resources.

## Practice

Try playing with the math operators to get a feel for how they use,
now with variables that you first assign values to, e.g. `x/y`

## A bit of MATLAB Magic

Hold up, if expressions are just bits of code that can be evaluated to
result in a value, and statements are bits of code combine with
expressions that describe complete instructions, then how come when we
type just an expression like `1 + 1` in the command window, it looks
like MATLAB does something with it as if it were a statemet? 

This is an example of one of many little shortcuts MATLAB takes and
assumptions it makes that can make some tasks a bit easier to type but
also can make explaining what is going on a bit more complex. When
asked to evaluate just a single expression that does not contain any
explicit instruction of what to do with the value, MATLAB
automatically transforms it into the statement "evaluate the
expression and store the result in a variable named 'ans'". For this
reason, you probably should avoid using a variable named 'ans'
elsewhere in your program, unless you really know you need it for some
reason since it may be overwritten in unexpected ways.
