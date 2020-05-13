---
title: 'Numerical Differentiation'
morea_type: reading
morea_id: numerical-derivative-matlab
published: true
---
Recall that given a sequence of values:

$$\begin{aligned}
v &= \begin{bmatrix}v_{1} & v_{2} & v_{3} & \cdots & v_{n}\end{bmatrix}\\
t &= \begin{bmatrix}t_{1} & t_{2} & t_{3} & \cdots & t_{n}\end{bmatrix}
\end{aligned}
$$

that the numerical derivative $a_{i}$ of $v$ with respect to $t$ is the sequence

$$
a_{i} = \begin{bmatrix}\frac{v_{i+1} - v_{i}}{t_{i+1} - t_{i}}\end{bmatrix}
$$

forming the sequence

$$a = \begin{bmatrix}\frac{v_{2} - v_{1}}{t_{2} - t_{1}} & 
	\frac{v_{3} - v_{2}}{t_{3} - t_{2}} &
	\cdots & \frac{v_{n} - v_{n-1}}{t_{n} - t_{n-1}}\end{bmatrix}
$$

<div id="finite_diff_chart"></div>

<p>The derivative of the function at <input type="number" value="-2" id="input-a"></span> is <span class="value-derivative">.</p>
<p>The estimated derivative of the function at <span class="value-a"></span> using a time delta of <input id="input-time-delta" type="number" value="2"></input> is <span class="value-finite-difference"></span>.</p>

<script src="{{wwwroot}}/includes/numeric_explorer.min.js" type="text/javascript"></script>

# Numerical Differentiation in MATLAB

In Matlab, this calculation can easily be achieved using the
[`diff`](https://www.mathworks.com/help/matlab/ref/diff.html)
function. 

1. Read the Syntax and Description section of the [documentation for `diff`](https://www.mathworks.com/help/matlab/ref/diff.html) and 
2. type in and run the first Example from the documentation into MATLAB.
3. Apply `diff` to several other vectors that you define, until you
   are confident that you understand how it works and can easily
   predict the output for small input vectors.
