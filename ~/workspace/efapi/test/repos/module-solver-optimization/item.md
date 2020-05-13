---
title: Optimization
morea_type: module
morea_id: module-solver-optimization
morea_experiences:
    - excel-solver-optimization
morea_assessments:
    - excel-solver-optimize-cone
published: true
---
Optimization is the process of finding a solution to a problem that
results in the "best" performance, where "best" is usually defined in
terms of maximizing or minimizing some value related to the
function. The "optimal" solution is determined by the choice of value
that should be minimized or maximized. For example, consider sending a
rocket to the moon:

1. If the objective was to get the rocket to the moon in the *shortest
   time* with the constraint that the rocket starts at 0 velocity and
   ends at 0 velocity, then the *optimal* solution is to fire the
   engine at full thrust for half the distance, flip the rocket around
   and fire the engine at full thrust to decelerate for the second
   half.
2. If the objective is to get the rocket to the moon using the *least
   amount of fuel*, then the *optimal* strategy would be different,
   probably depending on engine dynamics and adjusting thrust to the
   particular engine's most efficient performance.
   

Thus, it is important when discussing "optimal" strategies to always
make clear what the objective is, whether it be shortest amount of
time, least amount of energy, lowest cost, etc.

Finally, it is important to note that in many real-world scenarios, it
may be impossible to find the true optimal solution, just the "best"
relative to other similar solutions.

## Example

Go to the worksheet named "Optimize Cylinder". You are asked to design a
cylindrical can that holds <var>12oz</var> with a minimum heat
loss. Since heat loss is proportional to the surface area, you need to
minimize the surface area. You can solve this [analytically with a
little calculus](pix/solver-minsurfarea-eq.png) or you can use Excel's
solver.

  - Surface area of a cylinder = top + bottom + side = πr<sup>2</sup> +
    πr<sup>2</sup> + 2πrh
  - Volume of a cylinder = πr<sup>2</sup>h
  - Use the function PI() for π in Excel.
  - Units need to match. Use a formula and let Excel convert 12[ounces
    to cubic
    inches](http://www.google.com/search?q=how+many+cubic+inches+in+an+ounce).
  - Minimize surface area equation
  - Height and radius are the variables that can change
    - height and radius are both lengths, so must be greater than 0
  - Volume = target\_vol\_cubic\_inch is a constraint
  - **Answer:** <samp>radius=1.5 in</samp>, <samp>height=3 in</samp> <!-- {li:.result} -->\
    ![](pix/opt1sol-alt.jpg)
