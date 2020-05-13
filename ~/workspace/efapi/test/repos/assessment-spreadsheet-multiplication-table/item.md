---
title: 'Practice: Multiplication Table'
published: true
morea_type: assessment
morea_id: assessment-spreadsheet-multiplication-table
morea_summary: 'Practice using both relative and absolute cell referencing'
---
Create a new worksheet in your `lab03_practice` file named
'Mult. Table'. Use that worksheet for the following practice problem.

Create a multiplication table for the numbers 1 through 10. Use Excel
to calculate all values.

1. Create the list of numbers in 
   B1:K1 (highlight first two, 
   click corner and drag across)
2. Copy those numbers (right
   click, copy or Ctrl+C).
4. Go to A2 and right click to
   Paste. Choose the transpose
   icon. This will make the row
   of numbers a column of
   numbers.
5. Use the Esc key to clear the
  selection (fuzzy box).
6. Create formula in B2 `=A2*B1`
7. Copy the formula to the rest of the row (click corner and drag to
   the right)
8. Look at the numbers and check the formulas. This isn't what we
   want. We want the references to always come from column A and
   row 1. To do this, you prefix those parts of the address with a
   \$. So to keep column A, we use \$A. To keep row 1, we use \$1.
9.  Change the formula in B2 and use absolute addressing. Fun
     tip: you can double-click cell to edit the formula and
     use F4 to toggle through the various combinations: A1,
     \$A1, A\$1, \$A\$1 
10.  To fill the table, highlight first row, click corner and drag
     down.
11. Highlight B through K in the header line. Double-click on a
    divider line to automatically resize all of the column widths.
14. Save your file.
<!-- {ol:.col-md-6} -->

![](pix/multiplication.png) <!-- {p:.col-md-3} -->
