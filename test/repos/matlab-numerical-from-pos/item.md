---
title: 'Calculate Velocity and Acceleration from Position'
morea_type: experience
morea_id: matlab-numerical-from-pos
published: true
---
Now we will do similar calculations starting from the position data. Since velocity is the first derivative of position, we can numerically differentiate the position data to estimate velocity:

```
vX2 = diff(posX)./diff(time);
vY2 = diff(posY)./diff(time);
vZ2 = diff(posZ)./diff(time);
```

Again, for easy plotting and assessing, combine these three components
into a matrix named `vel2`:

```
vel2 = [vX2, vY2, vZ2];
```

# Plot Position and Calculated Velocity

Create a figure number 2 and name the figure handle `fig2`.

1. Create three subplots stacked vertically
2. Leave the first subplot empty for now.
3. On the second subplot, plot the velocity data calculated from the GPS position data
4. On the third subplot, plot the GPS position data 

```
fig2 = figure(2);
subplot(3,1,1);
% Nothing to plot here yet, this subplot will remain empty for now
subplot(3,1,2);
plot(time(1:end-1), vel2, '.');
subplot(3,1,3);
plot(time, pos, '.');
```

Notice how we had to drop the last element of the "time" vector to
make it the same length as "vel2". This is because the result of
`diff` is a vector one element shorter than the vector used as
input. The same was true when we used the finite difference equations
in a spreadsheet, the calculated finite difference list was one
shorter than the original list.

Add appropriate axis labels, legends, and titles.

![](pix/motion_comp_gps.png) <!-- {.screencap} -->

# Practice: Differentiate Once More to find Acceleration

Starting from the velocity you calculated by differentiation position,
differentiate once more to obtain estimated acceleration data, call this `acc2`.

Plot this data on the first subplot in figure 2:

![](pix/motion_comp_gps_final.png) <!-- {.screencap} -->
