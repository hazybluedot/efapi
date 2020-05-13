---
title: 'Entering Matrices into MATLAB'
morea_id: matlab-initializing-matrices
morea_type: reading
published: true
---
In this video, we type several matrices into a script file before running the file. Rather than following along exactly in the same way, we recommend to type each expression into the command window, pressing <kbd>&#x23ce; Enter</kbd> each time and observe how the workspace changes for each new variable you assign.

<div class="html5-video" id="screencap-enter-matrices" data-file="lab8-videos-isaac/Lab8-4a"></div>

## $1\times n$ Matrices (Row Vectors)

When entering numbers as a matrix, columes are separated by a space, or by a comma (<kbd>,</kbd>). Notice how both

<pre class="env-matlab">
<samp>
<span class="prompt">>></span> <kbd>x = [2 3 4 5]</kbd>
x =
     2     3     4     5
</samp>
</pre>

and 

<pre class="env-matlab">
<samp>
<span class="prompt">>></span> <kbd>x = [2, 3, 4, 5]</kbd>
x =
     2     3     4     5
</samp>
</pre>

produce the same output, and same data in the workspace.

![](pix/workspace-x-1x4-double.png)

If you hover your mouse pointer over the icon to the left
of the `x`, you should see a message appear containing the text
<samp>1x4 double</samp>. This indicates that the value `x` in the
workspace is a "one by four" matrix, meaning 1 row and 4 columns. We
might also call this a row vector of length 4.

## $n\times n$ Matrices (Column Vectors)

<pre clas="env-matlab">
<samp>
<span class="prompt">>></span> <kbd>y = [1;3;5;7]</kbd>
y =
&nbsp;  1
&nbsp;  3
&nbsp;  5
&nbsp;  7
</samp>
</pre>

## $n\times{m}$ Matrices

$n\times m$ matrices, or matrices with $n$ rows and $m$ columns, are
typed in using both the column delimiters (space or comma), and the
row delimiter (semicolon).

<pre class="env-matlab">
<samp>
<span class="prompt">>></span> <kbd>Z = [9 8 7 6; 5 4 3 2]</kbd>
Z =
     9     8     7     6
     5     4     3     2
</samp>
</pre>

Notice that the number of elements in each row is the same. If you try
to enter a matrix that has a different number of elements in each row
(or column) MATLAB will produce an error:

<pre class="env-matlab">
<samp>
<span class="prompt">>></span> <kbd>Z = [9 8 6 7; 5 4 3]</kbd>
<span class="error-text">Error using <span class="function-name">vertcat</span>
Dimensions of arrays being concatenated are not consistent.</span>
</samp>
</pre>

Notice that the existing `Z` in the workspace was not affected. Because MATLAB generated an error on this line, the assignment to `Z` was never completed.

## Creating Matrices of Numbers at a Fixed Interval

As we've seen with some of our examples with spreadsheets, we often
need to create a list of evenly spaces numbers, for example a time
vector of values between $0$ and $10$ at $.1$ intervals. In MATLAB
this is accomplished with the colon operator:

<pre class="env-matlab">
<samp>>> t = 0:.1:10;
</samp>
</pre>

If you run that line in the command window and inspect the workspace,
you should see a new variable named `t`. Its value will be reported as
<samp>1x101 double</samp> indicating `t` is a row vector containing
$101$ elements. For matrices past a certain size just the shape is
reported in the workspace, rather than all the values. 

Try changing the $0$, $.1$ and $10$ to different values and observe
the resultant vector.

## Creating Matrices with a specific size over a range.

A slightly different scenario might we might need a specific number of values.

<pre class="env-matlab">
<samp>
<span class="prompt">>></span> <kbd>tt = linspace(0,10,20)</kbd>
tt =
&nbsp; Columns 1 through 12
&nbsp;        0    0.5263    1.0526    1.5789    2.1053    2.6316    3.1579    3.6842    4.2105    4.7368    5.2632    5.7895
&nbsp; Columns 13 through 20
&nbsp;   6.3158    6.8421    7.3684    7.8947    8.4211    8.9474    9.4737   10.0000
</samp>
</pre>
