---
title: Start
morea_id: lab12-start
morea_type: module
published: true
---
# Exam Scheduling

Review the [final exam
schedule]({{wwwroot}}/control/final-exam-schedule.php), make or
request any necessary changes as needed. Since we no longer
are constrained by physical space, you may freely pick whichever
section best fits your schedule.

# Make Sure you are Caught Up
- @[link](dropbox/Lab11)
- @[link](feedback/matlab-model-fit)

# Wednesday Help Session

The Wednesday help sessions will now be from 1-3pm. You are always
welcome to [schedule a Zoom meeting]({{wwwroot}}/faculty/dmaczka.php)
with Dr. Maczka if the help session schedule does not align with your
own, or you would like additional one-on-one help.

# Getting Started

We will be using simulated data in from a cart on an incline for this lab. There are two data files:

[cart_accelerometer.csv]({{wwwroot}}/data/cart_accelerometer.csv)
: Containing three columns:
  
  1. measurement time in seconds
  2. perfect (ideal) acceleration measurements (m/s^2^)
  3. realistic (noisy) acceleration measurements (m/s^2^)

[cart_position.csv]({{wwwroot}}/data/cart_position.csv)
: Containing three columns:
  
  1. measurement time in seconds
  2. perfect (ideal) position measurements (m)
  3. realistic (noisy) position measurements (m)

Download the two files and save them to your 'EF105/data' folder.

# Background and Context

With an abundance of self-contained, relatively cheap
[accelerometer](https://en.wikipedia.org/wiki/Accelerometer) sensors
it is relatively easy to build a wheeled cart that measures its
acceleration. Measuring acceleration does not require any external
reference frame, making it straightforward to measure. Measuring
velocity and position are certainly possible with available sensors
but require an external reference frame. For the velocity of a cart, a
reasonable reference frame is the ground, and assuming the wheels do
not slip, then measuring the rotational velocity of the wheels can be
used to calculate linear velocity of the cart. Similarly, for position
we could pick a reference frame such as a wall and use a laser range
finder to measure relative position to the wall.

While it is possible to fully instrument a cart or mobile robot to
measure acceleration, velocity, and position, it is cheaper and
simpler to measure only one of the three, usually acceleration, and
calculate the other two. In practice, measurements are not perfect,
however, and errors in measurements are compounded when those noisy
measurements are used to find other values.
