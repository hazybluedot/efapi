---
title: 'Fitting Data to a Model'
morea_id: module-matlab-model-fit-prep
morea_type: module
published: true
---
In a
[previous lab](https://efcms.engr.utk.edu/ef105-2020-01/modules/excel-numerical/#spreadsheet-model-fit-poly)
we briefly explored the concept of fitting data to a model. Let us
revisit that idea.

Recall that a model is just a mathematical expression that describes
the relationship between different types of data. We will focus on an
example you should be familiar with from your physics class: [a spring
model](https://efcms.engr.utk.edu/ef151-2020-01/sys.php?f=bolt/bolt-main&c=class-3-3&p=spring):

$$F = k\cdot{x}$$

where $F$ is the force exerted by a spring that is compressed or
stretched a distance of $x$ from its neutral length.

## Estimating the Spring Constant

Imagine a scenario in which you have developed a new type of
spring. Before you can market it, you need to determine its spring
constant $k$. How might you do this?  If we rearrange the model equation we can see that

$$k = \frac{F}{x}$$

So if we can just measure the force for a given displacement, we
should be able to calculate $k$! While this works theoretically, in
practice this is not so simple, because measurements are not perfect
and each time we measure something, either the displacement or the
force, the values we get contain an unknown error quantity. A more realistic model for measuring the force exerted by a spring is

$$F = \hat{k}\cdot{x} + w$$

Where $w$ is some unknown error value. Now, solving for $\hat{k}$ we get

$$\hat{k} = \frac{F - w}{x}$$

which we cannot solve for because $w$ is unknown. We use the `^`
symbol to indicate that $\hat{k}$, pronounced "k hat", is an *estimate*
for the true $k$ that we would like to know.

To obtain a good estimate $\hat{k}$ we need multiple force
measurements at multiple displacements. We will use MATLAB's [polyfit]
function to do this.

@[video]({{wwwroot}}/vid/lab11_intro)

## Fitting Data to a Model

@[video]({{wwwroot}}/vid/lab11_prep_polyfit)

[polyfit] takes three arguments: $x$ data, $y$ data, and a number $n$
indicating the degree of the polynomial function that will be fit. An
n^th^ orer polynomial has the form:

$$
p(x) = p_1x^{n} + p_2x^{n-1} \cdots p_{n}x + p_{n+1}
$$ 

For $n=1$

$$
p(x) = p_1x + p_2
$$

This looks like our model

$$
F = k\cdot{x}
$$

Where $p_1=k$ and $p_2=0$. Thus, if we fit our experimental spring
data with polyfit, the vector it returns will contain the coefficients
of the polynomial it fit, and the first element of that vector will be
the value $k$ we are trying to find.

[polyfit]: https://www.mathworks.com/help/matlab/ref/polyfit.html

## Evaluating a Polynomial

The return values of `polyfit` are the coefficients of a polynomial and as such are not suitable to plot directly. To plot a curve associated with the polynomial we need to evaluate the polynomial over some x values. This is what MATLAB's [polyval] does.

@[video]({{wwwroot}}/vid/lab11_prep_polyval)

[polyval]: https://www.mathworks.com/help/matlab/ref/polyval.html

## $\hat{k}$ is an Estimate of $k$

It is important to keep in mind that while we would like to know the true value of $k$ for our spring, using data fitting techniques we can only find an estimate for $k$ that we call $\hat{k}$. To demonstrate what this means, there are 4 additional data files, `spring_data_2.csv` through `spring_data_5.csv`, all contain simulated data generated using the same "real" value of $k$, but if you fit a model to each you will find slightly different values for $\hat{k}$.

@[video]({{wwwroot}}/vid/lab11_prep_estimates)

## Follow Along Files

Download the following files to follow along with the demo in the video:

- [spring_model_demo.m](spring_model_demo.m). Save this start file to your `EF105/Lab11` folder.
- [spring_data.zip]({{wwwroot}}/data/spring_data.zip). Unzip this archive into your `EF105/data` folder.

## Final Demo Script

``` matlab
clear;
clc;
close all;

%% Load the data
data = readmatrix('../data/spring_data_1.csv');
x = data(:,1); % displacement (m)
F = data(:,2); % force (N)

%% Fit Data to Model

fit1 = polyfit(x, F, 1);

%% Evaluate Model

Fhat = polyval(fit1, x);

%% Print Model Parameters
fprintf('Model 1: k=%.2f, p2=%.2f', fit1(1), fit1(2))


%% Plot, just for a visual aid
fig_spring_fit = figure();
plot(x, F, '.b', 'MarkerSize', 20);
xlabel('displacement (m)');
ylabel('force (N)');
title('Experimental Spring Data');

hold on
plot(x, Fhat, '-r')
legend('Experimental Data', 'Model')


```
