---
title: Solver
morea_type: module
morea_id: module-calculator-solver
published: true
---
This is probably the most helpful feature of the calculator to learn.

<!-- NOTES
Motivation: many engineering problems can be reduced to a single, arbitrary equation with a single unknown. Sometimes it is easy to solve for the single unknown algebraicaly for an exact solution. For some equations, this is either too difficult, or impossible, in which case your calculator can be used to find an answer numerically.

Motivation: You will have problems like this in 151, for example when you get to 2D projectile motion.

There are 2 examples and 2 practice problems for this section. You may choose to skip one of each if you are short on time. Try to reserve about 20 minutes for the final section on simultaneous equations as this has already come up in EF 151.

- highlight limitations with numeric solutions:
  - the solver will find a single solution, but multiple may exist. You need to understand the equation and the context to know whether the solution is appropriate.
  - the solver will find a solution "close" to the true solution, but it may not be exact. In some contexts, but not all, the difference may be small enough so as to not matter.
-->

Take a moment to locate the section of your calculator's manual that covers the operation of the solver. Search your manual for "Solver", "Numeric Solver", or "Equation Solver". <!-- {.alert.alert-info} -->
## How It Works

-   The basic idea is that you can have any equation with several
    variables.
-   Rearrange it so that it
    equals 0. This is not necessary on the TI-84 Plus C. <!-- {li:.collapse.calc.calc-TI83.calc-TI84} -->
-   Enter it into the solver
-   Set values for all of the variables except one
-   Have the calculator iteratively (trial-and-error) solve to find the
    solution for the unknown variable
-   The calculator will use an upper and lower limit that you can
    specify: start at a given value for the unknown variable, and then find the
    closest solution (if one exists)

## General Steps

-   Press `Math`, then use the arrow
    keys to scroll down the list until you select `Solver`. Make a
    note of the number or letter at the start of that line, next time
    you can use that instead of scrolling to save time. For instance,
    on the TI-84 Plus silver edition, `Solver` is item `0` in the
    list, so pressing `Math 0` will open the solver. <!-- {li:.collapse.calc.calc-TI83.calc-TI84.calc-TI89} -->
-   If you've used the solver before, the previous settings
    appear. Use <code>&uarr; clear</code> to access the equation and get ready to
    enter a new one. <!-- {li:.collapse.calc.calc-TI83.calc-TI84.calc-TI89} -->
-   Key in the equation, pay attention to the restrictions on the left hand side depending on your calculator model. For example on the TI-83 Plus and TI-84 Plus the left hand side must be `0`, on the TI-84 Plus C you may enter any valid expression on the left hand side (`E1`). Press `Enter`. <!-- {li:.collapse.calc.calc-TI83.calc-TI84.calc-TI89} -->
-   The calculator displays all variables in the equation. You must
    enter values for all except one of the variables. These values can
    be calculations. <!-- {li:.collapse.calc.calc-TI83.calc-TI84.calc-TI89} -->
-   Move the cursor to the line containing the variable to solve for,
    press Solve (`Alpha, Enter`) <!-- {li:.collapse.calc.calc-TI83.calc-TI84} -->
-   On the TI89 you can also do this by pressing 'APPS' then
    selecting f(x)=0 Numeric Solver from the menu. After you enter the
    equation, it will ask you what each variable is. Enter those, then
    put cursor at the unknown variable, then press F2 <!-- {li:.collapse.calc.calc.calc-TI89} -->
-   TI-Nspire CX CAS: Press MENU and select ALGEBRA; then select SOLVE
    or simply type SOLVE() into a new line. Inside the parentheses, type
    both sides of the equation separated by an equals sign, a comma, and
    then the variable for which you are seeking to solve. Example:
    solve(-16.1x\^2+10x = -2 , x). Then press enter. <!-- {li:.collapse.calc.calc-TINspire} -->
-   TI-Nspire CX: Press MENU and select <!-- {li:.collapse.calc.calc-TINspire} -->
    ALGEBRA; select Polynomial Tools, then select Find Roots of
    Polynomial, or simply type polyRoots() into a new line. Inside the
    parentheses, type the equation set equal to zero without putting
    the equals sign, then put a comma, and then the variable for which
    you are seeking to solve.  Example: polyRoots(-16.1x\^2+10x+2 ,
    x). Then press enter. <!-- {li:.collapse.calc.calc-TINspire} -->
-   TI-Nspire CX and CX CAS: In some
    cases, especially with very complicated functions, it may be
    convenient or necessary to use the numerical solver. For example,
    if it is known that a solution should be between 0 and 10, enter:
    nsolve(-16.1x\^2+10x = -2 , x, 0, 10).  Then press enter. <!-- {li:.collapse.calc.calc-TINspire} -->

