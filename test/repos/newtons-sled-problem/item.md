---
title: 'Newton''s Sled'
morea_type: module
morea_id: newtons-sled-problem
published: true
---
This is an optional extra-credit problem. There is a new extra credit
quiz item to allow you to automatically submit and check your
result. <!-- {.alert .alert-info} -->

Write a program that will solve for the acceleration of a block on an
incline, accounting for friction.

![Newton's Sled Diagram](newtons_sled_diagram.png)

Positive is up and to the left. 

For a sliding surface at angle $\theta$ CCW from the horizontal axis,
what is the acceleration of the box along the sliding surface for any
given weight W, push force P at an angle $\alpha$ relative to the
sliding surface, and coefficient of kinetic friction $u_k$?

# Initialize

1. Clear the workspace
2. Set a variable `g` for the acceleration due to gravity. You may
   choose to use the SI unit value of 9.81 m/s^2^ or US units of 32.2
   ft/s^2^, but your program should work correctly if later you change
   `g` to something else.

# User Input

1. Prompt the user for the following quantities, using the variable names as indicated:
   - `theta` - Angle of the incline, CCW from the horizontal axis
   - `u_k` - the coefficient of kinetic friction $\mu_{k}$
   - `W` - the weight of the box in whichever unit system you choose to use.
   - `P` - a "push" force entered as a magnitude and direction CCW from the sliding surface
     - <kbd>[2 12]</kbd> would be a push force with magnitude 2, 12 degrees CCW from the sliding surface
	 - <kbd>[2 12; 3.2 40]</kbd> would be two push forces:
	   1. Magnitude 2 at 12 degrees CCW from the sliding surface
	   2. Magnitude 3.2 at 40 degrees CCW from the sliding surface
	 - Recall from the pre-lab content to access just the first column
       of a matrix `P` you can use the syntax `P(:,1)`, and to access
       just the second `P(:,2)`. Your magnitudes will be the first
       column and directions in the second;

# Calculate

- `Pnet` - the net pushing force as a 2 element vector with x component and y component
  - This is the same calculation you did for the Newton's 2nd Law
    Solver project. You will have to adjust the syntax a bit to handle
    the input as a single matrix.
- `F_N` - the normal force on the block,

   $$
   F_{N} = W\cos(\theta) + P_{y}
   $$
- `F_f` - the force of friction $F_{f} = \mu_{k}F_{N}$
   Where $P_y$ is the y component of the *net* push force.
- `Fnet_x` the x component of the net force acting on the block

   $$
   F_{net_x} = -W\sin(\theta) + F_{f} - P_{x}
   $$
   
   Where $P_{x}$ is the x component of the *net* push force.
- `a_x` the acceleration of the block

# Output

Display a formatted message containing the acceleration of the box.

# Sample Run

## Case 1 - Single Push Force

<pre class="env-matlab">
<samp>Enter the angle of incline in degrees CCW from x: <kbd>32</kbd>
Enter one or more pushing forces as a magnitude and direction in degrees CCW from x: <kbd>[2 0]</kbd>
Enter the weight of the box (N): <kbd>12</kbd>
Enter the coefficient of static friction: <kbd>.38</kbd>
With a net push force of 2.00 N 0.0 deg. CCW from the sliding surface,
the acceleration is -3.67 m/s^2
</samp>
</pre>

## Case 2 - Multiple Push Forces

<pre class="env-matlab">
<samp>Enter the angle of incline in degrees CCW from x: <kbd>32</kbd>
Enter one or more pushing forces as a magnitude and direction in degrees CCW from x: <kbd>[2 0; 1.5 90; 2 75]</kbd>
Enter the weight of the box (N): <kbd>12</kbd>
Enter the coefficient of static friction: <kbd>.38</kbd>
With a net push force of 4.26 N 53.7 deg. CCW from the sliding surface,
the acceleration is -3.03 m/s^2
</samp>
</pre>

# Graded Items

- [Quiz: Newton's Sled Challenge]({{wwwroot}}/sys.php?f=assess/main&name=quiz08_extra)
  - Like other quiz submissions of MATLAB code, you will just copy and
    paste the lines after all input variables have been assigned.
