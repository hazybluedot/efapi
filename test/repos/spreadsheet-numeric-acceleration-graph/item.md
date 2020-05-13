---
title: 'Acceleration Graph'
published: true
morea_type: experience
morea_id: spreadsheet-numeric-acceleration-graph
---
Since acceleration is the time rate of change of velocity, it is the
slope of the velocity curve (*derivative*). We will approximate with
the finite difference method.

![](pix/slopes.jpg)

  - Note that the calculation shown is not the acceleration at either
    time t=1 or t=2, but it is the average acceleration during the
    time interval.
  - In order to graph acceleration vs. time, we will need a new time
    column.

1. Skip column D and type "Acceleration(ft/sec^2)" into `E1`.
2. Create a formula for acceleration in `E2` (change in velocity over
change in time)

   ![](pix/accelform-alt.jpg)
   ![](pix/accelval-alt.jpg)

- Notice how excel calculated the last value of acceleration. It
  references cells A8 and C8, for which we don't have values!
- Think about it: Is the first acceleration value calculating the
  acceleration at time t=0? No! It is the acceleration *between* t=0
  and t=1. Therefore, the last acceleration we can calculate is
  between t=4 and t=5. **DELETE the acceleration value in E7!**

Since the accelerations don't match up with our time column, we will
need to create new "half" times to plot the acceleration values.

In column D, create a formula to calculate times halfway between those
listed in column A. Note: there will NOT be a value for D7.

![](pix/halftimes-alt.jpg){onclick="swapimage(this)"}

Create an acceleration vs. time plot.

  - Copy/paste your Velocity graph
  - Right click on curve, Select Data, Edit. Change both x AND y data
    series. Remember to use your half times.
  - Edit your axis labels and change the color of the curve.
  - Change x axis max to 6 so it will line up with other plots (Right
    click on x-axis, Format Axis)

Line the plots up from top to bottom: Position, Velocity, Acceleration.
They should line up if you haven't resized them. If you want to specify
which graph overlaps another, right click on it and choose "bring to
front." They should look something like this:

![](pix/example_plots_done.png){.screencap}
