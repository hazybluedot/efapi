---
title: 'Practice - Surface Area of a Cone'
morea_type: assessment
morea_id: excel-solver-optimize-cone
published: true
---
A cone is characterized by its radius $r$ and height $h$. The volume of a cone is 

$$
V_{cone} = \frac{1}{3}\pi r^{2}h
$$

and the surface area of a cone is 

$$
SA_{cone} = \pi r\left(r^{2}+h^{2}\right)^{1/2}+\pi r^{2}
$$

## Problem

Create a worksheet named "Optimize Cone" and populate it with the parameters
and formulas described above. 

- Name the cells containing parameters $r$ and $h$ as <kbd>r_cone</kbd> and <kbd>h_cone</kbd>.
- Name the cells containing the formula for surface area and volume
<kbd>SA_cone</kbd> and <kbd>V_cone</kbd>, respectively.

To check that your formulas are entered correctly set r=2 in and h=4 in, you should get a calculated V of 16.755 in3 and SA of 40.666 in2. <!-- {.alert .alert-warning} -->

Use solver to find the radius (in inches) of the base of a cone that
will have the smallest possible surface area for a volume of 5 oz?
