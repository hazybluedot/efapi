---
title: 'Measured Position'
morea_type: module
morea_id: matlab-numeric-cart-position
published: true
---
While measuring acceleration is simpler, it would certainly be
possible to measure position relative to the end of the track with
something like a laser range finder. Let us imagine a cart with this
instrumentation that measures position directly, but not acceleration.

Recall from physics that:

1. velocity is the slope of the time vs. position curve, or the derivative of position with respect to time

   $$v(t)=\frac{ds}{dt}$$
   
2. position is the area under the time vs. velocity curve, or the integral of velocity with respect to time

   $$a(t) = \frac{dv}{dt}$$


# Create a new Script

Start a new script named `lab12_pos_{{netid}}.m` in your `EF105/Lab12` folder.

# Load the Data

Load the data from the [cart_position.csv]({{wwwroot}}/data/cart_position.csv) file and extract the three columns into variables named
`time`, `pos_ideal`, `pos_noisy`.

# Differentiate Measured Data

If we had a defined function for $s(t)$ we could differentiate it to
obtain another function for $v(t)$. However, we do not have a known
function for $s(t)$, we just have a series of position measurements at
different points in time. In this case, we must use numeric
approximations for the derivative to find an approximation for
velocity at the measurement times. One method we have discussed is the
finite difference method, which we can calculate with the help of
MATLAB's `diff` function.

1. Use `diff` to numerically differentiate calculate values for
   velocity for each measurement time. Store the result in a variable
   named `vel_ideal`
2. Use `diff` again to numerically differentiate the velocity values
   stored in `vel_ideal` to obtain acceleration calculations stored in a
   variable named `acc_ideal`.
   
   
## Important Considerations

Recall there are two ways we could approximate the derivative with `diff`:

1. `dY = diff(Y)/h` where `h` is a constant step size, or 
2. `dY = diff(Y)./diff(X)` if `X` may not have constant step size.

In our data, `time` does have a constant step size, you can store it to a variable by using `diff` on time:

``` matlab
dt = diff(time); % the difference between adjacent time values
h = dt(1);       % since all elements of dt are equal, use the first one as the constant step size
```

Because the result of `diff` is a vector that is 1 element shorter
than the input vector, we need to be careful with how we use the
result. In particular, when you plot, the time vector you use to plot
will need to be the same length as the data vector. You can use
MATLAB's indexing syntax to extract all but the last value of time as
`time(1:end-1)` and all but the last two values `time(1:end-2)`.

# Visualize the Ideal Data

Generate an appropriately annotated position-velocity-acceleration
plot with the ideal data, it should look something like this:

![ideal pva plot](pix/cart_ideal_pos_pva.png) <!-- {.screencap} -->

# Differentiate Noisy Data

Repeat the same calculations using `pos_noisy` as a starting point to
find `vel_noisy` and `acc_noisy`.

# Visualize Both Calculations

Plot the noisy calculations on the same PVA plot to get a result similar to this:

![ideal pva plot](pix/cart_complete_pos_pva.png) <!-- {.screencap} -->

Note that because the legend information is the same for each subplot,
you only need to include it once. It would be more appropriate to
place the legend outside the plot area, but unfortunately MATLAB does
not make this easy.
