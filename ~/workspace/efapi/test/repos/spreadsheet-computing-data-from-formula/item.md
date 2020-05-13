---
title: 'Computing Data from Physics Equations'
morea_type: module
morea_id: spreadsheet-computing-data-from-formula
published: true
---
We have already seen a physical equation that relates an objects
position with respect to time:

$$
s(t) = s_{0} + v_{0}t + \frac{1}{2}at^2
$$

Let us now use this *model* to calculate position for each point in
time using initial values (model parameters) of position, velocity,
and an average acceleration.

## Getting Started

1. Create a third worksheet and name it "Position Estimation"

### Generate a list of time values

1. In cell A4 type the label "time"
2. In cell A5 enter the value "0"
3. In cell A6 enter the value "0.05"
4. Extend this pattern by selecting A5:A6, then dragging the small box
   at the lower right of the active cell down to row 38.

### Copy Data from "cart_incline" worksheet

1. Create labels <kbd>pposition</kbd>, <kbd>velocity</kbd>, and
   <kbd>acceleration</kbd> to the right of your "time" label.
1. Copy velocity and acceleration data, but *not* position data, for
   phase 1 from "cart_incline" to your "Position Estimation"
   worksheet. The first few rows should look like this:

|   | A    | B        | C        | D            |
|---|------|----------|----------|--------------|
| 1 |      |          |          |              |
| 2 |      |          |          |              |
| 3 |      |          |          |              |
| 4 | time | position | velocity | acceleration |
| 5 | 0    |          | 0.042    | 0.631        |
| 6 | 0.05 |          | 0.074    | 0.655        |
| 7 | 0.1  |          | 0.108    | 0.663        |

### Set Model Parameters

In cells B1:D1 enter the labels <kbd>s0</kbd>, <kbd>v0</kbd>, and
<kbd>a_avg</kbd>. In the row directly below enter values for initial
position, initial velocity, and enter a formula to calculate average
velocity.

|   | A | B    | C     | D     |
|---|---|------|-------|-------|
| 1 |   | s0   | v0    | a_avg |
| 2 |   | 0.11 | 0.042 | 0.640 |


The value for `a_avg` should be calculated from a formula! <!-- {p:.alert .alert-warning} -->

### Calculate Position from Model Parameters

1. In cell B5, the first value for position, enter a formula to compute
position with respect to time and  model parameters $s_{0}$, $v_{0}$, and $a$.
   - Think about which cell references will need to be made absolute
     (using the `$` symbol) so that you can copy the formula across
     the entire column correctly.
     
## Plot the Data

Generate an appropriately annotated chart of the position data vs. time.

To check your results, compare with the Phase 1 position plot you
generated on the first worksheet. They should look similar. <!-- {.alert .alert-info} -->

## Practice: Position from Velocity

1. In cell F4, enter the label "Position from Velocity"
2. Using the trapezoidal method, calculate position from velocity data
   for Phase 1
3. Add this data series to your existing chart.

## Discussion

1. How will these methods of calculating position from acceleration
   data work if we used all the acceleration data instead of just
   Phase 1 data?
   - What would happen if you changed the formula you used to
     calculate position to use the time-varying value for acceleration
     in column D, rather than the average acceleration? Would the
     result be correct?
2. How do the values use used for initial position, velocity, and
   average acceleration compare with the parameters of the trend-line
   for Phase 1?
