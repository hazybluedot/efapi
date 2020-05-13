---
title: 'Practice: Trig Functions'
published: true
morea_type: assessment
morea_id: assessment-spreadsheet-polar-coordinates
morea_summary: 'Practice using functions by calculating distance between several polar coordinates'
morea_labels:
    - practice
---
Create a new worksheet in your `lab03_[netid]` file called "Trig
Practice". Do the following exercise in that worksheet.

Try converting these polar coordinates into X and Y data:

::: collapse Tip 
You can copy and paste data from a website into a
spreadsheet. In many cases, such as the example here, if the website
data is well-formed, it will paste correctly into appropriate rows and
columns.
:::

| Point | Distance | Units | Theta | Units   |
|-------|----------|-------|-------|---------|
| 1     | 5        | ft    | 30    | Degrees |
| 2     | 3        | ft    | 212   | Degrees |
| 3     | 2        | ft    | 6.1   | Radians |
| 4     | 7        | ft    | 0.15  | Radians |

::: aside Poor Data Design 
It is important to point out that the data
table here is constructed as an academic example. In
general it is a bad design to have mixed units (Degrees and Radians)
in the same data-set. As you will find when completing this practice,
mixed units creates many headaches and it is easy to make mistakes. If you
ever find yourself with a data file that contains mixed units, do
yourself a favor and convert to a consistent unit system before conducting
additional analysis!
:::

- Each point is a vector with a magnitude (distance) and direction
  (theta) CCW from the positive-x axis.
- You will need to create formulas to calculate the X and Y
  components:
  $$\begin{aligned}
  x &= d\cos(\theta)\\
  y &= d\sin(\theta)
  \end{aligned}
  $$
  Where $d$ is the distance and $\theta$ is the direction in degrees.
- We need to know that trig functions in Excel require angles to be in
  radians, so we'll use the `RADIANS` function to convert. For
  example, the `X` component equation would be `=B2*COS(RADIANS(D2))`
  assuming the distance is stored in cell `B2` and the Theta stored in
  `D2`. These cell references may be different in your own sheet,
  depending on where you pasted the table.

::: collapse Advanced
Rather than manually checking which values are in radians and which are in degrees, create a new column with the heading "Radians" and apply the following formula to the first cell:
``` excel
=IF(E2 = "Radians", D2, RADIANS(D2))
```
This assumes the 'Units' column is 'E' and the 'Theta' column is 'E', adjust if your setup is different.
Extend the formula to the remaining cells. 

The 'IF' function returns a value based on a logical (true or false) evaluation. In this case we check if the value in 'E2' is equal to 'Radians'. If it is, then we use the value in 'D2', since it is already in Radians. If the value in 'E2' is *not* equal to 'Radians' we assume it is degress and return 'RADIANS(D2)' instead. If this formula is extended correctly for the whole column, then all values will be in radians!
:::

## Find the distance between each point.

Remember you will need to use both X and Y! Make these two separate
columns.

Notice that the distance between points 1 and 2 is the *magnitude* of
the vector $\bm{V_{2}-V_{1}}$ which can be found as

$$\begin{aligned}
d &= \left|\bm{V_{2}-V_{1}}\right|\\
&= \sqrt{(x_{2} - x_{1})^2 + (y_{2} - y_{1})^2}
\end{aligned}
$$

where $(x_{1}, y_{1})$ are the x and y components of $\bm{V_{1}}$ and $(x_{2}, y_{2})$ are the x and y components of $\bm{V_{2}}$.

- Use the function finder, or your favorite Internet search engine to find the function for calculating the
  square root.
- Make sure your parentheses are in the right places
- To square a number use `^2`


## Discuss with your Neighbor

- Which cell should the formula start in?
- Do any of the formulas need to use absolute referencing to copy them
correctly for the whole data set?
