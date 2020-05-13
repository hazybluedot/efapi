---
title: 'Intro to Data Analysis'
morea_id: module-spreadsheet-data-analysis
morea_type: module
published: true
---
Treat this section as a "good to know" reference. It is important to
know that your spreadsheet software *can* do the data operations
described here. However, if you ever need to do more than a handful of
simple analysis operations, you are probably better off working in a
programming environment such as MATLAB. <!-- {p:.alert .alert-info} -->

In the previous example we had given you row cutoffs for Phase 1, 2,
and 3. If these values were not given, how might we have found them
from the data?

From the position-velocity-acceleration plot we can see that the
phases are separated by a large negative spike in acceleration.

For relatively short data sets like the cart incline data, it is not
too difficult to scroll down the list and look for values in the
acceleration column that are negative. We can then look across to the
time column to find the corresponding value of time.

But what if we had many hundreds, thousands, or even millions of rows
of data? It would no longer be feasible to find certain values on our
own. Instead we would want to ask excel to do the following data analysis tasks for us:

1. Find the minimum value of acceleration
2. Find which row number the minimum value occurs on
3. Find the value of time for that same row number.

We can do this with the following three functions available in any spreadsheet software:

- `MIN` will return the minimum value in found in a list of data.
- `MATCH` will return the position (index/row) in a list were a particular value is found. 
- `INDEX` will return the value in a list at a particular position, or
index. e.g. what is the value in the list at index 3?

## Demonstration

We will find the first break-point between Phase 1 and Phase 2. This is where the acceleration reaches it's minimum value across the entire data set:

1. Select a cell towards the top of your worksheet and to the right of your data columns. Add the text "Phase 1" to this cell.
2. In the cell below it, we will find the minimum value of
   acceleration. Enter the formula <kbd>=MIN(acc)</kbd>, assuming you
   named the column containing acceleration data `acc`. 
   - Name this cell <kbd>acc_min1</kbd>
3. In the cell below the previous one, enter the formula
   <kbd>=MATCH(acc_min1, acc, 0)</kbd>. This tells excel to find the
   row number at which the value in the range `acc` is equal to the
   value in `acc_min1`. The `0` in the third position is what tells
   the software to find an exact match.
   - Name this cell <kbd>phase1_row</kbd>
4. In the cell below the previous one, enter the formula <kbd>=INDEX(time, phase1_row)</kbd>.

   This tells the software to find the value of `time` at row
   `phase1_row`. This assumes you have named the column containing
   time accordingly.
   
   - If we wanted to just find the nearest whole-number value of time,
     we could pass the value returned by `INDEX` to the `ROUND`
     function for a formula that looks like <kbd>=ROUND(INDEX(time,
     phase1_row), 1)</kbd>.

The situation becomes a little more challenging to find phase 3 and
phase 3 cutoffs using this method because the acceleration values
corresponding to those transitions are greater than the minimum value
overall, so we would have to adjust the range for which we found the
minimum acceleration in. This is an example in which we are running up
against the limitations in spreadsheet software. To find all the
transitions between phases we really want to ask the computer to
"find all points at which the slop of the acceleration data changes
sign". Spreadsheet software is not designed to easily make this kind
of calculation, and it would be easier to perform in a programming
environment such as MATLAB.
