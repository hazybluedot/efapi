---
title: 'Solving Systems of Linear Equations: Comparing Three Tools'
morea_type: module
morea_id: module-solving-linear-systems-comparison
published: true
---
We have used two different tools to solve systems of linear questions:
Our calculators (Lab 2) and Excel (Lab 6). It shouldn't be too
surprising that we can also solve systems of linear equations in
MATLAB. 



## From The Excel Solver Lab

This is a problem we used as an example in the Excel Solver lab: We have a system of linear equations as follows

```
4P - 2N + 3F -10 = 20
P + 5N = 0
N - F - 10 = 0 
```

and we would like to solve for the values of `P`, `N`, and `F`.  Just like before, it will make it easier to solve if we first do a bit of algebra to collect constant terms on one side of the equation:

```
4P - 2N + 3F = 30
P + 5N = 0
N - F = 10 
```

Systems of linear equations can be modeled as a single matrix multiplication, where the unknowns are encoded in a column vector:

$$ \begin{matrix}
	P\\
	N\\
	F
	\end{matrix}
$$


## From the Calculator Lab
