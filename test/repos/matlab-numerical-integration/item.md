---
title: 'Numerical Integration'
morea_type: reading
morea_id: matlab-numerical-integration
published: true
---
Recall that given a sequence of values:

$$\begin{aligned}
v &= \begin{bmatrix}v_{1} & v_{2} & v_{3} & \cdots & v_{n}\end{bmatrix}\\
\\
t &= \begin{bmatrix}t_{1} & t_{2} & t_{3} & \cdots & t_{n}\end{bmatrix}
\end{aligned}
$$

that the numerical integral at time $i$ of $v$ with respect to $t$ is

$$
p_{i} = \sum_{j=1}^{i} \frac{1}{2}(v_{j+1} + v_{j})(t_{j+1}-t_{j})
$$

Or, expanding out the sumation:

$$\begin{aligned}
p_{1} &= \frac{1}{2}(v_{2} + v_{1})(t_{2}-t_{1})\\
\\
p_{2} &= \frac{1}{2}\left[(v_{2} + v_{1})(t_{2}-t_{1}) + (v_{3} + v_{2})(t_{3}-t_{2})\right]\\
\\
p_{3} &= \frac{1}{2}\left[(v_{2} + v_{1})(t_{2}-t_{1}) + (v_{3} + v_{2})(t_{3}-t_{2}) + (v_{4} + v_{3})(t_{4}-t_{3})\right]\\
\\
& \quad \vdots\\
\\
p_{n-1} &= \frac{1}{2}\left[(v_{2} + v_{1})(t_{2}-t_{1}) + (v_{3} + v_{2})(t_{3}-t_{2}) + \cdots +  (v_{n} + v_{n-1})(t_{n}-t_{n-1})\right]
\end{aligned}$$

# Numerical Integration in MATLAB

In MATLAB, the `cumtrapz` and `trapz` functions may be used for
numerical integration using the trapezoidal method. As with numerical
differentiation, these functions handle the calculations that we had
to manually type in in Excel.

1. Read the Syntax and Description sections of the documentation for
   `cumtrapz`. Focus on the first two call signatures:
   - `Q = cumtrapz(Y)`
   - `Q = cumtrapz(X,Y)`
   
   Try to identify how `Y`, `X`, and `Q` in the documentation
   correspond to the variables shown in the mathematical
   representation above.
   
2. Run each of the first two examples from the documentation in
   MATLAB. Try with different values of `Y` and `X`, try to predict
   what `Q` will be each time. 
3. Repeat this until you are comfortable explaining how `cumtrapz`
   relates to the mathematical equations above, and have a feel for
   when you would need to call `cumtrapz(X,Y)` instead of
   `cumtrapz(Y)`.

While `cumtrapz` returns the *cumulative* numeric integral of a
vector, in other words $\begin{bmatrix}p_{1} & p_{2} & \cdots &
p_{n-1}\end{bmatrix}, `trapz` returns just the final value, $p_{n-1}$. 

1. Apply the same test data you used when practicing with `cumtrapz`
   to the `trapz` function. Observe the relationship between the
   output of `trapz` vs `cumtrapz` for the same inputs.

@[video]({{wwwroot}}/vid/matlab_cumtrapz_doc)
