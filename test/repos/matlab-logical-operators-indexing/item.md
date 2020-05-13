---
title: 'Logic Operators and Indexing'
morea_type: reading
morea_id: matlab-logical-operators-indexing
published: true
---
The principal of logical indexing is similar to that of vector
indexing: it is a mechanism for returning a subset of elements from a
vector. With regular indexing, indexes represent the relative position
of the desired elements, so for example `x(3)` would return the 3rd
element of `x` and `x([3 5])` would return the third and fifth element
of `x`. 

With logical indexing, you typically use a
[logical](https://www.mathworks.com/help/matlab/ref/logical.html)
vector. The term *logical* here means that each element in the vector
represents a binary TRUE/FALSE value, rather than a numeric value. The
most common way to create a logical vector is by using the logical
operators `>` (greater than), `<` (less than), `>=` (greater than or
equal), `<=` (less than or equal), `==` (equal), and others. Note the
double equal (`==`) as the logical "equal to operator". This is common
in most programming languages since single `=` is typically used as
the assignment operator. While they look similar, they do very
different things and mixing them up is a common source of error and
frustration!

Creating a logical vector is pretty easy:

<samp class="env-matlab">
<span class="prompt">>></span> <kbd>x = [4 5 8 3 2 9];</kbd>
<span class="prompt">>></span> <kbd>x > 3</kbd>
ans =
  1×6 <span class="function-name">logical</span> array
   1   1   1   0   0   1
</samp>

Note that while the result displayed looks similar to the numeric
vector `[1 1 1 0 0 1]`, it is not the same. This is indicated by the
type description <samp>1×6 <span class="function-name">logical</span>
array</samp> which specifies the result is a 6 element row vector containing
logical elements. A value of `1` means `TRUE` while `0` means
`FALSE`. In the above example we can see that the first, second,
third, and sixth element of `x` are greater than $3$, since that was
the logical check performed that generated this logical vector.

By themselves, logical vectors are not that exciting, and in fact you
will probably very rarely view all the elements in a logical vector
like this. Their use comes from MATLAB's logical indexing
ability. These two features, logical vectors and logical indexing,
combine to make one of the most expressive features of
MATLAB. Consider the following example:

<samp class="env-matlab">
>> x(x > 3)
ans =
     4     5     8     9
</samp>

The phrase `x(x > 3)` can be read "the elements of x where x is
greater than 3". We see that a new vector is returned containing
<samp>4 5 8 9</samp>. If you take a look at the elements in `x` you
can easily confirm that these are all the elements greater than 3.

Try this with various logical operators to get a feel for it.

To get an understanding for what we mean when we say logical indexing is expressive, or has "expressive power". Think about how you would use a spreadsheet to "select all the elements of a list that have a value greater than the mean of the list"?  In MATLAB using logical indexing this phrase can be expressed succinctly as

```
x(x > mean(x))
```

Working from the inside of the parenthasis out, this expression is evaluated as

1. `mean(x)` take the mean (average) of the elements of `x`
2. `x > mean(x)` indicate which elements of `x` are greater than the mean of `x`.
3. `x(x > mean(x))` select the elements of `x` that are greater than the mean of `x`.

## References 

[Logical Operations](logical)

logical: https://www.mathworks.com/help/matlab/logical-operations.html
