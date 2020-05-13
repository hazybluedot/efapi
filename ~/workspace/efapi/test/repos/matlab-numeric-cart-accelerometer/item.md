---
title: 'Measured Acceleration'
morea_type: module
morea_id: matlab-numeric-cart-accelerometer
published: true
---
As we hinted at in the past when working with the cart data, the cart
itself only measures acceleration, and yet it records velocity and
position as well. The reason for this is it is relatively easy and
cheap to measure acceleration internally but more complex to measure
velocity and position. So how does the cart calculate velocity and
position from acceleration data?

Recall from physics that:

1. velocity is the area under the time vs. acceleration curve, or the integral of acceleration with respect to time

   $$v(t)=\int a\,dt$$
   
2. position is the area under the time vs. velocity curve, or the integral of velocity with respect to time

   $$s(t) = \int v\,dt$$

# Create a new Script

Start a new script named `lab12_acc_{{netid}}.m` in your `EF105/Lab12` folder.

# Load the Data

Load the data in the
[cart_accelerometer.csv]({{wwwroot}}/data/cart_accelerometer.csv) file
and extract the three columns into variables named `time`,
`acc_ideal`, `acc_noisy`.

# Integrating Measured Data

If we had a defined function for $a(t)$ we could integrate it to
obtain another function for $v(t)$. However, we do not have a known
function for $a(t)$, we just have a series of acceleration
measurements at different points in time. In this case, we must use
numeric approximations for the integral to find an approximation for
velocity at the measurement times. One method we have discussed is the
trapezoidal method, which is what the MATLAB function `cumtrapz`
computers.

1. Use `cumtrapz` to numerically integrate calculate values for velocity for
   each measurement time. Store the result in a variable named
   `vel_ideal`
2. Use `cumtrapz` again to numerically integrate the velocity values
   stored in `vel_ideal` to obtain position calculations stored in a
   variable named `pos_ideal`.
   
   
# Visualize the Ideal Data

Generate an appropriately annotated position-velocity-acceleration
plot with the ideal data, it should look something like this:

![ideal pva plot](pix/cart_ideal_acc_pva.png) <!-- {.screencap} -->

# Integrate Noisy Data

Repeat the same calculations using `acc_noisy` as a starting point to
find `vel_noisy` and `pos_noisy`.

# Visualize Both Calculations

Plot the noisy calculations on the same PVA plot to get a result similar to this:

![ideal pva plot](pix/cart_complete_acc_pva.png) <!-- {.screencap} -->

Note that because the legend information is the same for each subplot,
you only need to include it once. It would be more appropriate to
place the legend outside the plot area, but unfortunately MATLAB does
not make this easy.