<div class="calc collapse calc-TI89">

### TI-89: Solving one and two variables equations

#### Solving for one variable

- From the HOME display, press F2 (Algebra), then `1:solve(`
- Within the parentheses, enter the equation followed by a comma
then the variable

    Example: solve(-16.1x\^2+10x = -2 , x) then press enter.

Note: You do NOT have to set the equation =0 in the TI-89.*

#### Solving 2-variable equations:

You can do this from the HOME menu, the same way you did single
variable:
  - From the HOME display, press F2 (Algebra), then `1:solve(`
  - Enter the equation, then a vertical bar (left side of calculator)
  - Enter known variable=value then the comma, then a single unknown
    variable example: solve(Q^3+P^2=125|P=5,Q).

</div>

<div class="collapse calc calc-TINspire">

## Solving one-variable equations

- Solving for one variable in the TI-Nspire CX CAS: Press MENU then
  select ALGEBRA then select SOLVE or simply type SOLVE() into a new
  line. Inside the parentheses, type both sides of the equation
  separated by an equals sign, a comma and then the variable for which
  you are seeking to solve. Example: `solve(-16.1x^2+10x = -2 ,
  x)`. Then press enter. Note: You do NOT have to set the equation =0
  in the TI-Nspire CX CAS.
- Solving for one variable in the TI-Nspire CX: Press MENU and select
  ALGEBRA; select Polynomial Tools, then select Find Roots of
  Polynomial, or simply type `polyRoots()` into a new line.  Inside the
  parentheses, type the equation set equal to zero without putting the
  equals sign, then put a comma, and then the variable for which you
  are seeking to solve. Example: `polyRoots(-16.1x^2+10x+2, x)`. Then
  press enter.

## Solving two-variable equations

You have two options:

- Define the known variable in a separate step:

    ``` TINspire
	P := 5
	solve(Q^3+P^2=125,Q)
	```
- Or use the vertical bar notation. The vertical bar is found under the `CTRL =` menu:

	``` TINspire
	solve(Q^3+P^2=125|p=5,Q)
	```

<!-- TODO: go through and clean up typed in code syntax -->

Both of these options will also work with saved functions, for example:

``` TINspire
f(Q,P):= Q^3+P^2-125
```

If P is known and we want to solve for Q we can either

- Define P and solve

    ``` TINspire
	P := 5
	solve(f(Q,P),Q)
	```

	or
- supply P as a known variable

	``` TINspire
	solve(f(Q,P)|P=5,Q)
	```

</div>


## Examples

<div class="collapse calc calc-TI83">
Pages 72-78 of the TI-83 Plus manual
</div>
<div class="collapse calc calc-TI84">
Pages 49-45 of the TI-84 Plus manual
</div>

### Example 1

Solve for Q from the equation `Q^3 + P^2 = 125` when `P=5`

<!-- video: vid/calc-solver1.mp4 -->
<video controls><source src='vid/calc-solver1.mp4' type='video/mp4'></video>

![](pix/solver1.gif)

Solve the same equation for P when Q=5. Look at your answer
carefully. What does the ... mean? What should the answer be?

### Example 2

Find a positive value for x using the equation -16.1x\^2+10x = -2.
    Remember that to work in the solver the equation has to equal 0.\
    Hint: Make sure you use the (-) for the negative and not the minus
    sign.

-   Since this equation has two solutions, you can find both by
	using a different starting value for the variable you are
	solving for.
-   In this example set X to 0 and solve, then set X=10 and solve
	again.
-   You will get the two different solutions because each time the
	calculator stops and displays the first solution it finds when
	it starts the solution process at the given value.
-   You can also use the bound values to control what range of
	values are considered in looking for the solution. <?=camlink('calc-solver2','','ef105-2007-01');?>

    <!--
    <video controls><source src="vid/calc-solver2.mp4" type="video/mp4"></video>
    -->
    
    ![](pix/quad-y1.gif)
    ![](pix/quad-solver.gif)


## Practice: Trajectory Motion

<div class="collapse calc calc-TI83 calc-TI84 calc-TI92">

Look back at the trajectory motion equation you stored as Y<sub>2</sub>. Note that the full equation would be represented as <code>Y=Y<sub>2</sub></code>. Solve for `X` using the following values for other variables:

<code class="calcscreen">
Y=0<br/>
B=20<br/>
A=10<br/>
&Theta;=40<br/>
G=32.2<br/>
V=64<br/>
</code>

