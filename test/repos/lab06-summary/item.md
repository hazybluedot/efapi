---
title: Summary
published: true
morea_type: module
morea_id: lab06-summary
---
Today we practiced using the solver in Excel to solve both single
equations and systems of multiple equations:

1. Identify if you are working an optimization problem, or a standard problem
2. Identify the independent variables, those variables that can be directly changed
3. Identify the constraints, if any. These are typically expressed as
   equations describing a relationship between independent variables
   and other values.

## General Setup

- Create a separate worksheet for each Solver problem
- Enter all values into spreadsheet cells. 
  - It helps if you name the cells according to the variable name so
    that any formulae you enter are easier to verify.
- It can help to explicitly list constraints that may not show up as
  equations, e.g. if a variable that is changing is a length, it must
  be greater than zero.
  
## Single Equation, Single Unknown

- Rearrange the equation to equal 0 or some other constant
- Set "Set Objective" to the cell containing the value of the equation
- Set "By Changing Variable Cells" to the cell containing the parameter that you are trying to solve for

## Systems of Equations

If a problem statement suggests there is a single valid solution, then:

- Leave "Set Objective" empty
- Ignore "Max", "Min", and "Value Of"
- List the independent variables in the "By Changing Variable Cells" box. Independent variables should be those that you as the designer can change.

## Optimization Problems

If a problem statement asks to find the "maximum" or "minimum" of some
quantity, set the cell that calculates that quantity as the objective
and then select either "min" or "max" depending on which you are asked
to find.

Determining which variables can change as well as what the constraints
are the same way you would for a non-optimization problem.

::: section Graded Items
- [Quiz: Excel Solver]({{wwwroot}}/sys.php?f=assess/main&name=quiz06)
- [Quiz: Excel Solver MC]({{wwwroot}}/sys.php?f=assess/main&name=quiz06mc)
- [Dropbox: Lab06]({{wwwroot}}/sys.php?f=dropbox/main&pid=lab06)
- [Feedback: Excel Solver]({{wwwroot}}/feedback/excel-solver.php)
- [Dropbox: Practice Midterm]({{wwwroot}}/sys.php?f=dropbox/main&pid=Lab06mp)
  - The submitted practice exam file itself is ungraded, but you are
    encouraged to submit it and preview it as this will be the same
    way the actual exam is submitted.

<!-- from last semester:
      *You will NOT be graded for Lab 6 Quiz file or the Midterm
      Practice file, but it's a good idea to upload to allow access
      to them later. Also, remember to upload the Excel file with
      the in-class tasks worked for a participation grade.  
-->
:::

::: section References
- [Excel Solver Examples](http://www.vertex42.com/ExcelArticles/excel-solver-examples.html)
- [Excel Review](http://faculty.fuqua.duke.edu/~pecklund/ExcelReview/ExcelReview.htm)
- [Solver Tutorial](http://www.solver.com/tutorial.htm)
:::

