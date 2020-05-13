---
title: 'Example 1 - Single Equation'
morea_id: excel-solver-single-equation
morea_type: experience
published: true
---
When solving for a single equation we set the **objective** to the
cell containing the result of the equation, and list the cells that
can change in the "By changing variable cells" box.

<!-- NOTE: 
Say something here. 
-->

## Part A

$$
y - y_{0} = (\tan{\theta})(x - x_{0}) - \frac{g}{2v_{0}^{2}}\left(1 + \tan^{2}{\theta}\right)\left(x - x_{0}\right)^{2}
$$

Where 
- $\theta$ is the launch angle
- $v_{0}$ is the launch velocity
- $(x_{0}, y_{0})$ is the launch position, positive is up

Copy/paste the following values into columns A-C in Excel:

|       |      |         |
|-------|------|---------|
| x0    | 0    | ft      |
| y0    | 0    | ft      |
| x     | 100  | ft      |
| y     | 0    | ft      |
| theta | 30   | degrees |
| g     | 32.2 | ft/s2   |
| v0    | 75   | ft/s    |

- Assign names to each cell in column B to correspond with the
  variable (name B1 'x0', name B2 'y0', etc). 
  
::: aside Working with Named Cells
- You don't have to name cells one by one in this case, we can convert
  the existing row/column labels into names. Select the range we want
  to name + the row/column containing the labels. Then Formulas tab,
  under the Defined Names group click Create from Selection. Notice
  that a dialog appears; in this particular case we want the data
  labels at the left.
- Use Ctrl+F3 (or go to Formulas-\> Name manager) to view all named
  cells and add new ones. Note that cells cannot be named 'x1' or
  anything that might be confused with a column-row reference.
   
  Mac Users: Go to the Formula Tab then click on Define Name to view
  named cells and add new ones. <!-- {.os .os-mac} -->
:::

1. Type <kbd>eq</kbd> in `A10` and name `B10` 'eq'
2. Create a function for the trajectory equation in `B10`. We must first
  set the equation equal to zero and bring (y-y0) to the other side.

  - Don't forget to use the `RADIANS` function with tangent.
  - Be careful with your parentheses\!
  - Your formula should produce the value: <samp>19.572</samp>. <!-- {li:.result} -->
  - ::: collapse Check your formula
    ``` excel
    =-(y-y0) + (x-x0)*TAN(RADIANS(theta))-(g/(2*v0^2))*(1+(TAN(RADIANS(theta))^2))*(x-x0)^2
    ```
    :::

## Part B

Using Solver determine what launch angle is needed to hit a
target at height 27 ft.

1. Change the <var>y</var> value to <kbd>27</kbd>
2. Open the solver and complete the following:
   - Set objective: <kbd>eq</kbd>
   - By Changing Variable Cells: <kbd>theta</kbd>
   - Subject to the constraints: \[leave blank\]
   - Check the box to 'Make Unconstrained Variables Non-Negative'
   - Click "Solve"
   - Select 'Keep Solver Solution' and Click "OK"

![](pix/solver-trajectory-solution-y27.png)<!-- {.screencap} -->
![](pix/solver-single-equation-dialog.png)<!-- {.screencap} -->

Notice the value of the equation value is now extremely close to zero
which gives our answer: <samp>theta = 34.77&deg;</samp> <!-- {.result} -->

## PART C 

Modify the problem to find the launch angle to hit a target
at a height of <kbd>80</kbd>ft.

  - Since this height is not possible with the given parameters, Solver
    cannot return a feasible solution.
  - However, it does give the maximum possible height and the angle to
    produce such. The equation result of <samp>-21.2775</samp> tells us that the
    highest possible target must be 21.2775 less than 80ft (58.72ft) and
    the launch angle to give that result is 60.21° <!-- {li:.result} -->
  - Helpful solver note: when 'Solver cannot find feasible solution,'
    check your initial guess.