Make sure your `MODE` is set to `DEGREE`! What value do you get when `X` is set to start at `0`? Compare with the value shown on the [EF 151 example](https://efcms.engr.utk.edu/ef151-2019-08/ti/calctraj.php). Note that in that example the trajectory solution is stored as <code>Y<sub>1</sub></code>, not  <code>Y<sub>2</sub></code>. How can you get your solution for `X` to match the example?

</div>

<div class="collapse calc calc-TINspire">

Using the trajectory motion equation you stored as Y<sub>2</sub>, solve for `X` using the following values for other variables:

<code class="calcscreen">
y:=0<br/>
y0:=20<br/>
x0:=10<br/>
&Theta;:=40<br/>
g:=32.2<br/>
v:=64<br/>
</code>

Make sure your `MODE` is set to `DEGREE`! How many values does the solver find? Compare with the value shown on the [EF 151 example](https://efcms.engr.utk.edu/ef151-2019-08/ti/calctraj.php). Which is the desired solution? How would you determine this without the 151 example showing the expected solution?

</div>


## Practice: Law of Cosines

The law of cosines is defined as $c^2=a^2+b^2-2ab \cos(C)$

<div class="collapse calc calc-TI89 calc-TI83 calc-TI84">

Store the law of cosines as
equation Y<sub>2</sub>. Solve for the angles theta and alpha in this triangle.
Hint: the side opposite the angle you are solving for is always C in the
equation. <?= camlink('calc-solver3','','ef105-2007-01'); ?>

![](pix/triangle.gif)
![](pix/law-of-cosines1.gif)
![](pix/law-of-cosines2.gif)

</div>

<div class="collapse calc calc-TI89">

All equations are stored indefinitely in the TI-89, therefore you can simply type the formula as-is into the home screen. Note: be careful with implied multiplication. AB is read as a 2-character variable, not A\*B\

- You can view stored equations while in the Numeric Solver mode by pressing F5.
- The above steps for TI-83 also work in the TI-89, with slight
  differences: these steps `RCL, VARS, Y-VARS, Function,
  Y<sub>2</sub>` reduce to RCL, then just typing in Y1.

</div>

<div class="collapse calc calc-TINspire">

Function definitions must be formatted in either of the following
two ways:

$$
f(x,y,z):= x+y+z
$$

or

$$
x+y+z \rightarrow f(x,y,z)
$$

Where $\rightarrow$ is `CTRL STO` and `:=` is `CTRL :=`. After
being saved, the function can then be executed by typing f(1,2,3) then
enter. To delete a function or variable, use the following sequence:
MENU, 1: Actions, 3: Delete Variable. Alternately, DelVar (or delvar)
can be typed in manually.

For the law of cosines example above:

First, create a function called loc.

$$
loc(a,b,c):= a^2 + b^2 - c^2 - 2ab\cos(\theta)
$$

Then use `nsolve`. **Note:** `nsolve` must be used when solving for an
unknown angle. Otherwise, a complex solution will be given. If
working in degrees, set the bounds at 0,360. If working in radians,
set the bounds at 0, 2pi.

$$
nsolve(loc(15,35,25)=0,\theta,0,360)
$$

You can even create your own functions that utilize the various
built-in functions. This can be a very powerful tool for frequently
repeated calculations. Create a function \\( loc\\_s(a,b,c) \\) that will
utilize our first user-created function, \\( loc(a,b,c) \\), and the
built-in function, *nsolve*().

$$
loc\_s(a,b,c):=nsolve(loc(a,b,c)=0,\theta,0,360)
$$

Or do it all in one step:

$$ 
loc\_s(a,b,c):=nsolve(a^2 + b^2 - c^2 - 2ab\cos(\theta)=0,\theta,0,360)
$$

Now your calculator is set up to solve the law of cosines example
above by simply typing $loc\_s(15,35,25)$.  **Note:** It may become
necessary to use long function names. You do not need to type them
out every time they need to be used. Instead, hit `VARS` for a list
of functions and variables that are saved in the current document.

The method described here is highly recommended, but Polynomial
Tools can also be used to solve the law of cosines example. From
the SCRATCHPAD or a DOCUMENT, press the MENU button. Select the
ALGEBRA option, followed by the POLYNOMIAL TOOLS options, followed
by FIND ROOTS OF POLYNOMIALS. For a quadratic equation, select
DEGREE: 2 and ROOTS: REAL (note: use tab to switch between degree
and roots).  Following the example shown on the calculators
prompt, insert the values for a2, a1 and a0. Press OK, then the
command and polynomial equation should appear in a blank
line. Press the ENTER key, and the real roots will appear inside
of curly brackets.
</div>
