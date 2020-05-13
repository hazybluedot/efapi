---
title: 'Pre-lab: Plotting in MATLAB'
morea_id: module-matlab-plotting-prelab
morea_type: module
published: true
---
# Plotting in MATLAB 1

@[video]({{wwwroot}}/modules/video/lab9-videos-isaac/Lab9-2)

- Plotting a single data series on one plot
- Plotting different data series on multiple *subplots*

## Other Important Plot Functions

- To plot multiple data series on the *same* plot:
  - Plot your first data series
  - Run `hold on`
  - Plot one or more data series
  - Run `hold off`
- To assign a figure handle to a variable name:
  
  ``` matlab
  fig1 = figure(1); % create a new empty figure 1 window
  ```
  
  You can do this for multiple figures as well, just give each a new
  figure number and assign to a different variable name.
  
  We will ask you do to this for all scripts you submit to the drop
  box as it allows us to easily extract your plot. <!-- {.alert .alert-info} -->

# Plotting in MATLAB 2

@[video]({{wwwroot}}/modules/video/lab9-videos-isaac/Lab9-3)

- Displaying a grid on a plot
- Setting the axis limits
