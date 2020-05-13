---
title: Summary
morea_id: prelab09-summary
morea_type: module
published: true
---
This pre-lab introduced the following functions:

## Initializing and generating plots

- [figure]
- [plot(X,Y,LineSpec1)][plot]

## Working with multiple data series

- [subplot(m,n,p)][subplot] will let you create separate sub plots for each
  data series. Subplot takes three input arguments, `m` is the number
  or rows of subplots to make, `n` is the number of columns of
  subplots to make, and `p` is the grid position for the new axes.
- [hold] will let you plot multiple data series on the same
  plot. `hold` takes a single input argument, we have seen the use of
  'on' to start holding data on a plot and 'off' to stop holding data
  on a plot.

## Annotating plots

- [title(txt)][title] and [sgtitle(txt)][sgtitle]

  Use `title` to add a title to a single plot or individual subplots,
  use `sgtitle` to add a main title for a figure containing
  subplots. Both take one argument, `txt` which is the text string to
  be used as a title.
- [xlabel(txt)][xlabel] and [ylabel(txt)][ylabel] will add x axis and y axis labels
- [legend(label1,...,labelN)][legend] will add a legend to the plot. 

  Legend takes as input arguments as many labels as you have data
  series on the plot.

[figure]: https://www.mathworks.com/help/matlab/ref/figure.html
[plot]: https://www.mathworks.com/help/matlab/ref/plot.html
[subplot]: https://www.mathworks.com/help/matlab/ref/subplot.html
[hold]: https://www.mathworks.com/help/matlab/ref/hold.html
[title]: https://www.mathworks.com/help/matlab/ref/title.html
[sgtitle]: https://www.mathworks.com/help/matlab/ref/sgtitle.html
[xlabel]: https://www.mathworks.com/help/matlab/ref/xlabel.html
[ylabel]: https://www.mathworks.com/help/matlab/ref/ylabel.html
[legend]: https://www.mathworks.com/help/matlab/ref/legend.html

# Graded Items

- [Quiz: Lab 9 Prep - Error Comprehension and Plotting]({{wwwroot}}/sys.php?f=assess/main&name=prelab09_Video_f19)

