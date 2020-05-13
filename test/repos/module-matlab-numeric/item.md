---
title: 'Numerical Integration and Differentiation'
morea_id: module-matlab-numeric
morea_type: module
morea_experiences:
    - matlab-numerical-from-acc
    - matlab-numerical-from-pos
    - matlab-numerical-discuss
published: true
---
# Getting Started

Download the [lab10_start.m](lab10_start.m) file, rename it to
"lab10_[netid].m" where "[netid]" is your netid and save it to your
"Lab10" folder. 

Remember: You can find all the example code shown here in the
[lab10_example1.m](lab10_example1.m) file. You may download it to your
"Lab10" folder and use it for reference. You do not need to try and
type along with your instructor, just watch, pay attention, ask
questions, and then during the practice time review the example file,
type in the relevant parts to your practice file before working on the
practice.

# The Data

::: aside Collect Your Own Data
You can record your own data from your Android or iOS device. For Android, try [Sensor Recorder](https://play.google.com/store/apps/details?id=de.martingolpashin.sensor_record). For iOS, [Physics Toolbox Sensor Suite](https://apps.apple.com/us/app/physics-toolbox-sensor-suite/id1128914250) may be useful, though it does not appear to allow for simultaneous recording of two or more sensors (e.g. accelerometor and GPS at the same time). 

In either case, it will take a bit of work to clean and process the raw data recorded to put it in a form like the data file used for this lab.
:::

As an example of real-world data, Dr. Maczka recorded acceleration and
position data during his commute to campus.

Download the following data file and move it to your "Lab10" folder:

- [MorningCommute_2019_11_04.csv](/ef105-2019-08/data/MorningCommute_2019_11_04.csv) 


The data consists of acceleration and position measurements.

```
time accX accY accZ posX posY posZ
```

Time is in seconds. Acceleration components are in meters per second
squared ($m/s^{2}$) while position components are in meters ($m$).

It will be convenient to extract the acceleration and position parts,
but keep the x,y, and z components together for each:

```
time = data(:,1);
acc = data(:,2:4);
pos = data(:,5:7);
```

You may also wish to extract the x,y,z components of each for some
calculations:

```
accX = acc(:,1);
accY = acc(:,2);
accZ = acc(:,3);
```

and

```
posX = pos(:,1);
posY = pos(:,2);
posZ = pos(:,3);
```

# Velocity: The Uninstrumented Value

While acceleration is instrumented via the accelerometers, and
position is instrumented via the GPS receiver, smartphones do not
measure velocity directly. We will calculate velocity twice, once from
the acceleration data and once from the position data.

As you are working with this data set and calculating velocity,
position, and acceleration from different measurements, think about
the strengths and weaknesses to the two primary data sources
(accelerometers and GPS), and how those reflect in the calculated
values and plots you generate.

<!--
# Lab 11 Pre-lab

- Conditional statements: will be used to implement number of column check.
- Iteration (via loops): will be used to iterate through several
  files, calculate total distance or other summary values.
-->
