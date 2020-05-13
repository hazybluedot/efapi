---
title: 'The Data'
morea_type: module
morea_id: data-incline-cart
published: true
---
The data in the file provided contains measurements from a cart a cart
moving along an incline with a spring at the bottom:

@[video]({{wwwroot}}/vid/cart_incline)

The data columns are

1. Time (s)
2. Force (N)
3. Position (m), where position `0` is the starting position at the highest point on the incline.
4. Velocity (m/s)
5. Acceleration (m/s^2^)
6. Kinetic Energy (J)
7. Gravitational Potential Energy (J)
8. Total Mechanical Energy (J)

::: aside Fun Fact 
In reality, the only cart data that is directly
measured is the force data, which should be non-zero only when the
spring is in contact with the bumper at the bottom of the incline, and
the acceleration data. All other values, such as those for position, velocity,
and energy, are calculated from the acceleration data.
:::

# Loading the Data

Assuming you have saved the data file in your `EF105/data` folder, and your script file is saved in `EF105/Lab09`, use the following line to load the data file into a variable named `cart_data`

``` matlab
cart_data = readmatrix('../data/cart_incline_energy.csv');
```

Once loaded, the variable `cart_data` will be a matrix containing 8
columns and as many rows as there are data measurements. View the
information in the workspace to confirm and see the exact number of
measurements.
