---
title: 'Representing Information with Vectors'
morea_id: module-representing-info-with-vectors
morea_type: module
published: true
---
An important concept that can be tricky to grasp is the idea that
mathematical vectors can be used to represent things that may not seem
to be vector quantities in the physical sense.

For example, in MATLAB we have used vectors to store timeseries data:

``` matlab
time = [0 .5 1 1.5 2];
pos = [20 22 25 24 26];
```
Here the elements of the vector represent sequential values of quantities time and position. As far as MATLAB is concerned they are vectors like any other and you *could* calculate a magnitude and direction for these MATLAB vectors, but those quantities would have no physical meaning. It takes a human interpretation to understand what the elements of the vector *mean* or *represent*.

## Representing Polynomials as Vectors

One important representation in data modeling is the representation of
polynomial functions as a vector. When we have a function of the form

$$
p(x) = p_{1}x^{n} + p_{2}x^{n-1} + \cdots + p_{n}x + p_{n+1}
$$

Mathematically this is an n~th~ order polynomial with coefficients
$p_{1}, p_{2}, \cdots, p_{n}, p_{n+1}$

As a specific case, consider a 2nd order polynomial:

$$
p(x) = p_{1}x^{2} + p_{2}x + p_{3}
$$

Represented as a vector, this polynomial is

$$
[p_{1} \quad p_{2} \quad  p_{3}]
$$

## Usage in MATLAB

In MATLAB, some built-in functions return polynomials as vectors, or take vectors representing polynomials as input arguments.  The two functions that we will be using in this class are:

[polyfit] - returns a vector that represents a polynomial
[polyval] - takes a vector that represents a polynomial as its first argument

It is important to keep in mind that while these functions work well together -- the output of `polyfit` can be used as the input to `polyval`, they are independent and you could just as well create your own vector that represents a polynomial from arbitrary values:

``` matlab
p1 = 3;
p2 = 2.5;
myPolynomial = [p1 p2];
```

In this example the variable `myPolynomial` will be a vector `[3 2.5]` and if used to represent a polynomial would represent the polynomial

$$ 
p(x) = 3x + 2.5
$$

