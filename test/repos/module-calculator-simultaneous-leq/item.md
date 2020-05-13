---
title: 'Simultaneous Linear Equations'
morea_type: module
morea_id: module-calculator-simultaneous-leq
published: true
---
Many engineering problems can be represented as a *system* of
Equations and unknowns. In fact, you may have already seen some in a
physics course such as EF151.

With a single equation and a single unknown we can solve for the
unknown using algebraic manipulation (or the solver on your
calculator). When we have more than one *linear* equation and the same
number of unknowns we can solve the system using *linear* algebra, or
the `MATRIX` feature on your calculator.

Take a moment to locate the section of your calculator's manual about solving systems of linear equations. Do a keyword search for "systems", "linear equations", or "matrix". <!-- {.alert.alert-info} -->

<!-- NOTE
- explain what a matrix is, even the students who have had linear algebra may need a refresher on the terminology
  - e.g. what does a "3 by 5" matrix mean?
  - e.g. A system of 2 equations and 2 unknowns can be represented as a 2 by 3 matrix

Motivation: you will need to solve systems of linear equations in 151. In fact, you may have already seen this!

If you have an example from your own work or discipline, consider sharing it.
-->

# General Procedure

1. Identify the matrix that describes your system of equations. 
   - A Matrix is just numbers organized into rows and columns.
   - The matrix representation of your system will have the same number of rows as number of equations
   - The matrix representation of your system will have one column for each variable, plus one more for the equality
2. Enter the matrix into your calculator
3. Run the "Solver" function
  
<div class="collapse calc calc-TI83">
</div>

<div class="collapse calc calc-TI89">
-   *TI-89:*
    -   Press 'APPS' then select the Data/Matrix icon, enter, 3: New.
    -   Use right arrow to change type to Matrix.
    -   enter a name for the matrix under 'variable'.
    -   enter row and column dimensions, then press enter twice.
    -   enter values, note that r1c1 stands for row 1, column 1, etc.
    -   press 'HOME' to exit; view matrix by entering the name you gave
        it.
    -   go to 'Math' (2nd, 5) choose 4:Matrix.
    -   choose 4:rref then enter the name of your matrix or use the up
        arrow to select it from window.
</div>

## Important Considerations

When preparing your equations for the Linear Systems solver, each
equation must be set up in a form with:

- all the variables in a consistent order (e.g. `x` first, `y` second) on the left side of the equation
- then a single constant value on the right side of the equation.

# Example

Solve the system of two equations:

```
3.1x + 4.5y = -12.5
2.8x - 1.6y = 14.2

```

1. Identify the matrix representation of this system of equations
   
   The matrix for this system will have 
   - 2 rows, because there are 2 equations
   - 3 columns: 1 more than the number of variables
   On paper, it will look like this:

   $$
   \begin{matrix}
   3.1 & 4.5 & -12.5\\
   2.8 & -1.6 & 14.2
   \end{matrix}
   $$

2. Enter the matrix into your calculator
   1. Enter a matrix using the `MATRX, EDIT`, and select a name like `A`. 
   2. Define a 2x3 matrix (2 rows and 3 columns) and enter the coefficients of each equation. Quit the matrix operation.
   <!-- {li^2:.collapse.calc.calc-TI83.calc-TI84} -->
2. Enter the matrix into your calculator
   1. Press MENU then MATRIX and VECTOR, then CREATE, then MATRIX.
   2. Enter the number of rows and columns that you will use (this will be 3 rows and 4 columns for the above example). Press ENTER.
   3. Fill in the matrix template that shows up as a new line. Make sure the coefficients and constants are entered in the form detailed above.
   <!-- {li^3:.collapse.calc.calc-TINspire} -->
3. Solve for the entered matrix
   1. Go to `MATRX, MATH, rref`
   2. Go to `MATRX, NAMES`, select the name of the matrix you stored in step 2.1.
   3. Close the parentheses and hit ENTER.
      ![](pix/simul-1.gif)
      ![](pix/simul-2.gif)
   4. The answer from `rref([A])` corresponds to the equations
      ```
      1x + 0y = 2.5
      0x + 1y = -4.5
      ```
      meaning **x = 2.5** and **y = -4.5**. System of equations solved!
   <!-- {li^4:.collapse.calc.calc-TI83.calc-TI84} -->
3. Solve for the entered matrix
   1. Arrow over to the right of the matrix and press CTRL STO and
      give the matrix a variable name. Press ENTER.
   2. Press MENU then MATRIX and VECTOR then REDUCED ROW-ECHELON FORM. Type the name of your matrix into the parentheses. Press ENTER.
   <!-- {li^2:.collapse.calc.calc-TINspire} -->
      
<div class="collapse calc calc-TINspire">

# TI-Nspire Alternative Methods

## Fast Matrix alternative

- Press CTRL \[\] to create a new 1x1 matrix. Press the left-pointing
  right-angled arrow key at the bottom right of they keypad to add
  additinal rows. Hold SHIFT and press the same arrow key to add new
  columns. If you add too many rows or columns, use CTRL Z to undo the
  last operation.
- Fill in the matrix. Arrow over to the right of the matrix and press
  CTRL STO and give the matrix a variable name. Press ENTER.
- Type rref and put the matrix name immediatly after in parentheses
  (ex. rref(A) for a matrix, A). Press ENTER.

## Symbolic equation alternate

- Press MENU, 3: Algebra, 7: Solve System of Equations, 2: Solve
  System of Linear Equations. Enter the number of equations, press
  tab, enter the variable names separated by commas. Press Enter.
- Type in each equation symbolically. Press ENTER.
</div>

# Practice

Now, your turn. Solve the system of three equations:

``` {.code}
4P - 2N + 3F = 30
P + 5N = 0
N - F - 10 = 0

```

Hints: use a 3x4 matrix, be consistent:

- use column 1 for P's coefficients, column 2 for N's, etc.
- use 0 coefficients for missing variables
- put constants on right side of equation and in the last column of the matrix.
