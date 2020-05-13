---
title: Summary
morea_id: lab12prep-summary
morea_type: module
published: true
---
# Difference and Approximate Derivative

- `diff(X)` - find the difference between adjacent elements of `X`
- `diff(Y)/h` - calculate the approximate derivative of `Y` over a constant step-size `h`
- `diff(Y)./diff(X)` - calculate the approximate derivative of `Y` with respect to `X` when the step-size may not be constant.

# Approximate Integral

- `cumtrapz(X,Y)` - calculate the cumulative approximate integral of `Y` with respect to `X`.
- `trapz(X,Y)` - calculate the approximate integral of `Y` with respect to `X`.

# Graded Items

- @[link](quiz/prelab12)
