---
title: 'Problem Parsing'
morea_type: module
morea_id: module-solver-problem-parsing
published: true
---
The most challenging part of using solver to find a solution takes place before even opening solver: it is interpreting a problem statement to parse out key parts:

- What are the variables/values that can change freely?
- What are the constraints?
  - Constraints may be inequalities on the variables that can change
    themselves, such as "the independent variables must be greater
    than zero", or a more complex relationship expressed as a
    mathematical expression.

## General

### Variables that can Change

These are the parameters we have control over. Generally the value we
wish to find is a variable that can change.

### Constraints

Constraints are equalities or inequalities that must be met for the
solution to be valid. A common inequality constraint is physical
lengths must be greater than 0 since it does not make sense to have a
negative length.

## Optimization Problems

Optimization problems are those in which you must find the minimum or
maximum of some value. The objective value is the output of a function
which is called the *objective function*. Generally the objective
function takes your model parameters as arguments and returns a single
value.

### Preview: Minimize the Surface Area of a Cylinder 

An example we will work through later will ask us to find the minimum
surface area of a cylinder for a given volume.

- The objective is to minimize surface area
- We can change the radius and height of the cylinder
- We are constrained by the volume requirement

We will use formulas to describe the relationship between radius,
height, surface area, and volume.
