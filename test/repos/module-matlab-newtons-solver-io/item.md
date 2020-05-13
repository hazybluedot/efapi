---
title: 'Newton''s 2nd Law Solver'
published: true
morea_type: module
morea_id: module-matlab-newtons-solver-io
morea_experiences:
    - newtons-solver-understand
    - newtons-solver-io
    - newtons-solver-vectorize
---
We will use the what we have learned about requesting user input and
working with vectors in MATLAB to write a short program that will
solve Netwon's 2nd law (F=ma) for an object with an arbitrary number
of forces acting on it.

# Start File: A single force

The supplied start file contains code that solves F=ma for a single
force acting on an object. There are three variables initialized:

- `m` the mass of the object
- `Fmag` the magnitude of the force acting on the object
- `Fdir` the direction of the force acting on the object

The next few lines of code calculate the following quantities

1. the x and y components of the force using the trig relationship the angle and sides of a triangle

   $$\begin{aligned}
   x &= F_{mag}\cos(\theta)\\
   y &= F_{mag}\sin(\theta)
   \end{aligned}
   $$
2. The force vector as a MATLAB array with the x component as the 1st
   element in the array and the y component in the second element.
3. The acceleration vector, also in component form, using Newton's Second Law $F=ma$.
4. The magnitude of the force vector using the relationship $\left|{F}\right| = \sqrt{F_{x}^2 + F_{y}^2}$.
5. The direction of the force vector using the relationship $\theta = \arctan({\frac{F_{y}}{F_{x}}})$.
