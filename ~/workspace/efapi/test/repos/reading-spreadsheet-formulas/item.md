---
title: 'Cell Value vs Cell Data'
published: true
morea_type: reading
morea_id: reading-spreadsheet-formulas
morea_summary: 'Introducing the concepts of data, formulas, and functions'
---
Spreadsheet formulas are data entered into cells that start with the
`=` (equals) character. Spreadsheet software, such as Excel, use
formulas to perform calculations.

When working with spreadsheet formulas it is important to remember
that the **value** you see in a spreadsheet cell may not be the data
**stored** in the cell, the data may be a formula!

### Example

Type into any cell `=1+1` and hit Enter.  Excel did the calculation
and the cell now displays `2`. If you select that cell, you will see
that the data in the formula bar still is `=1+1`.

On the Formulas tab there is an option to "Show Formulas". Selecting
this, or pressing (Ctrl +\`), will convert the display to show the
formulas in their cells, rather than the result.

Mac users, in this case you use `Ctrl` + \` not `Command` +\`. <!-- {.os .os-mac} -->

## Basic Calculations

We just saw that Excel can perform addition using the `+`
symbol. Other common symbols work as you might expect: `-`, `*`, and
`/`.  More complex equation can be performed with parentheses just as
you would use them on paper or on your calculator. So `=1+1/2` is
**not** the same as `=(1+1)/2`, but it is the same as
`=1+(1/2)`. Remember your order of operations!

## Cell References in Formulas

The calculations we have done so far in our spreadsheet could more
easily be done on a calculator! Why load up Excel to perform `=1+1`?
The advantage of spreadsheet formulas comes from being able to
reference cells and perform calculations on the values in those cells.

### Example: Simple Arithmetic

1. On a new sheet type `1` into cell `A1` and `2` into cell `A2`. Select
both cells and drag down to create a list (1,2,3,4,...). Now in cell
`B2` type `=A1+A2` (you can also type "=" select cell A1 then type "+"
then select cell A2) and hit enter. Notice it performed the
operation. 

2. Select cell `B2` and using the small black box in the bottom
right drag the equation down to the end of the list in column `A` (Hint:
a short cut is to double click the little black box).  Notice how the
equation changes and it is moved into each cell. Make sure you
understand what is going on!
