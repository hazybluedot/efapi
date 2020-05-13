---
title: 'Fitting Data to a Model'
morea_type: module
morea_id: module-matlab-model-fit-practice
published: true
---
@[video]({{wwwroot}}/vid/lab11_practice_explain)

We know from our physics class that the position of an object under constant acceleration as a function of time is

$$
s(t) = s_{0} + v_{0}t + \frac{1}{2}at^{2}
$$

where $s_{0}$ is the initial position, $v_{0}$ is the initial
velocity, and $a$ is the acceleration.

## Cart Data

Using the [cart_incline_energy.csv] data file from Lab 9, fit the
phase 2 segment of data to a 2nd order polynomial model.

![Phase 2 of Cart Position Data](pix/cart_incline_phase2_pos.png) <!-- {.screencap} -->

Phase 2 is from index 54 to 123;

1. Load the data into a variable named `cart_data`
2. Extract rows 54 through 123 of `time`, `pos`, `vel`, and `acc`

   You could define each of these variables in two separate steps:
   first extract each column in full, like we did in Lab 9, then take
   a subset of each vector using the index range `54:123`, or define
   each in a single step combining the row indexing and column
   indexing in a single indexing, for example: `cart_data(54:123,1)`
   will extract the 54th through 123rd rows and 1st column of
   `cart_data`.

3.  Our model assumes that the initial position $s_0$ occurs at $t=0$,
   but our phase 2 data starts at a different time. Shift the time
   vector so that the first element is 0:

   ``` matlab
   time0 = time - time(1);
   ```
   
   Use the `time0` vector for model fitting and plotting.

After each step, if not more often, run your program and inspect the
variables in the workspace to confirm you are getting the results you
expect. If not, try to fix it before moving on to the next
step. Consider plotting the position and time data to see if it looks
like you correctly extracted phase 2. <!-- {p:.alert .alert-info} -->

## Fitting Position Data to a Model

1. Fit the `time0` and `pos` data to a 2nd order polynomial, store the parameters in a variable named `model1`
2. Print out the model parameters formatted as shown in the sample output below using `fprintf`.
3. Plot the measured data points as discrete dots, and plot a line representing the model on the sample plot.

After each step, if not more often, run your program and inspect the variables in the workspace to confirm you are getting the results you expect. If not, try to fix it before moving on to the next step. <!-- {p:.alert .alert-info} -->

## Creating a Model from Data

For this data set we have acceleration and velocity data as well as
position, so we could construct a model from the existing data.

1. Create a model named `model2` from the data we have:

   - Use the mean of the acceleration data as `a`
   - Use the first element of the velocity data as `v0`
   - Use the first element of the position data as `s0`

   Hint: This will be a vector of the same structure returned by
   `polyfit`: the first element should be the parameter
   $\frac{1}{2}{a}$, the second should be `v0`, and the third should
   be `s0`.

2. Print out the model parameters, formatted as shown in the sample output below.
3. Add a plot of the second model to the same plot.
   - Hint: Use `polyval` to evaluate your polynomial at each time in `time0`

## Sample Output

<pre class="env-matlab">
<samp>
Model 1: s0=0.99, v0=-0.70, a=0.41
Model 2: s0=1.00, v0=-0.74, a=0.41
</samp>
</pre>

![Model Comparison](pix/cart_pos_model.png) <!-- {.screencap} -->

## Discussion

Which model is a better fit? 
