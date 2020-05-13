---
title: 'A Fancy Calculator'
morea_type: module
morea_id: module-matlab-as-calculator
published: true
---
In some sense, MATLAB is just a fancy calculator with a few extra
features. It can be helpful to start learning it by using it as a
calculator since you are already familiar with how calculators are
used.

For the following examples, work in MATLAB's command window. The
command prompt <code>>></code> is shown in each example, you do not
type this in, MATLAB displays it automatically and it is an indication
that the command window is ready to accept commands.

## Arithmetic 

<pre class="env-matlab">
<samp>
>> 1 + 1
ans =
    2
</samp>
</pre>

In this context `1 + 1` is an *expression* that MATLAB *evaluates* to
the value `2`. An *expression* is any valid MATLAB code that can be
evaluated to a value. One of the simplest expressions is just a single
constant number, e.g.

<pre class="env-matlab">
<samp>
>> 42
ans =
    42
</samp>
</pre>

Here the expression <code>42</code> evaluates to the value
<samp>42</samp>.

## Common Math Operators

- The operators `+`, `-`, `/`, and `*` perform addition, subtraction,
division, and multiplication. Try a few out with some different
numbers in the command window.
  - try both with literal numbers, e.g. `2*3`
- The operator `^` is used to raise a value to a power. Try with literal numbers as well as assigned variables.
