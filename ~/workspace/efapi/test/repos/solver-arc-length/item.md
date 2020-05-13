---
title: 'Exercise - Arc Length of a Projectile'
morea_type: assessment
morea_id: solver-arc-length
published: true
---
This is an optional exercise. Try to complete it to practice using
Solver in preparation for the exam. Ask questions as needed. <!-- {.alert .alert-info} -->

The *arc length* of a curve is the distance traveled by someone or
something moving along that curve. 

The [are length of a projectile](https://brilliant.org/discussions/thread/arc-length-of-projectile-2/) following the idealized projectile motion trajectory is

$$
l = \frac{v_{0}\cos(\theta))^{2}}{2g}\left[2\sec(\theta)\tan(\theta)+\ln\left|\frac{1+\sin\theta}{1-sin\theta}\right|\right]
$$

Where $\theta$ is the launch angle relative to the horizontal axis, $v_{0}$ is the initial velocity, and $g$ is the acceleration due to gravity.

Working on your existing "Projectile" worksheet, enter this formula in
a cell named <kbd>arclength</kbd> in terms of the named parameters you
have defined. Use solver to determine the initial velocity and launch
angle that generates the shortest arc length for a given final
position $(x, y)$.

::: collapse Excel Formula for Arc Length
``` excel
=(v0*COS(theta_r))^2/(2*g)*(2*SEC(theta_r)*TAN(theta_r)+LN(ABS((1+SIN(theta_r))/(1-SIN(theta_r)))))
```

Where `theta_r` is the launch angle converted to radians. To make this
more manageable you could break this up into two pieces:

``` excel
=(v0*COS(theta_r))^2/(2*g)
=2*SEC(theta_r)*TAN(theta_r)+LN(ABS((1+SIN(theta_r))/(1-SIN(theta_r))))
```

in cells named `al1` and `al2`, then the final arc length formula would be 

```
=al1*al2
```
:::
