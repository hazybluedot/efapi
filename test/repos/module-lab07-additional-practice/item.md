---
title: 'Additional Practice'
morea_type: module
morea_id: module-lab07-additional-practice
published: true
---
These are optional activities you can work to practice the skills we
learned today.

# Volume and Surface area of Shapes

Some [common 3D
shapes](https://www.thoughtco.com/surface-area-and-volume-2312247)
have known equations for calculating the surface area and volume. 

Try writing a separate script file to calculate the surface area and volume of:
- a sphere
- a cylinder
- a cone
- a rectangular prism
- a triangular prism
- a pyramid 

Name your script <kbd>[shape]_properties.m</kbd> where `[shape]` is
replace the shape name. Save these files in a `EF105/practice` folder
on your h-drive. They may be useful reference for later work or an
exam. For example, for a cylindar you would create a script named
`cylinder_properties.m` with the contents:

``` matlab
% Calculate the surface area and volume of a cylinder

% initialize parameters of the cylinder
r = 1; % radius (m)
h = 2; % height (m)

% https://www.thoughtco.com/surface-area-and-volume-2312247
sa = 2*pi*r^2 + 2*pi*r*h; % surface area of the cylinder
v = pi*r^2*h;             % volume of the cylinder
```

Practice good commenting habits, but also add comments that are
helpful *to you*, even if once you become more comfortable with the
material they later become redundant.

We plan to add a 0-point "quiz" to help test your solutions before the
weekend. It will be linked here when it is ready. <!-- {.alert .alert-info} -->
