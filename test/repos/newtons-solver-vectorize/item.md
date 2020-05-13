---
title: 'Multiple Forces'
morea_type: experience
morea_id: newtons-solver-vectorize
published: true
---
Our current version of the solver is not very interesting. The
magnitude and direction of the final force is the same as the
information the user enters. With only one force acting on the object,
the net force is the same force!

# Modify to Work with Multiple Forces

You may have noticed from the pre-lab activity that `input` can accept
a vector from the user just as easily as a scalar. Try running the
same program again but enter in a list of magnitudes and directions as
vectors:

<pre class="env-matlab">
<samp>Enter the mass of the object (kg): <kbd>2.2</kbd>
Enter one or more magnitudes: <kbd>[1.2 3.3 2.1 1.8]</kbd>
Enter one or more directions: <kbd>[21 36 -63 17]</kbd>
<span class="error-text">Error using <span class="matlab-function"> * </span>
Incorrect dimensions for matrix multiplication. Check that the number of columns in the first matrix
matches the number of rows in the second matrix. To perform elementwise multiplication, use '.*'.

Error in <span class="matlab-function">lab08_{{netid}}</span> (<span class="line-no">line 13</span>)
x = Fmag*cosd(Fdir);
</span>
</samp>
</pre>

Note that your line number may be different than the one shown in the
sample output.

This error is caused because when the user supplies vectors as input
the multiplication to calculate x and y components of the forces is
using the `*` operator which performs the vector dot product. This is
not the correct math for this calculation, instead we need to use the
elementwise product, `.*`.

1. Notice that the variables assigned from the `input` function are
   set in the workspace. Use those values to try the offending
   calculation in the command window.
1. Change the dot-product operator (`*`) to the elementwise product
   (`.*`) in the calculations for x and y components. Try this in the
   command window first, when you think it is working, correct the
   lines in the script file.
2. The x and y components of the *net* force vector is found by suming
   the individual x and y components. Use the `sum` function and
   update the line assigning `Fnet` to be a vector where the first
   element is the sum of the x variable (`sum(x)`) and the second element is the
   sum of the y variable (`sum(y)`).
   
Once you make these changes, try running your program again and
provide vector input for the forces.

<pre class="env-matlab">
<samp>Enter the mass of the object (kg): <kbd>2.2</kbd>
Enter one or more magnitudes: <kbd>[1.2 3.3 2.1 1.8]</kbd>
Enter one or more directions: <kbd>[21 36 -63 17]</kbd>
The acceleration of the object is 2.98 m/s^2 9.0 degrees CCW from x
</span>
</samp>
</pre>

Try running your program with different values as well, check your
results with another source, such as your calculator or excel, to
convince yourself your math is correct.
