---
title: ''
published: true
morea_id: spreadsheet-charts-why
morea_type: reading
---
## Continuous vs. Discrete data

Most experimental data is **discrete**, meaning that there are a
finite number of data points, so there are "gaps" between data when
plotted. This is true even if the underlying physical process is
continuous. For example, imagine that you have a metal bar suspended
over a candle flame. The metal starts out at room temperature but
warms from the candle and expands due to the warming. This is a
continuous process: the temperate of the bar changes smoothly from its
initial temperature, the bar expands smoothly as its temperature
increases. However, as soon as we try to measure this process we are
constrained to collect discrete data points. We may take measurements
once a second, 10 times a second, or more, but we will always have
only a finite number of samples at specific instances in time.

Experimental data, and discrete data in general, should always be
visualized as discrete points. Smooth lines can be added as "best fit"
or "trend" lines, but it is important to communicate that these are
continuous functions *estimated* from the data.

## Do Not Use "3D" Charts 

Spreadsheet software such as Excel make it easy to turn data into "3D"
style charts. I'm putting "3D" in quotes to indicate that this
perceived third dimension does not describe any feature of the data,
it is purely aesthetic. This is bad, and generally a bad design
decision on the part of the software engineers to even provide that
option. Never, ever use a 3D chart for 2D data. Doing so inhibits the
visual understanding of the data, which is the goal of data
visualization in the first place.

This does *not* mean use of 3D effects is always a bad thing in visualizations. Two exceptions are

1. There is an actual data feature that can meaningfully map to a
   third dimension, for example [this
   chart](https://www.nytimes.com/interactive/2015/03/19/upshot/3d-yield-curve-economic-growth.html)
   in the New York Times which maps year, borrowing time, and percent
   yield to three visual dimensions in a meaningful way. This type of
   visualization is generally best presented in an interactive medium,
   such as a webpage, to allow viewers to "see" the data from
   different angles. It can be difficult to interpret this type of
   visualization in a static medium, such as a document.
2. A perception of depth may be used to bring certain features to the
   foreground, without distorting the relationship between data value
   and visual position. For example [this
   chart](https://dribbble.com/shots/1423171-Some-Analytics/attachments/208613)
   which uses a drop-shadow effect to make certain data values "pop"
   out. However, in this case the use of the white background and
   larger number does this job well, the drop shadow could be
   eliminated for a cleaner look without changing what is being
   communicated.
