---
title: 'Managing Data Series for a Chart'
published: true
morea_id: spreadsheet-chart-multiple-series
morea_type: experience
---
Our chart currently has multiple dataseries:
1. Posistion data series
2. Velocity data series
3. Accceleration data series

::: aside Alternate Method
The "Select Data" dialog can also be found on the "Design" ribbon which is visible when a chart is selected.
:::

Each data series is visualized as a different color. When our data
series have different units, e.g. meters for position, meters per
second for velocity, etc. it becomes confusing trying to visualize the
data on the same chart. We can add, remove, and modify data series
associated with a chart with the "Select Data..." option from a chart's
context (right-click) menu.

## Remove Velocity and Acceleration

As we found when trying to write a descriptive vertical axis title, we
have too much data on one chart to make it easily understandable. We
will now split the data into three separate charts, one for position
data, one for velocity data, and one for acceleration data.

1. Right-click on the chart body.
2. Click the "Select Data..." menu item.
3. On the "Select Data Source" window, un-check the entries associated with Velocity and Acceleration data.
   
   You may be tempted to "Remove" the unused series
   altogether. Leaving them intact but un-checked will let us copy and
   paste this chart to easily create a separate "Velocity" and
   "Acceleration" chart. <!-- {.alert .alert-info} -->
   
::: collapse Video Demo: Hide Dataseries from Chart
@[video]({{wwwroot}}/vid/excel_remove_data_series)
:::

Now that we only have one type of data on the chart, we can make the
vertical axis title read "Position (m)" and remove the "Legend" from
"Chart Elements".
   
## Create Velocity and Acceleration Charts

Because we will stack three charts one above the other, the end result will be more pleasing if we adjust the scale of the chart to make it shorter.
1. Click on the position chart to select it.
2. Press <kbd>Ctrl</kbd>+<kbd>C</kbd> to copy the chart.
3. Select any empty cell and paste the chart with
   <kbd>Ctrl</kbd>+<kbd>V</kbd>.
4. Edit the data series to check "Velocity" and uncheck the others.
5. Repeat these steps to create a third chart showing the acceleration data.

<!-- :break section -->
## Make Things Tidy

To make our plots look like a standard position, velocity, and acceleration plot, align each of the three separate charts direction under one another and
1. Remove the chart title from the lower two.
2. Adjust the size of the top chart to account for the extra height of the title.
   1. Right-click on the chart area, the blank part of the chart surrounding the plot area.
   2. Select "Format Chart Area"
   3. On the "Size and Properties" tab, enter a height of 
      - 2.4 inches for the position plot
      - 2 inches for the velocity plot
      - 2.25 niches for the acceleration plot
      
      This will make the plot area roughly the same height for each of
      the three plots.
      
2. Remove the horizontal axis title from the upper two.

::: aside Tedious Work 
You may notice that producing a nice set
of stacked position, velocity, and acceleration (PVA) plots requires quite a
bit of tedious clicking and typing in Excel. Excel, and spreadsheet
software in general, was not designed for advanced technical data
visualization, so attempting to do more than simple plots quickly becomes
tedious.

We will see later that it is far easier to make nice-looking PVA plots
in MATLAB without any manual dragging and resizing.
:::

Your finished charts should look similar to this:

![Finished charts for Position, Velocity, and Acceleration](pix/screencap_pva_plot_example.png)
<!-- {figure:.screencap} -->
