---
title: 'Cart Experiment'
published: true
morea_id: spreadsheet-chart-timeseries
morea_type: experience
---
This experiment was performed in a recent EF 151 lab.  A wheeled cart
is placed on a track and given an initial speed. The cart records its
position, velocity, and acceleration.

### Flat Surface

In the first scenario, the track is horizontal and the cart is given a
small push.

@[video]({{wwwroot}}/vid/cart_flat)

### Incline Surface

In the second scenario, one end of the track is elevated. The cart is
released from a point at the high end of the track.

@[video]({{wwwroot}}/vid/cart_incline)


<!-- :break section -->

## Follow Along

Select your "cart_flat" worksheet. The cell references assume that the first row of data contains column headers "Date ant Time", "Time (s)", etc. and thta column A is the "Date and Time" column.  <!-- {.alert .alert-info} -->

First we will make a plot containing position, velocity, and acceleration with respect to time.

::: aside Column Order 
When creating charts, it makes things simpler
to have the first column of data be the X values and the second column
the Y values. If your spreadsheet is not set up this way, consider
re-arranging columns.
:::

### Create a Scatter Plot 

1. Select columns "B", "C", "D", "E". These should be your the column
   containing time data in seconds, followed by position, velocity,
   and acceleration data.
2. Create a scatter plot of the data.
   1. On the "Insert" tab select the "Insert Scatter, or Bubble" button.
   2. Select the icon showing dots that are not connected by any lines.
   
   ![](pix/xyscatter1.jpg)<!-- {.screencap} -->
   
Generally when plotting experimental data we will always plot points without connecting lines. This communicates to the reader that those are the known measured values, but we do *not* know the values for times that no data exists. <!-- {p:.alert .alert-info} -->

::: aside For Future Reference
This is also where you can change the name of the data that appears
in the legend.
:::
	
Make sure time is on the x-axis. If it is not, right click on a data point -> select data -> edit, and change the source data for x.

Mac Users: You can complete this step by right-clicking on a data
point, then choosing "select data", then change the source data for x
values. <!-- {.os .os-mac} -->
	
<!-- :break section -->

### Add Axis Titles

::: aside Free-form Axis Title 
You do not need to make your axis
titles the same as data header values, but it usually makes things
easier to do so. 

If you decide there is a compelling reason to give the axis title custom-text, just like a regular spreadsheet cell, if you do not
start the value with `=`, the axis title will use whatever value you type in.
:::

Whenever creating a chart it is important to include descriptive axis
titles, and a chart title to help the viewer interpret the data.
   
1. Select the chart by clicking on it
2. Click the button with the green "plus" sign to the upper right of the chart
3. Make sure the box next to "Axis Titles" is checked.
   
   ::: collapse Video Demo: Add Axis Titles
   @[video]({{wwwroot}}/vid/excel_add_axis_labels)
   :::

4. Select the text of the horizontal axis title and set it equal to the corresponding header cell:
   1. With the axis title selected, type <kbd>=</kbd>
   2. Click the cell containing the header text, for example B1 for the horizontal axis title.
   3. Press <kbd>Enter</kbd>
   
   ::: collapse Video Demo: Set Axis Title to Cell Value
   @[video]({{wwwroot}}/vid/excel_link_axis_text_to_cell)
   :::
   
   If you ever change the text in the header of this column, the axis title will update automatically!
   
Because position, velocity, and acceleration are all on the same
plot, there is no easy description for the vertical axis. Leave it
alone for now.

When making axis labels, if you cannot determine a clear descriptive
title for an axis it is a good indication that you need to re-think
how to plot your data to make it clearer.
