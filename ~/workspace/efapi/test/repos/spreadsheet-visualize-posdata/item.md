---
title: 'Visualizing Position Data'
published: true
morea_id: spreadsheet-visualize-posdata
morea_type: experience
---
## Plot Lazy Dog's Path

Create a plot showing Lazy Dog's path. This is what we want it to look
like: 

![](pix/lazylunchfinalplot.jpg) <!-- {.screencap} -->

Each stopping point along the way is the starting point for the next
vector. Therefore we must add the x/y change to the previous value.
Create a formula in the blue columns to do this.

We will assume the origin to be at Estabrook, where Lazy Dog started.

Helpful hint: The final values should be the same as `E16` and `F16`. In
theory, these should be zero since Lazy Dog started and ended in the
same place, but perhaps even Lazy Dog is susceptible to human error.

Plot the path in **two** parts, i.e. two data series:

-  Let "Out to Lunch" plot be the first four data points (including the
   origin)
-  Let "Back to Work" plot be the rest of the data.\
   **Don't forget to include the last point of Out to Lunch, otherwise
   the path will be disconnected.**
-  Choose "Scatter with straight lines and markers"
-  Remember: you can edit and add data series via the "select data" button or right-click menu option. <!-- {.detaillevel .detaillevel-2} -->

Sometimes when you make a chart, the software will display values
(data labels) at each point. While this might be helpful in some cases
(such as displaying percentages in the bar charts), here it may
clutter up our plot. If data labels are present, right click on a data
point, then Format Data Labels. Under Label Options, uncheck x value,
y value. If they are not present and you want data labels, right click
on a data point, then Add Data Labels

![](pix/formatdata.jpg) <!-- {.screencap} -->

Add a descriptive title, axis labels, and legend.

Add Estabrook background. First, you will need to save
[estabrook.jpg](pix/estabrook.jpg) to your H: drive.

1. Right click on the graph (not the white space around it), then Format
Plot Area. 
2. Select Fill on the list menu at the right of the screen. 
3. Then click Insert Picture From File and find estabrook.jpg

There **is** a difference between "Chart Area" and "Plot Area". If you
choose Chart Area by mistake, the picture will cover the entire chart.

![](pix/chartplot.jpg) <!-- {.screencap} -->

## Format the Axis

1.  Right click on the x-axis, then Format Axis.\
	![](pix/axisoptionsX1.jpg)<!-- {.screencap} -->
2.  Under Axis Options, change from Auto to Fixed and enter these values\*:
	-   Minimum: -300
	-   Maximum: 500
	-   Major unit: 100
	-   Minor unit: 50
3.  Go to Line Style and increase width to 1.5\
	![](pix/linestyle1.jpg)<!-- {.screencap} -->
4.  Go to Line Color and change to black\
	![](pix/linecolor1.png)<!-- {.screencap} -->

Right click on the y-axis, then Format Axis. Repeat above steps, with
the same values except change **Maximum: 400**

![](pix/axisoptionsY1.jpg)<!-- {.screencap} -->

\*In case you were wondering where these numbers came from, they were
pre-determined to fit with the picture of Estabrook.

now your plot should look something like this:

![](pix/lazylunchfinalplot.jpg)<!-- {.screencap} -->

