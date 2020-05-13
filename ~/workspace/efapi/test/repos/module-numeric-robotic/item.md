---
title: 'Discussion: Applications for Mobile Robots'
morea_type: module
morea_id: module-numeric-robotic
published: true
---
The position calculated by integrating acceleration twice is quite far
off from the position as measured via GPS. Why might this be? 

A mobile robot is likely to have similar sensors for acceleration and
position as your smartphone. To function well, a robot will need to
know where it is at any point in time so it can do things like map out
where objects, navigate to a desired location, or track where it has
and has not visited.

Assume our end-goal is to know position at each point in time and
discuss the following questions:

1. What are the limitations of using only GPS data to obtain position?
2. What are the limitations of using only acceleration data to obtain position?
3. How might we use both GPS data *and* accelerometer measurements to
   create an estimate of position at each point in time that benefits
   from the strengths of the different measurements?
