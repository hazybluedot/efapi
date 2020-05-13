---
title: 'Calculate Velocity and Position from Acceleration'
morea_type: experience
morea_id: matlab-numerical-from-acc
published: true
---
<!--
~~~ aside Type Less, Integrate More
In the case of `cumptrapz`, you can actually apply to all three columns of `acc` at once:

```
vel1 = cumtrapz(time, acc);
```

In this case, you do not need to first pull out `accX`, `accY`, and `accZ` as individual variables.
~~~
-->

First we will start from acceleration measurements and numerically
integrate to calculate velocity.

```
vX1 = cumtrapz(time, accX);
vY1 = cumtrapz(time, accY);
vZ1 = cumtrapz(time, accZ);
```

For easy plotting, and to make it easier for us to assess your work,
combine these three components into a matrix named `vel1`:

```
vel1 = [vX1, vY1, vZ1];
```

Check the workspace to see what size `vel1` is. 

# Plot Acceleration and Calculated Velocity

Create a new figure number 1 and name the figure handle `fig1`. 

1. Create three subplots stacked vertically
2. On the first subplot, plot the acceleration data from the accelerometer
3. On the second subplot, plot the velocity data calculated from the acceleration data
4. Leave the third subplot empty for now.

```
fig1 = figure(1);
subplot(3,1,1);
plot(time, acc, '.');
subplot(3,1,2);
plot(time, vel1, '.');
subplot(3,1,3);
% Nothing to plot here yet, this subplot will remain empty for now
```

Add appropriate axis labels, legends, and titles. Use the `sgtitle`
function to add a title to a subplot group. Note: `sgtitle` is only
available in MATLAB version 2018b and later. For earlier versions, use
`title` on the first subfigure.

![](pix/motion_comp_accelerometer.png) <!-- {.screencap} -->

# Practice: Integrate Once More for Position

Using the velocity data you calculated by integrating acceleration
data, calculate position components in the same way. Call this `pos1`. 

Update your figure 1 subplots to include the calculated position:

![](pix/motion_comp_accelerometer_final.png) <!-- {.screencap} -->
