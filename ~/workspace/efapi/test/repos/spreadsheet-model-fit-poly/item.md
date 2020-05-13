---
title: 'Fitting a Polynomial Model'
morea_type: module
morea_id: spreadsheet-model-fit-poly
published: true
---
Do the following work on your `cart_incline` worksheet. <!-- {p:.alert .alert-info} -->

Last time we fit a *linear* model to position data from a cart
coasting on a flat surface.

- Because the cart was costing on a flat surface, we assumed there were no net forces acting on it (we ignored air resistance and friction)
- With no net forces, acceleration of the cart should equal 0
- For 0 acceleration, velocity is constant
- For constant velocity, position is a straight line

Now we want to take a closer look at the data from the cart on an incline

## Cart on an Incline

@[video]({{wwwroot}}/vid/cart_incline)

![Position, velocity, and acceleration plots for cart on an incline](pix/pva_chart_cart_on_incline.png) <!-- {.screencap} -->

We can split the time series up into three phases, each with a
constant acceleration; where the acceleration graph is close to a flat
line. In the video, the boundary between each phase is when the cart
hits the bumper at the bottom of the slope.

|         |    Rows | Time 1 (s) | Time 2 (s) |
|---------|--------:|------------|------------|
| Phase 1 |    4:37 | 0          | 2          |
| Phase 2 |   44:96 | 2          | 5          |
| Phase 3 | 104:147 | 5          | 7.25       |


<!-- :break section -->
# Fit a polynomial 

For each of Phase 1 and Phase 2:
1. Create an appropriately annotated plot of position vs. time
2. Fit a second order polynomial to each subset of data
   - Display the equation and R^2^ on the plot.

Optional: For additional practice, create a third chart for Phase 3 data

## Discuss

Notice that during each phase, the system is in constant
acceleration. From the physics, we can write an equation that describes
the relationship between the position of the cart at any time based on
its initial position, initial speed and acceleration.

$$
s(t)=s_{0} + v_{0}t + \frac{1}{2}at^2
$$

In this context, $s_{0}$, $v_{0}$, $a$ are model parameters that we
are finding for the data $s(t)$.

<!-- {section:.morea-practice-->
