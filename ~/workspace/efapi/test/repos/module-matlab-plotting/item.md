---
title: 'Plotting Revisited'
morea_type: module
morea_id: module-matlab-plotting
published: true
---
We have already gained some experience creating plots from spreadsheet
data. Plotting in MATLAB is very similar, and it is worth reviewing
some important concepts regarding plotting data in general.

# Plotting Guidelines

The primary purpose of any plot is to *communicate* some information
about data. Note that *information* is not the same as *data*. In the
context of plotting, we use *information* to mean context + data. The
data are the bare numbers, it becomes information when we know how to
interpret the numbers.

## Simple is better, Less is more

Every visual element you include on a chart should have a
communicative purpose. Common elements are:

- position 
- color
- marker size
- marker shape
- connecting lines

Do not use/vary plot elements that do not have a connection back to
the data. For example, do not apply different colors to different data
points at random. Different colors should map to different types of
data, or different categories of data, etc.

## Markers and Curves

Use markers to plot discrete data points, and curves (including lines)
to plot continuous data such as mathematical functions. Note that
experimental data is *always* discrete since it has to be sampled at
specific instances of time. Connecting otherwise discrete data with
lines is misleading as it suggest the value of the data in between
sample measurements is known, which is false. 

If applicable, a best-fit line can be calculated and plotted as a
curve if there is a good argument for a particular mathematical model
(e.g. linear, quadratic, exponential). We will learn more about this
in next week's lab.

## Titles and Labels

Chart titles and labels should be meaningful to a viewer. 

- Axis labels should always be included and contain information about
  what the axis represents and what units the data are in.
  - Bad: "X data"
  - Good: "Time (s)", "Altitude (m)". In general, axis labels should
    describe the data in the context of the data-set and include units
    if applicable.
- Titles should convey the key message you want the viewer to take
  away after viewing the plot.
  - Bad: "Altitude vs. Time". Information about the data should be
    part of the axis labels, repeating the same information in the
    title is redundant and not helpful.
  - Good: "Final Approach of Aircraft"
- Legends should be included whenever there are more than one
  data-series on a plot, or groups/categories of data. In other words,
  if you are using color, marker size, or other chart elements to
  differentiate between types of data, you also need a legend to help
  the reader understand how those elements map to data.

## Annotations

Use annotations of data to call attention to specific data points that
either support your main conclusion, or need additional explanation.
