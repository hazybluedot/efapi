---
title: Practice
published: true
morea_id: spreadsheet-numeric-practice
morea_type: assessment
---
Now suppose we had an equation for the velocity of an object moving in a
straight line given by the function:  
*v = (-0.011t<sup>3</sup> - 0.2t<sup>2</sup> + 2.4t + 2)* m/s and *x(0)=
-18*m.

Create a copy of your spreadsheet (right click on Sheet1 tab and select
"move or copy," then check "create a copy"). Rename the new worksheet as
"Practice"

The work completed in this section will be submitted for a grade.

## Create a new time sequence

This is practice generating lists of numbers.

::: aside Searching for Shortcuts

When Dr. Maczka was reviewing this material, he came upon the
instruction to create the lists of time values from 0 to 10 in
increments of `.1`. He didn't want to drag the fill box down 100
rows and knew there must be a better way. He ran an internet search for ["excel fill a formula into a certain number of rows"](https://duckduckgo.com/?q=excel+fill+a+formula+into+a+certain+number+of+rows&t=ffab&atb=v181-1&ia=web) which returned a [result from Stack Overflow.](http://stackoverflow.com/questions/21029891/ddg#21030190). This is how he learned about the "Series..." feature in Excel.

:::

Modify the time column. Use a time scale of 0 to 10 seconds in 0.1
second increments. This will be 100 cells, so rather than drag to
select all 100 try the shortcut linked in the side-bar.

## Create a vector of values

This is practice using formulas.


Modify the velocity formula to reflect the new equation. Drag down to
fill for all values of time.  
Helpful hints:

  - Excel does not assume multiplication. You must use the asterisk: 2x
    --\> 2\*x
  - Replace t in the above equation with cell A2.
  - Be careful with your signs\!
  - Check values: v(0)= 2; v(10)= -5

## Calculate Position and Acceleration 

This is practice with numerical integration and differentiation.

Extend the formulas for position and acceleration.  
Helpful hint: Double click on the black box in the bottom right corner
of the cell to auto-fill the rest of the column.

Fix plots: right click on each curve, Select Data, Edit

  - Don't forget to change your initial position\!
  - Remember to exclude the last cell for Half times and Acceleration.
  - Don't forget to change the max on the x-axis of acceleration.
    (change to 12 to match others)
  - Don't forget to change the units on your axis labels\!

## Create a Summary Table

This is practice using the three functions introduced in this lab.

Create a summary table. The table should include maximum velocity, time
max velocity is reached and position at **5.5** seconds.

## Check your Work

Your plots and result table should look something like this:

![](pix/practice_done.png){.screencap}\
![max velocity is 5.75 meters per second, time max velocity is reached is 4.4 seconds, and position at 5.5 seconds is 15.69 meters.](pix/practice_results.png){.screencap}

If your numbers do not match, look over your formulas carefully, check that cell references are correct, initial position is correct, etc.
