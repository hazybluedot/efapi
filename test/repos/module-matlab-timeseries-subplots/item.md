---
title: 'Data on Subplots'
morea_type: module
morea_id: module-matlab-timeseries-subplots
published: true
---
# Create a Position, Velocity, and Acceleration Plot

Use subplots to generate an appropriately annotated plot of position,
velocity, and acceleration data.

![Sample pva plot. Your finished plot should look similar to this.](pix/incline_cart_pva.png) <!-- {.screencap} -->

Your finished plot should look similar to the sample above.

1. Using matrix indexing to assign individual columns of data
   associated with time, position, velocity, and acceleration as
   separate variable names. For example
   
   ``` matlab
   time = cart_data(:,1); % time in seconds
   ```
   assigns a copy of the *first* column in the `cart_data` matrix to a variable named `time`. Do the same for the following quantities:
   
   - `pos`, position, in the 3rd column of `cart_data`
   - `vel`, velocity, in the 4th column of `cart_data`
   - `acc`, acceleration, in the 5th column of `cart_data`
   
2. Create an empty [`figure`](https://www.mathworks.com/help/matlab/ref/figure.html) and assign it to a variable name `fig_pva`.
   
   ``` matlab
   fig_pva = figure(1);
   ```
   
3. Use the [`subplot`](https://www.mathworks.com/help/matlab/ref/subplot.html) function to define a subplot matrix of a single
   column and 3 rows.
   - In the first subplot, plot time vs. position.
   - In the second subplot, plot time vs. velocity.
   - In the third subplot, plot time vs. acceleration.
   
   Because this is experimental data measured at discrete times, the
   plot should use markers, not a connected line. This is controlled
   with the [`LineSpec`](https://www.mathworks.com/help/matlab/ref/plot.html#btzitot-LineSpec) argument to the [`plot`](https://www.mathworks.com/help/matlab/ref/plot.html) function. <!-- {p:.alert .alert-info} -->
   
4. Annotate the plot:
   - Title, for MATLAB version R2018b and newer, use the [`sgtitle`](https://www.mathworks.com/help/matlab/ref/sgtitle.html)
     function to set a title on a plot that contains subplots. For
     earlier versions use [`title`](https://www.mathworks.com/help/matlab/ref/title.html) to set a title on the first subplot
     that serves as the plot title.
   - Axis labels
     - Each subplot should have a descriptive label for the y axis.
	 - Only the bottom subplot should have an x axis label as this
       will serve as the x axis label for all subplots.
	   
   Note that the order in which the axis label functions are evaluated
   matters, labels are applied to the currently selected plot and
   subplot. The currently selected plot and subplot are determined by
   the most recently evaluated `figure` and `subplot` functions.
