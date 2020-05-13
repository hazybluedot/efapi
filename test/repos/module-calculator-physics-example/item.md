---
title: 'Physics Example'
morea_type: module
morea_id: module-calculator-physics-example
published: true
---
Here is an example problem you might have seen in a physics class. The result is a system of two linear equation. Practice solving it with both your calculator's solver function, and linear systems of equation solver function.

<div class="row">
<div class="col-md-3">

![Figure 1: Three force vectors at [equilibrium](/ef151-2020-01/sys.php?f=bolt/bolt-main&c=class-1-4&p=equilibrium)](pix/force-equilibrium.png)

</div>
<div class="col-md-3">

We are asked to find the magnitude of T1 for

$$\begin{aligned}
W &= 18 N\\
\theta_{1} &= 33\degree\\
\theta_{2} &= 74\degree
\end{aligned}
$$

</div>
</div>

To set up this problem we need to know how to do [vector
addition](/ef151-2020-01/sys.php?f=bolt/bolt-main&c=class-1-4&p=componentvectoradd),
and what it means for a system to be at
[equilibrium](/ef151-2020-01/sys.php?f=bolt/bolt-main&c=class-1-4&p=equilibrium). Review
those related concepts if needed before proceeding.

Because we are told the system is at equilibrium we know that the x
components of vectors T1, T2, and W sum to 0 and the y components sum
to 0:

$$\begin{aligned}
T_{1}\cos(33\degree) - T_{2}\cos(74\degree) + 0 &= 0\\
T_{1}\sin(33\degree) + T_{2}\sin(74\degree) - 18 &= 0
\end{aligned}
$$

We now have two linear equations and two unknowns and can solve this
using either substitution and the solver function, or the
simultaneous linear equation solver.

## Method 1: Substitution and Solver

We are asked to find the magnitude of T1, so I choose to solve the first equation for $T_{2}$:

$$
T_{2} = \frac{T_{1}\cos(33\degree)}{\cos(74\degree)}
$$

and substitute this expression into the second equation:

$$
T_{1}\sin(33\degree) + \frac{T_{1}\cos(33\degree)}{\cos(74\degree)}\sin(74\degree) - 18 = 0
$$

At this point, we have a single equation with a single unknown, so we
can enter the equation above into our calculator's solver. If your
calculator can only handled single-character variables, just use
$T$. For the given numbers we should get $T_{1}=5.19 N$.

## Method 2: Simultaneous Linear Equation Solver

We could move all the constant terms over to the right-hand side of the equality in your head, or on paper:
$$\begin{aligned}
T_{1}\cos(33\degree) - T_{2}\cos(74\degree) &= 0\\
T_{1}\sin(33\degree) + T_{2}\sin(74\degree) &= 18
\end{aligned}
$$

Notice also that the variables $T_{1}$ and $T_{2}$ are in a consistent
order for both equations. Now we can identify the coefficients and arrange
them in rows and columns:

$$\begin{matrix}
\cos(33\degree) & -\cos(74\degree) & 0\\
\sin(33\degree) & \sin(74\degree) & 18
\end{matrix}
$$

There are $2$ rows and $3$ columns, so we enter this into our calculator as a $2\times3$ matrix. We should obtain the results 

$$
\begin{aligned}
T_{1}&=5.19N\\
T_{2}&=15.8N
\end{aligned}
$$
