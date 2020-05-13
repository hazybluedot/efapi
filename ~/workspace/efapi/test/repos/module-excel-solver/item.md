---
title: 'Excel Solver'
morea_type: module
morea_id: module-excel-solver
morea_experiences:
    - excel-solver-installing
published: true
---
This lab will demonstrate several methods of solving
systems of equations using the Solver function in Excel. You should
understand that the solver uses an iterative (trial and error) approach
to solving these types of problems. For example, if we didn't have a
square root function, we could determine the value of √2 by making the
following guesses. And knowing √2 \* √2 = 2, we can quantify our error
to help us know when we are getting close.

<!-- NOTE:
A bit of a note
-->

| Guess (x) | Result (x*x) |        Error |
|----------:|-------------:|-------------:|
|         2 |            4 |            2 |
|         1 |            1 |           -1 |
|       1.5 |         2.25 |         0.25 |
|      1.25 |       1.5625 |      -0.4375 |
|     1.375 |     1.890625 |    -0.109375 |
|    1.4375 |   2.06640625 |   0.06640625 |
|   1.40625 |  1.977539063 | -0.022460938 |
|  1.421875 |  2.021728516 |  0.021728516 |
| 1.4140625 |  1.999572754 | -0.000427246 |


Computers are able to do this very quickly and can solve almost any type
of problem. If the error (tolerance) is acceptable, the process stops.
However, it is important to note the final answer is not exact; using
the sqrt function, √2 = 1.41421356 which indicates that the last guess
(1.4140625) is only accurate to the 3rd decimal place. The number of
iterations required is determined by the initial guess and how
subsequent guesses are chosen.
	  
