---
title: 'Position Graph'
published: true
morea_type: experience
morea_id: spreadsheet-numeric-position-graph
---
Since velocity is the time rate of change (*derivative*) of position,
v=dx/dt, we must integrate, take the area under the velocity curve, to
find position: x=*∫v dt*. We will approximate the area using
trapezoids.

![](pix/trapezoids.jpg)

  - Note for the the area equation, the base values of the trapezoid are
    velocity values and the height of the trapezoid is the change in
    time.
  - You don't need a separate formula for the area of the triangle on
    the right side. Remember, area of a triangle just makes one of the
    bases zero: A=½bh

Insert a column for position: Right click on B, Insert\
![](pix/insert-alt.jpg){onclick="swapimage(this)"}

Type "Position (ft)" into `B1`. Go ahead and make the column wider.

Put the given initial position of 4 ft in `B2`.

Create formula for position at t=1 in B3.

Remember to add the initial position: *x<sub>2</sub>* = x<sub>1</sub>+
0.5\**(v<sub>2</sub> + v<sub>1</sub>)\*(t<sub>2</sub> -
t<sub>1</sub>)*\
![](pix/formula-alt.jpg){onclick="swapimage(this)"}

Drag formula down to determine position at all time values.

Create a position vs. time plot. **Save yourself some formatting
time\!**

  - Copy/paste your Velocity graph (use ctrl-v or choose first paste
    option; don't paste as picture)
  - Right click on curve, Select Data, Edit. Change y data series.  
      
  - Edit your axis labels and change the color of the curve.

Yours should look something like this:\
![](pix/position_chart.png){.screencap}
