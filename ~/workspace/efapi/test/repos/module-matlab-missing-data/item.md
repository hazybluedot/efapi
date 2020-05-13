---
title: 'Handling Missing Data'
morea_type: module
morea_id: module-matlab-missing-data
published: true
---
Up until this point we have been shielding you from the harsh
realities of the real world. The data we have been working with has
been complete. This means that for timeseries data we have had valid
data for every single measurement time. This is actually not common,
and it is much more realistic to have incomplete timeseries data.

Data can be missing for a couple reasons:
1. Sensors that record data at different rates, for example
   accelerometers and GPS.
2. Sensors that miss measurements at scheduled intervals due to
   environmental reasons, or malfunctions. For example, a GPS sensor
   that nominally records a position measurement every second will not
   record measurements if it does not receive signals from enough
   satellites.

# Getting Started

Download [Lab11_data.zip](Lab11_data.zip) and unzip it to your "Lab11" folder. It
contains several csv files that we will use in today's lab.

Your start file is the program you wrote in Lab 10. Make a copy and
name it "Lab11_[netid].m", replacing [netid] with your NetID. Move
this file to your "Lab11" folder.

# Example: Dr. Maczka's Position Data

The data file we worked with last week had 7 columns:

```
time accX accY accZ posX posY posZ
```

One time column, three columns containing acceleration data, and three
columns containing position data. If you check the difference of
adjacent time values you will find that the time interval of the data
is 10ms. In reality, the accelerometer was recording data every 10ms,
but the GPS was recording data at a 5 second interval, on average.

~~~ aside A More Thorough Check
The check for valid numbers to the left checks only the X coordinate. In our case this is sufficient because if there is a valid number for x, then we are guaranteed a valid number for y and z as well. However, for a more complete check, we would want to find places where *all* x, y, and z are valid numbers. We can do so easily with the `all` function:

```
goodPos = all(~isnan(pos), 2);
```

The `2` given as the second argument tells `all` to operate along the second dimension, or columns. In other words, `all(~isnan(pos), 2)` reads "rows of 'pos' for which all columns are valid numbers".
~~~

The missing data in last-weeks file were *interpolated*, meaning
values were generated for the times there was no GPS data by assuming
the position moved smoothly from one time point to the next. Data we
will be using this and next week will instead contain `NaN` values
where no data were recorded. `NaN` stands for "Not a Number", and is
MATLAB's way of encoding values for which no number is defined. For
example, try evaluating `0/0` in the command window.

1. Load the data in MorningCommute_2019_11_04.csv from the Lab11 data
   archive and extract the time, acceleration data, and position data:

    ``` matlab
    data = csvread('MorningCommute_2019_11_04.csv');

    time = data(:,1);
    acc = data(:,2:4);
    pos = data(:,5:7);
    ```

    If you view the contents of the `pos` variable, you should see
that the majority of the rows contain `NaN` values. These correspond
to times when there was accelerometer data, but no GPS data. In this
particular file, Only 86 rows out of 52,921 contain valid position
measurements.

2. Create a logical index that will select rows of `pos` containing valid numbers.

    ```matlab
    goodPos = ~isnan(pos(:,1)) % logical index indicating where the x position is a valid number
    posTime = time(goodPos);
    pos = pos(goodPos,:);
    ```

    The function `isnan` returns a logical array indicating where the
data values are not numbers. Thus, `~isnan(pos(:,1))` can be read as
"All the X elements of 'pos' that are valid numbers".

3. With the shortened `pos` and `posTime` vectors, you will need to
update later parts of the program that use these values:

    1. The section where position is differentiated to find velocity and acceleration
    2. The section where position and its derivatives are plotted

    Try running your program and use the error messages to find places
that need to be updated.

# Discussion

Once you have made the necessary changes, run the program and produce the same acceleration, velocity, and position plots as done in Lab10. What is different about them now with regards to the position data?
