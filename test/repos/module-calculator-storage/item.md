---
title: 'Storing Values'
morea_type: module
morea_id: module-calculator-storage
published: true
---
Your calculator allows you to store values or functions for later
use. This allows for quick recall of these values in the future and is
particularly useful in storing intermediate results with many decimal
places, or functions that are tedious to enter but will be used many
times (e.g. on a homework or exam.

Instructions for storing and retrieving variables is usually found in
the "Operating" section of your calculator's manual. Take a moment to
find the relevant pages in your downloaded manual. Try searching for the keyword "Storing" or "Storing Variable". <!-- {.alert.alert-info} -->

<!-- NOTES
Motivation for this topic:

- students will need to solve complex equations in 151 and 152, rather than trying to keep track of intermediate results on paper, learning to do this on the calculator will save time, and avoide rounding errors.
- There will be equations that are used in EF 151, such as the trajectory solution equation, that student will need to solve many different times with different values. Storing the equation in the calculator once and then recalling it for future use can save time, which is especially useful in a testing environment!
- when possible, share examples of your on work where storing values on paper would be tedious and using calculator storage speeds up operations, or avoids errors.
- similarly, share any examples from your own work in which there is a common equation you may need to solve many different times for different values.

Walk through the example using the TI83 emulator on the screen. Allow students time to work through each practice exercise.

- Note that the first part of the acceleration equation is 0, so only need to calculate the second part
- When I round to 132.29 I get 34487.491, and when I store the result and use it I get 34493.469, these numbers are different from what was on the sheet Clint gave me (34538.3 for stored value) but there may be a mistake on my end? Either way, the point is that the two should  be different!

The Automated Setup section is included for the curious. You do not need to do an example of programming, I just waned to provide a link to the tips page that contains the programming section.
-->

## Storing Values

One of the biggest problems we see students having with homework is
rounding off or truncating numbers during calculations.

Your calculator allows you to store intermediate results as a named variables for later use.
	<span class="calc collapse calc-TI83 calc-TI84">Variable names on the TI-83 Plus and TI-84 Plus are restricted to a single letter.</span> <span class="calc collapse calc-TI89">Variable names on the TI-89
	may contain one or more letters.</span>

- With any number displayed, use STO ALPHA A, where A is the single
  letter variable name. Press `ENTER`. The value is now stored with
  the letter name you provided.
- Use the variable name in any calculation.  **Note:** If you are
  using variables for intermediate values, make a note of the variable
  names on your work.
- X is a special variable that can be accessed with the <code>X,T,&Theta;,n</code> key. 
<!-- {ul:.calc.collapse.calc-TI83.calc-TI84.calc-TI92} -->

For the TI-Nspire, with any number displayed, use CTRL STO, A. It
allows multiple character variable names. **Note:** If you use `CTRL`
then `enter` it will display fractions as decimals. You can also set
the calculator to always display approximate values (decimal form)
with the following sequence: doc, 7: Settings and Status, 2: Document
Settings. A few recommended settings for most engineering courses are:
Display Digits: Float 6, Exponential Format: Scientific, Calculation
Mode: Approximate. Angle mode can also be set in this menu. It is
convenient to save multiple documents with the settings needed for
each of your courses/exams (i.e. Calculation Mode: Exact, Angle:
Radians for math courses). 
<!-- {p:.calc.collapse.calc-TINspire} -->

### Example

It may seem that rounding to a few decimal places may not make much of a difference, but in some cases, small changes to numbers can result in a large difference in the end result. Here is an example from EF 152:

$$ a(t) = -\left(\frac{V_{0}}{\omega}\right)\omega^{2}\sin{\omega{t}} - x_{0}\omega^{2}\cos{\omega{t}} $$

where

$$ \omega = \sqrt{\frac{k}{m}} $$

and

$$ \begin{aligned} 
V_{0} & = 0\\
m     & = 2\text{kg}\\
x_{0} & = 2\text{m} \\
k     & = 35000\frac{\text{N}}{\text{m}} \\
t_{1} & = 0.5\text{s}
\end{aligned} $$

Using your calculator, you will find that $\omega = 132.2875656$. Try rounding this to $132.29$ and solve for $a(t)$ (notice that the first term is 0 since $V_{0} = 0$). Now store the result of $\omega$ as a variable named `W`;

<code class="calcscreen">
√(35000/2)  	&#129042; W;
</code>

Re-do the same calculation, using the stored value `W` for $\omega$. Note the difference in your final result.

### Practice

Calculate the sum A+B+C+D to 10 significant digits. Remember that you
can edit lines recalled with `2nd, Enter`.
<span class="calc collapse calc-TINspire">Remember that you can edit previous lines by
using the arrow keys to find and highlight the desired line. Then hit
enter, and a new editable line will appear. Alternately, you can use
copy and paste shortcuts just as you would on a computer (CTRL C and
CTRL V). To highlight and copy only a portion of a line, hold SHIFT
and move the cursor over the desired characters. Use CTRL C to copy
the highlighted portion, ESC to drop down to the current line, then
CTRL V to paste. To quickly highlight one number from a previous line,
move the cursor anywhere on the number and double click on the
touchpad.</span>

No pen/paper! Do all your work in the calculator.

<!-- video: vid/accuracy.mp4 -->
<video controls><source src='vid/accuracy.mp4' type='video/mp4'></video>


![](pix/stacked-triangles.png)
![](pix/stack-sum1.gif)
![](pix/stack-sum2.gif)

## Storing and Using Functions

You can also store functions or equations in your calculator for later use. This is very handy when you may need to use an equation over and over again, for example the the trajectory solution that you will use when covering the topic of [projectile motion in EF 151](/ef151-2020-01/sys.php?f=bolt/bolt-main&c=class-1-8) <!-- {target="_blank"} -->.

<div class = "calc collapse calc-TI83 calc-TI84 calc-TI92">

You can store equations in the `Y=` storage area. Press the `Y=` key and you should see a few lines similar to

<code class="calcscreen">
	&nbsp;Plot1 Plot2 Plot3</br>
   \Y<sub>1</sub>=
   <br/>
   \Y<sub>2</sub>=
   <br/>
   \Y<sub>3</sub>=
   <br/>
   \Y<sub>4</sub>=
</code>

Use the up and down arrows to move the cursor to different numbered `Y` lines and key in an equation. You can later use these equations by pressing the the `VARS` key, selecting `Y-VARS` with the arrow keys, then press `1` to select `Function`
</div>

<div class = "calc collapse calc-TINspire">

You can store equations using the `Define` command (`menu` `Actions` `Define`), or the `:=` symbol. Name your functions something descriptive.

</div>

### Example: Quadratic Equation

<div class = "calc collapse calc-TI83 calc-TI84 calc-TI92">

Use the `Y=` key and store the quadratic equation  $AX^2+BX+C$ as Y<sub>1</sub>.

</div>

<div class = "calc collapse calc-TINspire">

Use the `:=` symbol to define the quadratic equation $ax^{2}+bx+c$ as `quad(x)`.

</div>

### Practice: Trajectory Solution

<div class = "calc collapse calc-TI83 calc-TI84">

Use the `Y=` key and store the **right-hand side** of the trajectory solution equation as Y<sub>2</sub>:

$$ Y = B + tan(\theta)(X-A) - G/(2V^2)(1 + tan(\theta)^2)(X - A)^2$$

</div>


<div class = "calc collapse calc-TINspire">

Use the `:=` symbol to store the trajectory solution equation, shown below, as $\text{traj}(x,\theta)$.

$$ y0 + \tan(\theta)(x-x0) - g/(2v^2)(1 + \tan(\theta)^2)(x - x0)^2$$

</div>

The &Theta; symbol is entered using `ALPHA, 3` <!-- {.calc .calc-TI83 .calc-TI84} -->

<div class="calc collapse calc-TI83 calc-TI84">
When typed into your calculator the equation should look something like

<div class="screen screen-TI83">
<code class="screen-TI83">
\Y<sub>1</sub>=B+tan(&Theta;)(X-A<br />
)-G/(2V<sup>2</sup>)(1+tan(<br />
&Theta;)<sup>2</sup>)(X-A)<sup>2</sup>
</code>
</div>

Line breaks will depend on the calculator screen, for instance on the TI-84 Plus C more characters will fit on a single line so your screen won't look quite the same as above.
</div>

<div class="calc collapse calc-TINspire">
When typed in, the line should look something like

<div class="screen screen-TINspire">

$$ \text{traj}(x,\theta):=y0+\tan(\theta)(x-x0)-\frac{g}{2v^{2}}\left(1+(\tan(\theta))^{2}\right)(x-x0)^{2} $$

</div>

You could also use the `/` symbol instead of typing $\frac{g}{2v^{2}}$ as a fraction.

On the TI-Nspire you have some flexibility with how you name your functions, as well as what variables to consider parameters to the function and what to treat as constants. The above example names the function `traj` and treats `x` and <code>&Theta;</code> as function parameters. All other parameters ($g, v, x0, y0$) will have to be defined before using the function, or supplied using the pipe (`|`) notation. You could choose to make this just a function of $x$ as $traj(x)$, or choose to supply other parameters like $x0$ and $y0$ as function arguments. It just depends how you expect to call the function and what values might be changing a lot. For example, since $g$ is the gravitation constant that won't be changing so it wouldn't be helpful to supply it as a function argument, but if you had several different problems all with different $x0$ then it might be easier to use $x0$ as a function argument so you do not need to re-define $x0$ between each use of the function.

</div>

You will use this equation in a few  weeks in EF 151.  In this equation, `A` is your initial $x$, or $x_{0}$, and B is your initial $y$, or $y_{0}$. These terms will make more sense once you discuss trajectory motion in EF 151!

## Automating Setup

You may find that you are using the same variables and equations over and over again, for example in EF 151. Rather than re-enter them each time, you can also store a *sequence* of commands, such as setting variable names and functions, as a named program that you can execute in the future. We won't cover this in this lab, but instructions are provided on the [General Calculator Tips] page under the Programming heading.
