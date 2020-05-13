---
title: 'Indexing Matrices'
morea_id: matlab-indexing-matrices
morea_type: reading
morea_tags:
    - MATLAB
published: true
---
While we group numbers into matrices because we tend to want to work
with them as a whole group, there are times we need to select just a
subset of the numbers in a matrix. This is done with the *indexing*
using parenthesis (`()`). MATLAB's indexing functions are one of the
more powerful and flexible features of the environment. Practicing
indexing until it becomes second nature will ensure 

<div class="html5-video" id="screencap-enter-matrices" data-file="lab8-videos-isaac/Lab8-4b"></div>

## Indexing into Vectors

Start with a single row vector:

```
x = [4 5 8 3 2 9];
```

We can select the nth element of `x` by using the notation `x(n)`. For example:

<samp class="env-matlab">
>> x(3)
ans =
&nbsp;    8
</samp>

Asking for the 3rd element of `x` returns `8`, and you can confirm
that the third element, counting left to right, is indeed $8$.

We can also use vectors to index into other vectors or matrices:

<samp class="env-matlab">
>> x([3 5])
ans =
&nbsp;    8   2
</samp>

We read `x([3 5])` as "select the 3rd and 5th elements of x". The
result is a $1\times 2$ matrix, or row vector of lenght $2$. Note that
operators that return vectors could be used as index as well. Recall
that the `:` operator can be used to generate a vector:

<samp class="env-matlab">
>> 3:5
ans =
     3     4     5
</samp>

Notice that this is equivalent to `3:1:5`, if we leave out the
increment value, MATLAB defaults to use an increment of 1. Since this
generates a regular vector, we can use this expression to index as
well:

<samp class="env-matlab">
>> x(3:5)
ans =
     8     3     2
</samp>

We can read the expression `x(3:5)` as "select the 3rd through 5th
elements of x". The expression evaluates to a $1 \times 3$ vector.


## References

[Matrix Indexing in MATLAB](https://www.mathworks.com/company/newsletters/articles/matrix-indexing-in-matlab.html)
