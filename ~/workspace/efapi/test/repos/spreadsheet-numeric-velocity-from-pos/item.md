---
title: 'Velocity from Position'
morea_type: experience
morea_id: spreadsheet-numeric-velocity-from-pos
published: true
---
Do the following work on your "Velocity Estimation" worksheet. <!-- {.alert .alert-info} -->

Velocity is the rate of change of position, in other words, velocity
is the *derivative* of position. Graphically this means that velocity
is the *slope* of the position graph.

![Plot showing several data points with annotations overlayed to indicate position values s1,s2,s5,s6 and time values t1,t2,t5,t6](pix/finite_difference_visual.png) 

The slope between two points can be calculated as the *rise*, or
difference in vertical position, divided by the *run*, or difference
in horizontal position. When the values represent position, then the
slop between data points represents the average velocity between those
two times. Mathematically this calculation looks like:

$$
v_{1} = \frac{s_2 - s_1}{t_{2}-t_{1}}
$$

With your time column as A and your position data in column B, the
first value of velocity can be entered in D3 as:

``` excel
=(B4-B3)/(A4-A3)
```

Here row 3 represents our "current" time, the time we wish to
calculate velocity for. We do so by taking difference between the
*next* velocity value B4 and the current velocity value in B3. This
difference is divided by the corresponding time difference.

Extend this formula to the last row of data by double clicking the
small box in the lower right corner of the active cell.

## Plot the Data

Create an appropriately annotated scatter plot of time vs. estimated
velocity from position data. Your chart should look similar to this:

![Chart of velocity estimated from position data](pix/velocity_from_pos_chart.png) <!-- {.screencap} -->
