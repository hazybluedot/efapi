---
title: 'Fit Data to a Model'
morea_type: module
morea_id: module-spreadsheet-chart-trendline
published: true
---
# A Brief Introduction to Data Models

In engineering we often work with *models* of systems described by
mathematical equations. You have likely already been introduced to
some common mathematical models in your introductory physics course,
even if you haven't called it a model. For example:

$$
x = x_{0} + v_{0}\Delta{t}
$$

is a model that describes the position of an object moving at a
constant velocity for a duration of $\Delta{t}$. Further, we call this
a *linear* model, because it describes a linear relationship between
the parameter $v_{0}$ and the data $\Delta{t}$, $x$, and $x_{0}$.

When we conduct experiments, we usually will collect some measurement
data, and we would like to fit our data to a model to determine model
*parameters*. Staying with the above example, if we conducted an
experiment from which we measure position data at different points in
time, we could fit those data to the above model to estimate a value
for the parameter $v_{0}$.

::: aside Why So Many Words?  
You may be asking, "why are we calling
this a model and not just an equation?" and "if a model is just a
mathematical equation, why do we need a special word to describe it?"

While a model is *described* by a mathematical equation, they are not
one and the same.  A model is an equation that describes the
relationship between measured data and system parameters. Which parts
are data and which are system parameters depends on the context. In
the example described here, if we collect position data and know the
time of each measurement, then we treat the average velocity $v_{0}$
as a parameter.

:::

## Flat Data

From the video and position data we can see that there are two phases
of the experiment in which the cart can be modeled by approximately
constant velocity:

1. Immediately after it is released and just before it its the bumper
2. Just after it hits the first bumper and before it hits the second

In the data, Phase 1 corresponds to rows 48 through 76 and Phase 2
corresponds to rows 83 through 116.

## Phase 1

1. Select rows 48 through 76 of the time and position data
2. Insert a scatter plot using this data selection.
3. Add axis titles and link set the value to the appropriate cells from the worksheet.
4. Change the chart title to be "Cart Experiment: Flat Track, Phase 1"

### Adjust the axis range

1. Right-click on the horizontal axis and select "Format Axis"
2. On the "Axis Options" tab, adjust the Bounds to a minimum of 2.25 and a maximum of 3.7.

### Add a Trendline

In spreadsheet software, we can fit data to a model by adding an
appropriate *trendline* to a chart.

1. Select the chart and then click the green plus symbol to modify chart elements
2. Select the box next to "Trendline"
3. Under the format pane, select "Series 1 Trendline 1" to get to the
   "Format Trendline" pane.
4. Take a moment to explore the different options you have for formatting the trendline:
   - Try changing the line color, width, and type
   - Try changing the type of trendline from "Linear" to some of the
     other options like "Exponential" or "Logarithmic". Which one fits
     best?
 5. Check the "Display Equation on chart" and "Display R-squared value on chart" options.

Your finished chart should look something like this:

![Plot of the cart experiment data, flat track, phase 1 with a linear trendline](pix/cart_experiment_flat_phase1.png)

## Math Review

The equation of the line is in slope-intercept form ($y=mx+b$) where $m$
is the slope and $b$ is the y-intercept.

The **R<sup>2</sup> value** describes how well the trendline fits the data,
with 1.0 being a perfect fit and 0.0 indicating a lack of correlation,
i.e. completely scattered data.

Here's how to do a trendline and find R<sup>2</sup> [on your
calculator.](lin_reg.pdf)

## Calculate the Average Velocity

Notice the slope of the line, $0.719$. Based on our model, the slope
of the line should correspond to a constant velocity over this
time. While the velocity of the cart is not exactly constant over this
time, it is pretty close. Find the average velocity for Phase 1 by
using the `AVERAGE` function on the cell range `D48:D76`. Name the
cell with the formula <kbd>phase1_velocity</kbd>.

<!-- :break section -->
# Practice: Add a Linear Trendline for Phase 2

Repeat the steps above to create a plot of the Phase 2:

- Use rows 83 through 116
- Set the axis range to a minimum of 4 seconds and a maximum of 5.8 seconds

## Discuss

You should observe that the model fit parameter R^2^ is slightly less
for the Phase 2 fit compared to the Phase 1 fit. This means that our
Phase 2 data fits a linear model slightly worse than our Phase 1 data.

What is different about Phase 1 and Phase 2 that might explain this
reduction in fit?

Hints:

1. Look at the shape of the velocity curve corresponding to Phase 1 and Phase 2
2. If we had continued collecting data for as long as the cart moved,
   and had a full Phase 3 for the time after the cart hit the second
   bumper, the fit for Phase 3 data would fit a linear model even
   worse than Phase 2 data.

<!-- {section:.morea-assessment} -->
