---
title: 'Multiple Data-series'
morea_id: module-matlab-timeseries-multidata
morea_type: module
published: true
---
Create an Energy Plot

![sample energy plot](pix/incline_cart_energy.png) <!-- {.screencap} -->

1. Index into the `cart_data` matrix to assign
   - `Ke`, to the kinetic energy data in column 6
   - `Ug`, to the potential energy data in column 7
   - `Emech`, to the mechanical energy data in column 8
2. Create an empty figure, assigning it to the variable name `fig_energy`.
3. Plot each of the three energy types vs time on the *same* plot.
   - Use the
     [`plot`](https://www.mathworks.com/help/matlab/ref/plot.html) and
     [`hold`](https://www.mathworks.com/help/matlab/ref/hold.html)
     function.
	 
# Annotations

Add appropriate annotations to the plot to aid the viewer in
understanding what you are communicating.

- Title. For a single plot, use the [`title`](https://www.mathworks.com/help/matlab/ref/title.html) function.
- Axis labels
- Legend. Because we have plotted multiple data series on the same
  plot, we need a legend to help the viewer understand the plot. Use
  the
  [`legend`](https://www.mathworks.com/help/matlab/ref/legend.html)
  function to do this. Pass the name of each data series as a
  character array (in single quotes) in the order you plotted them to
  the legend function as arguments. View the examples in the MATLAB
  documentation to see how to do this.
  
  Note: You can also add a name for the data series when you plot it
  with the plot function, and then call legend with no arguments. View
  the "Specify Legend Labels During Plotting Commands in the [MATLAB
  documentation](https://www.mathworks.com/help/matlab/ref/legend.html) to see how to do this. <!-- {p:.alert .alert-info} -->
  
# Discuss

From our knowledge of physics we know that 

- Energy is conserved, it can is not created or destroyed, only transformed
- Total mechanical energy is the sum of kinetic and gravitational potential energy: $E_{tot} = K + U_{g}$
- Theoretically, gravitational potential energy should transform into
  kinetic energy as the cart moves down the incline, and on the way up
  the incline kinetic energy is transformed to gravitational potential
  energy.

If we assume that the only forces acting on the cart are gravity and
the spring force when it hits the bumper, our idealized cart model predicts the following energy plot:

![ideal energy plot](pix/model_incline_cart_sansfriction_energy.png) <!-- {.screencap} -->

How does this look different from the data we plotted? What could account for this difference?
