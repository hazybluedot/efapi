---
title: 'Friction Problem'
morea_id: module-solver-friction-problem
morea_type: module
published: true
---
This is an optional exercise to help practice parsing a typical
engineering physics problem into a form that can be solved using
Excel's Solver. <!-- {.alert .alert-info} -->

Depending on how a problem statement is written, it may not always be
immediately clear whether it is best classified as a single-equation,
system of equations, or optimization problem. In this situation, the
first step is still the same: start organizing your spreadsheet with
the values and formulas relevant to the problem. Once you have entered
all the formulas and parameters, then make a determination of how to
classify the problem and proceed to fill in the solver inputs.

## Example

This friction problem was included in a EF 151 quiz recently:

<div class="row">
<div class="col-md-4">

![Prof. Schleter holding a textbook against a wall with one arm. He is pushing at an angle upwards on the book to keep it stationary](pix/friction_problem_scenario.jpg)

</div>
<div class="col-md-8">


> Prof. Schleter is holding a 20kg physics textbook against the wall
> with a single hand. The coefficient of static friction $\mu_{s}$
> between the book and the surface is 0.49.
>
> What is the maximum force P that can be applied before the book slips?


1. Start with a FBD=KD. We assume up is the vertical positive direction and right is the positive horizontal direction.

   ![FBD of the friction problem, because we are calculating for a
   non-moving book, we do not include the kinetic diagram since
   acceleration is 0.](pix/friction_problem_FBD.png)
   
2. Write out all the given information:

   $$\begin{aligned}
   m&=20 kg \\
   g&=9.81 m/s^2 \\
   W&=mg\\
   \mu_{s} &= 0.49 \\
   \end{aligned}
   $$

3. Write out the component force equations. Because the book is not moving, the sum of the forces in each direction equals zero:
      
   $$\begin{aligned}
   \Sigma{F_{x}} &= P\cos\theta - N = 0\\
   \Sigma{F_{y}} &= P\sin\theta - W - F = 0
   \end{aligned}
   $$

   Since we are asked to find the maximum force befor the book begins to slip, we deduce that we will  need to use the maximum static friction relationship:
   
   $$
   F_{max} = \mu_{s}N
   $$

4. Encode the given parameters and equation into your spreadsheet,
   using appropriate cell nams to make the formulas easier to read and
   verify:
</div>
</div>
   
|    | A     | B                          | C       |
|----|-------|----------------------------|---------|
| 1  | m     | 20                         | kg      |
| 2  | g     | 9.81                       | m/s^2   |
| 3  | theta | 54                         | degrees |
| 4  | mu_s  | 0.49                       |         |
| 5  |       |                            |         |
| 6  | W     | =m*g                       | N       |
| 7  | P     | ?                          | N       |
| 8  | N     | ?                          | N       |
| 9  | F     | ?                          | N       |
| 10 |       |                            |         |
| 11 | Fmax  | =mu_s*N                    | N       |
| 12 | sum_x | =P*COS(RADIANS(theta))-N   | 0       |
| 13 | sum_y | =P*SIN(RADIANS(theta))-W-F | 0       |
<!-- {table:.spreadsheet-view} -->

Now we are ready to fill in the inputs for Solver.

1. Is this an optimization problem or standard problem? The wording
   "find the maximum force" makes it sound like optimization at first,
   however, once we enter all our known values and formulas into the
   spreadsheet we see that we have an expression F~max~ which is what
   "maximum force" refers to. Thus, from the point of view of Solver,
   we are finding a particular value, one that we happen to call a
   "maximum force".
2. What variables can change? Our unknowns at this point are P, N, and
   F. These are the variables we want Solver to change to find a valid
   solution.
3. What are our constraints? The constraints are encoded in the
   relationships we derived based on the physics of the problem: the
   sum of the component forces must equal zero, and we are trying to
   find values P,N, and F such that F=F~max~.
   
## Sample Solutions

If you have everything set up correctly, you should be able to use solver to find the following values for P for different parameter values $m$, $\mu_s$, and $\theta$:

| $m$     | $\mu_{s}$ | $\theta$    | P     |
|---------|-----------|-------------|-------|
| 12.8 kg | 0.49      | $54\degree$ | 241 N |
| 20 kg   | 0.35      | $38\degree$ | 577 N |
| 16 kg   | 0.52      | $42\degree$ | 555 N |
