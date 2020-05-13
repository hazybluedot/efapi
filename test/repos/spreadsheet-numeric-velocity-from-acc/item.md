---
title: 'Velocity from Acceleration'
published: true
morea_type: experience
morea_id: spreadsheet-numeric-velocity-from-acc
---
Do the following work on your "Velocity Estimation" worksheet. <!-- {.alert .alert-info} -->

Acceleration is the rate of change of velocity, in other words,
velocity is the *integral* of acceleration. Graphically this means
that velocity is the *area under the curve* of the acceleration graph.

<!-- TODO: create an updated image without the smooth line -->
![](pix/trapz.png)

The area of a trapezoid can be calculated as

$$
A = \frac{1}{2}(b_{1} + b_{2})h
$$

Where $b_{1}$ and $b_{2}$ are the lengths of the two bases and $h$ is
the height. In the trapezoids drawn above, the bases are the
vertical lines between the x-axis and the acceleration values $a_3$
and $a_4$ while the height is the time difference $t_4-t_3$.

The velocity at $t_4$ is calculated as the are under the curve up
until $t_4$:

$$
v_{4} = v_{3} + \frac{1}{2}(a_{4} + a_{3})(t_{4}-t_{3})
$$

Where $v_3$ is the area under the curve until $t_3$. 

Note that while usually negative area doesn't make sense, in the
context of computing the numerical integral it does make sense:
negative areas under the acceleration graph will sum up to produce
negative velocities.

With your time column as A and your acceleration data in column C, the
first value of velocity can be entered in E4 as:

``` excel
=E3 + 0.5*(C5+C4)*(A5-A4)
```

Make sure you put an initial value in cell E3. A reasonable initial
value in this case is 0.

Here row 4 represents our "current" time, the time we wish to
calculate velocity for. We do so by calculating the area of the
trapezoid formed by the current velocity value, the next velocity
value, and the two corresponding time values.

Extend this formula to the last row of data by double clicking the
small box in the lower right corner of the active cell.

## Format Check

The first few rows of your spreadsheet should look something like this:

|   | A        | B            | C                     | D             | E                 |
|---|----------|--------------|-----------------------|---------------|-------------------|
| 1 | Time (s) | Position (m) | Acceleration (m/s^2^) | From Position | From Acceleration |
| 2 | 0        | 0            |                       | 0             |                   |
| 3 | 0.05     | 0            |                       | 0.022         | 0                 |
| 4 | 0.1      | 0.0011       | 0.631                 | 0.058         | 0.03215           |
| 5 | 0.15     | 0.004        | 0.655                 | 0.09          | 0.0651            |
<!-- {table:.spreadsheet-view} -->

## Plot the Data


We will add a second data series to the same chart you created above.
   
1. Right-click on the chart and select "Select Data..."
2. Under "Legend Entries" click "Add"
   1. Put the cursor in the "Series Name" box and click cell E1 which should contain the text "From Acceleration"
   2. Move the cursor to the "Series X Values" box and click column "A"
   3. Move the cursor to the "Series Y Values" box, remove the `={1}`
      text and then click column "E" which should contain your
      estimated velocity from acceleration data.
  4. Click "OK"
3. Click "OK" to close the "Select Data Source" window

### Add a Legend

Now that we have two data series on the same chart, it is important to add a legend to let the viewer know what the different data series are:

1. Select the chart and click the green plus symbol to add a chart element 
2. Select the box next to "Legend"
3. A legend with two entries should appear, the text of the entries
   comes from the "Data Series Name" which you set when adding the new
   data series. 
4. Try moving the legend to different parts of the chart.
   1. You can drag the legend to make small adjustments in the placement
   2. Right-click the legend and select "Format Legend"
   3. Select the third pane of "Legend Options" to try different values of "Legend Position"

Your finished chart should look similar to this:

![](pix/estimated_velocity_chart_2series.png) <!-- {.screencap} -->


