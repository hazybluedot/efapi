---
title: 'A Brief Introduction to Data Models'
morea_type: reading
morea_id: modeling-intro
published: true
---
In engineering we often work with *models* of systems described by
mathematical equations. You have likely already been introduced to
some common mathematical models in your introductory physics course,
even if you haven't called it a model. For example:

$$
x = x_{0} + v_{0}\Delta{t}
$$

is a model that describes the position of an object moving at a
constant velocity for a duration of $\Delta{t}$. Further, we call this
a *linear* model, because it describes a linear relationship between
the parameter $v_{0}$ and the data $\Delta{t}$, $x$, and $x_{0}$.

When we conduct experiments, we usually will collect some measurement
data, and we would like to fit our data to a model to determine model
*parameters*. Staying with the above example, if we conducted an
experiment from which we measure position data at different points in
time, we could fit those data to the above model to estimate a value
for the parameter $v_{0}$.
