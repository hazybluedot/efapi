---
title: 'Example 2 - System of Linear Equations'
morea_type: experience
morea_id: excel-solver-linear-system
published: true
---
## Problem

Use the solver to solve the
following system of linear equations:  

```
4P - 2N + 3F -10 = 20
P + 5N = 0
N - F - 10 = 0 
```

1. Open a worksheet "Example 2" and set it up as shown:\
   ![](pix/linesys.jpg)

2. Initial guesses for P, N, F will be zero.
3. Rearrange each equation to set them equal to zero and place them as
   formulas in the appropriate cells.

4. Name the cells for each equation (`B8`: <kbd>eq_1</kbd>, `B9`: <kbd>eq_2</kbd>,
   `B10`: <kbd>eq_3</kbd>)

5. Go to Data, Solver.
   - Set objective: \[leave blank\]
   - By Changing Variable Cells: <kbd>P,N,F</kbd>
   - Subject to the constraints: \[add\]
   - Cell reference: <kbd>eq_1</kbd>, [ <kbd>=</kbd> ] Constraint: <kbd>0</kbd>
   - \[add\] and repeat for eq_2, e_3
   - un-check 'make unconstrained variables non-negative' because your
	 solution to this problem (P,N,F) can be negative.
  - Click "Solve", Keep Solver Solution, "OK"
6. Check values: <samp>P=15.79</samp>, <samp>N=-3.16</samp>, and <samp>F=-13.16</samp> <!-- {li:.result} -->
