---
title: 'Matrix vs. Scalar Arithmetic'
morea_id: matlab-matrix-vs-scalar-arithmetic
morea_type: reading
published: true
---
<div class="html5-video" id="screencap-enter-matrices" data-file="lab8-videos-isaac/Lab8-4c"></div>

Because MATLAB is a MATrix LABoratory, its regular arithmetic
operators `+`, `-`, `*`, and `/` all perform matrix operations when
used on matrices.  If you have had a linear algebra class you may be familiar with the difference between matrix multiplication and scalar multiplication, for example for the matrices

$$A = \begin{bmatrix}
3 & -1\\
7 & 4
\end{bmatrix}, \quad B = \begin{bmatrix}
2 & 8\\
-5 & -9
\end{bmatrix}
$$

The matrix product $A*B$ is defined as

$$A * B = \begin{bmatrix}
(3 \cdot 2) + (-1 \cdot -5) & (3 \cdot 8) + (-1 \cdot -9)\\
(7 \cdot 2) + (4 \cdot -5) & (7 \cdot 8) + (4 \cdot -9)
\end{bmatrix} = \begin{bmatrix}
11 & 33\\
-6 & 20
\end{bmatrix}
$$

This is what the `*` operator in MATLAB does:

<samp class="env-matlab">
>> A = [3 -1; 8 4];
>> B = [2 8; -5 -9];
>> A*B
ans =
    11    33
    -6    20
</samp>

If instead you wanted to multiple each element of matrix A by the corresponding in B, we would use the pointwise (or element-wise) project:

$$A \cdot B = \begin{bmatrix}
(3 \cdot 2) & (-1 \cdot 8)\\
(7 \cdot -5) & (4 \cdot -9)
\end{bmatrix} = \begin{bmatrix}
6 & -8\\
-35 & -36
\end{bmatrix}
$$

Do do this in matlab, the `.*` operator is used:

<samp class="env-matlab">
>> A.*B
ans =
     6    -8
   -35   -36
</samp>

In general, the pointwise operators `.*`, `./`, and `.^` perform the
pointwise operations associated with multiplication, division, and
exponentiation.

If you ask matlab to perform an invalid matrix operation, it will
issue a warning, for example.

<samp class="env-matlab">
>> x = [4 2 5 1]; 
>> x^2
<span class="error-text">Error using <span class="function-name"> ^ </span> (<span class="line-number">line
51</span>) Incorrect dimensions for raising a matrix to a power. Check
that the matrix is square and the power is a scalar. To perform
elementwise matrix powers, use '.^'.</span> 
</samp>

In this case, MATLAB guesses that we might have intended to do an element-wise exponent, in other words, "square each element in the vector x", and suggests we could use the `.^` operator for that:

<samp class="env-matlab">
>> x.^2
ans =
    16     4    25     1
</samp>
