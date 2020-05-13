---
title: Functions
published: true
morea_type: experience
morea_id: experience-spreadsheet-functions
morea_summary: 'Practice entering functions into formulas'
---
Spreadsheet software can perform more complex analysis using
functions. Functions have names that indicate the type of analysis
they perform, and accept arguments which determine the range of cells
they are to work with, as well as other options.

## Example: Simple Statistics

1. On the 'US States Metrics' worksheet, select all the cells containing the population values.
   1. Select the population of Alabama in cell C2
   2. Press <kbd>Ctrl</kbd>+<kbd>Shift</kbd>+<kbd>&darr;</kbd> (hold the
Ctrl and Shift key down at the same time, and press the down arrow key
at the same time).
2. Notice in the bottom right of the window, 3 simple statistics are
automatically calculated. The average, the sum, and the count.

Let's store the sum of the state populations in a cell:

1. Select cell 'C53'.
2. In the formula box, type <kbd>=SUM(</kbd>. Notice that as you type,
   a help-tip will appear with a decription of the what the function
   'SUM' does, and what arguments it accepts.
3. Select the the column of population data the same way we did before.
4. Type <kbd>)</kbd> to finish the 'SUM' function and press <kbd>Enter</kbd>.
3. The sum of the state populations is shown in cell C53.
4. Click on C53 to select it. Notice that while the value displayed in
the cell is `313645717`, the data in the formula bar is `=SUM(C2:C51)`.
5. Name the cell with the sum of the population <kbd>pop_total</kbd>.

We say that the function `SUM` is called with the **argument** `C2:C51`,
or that `SUM` is called on the range `C2:C51`.

## Finding the Right Function

You can browse through the large number of available functions under
the Formulas tab. Sometimes you may find a useful function quicker
with an Internet search, for example "how do I calculate the
average in Excel?"

Sometimes you may have an idea what the function you need is, but may
forget the exact word, or what arguments it takes. If you start what
looks like a function name in a formula, Excel will show you a list of
possible completions.

## Auto-complete Suggestions

1. Select cell C54 and type <kbd>=AV</kbd> and notice that Excel
   starts to give you suggestions. You can continue to type AVERAGE or
   just double click it. Notice Excel put an open parenthesis so you
   are ready to type in arguments. You can manually type in `C2:C51`
   or select the population data as before. You can type the close
   parenthesis or just
   hit ENTER and Excel will auto fix it for you.
