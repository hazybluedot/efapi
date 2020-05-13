---
title: 'Plot X-Y Path'
morea_type: experience
morea_id: matlab-numerical-xy
published: true
---
So far we have plotted the x, y, and z components of acceleration, velocity, and position with respect to time. This can be useful for visualizing differences in the different components of each of these quantities, but it does not make it easy to visualize how these quantities relate to a physical path traveled. To visualize the path traveled, e will now plot the x and y components of position.

Create a figure 3 with handle name `fig3` and plot the x and y
components of the `pos` matrix with x on the horizontal axis and y on
the vertical axis:

```
fig3 = figure(3)
plot(pos(:, 1), pos(:, 2), 'b.', pos(1, 1), pos(1, 2), 'b*');
legend('Position from GPS', 'start', 'Location', 'southeast')
title('Morning Commute');
ylabel('y (m)');
xlabel('x (m)');
```

![](pix/commute_path_gps.png) <!-- {.screencap} -->

The `*` on the start location helps to visualize that this is a path
with respect to time, but we are looking at all the time at once. You
can visualizes dot moving along the line which could represent an
object retracing the same path.

# Practice: Plot Calculated Position on the same X-Y Plot

Plot the x and y components of the calculated position `pos1` on Figure 3.

![](pix/commute_path_gps_final.png) <!-- {.screencap} -->

Once you have added the final pieces, save your file and upload it to
the dropbox for this lab.
