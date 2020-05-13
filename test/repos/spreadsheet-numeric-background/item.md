---
title: 'Background and Motivation'
published: true
morea_type: reading
morea_id: spreadsheet-numeric-background
---
Imagine we have a robot that has been launched into the air and is now
a projectile motion. It must deploy a parachute when it has traveled a
horizontal distance of 1000ft relative to its launch position. Using
a low-powered on-board computer, how will it know when to deploy its parachute?

Options:

1. Solve trajectory motion equations for time at which drop position is reached.
   - Advantages: a precise result solving a single equation.
   - Disadvantage: Can not account for external disturbances such as air resistance or wind.
2. Numerically integrate information from accelerometer to estimate velocity and position.
   - Advantage: takes into account external disturbances, such as wind
   - Disadvantage: as the potential for being inaccurate, errors will accumulate over time.

<!-- NOTE:
	You do not need to spend a lot of time going over every detail of the background. Some key points to share are that numerica differentiation and integration are very important techniques in engineering because:
	- some functions we need to integrate do not have closed form solutions, e.g. projectile motion when air resistence and wind disturbances are included.
	- there may be no pre-determined function to integrate, e.g. the motion of a robot that is responding to environmental factors.
	- some things, like acceleration are cheap and easy to measure, while others, like position are tricky, expenseive, and depend on established infrastructure (e.g. GPS) that may not exist everywhere (e.g. under water, in space).
-->

Today's lab will introduce the concepts of numerical integration (area
under a curve) using the [trapezoidal
method](http://mathworld.wolfram.com/TrapezoidalRule.html) of
approximation and numerical differentiation (derivative/slope of a
curve) using the [finite
difference](http://mathworld.wolfram.com/FiniteDifference.html) method.
You will learn more about these in your Calculus class.  
  
If you have not discussed these topics yet in your Calculus class, don't
worry! Here's all you really need to know:

- **Differentiation** or the *derivative* of a function dy/dx is the
    slope of the line tangent to the graph of the function at each
    point. (Finite Difference)
- **Integration** (also called anti-derivative) or the *integral* of a
    function, *∫ f(x) dx*, is the area between the graph of the function
    and the x-axis. (Trapezoid Method)  
      
![](pix/derint.jpg)

<!-- NOTE:
Give students a couple minutes to play with the finite difference and trapezoidal method explorer. Ask them to consider conditions for which the estimate is close to the true derivative or integral, and conditions when it is not.
-->

**Finite Difference** approximates the *slope of the curve* by using the
points to draw lines tangent to the curve, then finding the slopes of
all the lines. The more points used, the closer the points are together,
the more accurate the slopes will be.  

{{#draft}}
<div id="finite_diff_chart"></div>

<p>The derivative of the function at <input type="number" value="-2" id="input-a"></span> is <span class="value-derivative">.</p>
<p>The estimated derivative of the function at <span class="value-a"></span> using a time delta of <input id="input-time-delta" type="number" value="2"></input> is <span class="value-finite-difference"></span>.</p>

Drag the black dot, or solid green line to change the point at which the derivative and finite difference are calculated. Drag the red dots at either end of the line to change the distance between time points at which the finite difference is calculated.
{{/draft}}

**Trapezoidal Method** approximates the *area under a curve* by using
points along the curve at specific distances apart to draw trapezoids,
then adding the areas of all the trapezoids. The more points used, the
more accurate the area will be. This is called the integral, which is
written as *∫y dx* . In today's lab, we will integrate velocity with
respect to time, *∫v dt*, to find the position. In non-Calculus speak,
position is the area under the velocity curve. The more data points
used, the better the approximation of position.

{{#draft}}
<input id="slider-ntraps" type="range" min="2" max="100" value="6" step="1"/> <span class="value-ntraps">6</span> trapezoids.

<div id="trapz_chart"></div>

Drag the red lines to adjust the bounds of the integral. Adjust the slider to change the number of trapezoids used in the numeric estimation of the integral. Drag the area to slide to different parts of the curve.
{{/draft}}
