---
title: 'Exercise 2 - Non-Linear Equations'
morea_id: excel-solver-non-linear-equations
morea_type: experience
published: true
---
Go to worksheet "Exercise 2" and solve this set of non-linear
equations:

<code>
x<sup>3</sup> + 3y = 1/sin<sup>2</sup>(2θ)</br>
y = e<sup>-x</sup></br>
y = x + ln(θ)
</code>


## Setup the Worksheet

::: aside Spreadsheet Functions
	Note: Spreadsheet software uses the function `EXP( )` to calculate
	*e* raised to a power, the function `LN( )` for the natural logarithm, and the function `PI()` for a more precise
	value of π.
:::

1. Identify variables and name the corresponding cells. (I used `xx`, `yy`, and
`th` to avoid the confusion of using names that already existed)
2. Initialize <var>xx</var> as <kbd>0</kbd>, <var>yy</var> as <kbd>0</kbd>, and <var>th</var> as <kbd>1</kbd>. These will be
our starting guesses.
3. Set each of the above equations equal to zero; type them into Excel
   using the names of the variables you chose.

	Check your setup and formulas here:\
	![](pix/ex2setup-alt.jpg) ![](pix/ex2form-alt.jpg)


## Run the Solver

1. Open the solver. Leave objective blank, changing cells <kbd>xx, yy,
   th</kbd>
2. Apply constraints: set each equation equal to zero.\
   ![](pix/ex2basic-alt.jpg)

This system of equations will have multiple solutions; Consider the
following constraints:

  - small positive values of x and y
  - θ between 0 and 45 degrees (π/4 radians).

**Note:** Solver returns the first solution that satisfies all the
constraints for the problem, based on your initial guess. However, many
times (as in this non-linear system of equations) there is more than a
single solution. If your initial guesses for xx, yy, and th are 0, 0,
and 1 respectively, solver will probably converge to the desired
solution. If your initial guesses for xx, yy, and th are not 0, 0, and
1, you may get an alternative correct solution that satisfy the system,
but not the desired one. Therefore, it is a good idea to add the
following constrains to the problem:
	- `xx>=0`
	- `yy>=0`
	- `th<=PI()/4`,
	- `th>=.0001` (because we don't want theta to equal zero)

Since Excel 2010 there is the 'make unconstrained variables
non-negative' feature. Check that box and you can skip the xx and yy
constraints.

The Mac version of Excel does not support the use of functions from
constraints inside of the solver. Therefore, adding `th ≤ PI()/4` as a
constraint will give you an error. Adding `th ≤ 0.785398163` (the
approximate value of π/4) will work. <!-- {p:.os .os-mac} -->


## Check your Work

Your answers should be:

<samp>xx=1.679</samp>, <samp>yy=0.187</samp>, <samp>th=0.225</samp> radians <!-- {.result} -->

Check your solver set up here.\
![](pix/ex2solve-alt.jpg)

![](pix/ex2sol-alt.jpg)
